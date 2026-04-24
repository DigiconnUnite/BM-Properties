<?php

require_once __DIR__ . '/_bootstrap.php';

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

function features_to_text(array $groups): string
{
    $lines = [];
    foreach ($groups as $group) {
        if (!is_array($group)) {
            continue;
        }
        $clean = [];
        foreach ($group as $feature) {
            $item = trim((string) $feature);
            if ($item !== '') {
                $clean[] = $item;
            }
        }
        if ($clean) {
            $lines[] = implode(', ', $clean);
        }
    }

    return implode("\n", $lines);
}

function text_to_details(string $text): array
{
    $lines = split_lines($text);
    $details = [];
    foreach ($lines as $line) {
        $parts = explode('|', $line, 2);
        $details[] = [
            'label' => trim((string) ($parts[0] ?? '')),
            'value' => trim((string) ($parts[1] ?? '')),
        ];
    }

    return $details;
}

function text_to_features(string $text): array
{
    $lines = split_lines($text);
    $result = [];
    foreach ($lines as $line) {
        $parts = array_filter(array_map('trim', explode(',', $line)), static fn($v) => $v !== '');
        if (!empty($parts)) {
            $result[] = array_values($parts);
        }
    }

    return $result;
}

require_csrf_post();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$property = $id > 0 ? get_property_by_id($id) : null;
$message = '';
$error = '';

$categories = get_categories(true);

$form = [
    'category_id' => (string) ($property['category_id'] ?? ($categories[0]['id'] ?? 0)),
    'name' => (string) ($property['name'] ?? ''),
    'slug' => (string) ($property['slug'] ?? ''),
    'page_title' => (string) ($property['pageTitle'] ?? ''),
    'hero_image' => (string) ($property['heroImage'] ?? ''),
    'gallery_images' => isset($property['galleryImages']) ? implode("\n", $property['galleryImages']) : '',
    'summary' => (string) ($property['summary'] ?? ''),
    'description' => isset($property['description']) ? implode("\n", $property['description']) : '',
    'location' => (string) ($property['location'] ?? ''),
    'price' => (string) ($property['price'] ?? ''),
    'price_suffix' => (string) ($property['priceSuffix'] ?? ''),
    'beds' => (string) ($property['beds'] ?? ''),
    'baths' => (string) ($property['baths'] ?? ''),
    'sqft' => (string) ($property['sqft'] ?? ''),
    'overview_id' => (string) ($property['overviewId'] ?? ''),
    'nearby' => (string) ($property['nearby'] ?? ''),
    'nearby_items' => isset($property['nearbyItems']) ? implode("\n", $property['nearbyItems']) : '',
    'details' => isset($property['details']) ? details_to_text($property['details']) : '',
    'features' => isset($property['features']) ? features_to_text($property['features']) : '',
    'map_address' => (string) ($property['map']['address'] ?? ''),
    'map_city' => (string) ($property['map']['city'] ?? ''),
    'map_state' => (string) ($property['map']['state'] ?? ''),
    'map_postal' => (string) ($property['map']['postal'] ?? ''),
    'map_area' => (string) ($property['map']['area'] ?? ''),
    'map_country' => (string) ($property['map']['country'] ?? 'India'),
    'map_embed' => (string) ($property['mapEmbed'] ?? ''),
    'website_url' => (string) ($property['websiteUrl'] ?? ''),
    'website_label' => (string) ($property['websiteLabel'] ?? ''),
    'whatsapp_number' => (string) ($property['whatsappNumber'] ?? ''),
    'card_highlights' => isset($property['cardHighlights']) ? implode("\n", $property['cardHighlights']) : '',
    'status' => (string) ($property['status'] ?? 'active'),
    'is_featured' => !empty($property['isFeatured']) ? '1' : '1',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($form as $key => $value) {
        if ($key === 'is_featured') {
            continue;
        }
        $form[$key] = clean_text((string) ($_POST[$key] ?? ''));
    }
    $form['is_featured'] = isset($_POST['is_featured']) ? '1' : '0';

    $uploadRoot = realpath(__DIR__ . '/..');
    if (is_string($uploadRoot) && $uploadRoot !== '') {
        $propertyUploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'properties';

        $heroUpload = upload_image_file($_FILES['hero_image_file'] ?? [], $propertyUploadDir, 'images/uploads/properties');
        if ($heroUpload !== null) {
            $form['hero_image'] = $heroUpload;
        }

        if (isset($_FILES['gallery_images_files']) && is_array($_FILES['gallery_images_files']['name'] ?? null)) {
            $fileCount = count((array) $_FILES['gallery_images_files']['name']);
            $uploadedGalleryPaths = [];
            for ($i = 0; $i < $fileCount; $i++) {
                $singleFile = [
                    'name' => (string) ($_FILES['gallery_images_files']['name'][$i] ?? ''),
                    'type' => (string) ($_FILES['gallery_images_files']['type'][$i] ?? ''),
                    'tmp_name' => (string) ($_FILES['gallery_images_files']['tmp_name'][$i] ?? ''),
                    'error' => (int) ($_FILES['gallery_images_files']['error'][$i] ?? UPLOAD_ERR_NO_FILE),
                    'size' => (int) ($_FILES['gallery_images_files']['size'][$i] ?? 0),
                ];
                $galleryUpload = upload_image_file($singleFile, $propertyUploadDir, 'images/uploads/properties');
                if ($galleryUpload !== null) {
                    $uploadedGalleryPaths[] = $galleryUpload;
                }
            }

            if (!empty($uploadedGalleryPaths)) {
                $manualGallery = split_lines($form['gallery_images']);
                $form['gallery_images'] = implode("\n", array_values(array_unique(array_merge($manualGallery, $uploadedGalleryPaths))));
            }
        }
    }

    if ($form['name'] === '' || $form['category_id'] === '' || $form['hero_image'] === '') {
        $error = 'Name, category, and hero image are required.';
    } else {
        $slug = $form['slug'] !== '' ? normalize_slug($form['slug']) : normalize_slug($form['name']);
        if ($slug === '') {
            $error = 'Invalid slug. Please provide a valid property slug.';
        } else {
            $payload = [
                'category_id' => (int) $form['category_id'],
                'name' => $form['name'],
                'slug' => $slug,
                'page_title' => $form['page_title'] !== '' ? $form['page_title'] : ($form['name'] . ' - BM Real Estate'),
                'hero_image' => $form['hero_image'],
                'gallery_images' => split_lines($form['gallery_images']),
                'summary' => $form['summary'],
                'description' => split_lines($form['description']),
                'location' => $form['location'],
                'price' => $form['price'],
                'price_suffix' => $form['price_suffix'],
                'beds' => $form['beds'],
                'baths' => $form['baths'],
                'sqft' => $form['sqft'],
                'overview_id' => $form['overview_id'],
                'nearby' => $form['nearby'],
                'nearby_items' => split_lines($form['nearby_items']),
                'details' => text_to_details($form['details']),
                'features' => text_to_features($form['features']),
                'map_address' => $form['map_address'],
                'map_city' => $form['map_city'],
                'map_state' => $form['map_state'],
                'map_postal' => $form['map_postal'],
                'map_area' => $form['map_area'],
                'map_country' => $form['map_country'],
                'map_embed' => $form['map_embed'],
                'website_url' => $form['website_url'],
                'website_label' => $form['website_label'],
                'whatsapp_number' => normalize_phone($form['whatsapp_number']),
                'card_highlights' => split_lines($form['card_highlights']),
                'is_featured' => $form['is_featured'] === '1' ? 1 : 0,
                'status' => in_array($form['status'], ['active', 'inactive'], true) ? $form['status'] : 'active',
            ];

            $savedId = save_property($payload, $id > 0 ? $id : null);
            header('Location: property-form.php?id=' . $savedId . '&saved=1');
            exit;
        }
    }
}

if (isset($_GET['saved'])) {
    $message = 'Property saved successfully.';
}

$pageTitle = $id > 0 ? 'Edit Property' : 'Add Property';
$activePage = 'properties';

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">

        <div><label>Category</label>
            <select class="form-control" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo (int) $category['id']; ?>" <?php echo (string) $category['id'] === $form['category_id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div><label>Property Name</label><input class="form-control" name="name"
                value="<?php echo htmlspecialchars($form['name'], ENT_QUOTES, 'UTF-8'); ?>" required></div>
        <div><label>Slug</label><input class="form-control" name="slug"
                value="<?php echo htmlspecialchars($form['slug'], ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="auto-generated"></div>
        <div><label>Page Title</label><input class="form-control" name="page_title"
                value="<?php echo htmlspecialchars($form['page_title'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Hero Image Path</label><input class="form-control" name="hero_image"
                value="<?php echo htmlspecialchars($form['hero_image'], ENT_QUOTES, 'UTF-8'); ?>" required></div>
        <div><label>Upload Hero Image</label><input class="form-control" type="file" name="hero_image_file"
                accept=".jpg,.jpeg,.png,.webp,.gif,.avif"></div>
        <div><label>Price</label><input class="form-control" name="price"
                value="<?php echo htmlspecialchars($form['price'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Price Suffix</label><input class="form-control" name="price_suffix"
                value="<?php echo htmlspecialchars($form['price_suffix'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Beds</label><input class="form-control" name="beds"
                value="<?php echo htmlspecialchars($form['beds'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Baths</label><input class="form-control" name="baths"
                value="<?php echo htmlspecialchars($form['baths'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Sqft</label><input class="form-control" name="sqft"
                value="<?php echo htmlspecialchars($form['sqft'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Overview ID</label><input class="form-control" name="overview_id"
                value="<?php echo htmlspecialchars($form['overview_id'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Status</label>
            <select class="form-control" name="status">
                <option value="active" <?php echo $form['status'] === 'active' ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo $form['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>
        <div class="admin-checkbox-wrap"><label><input type="checkbox" name="is_featured" <?php echo $form['is_featured'] === '1' ? 'checked' : ''; ?>> Featured</label></div>

        <div class="admin-form-full"><label>Summary</label><textarea class="form-control" name="summary"
                rows="3"><?php echo htmlspecialchars($form['summary'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Description (one paragraph per line)</label><textarea class="form-control"
                name="description"
                rows="4"><?php echo htmlspecialchars($form['description'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Gallery Images (one image path per line)</label><textarea
                class="form-control" name="gallery_images"
                rows="4"><?php echo htmlspecialchars($form['gallery_images'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Upload Gallery Images (multiple)</label><input class="form-control"
                type="file" name="gallery_images_files[]" accept=".jpg,.jpeg,.png,.webp,.gif,.avif" multiple></div>
        <div class="admin-form-full"><label>Nearby Intro</label><textarea class="form-control" name="nearby"
                rows="2"><?php echo htmlspecialchars($form['nearby'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Nearby Items (one item per line)</label><textarea class="form-control"
                name="nearby_items"
                rows="4"><?php echo htmlspecialchars($form['nearby_items'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Details (label|value, one per line)</label><textarea class="form-control"
                name="details"
                rows="4"><?php echo htmlspecialchars($form['details'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Features (comma separated per row)</label><textarea class="form-control"
                name="features"
                rows="4"><?php echo htmlspecialchars($form['features'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div class="admin-form-full"><label>Card Highlights (one per line)</label><textarea class="form-control"
                name="card_highlights"
                rows="3"><?php echo htmlspecialchars($form['card_highlights'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>

        <div><label>Location</label><input class="form-control" name="location"
                value="<?php echo htmlspecialchars($form['location'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map Address</label><input class="form-control" name="map_address"
                value="<?php echo htmlspecialchars($form['map_address'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map City</label><input class="form-control" name="map_city"
                value="<?php echo htmlspecialchars($form['map_city'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map State</label><input class="form-control" name="map_state"
                value="<?php echo htmlspecialchars($form['map_state'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map Postal</label><input class="form-control" name="map_postal"
                value="<?php echo htmlspecialchars($form['map_postal'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map Area</label><input class="form-control" name="map_area"
                value="<?php echo htmlspecialchars($form['map_area'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Map Country</label><input class="form-control" name="map_country"
                value="<?php echo htmlspecialchars($form['map_country'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div class="admin-form-full"><label>Map Embed URL</label><textarea class="form-control" name="map_embed"
                rows="2"><?php echo htmlspecialchars($form['map_embed'], ENT_QUOTES, 'UTF-8'); ?></textarea></div>
        <div><label>Website URL</label><input class="form-control" name="website_url"
                value="<?php echo htmlspecialchars($form['website_url'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Website Label</label><input class="form-control" name="website_label"
                value="<?php echo htmlspecialchars($form['website_label'], ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>WhatsApp Number (Digits)</label><input class="form-control" name="whatsapp_number"
                value="<?php echo htmlspecialchars($form['whatsapp_number'], ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="919999999999"></div>

        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save Property</button>
            <a class="btn btn-outline-secondary admin-btn" href="properties.php">Back to list</a>
        </div>
    </form>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>