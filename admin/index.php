<?php

require_once __DIR__ . '/_bootstrap.php';

$pageTitle = 'Dashboard';
$activePage = 'dashboard';
$propertyCount = get_property_count();
$galleryCount = get_gallery_count();
$messageCount = get_message_count();
$enquiryCount = get_enquiry_count();
$testimonialCount = get_testimonial_count();
$topPropertyCount = get_top_property_count();

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
        <h2>Top Properties</h2>
        <p class="admin-stat"><?php echo (int) $topPropertyCount; ?></p>
    </article>
    <article class="admin-card">
        <h2>Contact Messages</h2>
        <p class="admin-stat"><?php echo (int) $messageCount; ?></p>
    </article>
    <article class="admin-card">
        <h2>Total Enquiries</h2>
        <p class="admin-stat"><?php echo (int) $enquiryCount; ?></p>
    </article>
    <article class="admin-card">
        <h2>Testimonials</h2>
        <p class="admin-stat"><?php echo (int) $testimonialCount; ?></p>
    </article>
</section>

<section class="admin-card">
    <h2>Quick Actions</h2>
    <div class="admin-quick-actions">
        <a class="btn btn-primary admin-btn" href="property-form.php">Add Property</a>
        <a class="btn btn-outline-primary admin-btn" href="top-properties.php">Manage Top Properties</a>
        <a class="btn btn-outline-primary admin-btn" href="gallery.php">Manage Gallery</a>
        <a class="btn btn-outline-primary admin-btn" href="messages.php">View Messages</a>
        <a class="btn btn-outline-primary admin-btn" href="enquiries.php">View Enquiries</a>
        <a class="btn btn-outline-primary admin-btn" href="testimonials.php">Manage Testimonials</a>
        <a class="btn btn-outline-primary admin-btn" href="profile.php">Manage Profile</a>
    </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>
