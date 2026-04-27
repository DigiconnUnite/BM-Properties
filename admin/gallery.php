<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;
$perPage = 10;
$currentPage = max(1, (int) ($_GET['page'] ?? 1));

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editing = $editId > 0 ? get_gallery_item_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? 'save');

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            delete_gallery_item($id);
            $message = 'Gallery item deleted.';
        }
    } else {
        $id = (int) ($_POST['id'] ?? 0);
        $title = clean_text((string) ($_POST['title'] ?? ''));
        $imagePath = clean_text((string) ($_POST['image_path'] ?? ''));
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        $uploadedBy = (string) (admin_user()['username'] ?? 'admin');
        $uploadedImage = null;

        $uploadRoot = realpath(__DIR__ . '/..');
        if (is_string($uploadRoot) && $uploadRoot !== '') {
            $galleryUploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'gallery';
            $uploadedImage = upload_image_file($_FILES['image_file'] ?? [], $galleryUploadDir, 'uploads/gallery');
            if ($uploadedImage !== null) {
                $imagePath = $uploadedImage;
            }
        }

        if ($title === '') {
            $error = 'Title is required.';
        } elseif ($imagePath === '') {
            $error = 'Please provide an image path or upload an image file.';
        } else {
            save_gallery_item([
                'title' => $title,
                'image_path' => $imagePath,
                'sort_order' => 0,
                'is_active' => $isActive,
                'uploaded_by' => $uploadedBy,
            ], $id > 0 ? $id : null);
            $message = $id > 0 ? 'Gallery item updated.' : 'Gallery item added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Gallery Management';
$activePage = 'gallery';
$totalItems = get_gallery_total_count(false);
$totalPages = max(1, (int) ceil($totalItems / $perPage));
$currentPage = min($currentPage, $totalPages);
$offset = ($currentPage - 1) * $perPage;
$items = get_gallery_items_paginated($offset, $perPage, false);

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
    <h2><?php echo $editing ? 'Edit Gallery Item' : 'Add Gallery Item'; ?></h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
        <input type="hidden" name="action" value="save">
        <div><label>Title</label><input class="form-control" name="title"
                value="<?php echo htmlspecialchars((string) ($editing['title'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                required></div>
        <div><label>Image Path (optional - provide a URL or upload a file)</label><input class="form-control"
                name="image_path"
                value="<?php echo htmlspecialchars((string) ($editing['image_path'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>Upload Image from Local System (max 1MB, .jpg/.png/.webp only)</label><input class="form-control"
                type="file" name="image_file" accept=".jpg,.jpeg,.png,.webp"></div>
        <div class="admin-checkbox-wrap"><label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label></div>
        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save Gallery Item</button>
            <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn"
                    href="gallery.php">Cancel</a><?php endif; ?>
        </div>
    </form>
</section>
<section class="admin-card">
    <h2>Gallery Items</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Uploaded By</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td>
                            <?php
                            $thumbnailPath = (string) ($item['image_path'] ?? '');
                            $thumbnailSrc = preg_match('/^https?:\/\//i', $thumbnailPath) ? $thumbnailPath : ('../' . ltrim($thumbnailPath, '/'));
                            ?>
                            <img class="admin-table-thumb"
                                src="<?php echo htmlspecialchars($thumbnailSrc, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        </td>
                        <td>
                            <div class="admin-table-main">
                                <?php echo htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <div class="admin-table-sub">
                                <?php echo htmlspecialchars((string) $item['image_path'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </td>
                        <td>-</td>
                        <td><span class="admin-badge-soft">Gallery</span></td>
                        <td>
                            <span
                                class="admin-badge-status <?php echo (int) $item['is_active'] === 1 ? 'active' : 'inactive'; ?>">
                                <?php echo (int) $item['is_active'] === 1 ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars((string) ($item['uploaded_by'] ?? 'admin'), ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td><?php echo htmlspecialchars(date('M d, Y', strtotime((string) ($item['created_at'] ?? 'now'))), ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="admin-gallery-actions">
                            <a class="btn btn-sm btn-outline-primary"
                                href="gallery.php?edit=<?php echo (int) $item['id']; ?>&page=<?php echo (int) $currentPage; ?>">Edit</a>
                            <form method="post" class="inline-form" onsubmit="return confirm('Delete this gallery item?');">
                                <input type="hidden" name="csrf_token"
                                    value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($items) === 0): ?>
                    <tr>
                        <td colspan="8">No gallery items found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        <span class="admin-pagination-info">Page <?php echo (int) $currentPage; ?> of
            <?php echo (int) $totalPages; ?></span>
        <?php if ($currentPage > 1): ?>
            <a class="btn btn-sm btn-outline-secondary"
                href="gallery.php?page=<?php echo (int) ($currentPage - 1); ?>">Back</a>
        <?php endif; ?>
        <?php if ($currentPage < $totalPages): ?>
            <a class="btn btn-sm btn-outline-secondary"
                href="gallery.php?page=<?php echo (int) ($currentPage + 1); ?>">Next</a>
        <?php endif; ?>
    </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>