<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
  $editId = (int) $_GET['edit'];
  $editing = $editId > 0 ? get_testimonial_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = (string) ($_POST['action'] ?? 'save');

  if ($action === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
      delete_testimonial($id);
      $message = 'Testimonial deleted.';
    }
  } else {
    $id = (int) ($_POST['id'] ?? 0);
    $existing = $id > 0 ? get_testimonial_by_id($id) : null;

    $title = clean_text((string) ($_POST['title'] ?? ''));
    $subtitle = clean_text((string) ($_POST['subtitle'] ?? ''));
    $rating = max(1, min(5, (int) ($_POST['rating'] ?? 5)));
    $body = clean_text((string) ($_POST['message'] ?? ''));
    $isActive = isset($_POST['is_active']) ? 1 : 0;
    $imagePath = (string) ($existing['image_path'] ?? '');
    $oldImagePath = $imagePath;

    $file = $_FILES['image_file'] ?? [];
    $hasFile = (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE);

    if ($hasFile) {
      $uploadRoot = realpath(__DIR__ . '/..');
      if (is_string($uploadRoot) && $uploadRoot !== '') {
        $testimonialDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'testimonials';
        $uploadError = null;
        $uploadedImage = upload_image_file($file, $testimonialDir, 'uploads/testimonials', $uploadError);
        if ($uploadedImage !== null) {
          $imagePath = $uploadedImage;
        } else {
          $error = $uploadError ?? 'Unable to upload image. Please use WEBP up to 1MB.';
        }
      } else {
        $error = 'Unable to locate upload directory.';
      }
    }

    if ($error === '') {
      if ($title === '') {
        $error = 'Title is required.';
      } elseif ($body === '') {
        $error = 'Message is required.';
      } elseif ($imagePath === '') {
        $error = 'Please upload a WEBP image.';
      }
    }

    if ($error === '') {
      save_testimonial([
        'title' => $title,
        'subtitle' => $subtitle,
        'message' => $body,
        'image_path' => $imagePath,
        'rating' => $rating,
        'sort_order' => 0,
        'is_active' => $isActive,
      ], $id > 0 ? $id : null);
      if ($oldImagePath !== '' && $oldImagePath !== $imagePath) {
        delete_uploaded_file($oldImagePath);
      }

      $message = $id > 0 ? 'Testimonial updated.' : 'Testimonial added.';
      $editing = null;
    }
  }
}

$pageTitle = 'Testimonials';
$activePage = 'testimonials';
$testimonials = get_testimonials(false);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<section class="admin-card main-content">
  <h2><?php echo $editing ? 'Edit Testimonial' : 'Add Testimonial'; ?></h2>
  <?php if ($message !== ''): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
  <?php if ($error !== ''): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

  <form method="post" class="admin-form-grid" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
    <input type="hidden" name="action" value="save">

    <div>
      <label>Title</label>
      <input class="form-control" name="title"
        value="<?php echo htmlspecialchars((string) ($editing['title'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div>
      <label>Subtitle / Role</label>
      <input class="form-control" name="subtitle"
        value="<?php echo htmlspecialchars((string) ($editing['subtitle'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Rating (1 to 5)</label>
      <input class="form-control" type="number" min="1" max="5" name="rating"
        value="<?php echo (int) ($editing['rating'] ?? 5); ?>" required>
    </div>
    <div class="admin-form-full">
      <label>Message</label>
      <textarea class="form-control" rows="4" name="message"
        required><?php echo htmlspecialchars((string) ($editing['message'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <div>
      <label>Image (WEBP only, max 1MB)</label>
      <input class="form-control" type="file" name="image_file" accept=".webp,image/webp">
    </div>
    <div class="admin-checkbox-wrap">
      <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Testimonial</button>
      <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn"
          href="testimonials.php">Cancel</a><?php endif; ?>
    </div>
  </form>
</section>

<section class="admin-card main-content">
  <h2>Testimonials List</h2>
  <div class="table-responsive">
    <table class="table admin-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Rating</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($testimonials as $item): ?>
          <tr>
            <td>
              <img class="admin-table-thumb"
                src="../<?php echo htmlspecialchars((string) $item['image_path'], ENT_QUOTES, 'UTF-8'); ?>"
                alt="<?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?>">
            </td>
            <td>
              <div class="admin-table-main"><?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?>
              </div>
              <div class="admin-table-sub">
                <?php echo htmlspecialchars((string) $item['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
              </div>
            </td>
            <td><?php echo (int) $item['rating']; ?>/5</td>
            <td>
              <span class="admin-badge-status <?php echo (int) $item['is_active'] === 1 ? 'active' : 'inactive'; ?>">
                <?php echo (int) $item['is_active'] === 1 ? 'Active' : 'Inactive'; ?>
              </span>
            </td>
            <td>
              <a class="btn btn-sm btn-outline-primary"
                href="testimonials.php?edit=<?php echo (int) $item['id']; ?>">Edit</a>
              <form method="post" class="inline-form" onsubmit="return confirm('Delete this testimonial?');">
                <input type="hidden" name="csrf_token"
                  value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (count($testimonials) === 0): ?>
          <tr>
            <td colspan="5">No testimonials found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
<?php admin_layout_bottom(); ?>
