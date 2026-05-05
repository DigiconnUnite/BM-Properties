<?php

require_once __DIR__ . '/_bootstrap.php';

require_once __DIR__ . '/_layout.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editing = $editId > 0 ? get_hero_section_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? 'save');

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            delete_hero_section($id);
            $message = 'Hero section item deleted.';
        }
    } else {
        $id = (int) ($_POST['id'] ?? 0);
        $existing = $id > 0 ? get_hero_section_by_id($id) : null;
        $title = clean_text((string) ($_POST['title'] ?? ''));
        $subtitle = clean_text((string) ($_POST['subtitle'] ?? ''));
        $description = clean_text((string) ($_POST['description'] ?? ''));
        $sortOrder = (int) ($_POST['sort_order'] ?? 0);
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        $imagePath = (string) ($existing['image_path'] ?? '');
        $oldImagePath = $imagePath;

        // Check if adding new hero section (not editing existing)
        if ($id === 0) {
            $heroSectionCount = get_hero_section_count(false); // Get count including inactive
            if ($heroSectionCount >= 4) {
                $error = 'Maximum 4 hero section slider images can be added. Please delete any existing hero section item to add a new one.';
            }
        }

        $uploadRoot = realpath(__DIR__ . '/..');
        if (is_string($uploadRoot) && $uploadRoot !== '' && $error === '') {
            $uploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'hero-section';
            $uploadError = null;
            $uploadedImage = upload_image_file($_FILES['image_file'] ?? [], $uploadDir, 'uploads/hero-section', $uploadError);
            if ($uploadedImage !== null) {
                $imagePath = $uploadedImage;
            } elseif ($uploadError !== null) {
                $error = $uploadError;
            }
        }

        if ($error !== '') {
            // Keep validation error messages.
        } elseif ($title === '') {
            $error = 'Title is required.';
        } elseif ($subtitle === '') {
            $error = 'Subtitle is required.';
        } elseif ($description === '') {
            $error = 'Description is required.';
        } elseif ($imagePath === '') {
            $error = 'Please upload a WEBP image.';
        } else {
            save_hero_section([
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description,
                'image_path' => $imagePath,
                'sort_order' => $sortOrder,
                'is_active' => $isActive,
            ], $id > 0 ? $id : null);

            if ($oldImagePath !== '' && $oldImagePath !== $imagePath) {
                delete_uploaded_file($oldImagePath);
            }

            $message = $id > 0 ? 'Hero section item updated.' : 'Hero section item added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Hero Section';
$activePage = 'hero-section';
$items = get_admin_hero_sections();

admin_layout_top($pageTitle, $activePage);
?>
<section class="admin-card main-content">
    <h2><?php echo $editing ? 'Edit Hero Section Item' : 'Add Hero Section Item'; ?></h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
        <input type="hidden" name="action" value="save">

        <div class="testimonials-form-row admin-form-full">
            <div>
                <label>Title (Main Heading)</label>
                <input class="form-control" name="title" required maxlength="255"
                    value="<?php echo htmlspecialchars((string) ($editing['title'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                <small class="text-muted">Example: "Find your"</small>
            </div>
            <div>
                <label>Subtitle (Rotating Text)</label>
                <input class="form-control" name="subtitle" required maxlength="255"
                    value="<?php echo htmlspecialchars((string) ($editing['subtitle'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                <small class="text-muted">Example: "Dream Home", "Perfect Property", "Perfect Space"</small>
            </div>
            <div>
                <label>Sort Order</label>
                <input class="form-control" name="sort_order" type="number" min="0" max="4"
                    value="<?php echo (int) ($editing['sort_order'] ?? 0); ?>">
                <small class="text-muted">Order of appearance (0-4)</small>
            </div>
        </div>
        
        <div class="admin-form-full">
            <label>Description</label>
            <textarea class="form-control" name="description" rows="4" required><?php echo htmlspecialchars((string) ($editing['description'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
            <!-- <small class="text-muted">This description will be displayed below the title and subtitle</small> -->
        </div>
        
        <div>
            <label>Upload Image (WEBP only, max 1MB)</label>
            <input class="form-control" type="file" name="image_file" accept=".webp,image/webp" <?php echo $editing ? '' : 'required'; ?>>
            <?php if (isset($editing['image_path']) && $editing['image_path'] !== ''): ?>
                <div class="mt-2">
                    <img src="../<?php echo htmlspecialchars($editing['image_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="Current hero image" style="max-width: 200px; height: auto;">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1">
                        <label class="form-check-label" for="remove_image">Remove current image</label>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="admin-checkbox-wrap">
            <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
        </div>
        
        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save Hero Section Item</button>
            <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn" href="hero-section.php">Cancel</a><?php endif; ?>
        </div>
    </form>
</section>

<section class="admin-card main-content">
    <h2>Hero Section Items</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td>
                            <?php $imageSrc = '../' . ltrim((string) ($item['image_path'] ?? ''), '/'); ?>
                            <img class="admin-table-thumb" src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        </td>
                        <td>
                            <div class="admin-table-main"><?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </td>
                        <td><?php echo htmlspecialchars((string) $item['subtitle'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <div class="admin-table-description"><?php echo htmlspecialchars(substr((string) $item['description'], 0, 100), ENT_QUOTES, 'UTF-8'); ?>...</div>
                        </td>
                        <td><?php echo (int) $item['sort_order']; ?></td>
                        <td>
                            <span class="admin-badge-status <?php echo (int) $item['is_active'] === 1 ? 'active' : 'inactive'; ?>">
                                <?php echo (int) $item['is_active'] === 1 ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td>
                            <div class="property-action-group">
                                <a class="property-icon-btn property-edit-btn" href="hero-section.php?edit=<?php echo (int) $item['id']; ?>"
                                    aria-label="Edit hero section">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <form method="post" class="inline-form" onsubmit="return confirm('Delete this hero section item?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                                    <button class="property-icon-btn property-delete-btn" type="submit" aria-label="Delete hero section">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($items) === 0): ?>
                    <tr><td colspan="7">No hero section items found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<script>
// Auto-hide alert messages after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 500);
        }, 5000);
    });
});
</script>

<?php admin_layout_bottom(); ?>
