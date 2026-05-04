<?php

function admin_layout_top(string $pageTitle = 'Admin Panel', string $activePage = ''): void
{
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                <img src="../images/logo/logo-footer-new2.webp" alt="BM Properties" class="admin-sidebar-logo">
                <span class="admin-sidebar-title">BM Properties</span>
            </div>
          <nav class="admin-menu">

    <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="index.php">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <h6 class="admin-menu-title">CONTENT MANAGEMENT</h6>

    <!-- <a class="<?php echo $activePage === 'categories' ? 'active' : ''; ?>"
        href="categories.php">
        <i class="fa-solid fa-layer-group"></i> Categories
    </a> -->

    <a class="<?php echo $activePage === 'properties' ? 'active' : ''; ?>"
        href="properties.php">
        <i class="fa-solid fa-building"></i> Properties
    </a>

    <a class="<?php echo $activePage === 'top-properties' ? 'active' : ''; ?>"
        href="top-properties.php">
        <i class="fa-solid fa-star"></i> Top Properties
    </a>

    <a class="<?php echo $activePage === 'hero-section' ? 'active' : ''; ?>"
        href="hero-section.php">
        <i class="fa-solid fa-image"></i> Hero Section
    </a>

    <a class="<?php echo $activePage === 'gallery' ? 'active' : ''; ?>"
        href="gallery.php">
        <i class="fa-solid fa-images"></i> Gallery
    </a>

    <!--
    <a class="<?php echo $activePage === 'cities' ? 'active' : ''; ?>" href="cities.php">
        <i class="fa-solid fa-city"></i> Explore Cities
    </a>

    <a class="<?php echo $activePage === 'partners' ? 'active' : ''; ?>"
        href="partners.php">
        <i class="fa-solid fa-handshake"></i> Trusted Companies
    </a>
    -->

    <a class="<?php echo $activePage === 'testimonials' ? 'active' : ''; ?>"
        href="testimonials.php">
        <i class="fa-solid fa-comments"></i> Testimonials
    </a>

    <a class="<?php echo $activePage === 'messages' ? 'active' : ''; ?>"
        href="messages.php">
        <i class="fa-solid fa-message"></i> Messages
    </a>

    <a class="<?php echo $activePage === 'enquiries' ? 'active' : ''; ?>"
        href="enquiries.php">
        <i class="fa-solid fa-envelope"></i> Enquiries
    </a>

    <h6 class="admin-menu-title">SYSTEM</h6>

    <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>"
        href="profile.php">
        <i class="fa-solid fa-user"></i> My Profile
    </a>

</nav>
            <div class="admin-sidebar-footer">
                <a class="btn btn-outline-danger admin-btn admin-logout-btn" href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
                <div class="admin-sidebar-copyright">
                    <div>&copy; 2026 All Rights Reserved</div>
                    <div>Designed by <a href="https://digiconnunite.com/" target="_blank"><strong>Digiconn Unite Pvt Ltd</strong></a></div>
                </div>
            </div>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <!-- <div class="admin-header-left">
                    <i class="fa-solid fa-shield-halved admin-header-icon"></i>
                    <h1>Admin</h1>
                </div> -->
                <div class="admin-header-actions">
                    <a class="admin-profile-icon <?php echo $activePage === 'profile' ? 'active' : ''; ?>"
                        href="profile.php" aria-label="Profile">
                        <?php echo strtoupper(substr((string) (admin_user()['username'] ?? 'A'), 0, 1)); ?>
                    </a>
                </div>
            </header>
    <?php
}

function admin_layout_bottom(): void
{
    ?>
            </div>
        </main>
    </div>
</body>

</html>
    <?php
}
