<?php

require_once __DIR__ . '/_bootstrap.php';

$pageTitle = 'Dashboard';
$activePage = 'dashboard';
$propertyCount = get_property_count();
$galleryCount = get_gallery_count();
$messageCount = get_message_count();

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-grid-cards">
    <article class="admin-card">
        <h2>Total Properties</h2>
        <p class="admin-stat"><?php echo (int) $propertyCount; ?></p>
    </article>
    <article class="admin-card">
        <h2>Gallery Images</h2>
        <p class="admin-stat"><?php echo (int) $galleryCount; ?></p>
    </article>
    <article class="admin-card">
        <h2>Contact Messages</h2>
        <p class="admin-stat"><?php echo (int) $messageCount; ?></p>
    </article>
</section>

<section class="admin-card">
    <h2>Quick Actions</h2>
    <div class="admin-quick-actions">
        <a class="btn btn-primary admin-btn" href="property-form.php">Add Property</a>
        <a class="btn btn-outline-primary admin-btn" href="gallery.php">Manage Gallery</a>
        <a class="btn btn-outline-primary admin-btn" href="messages.php">View Messages</a>
    </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>
