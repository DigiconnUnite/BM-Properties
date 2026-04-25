<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    foreach (get_gallery_items(false) as $item) {
        if ((int) $item['id'] === $editId) {
            $editing = $item;
            break;
        }
    }
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
        $sortOrder = (int) ($_POST['sort_order'] ?? 0);
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        $uploadRoot = realpath(__DIR__ . '/..');
        if (is_string($uploadRoot) && $uploadRoot !== '') {
            $galleryUploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'gallery';
            $uploadedImage = upload_image_file($_FILES['image_file'] ?? [], $galleryUploadDir, 'uploads/gallery');
            if ($uploadedImage !== null) {
                $imagePath = $uploadedImage;
            }
        }

        if ($title === '' || $imagePath === '') {
            $error = 'Title and image path are required.';
        } else {
            save_gallery_item([
                'title' => $title,
                'image_path' => $imagePath,
                'sort_order' => $sortOrder,
                'is_active' => $isActive,
            ], $id > 0 ? $id : null);
            $message = $id > 0 ? 'Gallery item updated.' : 'Gallery item added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Gallery Management';
$activePage = 'gallery';
$items = get_gallery_items(false);

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
        <div><label>Image Path</label><input class="form-control" name="image_path"
                value="<?php echo htmlspecialchars((string) ($editing['image_path'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                required></div>
        <div><label>Upload Image (max 1MB, .jpg/.png/.webp only)</label><input class="form-control" type="file"
                name="image_file" accept=".jpg,.jpeg,.png,.webp"></div>
        <div><label>Sort Order</label><input class="form-control" type="number" name="sort_order"
                value="<?php echo (int) ($editing['sort_order'] ?? 0); ?>"></div>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['image_path'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo (int) $item['sort_order']; ?></td>
                        <td><?php echo (int) $item['is_active'] === 1 ? 'Active' : 'Inactive'; ?></td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary"
                                href="modules/gallery/edit.php?id=<?php echo (int) $item['id']; ?>">Edit</a>
                            <form method="post" class="inline-form" action="modules/gallery/delete.php"
                                onsubmit="return confirm('Delete this gallery item?');">
                                <input type="hidden" name="csrf_token"
                                    value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>