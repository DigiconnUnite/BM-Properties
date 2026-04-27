<?php
$pageTitle = $pageTitle ?? 'Admin Panel';
$activePage = $activePage ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="../fonts/fonts.css">
    <link rel="stylesheet" href="../fonts/font-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand d-flex align-items-center gap-2" href="index.php">
                <!-- <img class="admin-brand-logo" src="../images/logo/logo-new.png" alt="BM Properties" width="32"
                    height="32"> -->
                <span>BM Properties</span>
            </a>
            <nav class="admin-menu">
                <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="index.php">Dashboard</a>
                <h6 class="admin-menu-title">CONTENT MANAGEMENT</h6>
                <a class="<?php echo $activePage === 'categories' ? 'active' : ''; ?>"
                    href="categories.php">Categories</a>
                <a class="<?php echo $activePage === 'properties' ? 'active' : ''; ?>"
                    href="properties.php">Properties</a>
                <a class="<?php echo $activePage === 'gallery' ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
                <a class="<?php echo $activePage === 'cities' ? 'active' : ''; ?>" href="cities.php">Explore Cities</a>
                <a class="<?php echo $activePage === 'testimonials' ? 'active' : ''; ?>"
                    href="testimonials.php">Testimonials</a>
                <a class="<?php echo $activePage === 'messages' ? 'active' : ''; ?>" href="messages.php">Messages</a>
                <a class="<?php echo $activePage === 'enquiries' ? 'active' : ''; ?>" href="enquiries.php">Enquiries</a>
                <h6 class="admin-menu-title">SYSTEM</h6>
                <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>" href="profile.php">My Profile</a>
            </nav>
            <div class="admin-sidebar-footer">
                <div>&copy; 2026 All Rights Reserved</div>
                <div>Designed by <a href="https://digiconnunite.com/" target="_blank"><strong>Digiconn Unite Pvt Ltd</strong></a></div>
            </div>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <h1><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="admin-header-actions">
                    <a class="admin-profile-icon <?php echo $activePage === 'profile' ? 'active' : ''; ?>"
                        href="profile.php" aria-label="Profile">
                        <?php echo strtoupper(substr((string) (admin_user()['username'] ?? 'A'), 0, 1)); ?>
                    </a>
                    <div class="admin-user">Signed in as
                        <?php echo htmlspecialchars((string) ((admin_user()['full_name'] ?? '') !== '' ? admin_user()['full_name'] : (admin_user()['username'] ?? '')), ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <a class="btn btn-outline-primary admin-btn" href="logout.php">Logout</a>
                </div>
            </header>