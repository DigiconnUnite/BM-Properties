<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (string) ($_POST['action'] ?? '') === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
        delete_property($id);
    }
    header('Location: properties.php');
    exit;
}

$pageTitle = 'Properties';
$activePage = 'properties';
$properties = get_admin_properties();

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
    <div class="admin-card-head">
        <h2>All Properties</h2>
        <a class="btn btn-primary admin-btn" href="modules/properties/create.php">Add New Property</a>
    </div>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($property['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($property['category'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($property['slug'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php $propertyStatus = strtolower((string) ($property['status'] ?? 'active')); ?>
                            <span class="admin-badge-status <?php echo $propertyStatus === 'active' ? 'active' : 'inactive'; ?>">
                                <?php echo htmlspecialchars(ucfirst($propertyStatus), ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary"
                                href="modules/properties/edit.php?id=<?php echo (int) $property['id']; ?>">Edit</a>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="../property-details.php?slug=<?php echo rawurlencode($property['slug']); ?>"
                                target="_blank" rel="noopener noreferrer">View</a>
                            <form method="post" class="inline-form" action="modules/properties/delete.php"
                                onsubmit="return confirm('Delete this property?');">
                                <input type="hidden" name="csrf_token"
                                    value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) $property['id']; ?>">
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
