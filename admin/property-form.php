<?php

require_once __DIR__ . '/_bootstrap.php';

function split_non_empty_lines(string $input): array
{
  $lines = split_lines($input);
  return array_values(array_filter(array_map('trim', $lines), static fn($line) => $line !== ''));
}

function details_to_text(array $details): string
{
  $lines = [];
  foreach ($details as $item) {
    if (!is_array($item)) {
      continue;
    }
    $label = trim((string) ($item['label'] ?? ''));
    $value = trim((string) ($item['value'] ?? ''));
    if ($label !== '' || $value !== '') {
      $lines[] = $label . '|' . $value;
    }
  }

  return implode("\n", $lines);
}

function text_to_details(string $text): array
{
  $details = [];
  foreach (split_non_empty_lines($text) as $line) {
    $parts = explode('|', $line, 2);
    $details[] = [
      'label' => trim((string) ($parts[0] ?? '')),
      'value' => trim((string) ($parts[1] ?? '')),
    ];
  }

  return $details;
}

function normalize_map_embed_input(string $input): string
{
  $value = trim($input);
  if ($value === '') {
    return '';
  }

  if (stripos($value, '<iframe') !== false) {
    if (preg_match('/src=["\']([^"\']+)["\']/i', $value, $matches) === 1 && isset($matches[1])) {
      return trim((string) $matches[1]);
    }
    return '';
  }

  return $value;
}

function is_valid_webp_upload(array $file): bool
{
  if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
    return false;
  }

  $fileName = strtolower((string) ($file['name'] ?? ''));
  if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'webp') {
    return false;
  }

  $tmpName = (string) ($file['tmp_name'] ?? '');
  if ($tmpName === '' || !is_uploaded_file($tmpName)) {
    return false;
  }

  $mimeType = '';
  if (function_exists('mime_content_type')) {
    $mimeType = (string) mime_content_type($tmpName);
  } elseif (function_exists('finfo_open')) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if ($finfo !== false) {
      $mimeType = (string) finfo_file($finfo, $tmpName);
      finfo_close($finfo);
    }
  }

  if ($mimeType !== 'image/webp') {
    return false;
  }

  $size = (int) ($file['size'] ?? 0);
  return $size > 0 && $size <= (1024 * 1024);
}

require_csrf_post();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$property = $id > 0 ? get_property_by_id($id) : null;
$categories = get_categories(true);
$defaultCategoryId = (string) ((int) ($categories[0]['id'] ?? 0));
$existingGalleryImages = isset($property['galleryImages']) && is_array($property['galleryImages'])
  ? array_values(array_filter(array_map(static fn($value) => trim((string) $value), $property['galleryImages']), static fn($value) => $value !== ''))
  : [];

$message = isset($_GET['saved']) ? 'Property saved successfully.' : '';
$error = '';

$form = [
  'category_id' => (string) ($property['category_id'] ?? $defaultCategoryId),
  'name' => (string) ($property['name'] ?? ''),
  'slug' => (string) ($property['slug'] ?? ''),
  'website_url' => (string) ($property['websiteUrl'] ?? ''),
  'description' => isset($property['description']) ? implode("\n", $property['description']) : '',
  'details' => isset($property['details']) ? details_to_text($property['details']) : '',
  'features' => isset($property['features']) && is_array($property['features'])
    ? implode("\n", array_values(array_filter(array_reduce(
      $property['features'],
      static function (array $carry, $group): array {
        if (is_array($group)) {
          foreach ($group as $item) {
            if (is_string($item) && trim($item) !== '') {
              $carry[] = trim($item);
            }
          }
        }
        return $carry;
      },
      []
    ))))
    : '',
  'map_embed' => (string) ($property['mapEmbed'] ?? ''),
  'map_address' => (string) ($property['map']['address'] ?? ''),
  'map_city' => (string) ($property['map']['city'] ?? ''),
  'map_state' => (string) ($property['map']['state'] ?? ''),
  'map_postal' => (string) ($property['map']['postal'] ?? ''),
  'map_area' => (string) ($property['map']['area'] ?? ''),
  'map_country' => (string) ($property['map']['country'] ?? 'India'),
  'nearby' => (string) ($property['nearby'] ?? ''),
  'nearby_items' => isset($property['nearbyItems']) ? implode("\n", $property['nearbyItems']) : '',
  'whatsapp_number' => (string) ($property['whatsappNumber'] ?? ''),
  'status' => (string) ($property['status'] ?? 'active'),
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($form as $key => $value) {
    $form[$key] = clean_text((string) ($_POST[$key] ?? ''));
  }

  $existingGallery = isset($_POST['existing_gallery_images']) && is_array($_POST['existing_gallery_images'])
    ? array_values(array_filter(array_map(static fn($value) => clean_text((string) $value), $_POST['existing_gallery_images']), static fn($value) => $value !== ''))
    : [];
  $uploadedGallery = [];

  if (isset($_FILES['showcase_images']) && is_array($_FILES['showcase_images']['name'] ?? null)) {
    $fileCount = min(5, count((array) $_FILES['showcase_images']['name']));
    $uploadRoot = realpath(__DIR__ . '/..');
    $propertyUploadDir = is_string($uploadRoot) && $uploadRoot !== ''
      ? $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'properties'
      : '';

    for ($i = 0; $i < $fileCount; $i++) {
      $singleFile = [
        'name' => (string) ($_FILES['showcase_images']['name'][$i] ?? ''),
        'type' => (string) ($_FILES['showcase_images']['type'][$i] ?? ''),
        'tmp_name' => (string) ($_FILES['showcase_images']['tmp_name'][$i] ?? ''),
        'error' => (int) ($_FILES['showcase_images']['error'][$i] ?? UPLOAD_ERR_NO_FILE),
        'size' => (int) ($_FILES['showcase_images']['size'][$i] ?? 0),
      ];

      if (($singleFile['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        continue;
      }

      if (!is_valid_webp_upload($singleFile)) {
        $error = 'Showcase images must be WEBP format and max 1MB each.';
        break;
      }

      if ($propertyUploadDir === '') {
        $error = 'Unable to locate upload directory.';
        break;
      }

      $savedPath = upload_image_file($singleFile, $propertyUploadDir, 'uploads/properties');
      if ($savedPath === null) {
        $error = 'Unable to upload one or more showcase images.';
        break;
      }

      $uploadedGallery[] = $savedPath;
    }
  }

  $galleryImages = array_values(array_unique(array_merge($existingGallery, $uploadedGallery)));
  if (count($galleryImages) > 5) {
    $galleryImages = array_slice($galleryImages, 0, 5);
  }

  $descriptionLines = split_non_empty_lines($form['description']);
  $detailRows = text_to_details($form['details']);
  $featureLines = split_non_empty_lines($form['features']);
  $nearbyItems = split_non_empty_lines($form['nearby_items']);
  $mapEmbed = normalize_map_embed_input($form['map_embed']);

  if ($form['name'] === '') {
    $error = 'Property title is required.';
  } elseif ($form['website_url'] === '') {
    $error = 'Reference website URL is required.';
  } elseif (count($galleryImages) === 0) {
    $error = 'Please add at least one showcase image.';
  } elseif (count($galleryImages) > 5) {
    $error = 'You can use only up to 5 showcase images.';
  } elseif ($mapEmbed === '') {
    $error = 'Map location is required. Paste map URL or iframe code.';
  }

  if ($error === '') {
    $slug = $form['slug'] !== '' ? normalize_slug($form['slug']) : normalize_slug($form['name']);
    if ($slug === '') {
      $error = 'Please provide a valid property slug or title.';
    } else {
      $summary = (string) ($descriptionLines[0] ?? '');
      $locationParts = array_filter([
        $form['map_city'],
        $form['map_state'],
        $form['map_country'],
      ], static fn($part) => trim((string) $part) !== '');
      $location = implode(', ', $locationParts);
      if ($location === '') {
        $location = (string) $form['map_address'];
      }

      $payload = [
        'category_id' => (int) $form['category_id'],
        'name' => $form['name'],
        'slug' => $slug,
        'page_title' => $form['name'] . ' - BM Real Estate',
        'hero_image' => (string) ($galleryImages[0] ?? ''),
        'gallery_images' => $galleryImages,
        'summary' => $summary,
        'description' => $descriptionLines,
        'location' => $location,
        'price' => 'On request',
        'price_suffix' => '',
        'beds' => '',
        'baths' => '',
        'sqft' => '',
        'overview_id' => strtoupper(substr($slug, 0, 12)),
        'nearby' => $form['nearby'],
        'nearby_items' => $nearbyItems,
        'details' => $detailRows,
        'features' => [array_slice($featureLines, 0, 20)],
        'map_address' => $form['map_address'],
        'map_city' => $form['map_city'],
        'map_state' => $form['map_state'],
        'map_postal' => $form['map_postal'],
        'map_area' => $form['map_area'],
        'map_country' => $form['map_country'] !== '' ? $form['map_country'] : 'India',
        'map_embed' => $mapEmbed,
        'website_url' => $form['website_url'],
        'website_label' => 'Visit Website',
        'whatsapp_number' => normalize_phone($form['whatsapp_number']),
        'card_highlights' => array_slice($featureLines, 0, 4),
        'is_featured' => 1,
        'status' => $form['status'] === 'inactive' ? 'inactive' : 'active',
      ];

      $savedId = save_property($payload, $id > 0 ? $id : null);
      header('Location: property-form.php?id=' . $savedId . '&saved=1');
      exit;
    }
  }
}

$pageTitle = $id > 0 ? 'Edit Property' : 'Add Property';
$activePage = 'properties';

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
  <h2><?php echo $id > 0 ? 'Update Property' : 'Add New Property'; ?></h2>
  <?php if ($message !== ''): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
  <?php if ($error !== ''): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

  <form method="post" class="admin-form-grid" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">

    <div>
      <label>Category</label>
      <select class="form-control" name="category_id" required>
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo (int) $category['id']; ?>" <?php echo (string) $category['id'] === $form['category_id'] ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars((string) $category['name'], ENT_QUOTES, 'UTF-8'); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label>Property Title</label>
      <input class="form-control" name="name"
        value="<?php echo htmlspecialchars($form['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div>
      <label>Slug (optional)</label>
      <input class="form-control" name="slug"
        value="<?php echo htmlspecialchars($form['slug'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="auto from title">
    </div>

    <div>
      <label>Reference Website URL</label>
      <input class="form-control" name="website_url"
        value="<?php echo htmlspecialchars($form['website_url'], ENT_QUOTES, 'UTF-8'); ?>"
        placeholder="https://example.com" required>
    </div>

    <div class="admin-form-full">
      <label>Showcase Images (WEBP only, max 1MB each, up to 5)</label>
      <div class="admin-image-uploader" id="showcase-image-uploader">
        <input class="form-control" type="file" id="showcase-image-picker" accept=".webp,image/webp">
        <button class="btn btn-outline-primary admin-btn" type="button" id="add-showcase-image-btn">Add</button>
      </div>
      <input class="d-none" type="file" name="showcase_images[]" id="showcase-images-input" accept=".webp,image/webp"
        multiple>
      <ul class="admin-upload-list" id="showcase-images-list">
        <?php foreach ($existingGalleryImages as $existingImagePath): ?>
          <li class="admin-upload-item" data-item-type="existing">
            <input type="hidden" name="existing_gallery_images[]"
              value="<?php echo htmlspecialchars($existingImagePath, ENT_QUOTES, 'UTF-8'); ?>">
            <span><?php echo htmlspecialchars($existingImagePath, ENT_QUOTES, 'UTF-8'); ?></span>
            <button type="button" class="btn btn-sm btn-outline-danger js-remove-existing-image">Remove</button>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="admin-form-full">
      <label>Property Description (one paragraph per line)</label>
      <textarea class="form-control" name="description"
        rows="5"><?php echo htmlspecialchars($form['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="admin-form-full">
      <label>Property Details (format: Label|Value, one per line)</label>
      <textarea class="form-control" name="details" rows="5"
        placeholder="Property Type|Residential Plot&#10;Status|For Sale"><?php echo htmlspecialchars($form['details'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="admin-form-full">
      <label>Amenities and Features (one per line)</label>
      <textarea class="form-control" name="features" rows="5"
        placeholder="Club House&#10;CCTV Camera&#10;Gymnasium"><?php echo htmlspecialchars($form['features'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="admin-form-full">
      <label>Map Location (Google Maps embed URL or iframe code)</label>
      <textarea class="form-control" name="map_embed" rows="3"
        placeholder="https://www.google.com/maps/embed?... or full iframe code"><?php echo htmlspecialchars($form['map_embed'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div>
      <label>Address</label>
      <input class="form-control" name="map_address"
        value="<?php echo htmlspecialchars($form['map_address'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>City</label>
      <input class="form-control" name="map_city"
        value="<?php echo htmlspecialchars($form['map_city'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>State</label>
      <input class="form-control" name="map_state"
        value="<?php echo htmlspecialchars($form['map_state'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Postal Code</label>
      <input class="form-control" name="map_postal"
        value="<?php echo htmlspecialchars($form['map_postal'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Area</label>
      <input class="form-control" name="map_area"
        value="<?php echo htmlspecialchars($form['map_area'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Country</label>
      <input class="form-control" name="map_country"
        value="<?php echo htmlspecialchars($form['map_country'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div class="admin-form-full">
      <label>What's Nearby (intro)</label>
      <textarea class="form-control" name="nearby"
        rows="2"><?php echo htmlspecialchars($form['nearby'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="admin-form-full">
      <label>Nearby Items (one item per line)</label>
      <textarea class="form-control" name="nearby_items"
        rows="4"><?php echo htmlspecialchars($form['nearby_items'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div>
      <label>WhatsApp Number (digits only)</label>
      <input class="form-control" name="whatsapp_number"
        value="<?php echo htmlspecialchars($form['whatsapp_number'], ENT_QUOTES, 'UTF-8'); ?>"
        placeholder="919999999999">
    </div>
    <div>
      <label>Status</label>
      <select class="form-control" name="status">
        <option value="active" <?php echo $form['status'] === 'active' ? 'selected' : ''; ?>>Active</option>
        <option value="inactive" <?php echo $form['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
      </select>
    </div>

    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Property</button>
      <a class="btn btn-outline-secondary admin-btn" href="properties.php">Back to list</a>
    </div>
  </form>
</section>
<script src="../js/admin-property-images.js"></script>
<?php include __DIR__ . '/_layout_bottom.php'; ?>