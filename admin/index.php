<?php

require_once __DIR__ . '/_bootstrap.php';

function dashboard_format_date(?string $value): string
{
    $value = trim((string) $value);
    if ($value === '') {
        return '';
    }

    $timestamp = strtotime($value);
    if ($timestamp === false) {
        return $value;
    }

    return date('d M Y', $timestamp);
}

$pageTitle = 'Dashboard';
$activePage = 'dashboard';
$propertyCount = get_admin_properties_total_count();
$galleryCount = get_gallery_count();
$messageCount = get_message_count();
$enquiryCount = get_enquiry_count();
$testimonialCount = get_testimonial_count();
$recentProperties = get_admin_properties_paginated(0, 5);
$recentGalleryImages = get_gallery_items_paginated(0, 5, false);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<div class="main-content dashboard-page-layout">
    <section class="properties-stats-grid dashboard-stats-grid">
        <article class="admin-card properties-stat-card">
            <div class="properties-stat-top">
                <div class="properties-stat-copy">
                    <span class="properties-stat-label">Listed Properties</span>
                    <strong class="properties-stat-value"><?php echo (int) $propertyCount; ?></strong>
                    <span class="properties-stat-note">All records in the database</span>
                </div>
                <div class="properties-stat-icon">
                    <i class="fa-solid fa-building"></i>
                </div>
            </div>
        </article>
        <article class="admin-card properties-stat-card">
            <div class="properties-stat-top">
                <div class="properties-stat-copy">
                    <span class="properties-stat-label">Gallery Images</span>
                    <strong class="properties-stat-value"><?php echo (int) $galleryCount; ?></strong>
                    <span class="properties-stat-note">Total gallery uploads</span>
                </div>
                <div class="properties-stat-icon">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
        </article>
        <article class="admin-card properties-stat-card">
            <div class="properties-stat-top">
                <div class="properties-stat-copy">
                    <span class="properties-stat-label">Contact Messages</span>
                    <strong class="properties-stat-value"><?php echo (int) $messageCount; ?></strong>
                    <span class="properties-stat-note">Messages sent through the site</span>
                </div>
                <div class="properties-stat-icon">
                    <i class="fa-solid fa-message"></i>
                </div>
            </div>
        </article>
        <article class="admin-card properties-stat-card">
            <div class="properties-stat-top">
                <div class="properties-stat-copy">
                    <span class="properties-stat-label">Total Enquiries</span>
                    <strong class="properties-stat-value"><?php echo (int) $enquiryCount; ?></strong>
                    <span class="properties-stat-note">Lead inquiries from visitors</span>
                </div>
                <div class="properties-stat-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
        </article>
        <article class="admin-card properties-stat-card">
            <div class="properties-stat-top">
                <div class="properties-stat-copy">
                    <span class="properties-stat-label">Testimonials</span>
                    <strong class="properties-stat-value"><?php echo (int) $testimonialCount; ?></strong>
                    <span class="properties-stat-note">Approved testimonials live on site</span>
                </div>
                <div class="properties-stat-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>
            </div>
        </article>
    </section>

    <section class="admin-card main-content dashboard-actions-card">
        <h2>Quick Actions</h2>
        <div class="admin-quick-actions">
            <a class="btn btn-primary admin-btn" href="property-form.php">Add Property</a>
            <!-- <a class="btn btn-outline-primary admin-btn" href="top-properties.php">Manage Top Properties</a> -->
            <a class="btn btn-outline-primary admin-btn" href="gallery.php">Manage Gallery</a>
            <a class="btn btn-outline-primary admin-btn" href="messages.php">View Messages</a>
            <a class="btn btn-outline-primary admin-btn" href="enquiries.php">View Enquiries</a>
            <a class="btn btn-outline-primary admin-btn" href="testimonials.php">Manage Testimonials</a>
            <a class="btn btn-outline-primary admin-btn" href="profile.php">Manage Profile</a>
        </div>
    </section>

    <section class="dashboard-recent-grid">
        <article class="admin-card dashboard-recent-card">
            <div class="admin-card-head dashboard-recent-head">
                <div>
                    <h2>Recently Added Gallery Images</h2>
                    <p>Top 5 latest gallery images added in the dashboard.</p>
                </div>
                <a href="gallery.php">View all</a>
            </div>
            <div class="dashboard-recent-list">
                <?php foreach ($recentGalleryImages as $galleryItem): ?>
                    <?php
                    $galleryImage = resolve_asset_path((string) ($galleryItem['image_path'] ?? ''), '..');
                    if ($galleryImage === '') {
                        $galleryImage = resolve_asset_path('images/banner/banner-property-1.webp', '..');
                    }
                    $galleryTitle = trim((string) ($galleryItem['title'] ?? 'Gallery Image'));
                    if ($galleryTitle === '') {
                        $galleryTitle = 'Gallery Image';
                    }
                    $galleryStatus = ((int) ($galleryItem['is_active'] ?? 0) === 1) ? 'active' : 'inactive';
                    ?>
                    <div class="dashboard-recent-item">
                        <div class="dashboard-recent-thumb">
                            <img src="<?php echo htmlspecialchars($galleryImage, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($galleryTitle, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="dashboard-recent-copy">
                            <strong><?php echo htmlspecialchars($galleryTitle, ENT_QUOTES, 'UTF-8'); ?></strong>
                            <span>Gallery upload</span>
                            <!-- <small><?php echo htmlspecialchars((string) ($galleryItem['uploaded_by'] ?? 'admin'), ENT_QUOTES, 'UTF-8'); ?></small> -->
                        </div>
                        <div class="dashboard-recent-side">
                            <span class="dashboard-recent-badge <?php echo $galleryStatus === 'active' ? 'dashboard-recent-badge-active' : 'dashboard-recent-badge-inactive'; ?>"><?php echo htmlspecialchars(ucfirst($galleryStatus), ENT_QUOTES, 'UTF-8'); ?></span>
                            <small><?php echo htmlspecialchars(dashboard_format_date((string) ($galleryItem['created_at'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <article class="admin-card dashboard-recent-card">
            <div class="admin-card-head dashboard-recent-head">
                <div>
                    <h2>Recently Added Properties</h2>
                    <p>Top 5 latest properties added in the dashboard.</p>
                </div>
                <a href="properties.php">View all</a>
            </div>
            <div class="dashboard-recent-list">
                <?php foreach ($recentProperties as $property): ?>
                    <?php
                    $heroImage = resolve_asset_path((string) ($property['heroImage'] ?? ''), '..');
                    if ($heroImage === '') {
                        $heroImage = resolve_asset_path('images/banner/banner-property-1.webp', '..');
                    }
                    $propertyStatus = strtolower((string) ($property['status'] ?? 'active'));
                    $propertyAddress = trim((string) ($property['map']['address'] ?? ''));
                    if ($propertyAddress === '' || $propertyAddress === 'Address not specified') {
                        $propertyAddress = trim((string) ($property['location'] ?? ''));
                    }
                    ?>
                    <div class="dashboard-recent-item">
                        <div class="dashboard-recent-thumb">
                            <img src="<?php echo htmlspecialchars($heroImage, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) ($property['name'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="dashboard-recent-copy">
                            <strong><?php echo htmlspecialchars((string) ($property['name'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?></strong>
                            <span><?php echo htmlspecialchars($propertyAddress !== '' ? $propertyAddress : (string) ($property['category'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></span>
                            <small><?php echo htmlspecialchars((string) ($property['category'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?></small>
                        </div>
                        <div class="dashboard-recent-side">
                            <span class="dashboard-recent-badge <?php echo $propertyStatus === 'active' ? 'dashboard-recent-badge-active' : 'dashboard-recent-badge-inactive'; ?>"><?php echo htmlspecialchars(ucfirst($propertyStatus), ENT_QUOTES, 'UTF-8'); ?></span>
                            <small><?php echo htmlspecialchars(dashboard_format_date((string) ($property['created_at'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </section>
</div>
<?php admin_layout_bottom(); ?>
