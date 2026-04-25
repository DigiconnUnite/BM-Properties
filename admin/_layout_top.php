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
                <img src="../images/logo/logo-new.png" alt="BM Properties" width="28" height="28"
                    style="object-fit:contain;">
                <span>BM Admin</span>
            </a>
            <nav class="admin-menu">
                <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="index.php">Dashboard</a>
                <a class="<?php echo $activePage === 'content' ? 'active' : ''; ?>" href="content.php">Content
                    Modules</a>
                <a class="<?php echo $activePage === 'categories' ? 'active' : ''; ?>"
                    href="categories.php">Categories</a>
                <a class="<?php echo $activePage === 'properties' ? 'active' : ''; ?>"
                    href="properties.php">Properties</a>
                <a class="<?php echo $activePage === 'gallery' ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
                <a class="<?php echo $activePage === 'contact-settings' ? 'active' : ''; ?>"
                    href="contact-settings.php">Contact Settings</a>
                <a class="<?php echo $activePage === 'messages' ? 'active' : ''; ?>" href="messages.php">Messages</a>
                <a class="<?php echo $activePage === 'enquiries' ? 'active' : ''; ?>" href="enquiries.php">Enquiries</a>
                <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>" href="profile.php">Profile</a>
                <a href="../index.php" target="_blank" rel="noopener noreferrer">View Website</a>
                <a href="logout.php">Logout</a>
            </nav>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <h1><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="admin-user">Signed in as
                    <?php echo htmlspecialchars((string) ((admin_user()['full_name'] ?? '') !== '' ? admin_user()['full_name'] : (admin_user()['username'] ?? '')), ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </header>