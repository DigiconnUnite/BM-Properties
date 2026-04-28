<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editing = $editId > 0 ? get_explore_city_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? 'save');

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            delete_explore_city($id);
            $message = 'City deleted.';
        }
    } else {
        $id = (int) ($_POST['id'] ?? 0);
        $existing = $id > 0 ? get_explore_city_by_id($id) : null;

        $cityName = clean_text((string) ($_POST['city_name'] ?? ''));
        $propertyCount = max(0, (int) ($_POST['property_count'] ?? 0));
        $sortOrder = (int) ($existing['sort_order'] ?? 0);
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        $imagePath = (string) ($existing['image_path'] ?? '');
        $oldImagePath = $imagePath;

        $uploadRoot = realpath(__DIR__ . '/..');
        if (is_string($uploadRoot) && $uploadRoot !== '') {
            $citiesUploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'cities';
            $uploadError = null;
            $uploadedImage = upload_image_file($_FILES['image_file'] ?? [], $citiesUploadDir, 'uploads/cities', $uploadError);
            if ($uploadedImage !== null) {
                $imagePath = $uploadedImage;
            } elseif ($uploadError !== null) {
                $error = $uploadError;
            }
        }

        if ($error !== '') {
            // Keep upload validation message.
        } elseif ($cityName === '') {
            $error = 'City/Location name is required.';
        } elseif ($imagePath === '') {
            $error = 'Please upload a WEBP image from your local system.';
        } else {
            save_explore_city([
                'city_name' => $cityName,
                'image_path' => $imagePath,
                'property_count' => $propertyCount,
                'sort_order' => $sortOrder,
                'is_active' => $isActive,
            ], $id > 0 ? $id : null);
            if ($oldImagePath !== '' && $oldImagePath !== $imagePath) {
                delete_uploaded_file($oldImagePath);
            }

            $message = $id > 0 ? 'City updated.' : 'City added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Explore Cities';
$activePage = 'cities';
$cities = get_explore_cities(false);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<section class="admin-card">
    <h2><?php echo $editing ? 'Edit City Item' : 'Add City Item'; ?></h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
        <input type="hidden" name="action" value="save">

        <div>
            <label>City/Location Name</label>
            <input class="form-control" type="text" name="city_name"
                value="<?php echo htmlspecialchars((string) ($editing['city_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div>
            <label>Property Count</label>
            <input class="form-control" type="number" min="0" name="property_count"
                value="<?php echo (int) ($editing['property_count'] ?? 0); ?>">
        </div>

        <div>
            <label>Upload Image from Local System (WEBP only, max 1MB)</label>
            <input class="form-control" type="file" name="image_file" accept=".webp,image/webp" <?php echo $editing ? '' : 'required'; ?>>
            <?php if (!empty($editing['image_path'])): ?>
                <div class="admin-city-preview">
                    <span>Current Image</span>
                    <img src="<?php echo htmlspecialchars(resolve_asset_path((string) $editing['image_path'], '..'), ENT_QUOTES, 'UTF-8'); ?>"
                        alt="<?php echo htmlspecialchars((string) ($editing['city_name'] ?? 'City image'), ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            <?php endif; ?>
        </div>

        <div class="admin-checkbox-wrap">
            <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
        </div>

        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save City Item</button>
            <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn" href="cities.php">Cancel</a><?php endif; ?>
        </div>
    </form>
</section>

<section class="admin-card">
    <h2>Explore Cities List</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Location</th>
                    <th>Properties</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cities as $city): ?>
                    <tr>
                        <td>
                            <?php
                            $thumbnailPath = (string) ($city['image_path'] ?? '');
                            $thumbnailSrc = resolve_asset_path($thumbnailPath, '..');
                            ?>
                            <img class="admin-table-thumb" src="<?php echo htmlspecialchars($thumbnailSrc, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars((string) ($city['city_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                        </td>
                        <td>
                            <div class="admin-table-main"><?php echo htmlspecialchars((string) ($city['city_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
                            <div class="admin-table-sub"><?php echo htmlspecialchars((string) ($city['image_path'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
                        </td>
                        <td><?php echo (int) ($city['property_count'] ?? 0); ?></td>
                        <td>
                            <span class="admin-badge-status <?php echo (int) ($city['is_active'] ?? 0) === 1 ? 'active' : 'inactive'; ?>">
                                <?php echo (int) ($city['is_active'] ?? 0) === 1 ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td class="admin-gallery-actions">
                            <a class="btn btn-sm btn-outline-primary" href="cities.php?edit=<?php echo (int) ($city['id'] ?? 0); ?>">Edit</a>
                            <form method="post" class="inline-form" onsubmit="return confirm('Delete this city item?');">
                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) ($city['id'] ?? 0); ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($cities) === 0): ?>
                    <tr>
                        <td colspan="5">No city items found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?php admin_layout_bottom(); ?>
