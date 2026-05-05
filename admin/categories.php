<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;

if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    foreach (get_categories(false) as $category) {
        if ((int) $category['id'] === $editId) {
            $editing = $category;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? 'save');

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            delete_category($id);
            $message = 'Category deleted.';
        }
    } else {
        $id = (int) ($_POST['id'] ?? 0);
        $name = clean_text((string) ($_POST['name'] ?? ''));
        $slugInput = clean_text((string) ($_POST['slug'] ?? ''));
        $slug = $slugInput !== '' ? normalize_slug($slugInput) : normalize_slug($name);
        $sortOrder = isset($editing['sort_order']) ? (int) $editing['sort_order'] : 0;
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        if ($name === '' || $slug === '') {
            $error = 'Name and slug are required.';
        } else {
            save_category([
                'name' => $name,
                'slug' => $slug,
                'sort_order' => $sortOrder,
                'is_active' => $isActive,
            ], $id > 0 ? $id : null);
            $message = $id > 0 ? 'Category updated.' : 'Category added.';
            $editing = null;
        }
    }
}

$pageTitle = 'Categories';
$activePage = 'categories';
$categories = get_categories(false);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<section class="admin-card">
    <h2><?php echo $editing ? 'Edit Category' : 'Add Category'; ?></h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <?php if ($error !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

    <form method="post" class="admin-form-grid">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
        <input type="hidden" name="action" value="save">
        <div>
            <label>Name</label>
            <input class="form-control" type="text" name="name"
                value="<?php echo htmlspecialchars((string) ($editing['name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                required>
        </div>
        <div>
            <label>Slug</label>
            <input class="form-control" type="text" name="slug"
                value="<?php echo htmlspecialchars((string) ($editing['slug'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="auto from name">
        </div>
        <div class="admin-checkbox-wrap">
            <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
        </div>
        <div class="admin-form-full">
            <button class="btn btn-primary admin-btn" type="submit">Save Category</button>
            <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn"
                    href="categories.php">Cancel</a><?php endif; ?>
        </div>
    </form>
</section>

<section class="admin-card">
    <h2>Category List</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($category['slug'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <span class="admin-badge-status <?php echo (int) $category['is_active'] === 1 ? 'active' : 'inactive'; ?>">
                                <?php echo (int) $category['is_active'] === 1 ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td>
                            <div class="property-action-group">
                                <a class="property-icon-btn property-edit-btn"
                                    href="categories.php?edit=<?php echo (int) $category['id']; ?>"
                                    aria-label="Edit category">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <form method="post" class="inline-form" onsubmit="return confirm('Delete this category?');">
                                    <input type="hidden" name="csrf_token"
                                        value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo (int) $category['id']; ?>">
                                    <button class="property-icon-btn property-delete-btn" type="submit" aria-label="Delete category">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php admin_layout_bottom(); ?>
