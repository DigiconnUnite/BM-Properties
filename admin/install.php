<?php

require_once __DIR__ . '/../includes/security.php';
init_secure_session();

$config = require __DIR__ . '/../config/database.php';
$localConfigPath = __DIR__ . '/../config/database.local.php';
if (is_file($localConfigPath)) {
    $localConfig = require $localConfigPath;
    if (is_array($localConfig)) {
        $config = array_merge($config, $localConfig);
    }
}

$setupKey = getenv('APP_SETUP_KEY') ?: 'bm-setup-2026';
$providedKey = isset($_GET['key']) ? (string) $_GET['key'] : '';
$authorized = hash_equals($setupKey, $providedKey);

$status = '';
$error = '';

$dbHost = (string) ($config['host'] ?? '127.0.0.1');
$dbPort = (int) ($config['port'] ?? 3306);
$dbName = (string) ($config['database'] ?? 'bm_properties');
$dbUser = (string) ($config['username'] ?? 'root');
$dbPass = (string) ($config['password'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $authorized) {
    require_csrf_post();

    $dbHost = trim((string) ($_POST['db_host'] ?? $dbHost));
    $dbPort = (int) ($_POST['db_port'] ?? $dbPort);
    $dbName = trim((string) ($_POST['db_name'] ?? $dbName));
    $dbUser = trim((string) ($_POST['db_user'] ?? $dbUser));
    $dbPass = (string) ($_POST['db_pass'] ?? $dbPass);

    $adminUsername = trim((string) ($_POST['admin_username'] ?? 'admin'));
    $adminPassword = (string) ($_POST['admin_password'] ?? '');

    if ($dbHost === '' || $dbUser === '' || $dbName === '' || $dbPort <= 0) {
        $error = 'Please provide valid database host, port, name, and username.';
    } elseif ($adminUsername === '' || strlen($adminUsername) < 4) {
        $error = 'Admin username must be at least 4 characters.';
    } elseif (strlen($adminPassword) < 8) {
        $error = 'Admin password must be at least 8 characters.';
    } else {
        mysqli_report(MYSQLI_REPORT_OFF);
        $server = @new mysqli($dbHost, $dbUser, $dbPass, '', $dbPort);

        if ($server->connect_error) {
            $error = 'Database server connection failed: ' . $server->connect_error;
        } else {
            $dbName = preg_replace('/[^a-zA-Z0-9_]/', '', $dbName) ?: 'bm_properties';
            $charset = $config['charset'];
            $server->query("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET {$charset} COLLATE {$charset}_general_ci");
            $server->select_db($dbName);
            $server->set_charset($charset);

            $schemaSql = file_get_contents(__DIR__ . '/../database/bm_properties.sql');
            if ($schemaSql === false) {
                $error = 'Unable to read SQL schema file.';
            } else {
                if (!$server->multi_query($schemaSql)) {
                    $error = 'Schema import failed: ' . $server->error;
                } else {
                    while ($server->more_results() && $server->next_result()) {
                        // Flush multi-query results.
                    }

                    $categories = [
                        ['Plot', 'plot', 1],
                        ['Farmhouse', 'farmhouse', 2],
                        ['Office', 'office', 3],
                    ];
                    $catStmt = $server->prepare('INSERT INTO categories (name, slug, sort_order, is_active) VALUES (?, ?, ?, 1) ON DUPLICATE KEY UPDATE name = VALUES(name), sort_order = VALUES(sort_order), is_active = 1');
                    foreach ($categories as $category) {
                        $catStmt->bind_param('ssi', $category[0], $category[1], $category[2]);
                        $catStmt->execute();
                    }

                    $settingsStmt = $server->prepare('INSERT INTO site_settings (id, office_address, phone, email, open_time, facebook_url, instagram_url, youtube_url, page_title_bg) VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE office_address=VALUES(office_address), phone=VALUES(phone), email=VALUES(email), open_time=VALUES(open_time), facebook_url=VALUES(facebook_url), instagram_url=VALUES(instagram_url), youtube_url=VALUES(youtube_url), page_title_bg=VALUES(page_title_bg)');
                    $officeAddress = 'Block No-25, Sanjay Place, Agra - 282002';
                    $phone = '+91 98370 29310';
                    $email = 'bmrealestateagra@gmail.com';
                    $openTime = 'Monday - Friday: 08:00 - 20:00 | Saturday - Sunday: 10:00 - 18:00';
                    $facebookUrl = '#';
                    $instagramUrl = '#';
                    $youtubeUrl = '#';
                    $pageTitleBg = 'images/banner/banner2.jpg';
                    $settingsStmt->bind_param('ssssssss', $officeAddress, $phone, $email, $openTime, $facebookUrl, $instagramUrl, $youtubeUrl, $pageTitleBg);
                    $settingsStmt->execute();

                    $passwordHash = password_hash($adminPassword, PASSWORD_DEFAULT);
                    $adminStmt = $server->prepare('INSERT INTO admin_users (username, password_hash, is_active) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash), is_active = 1');
                    $adminStmt->bind_param('ss', $adminUsername, $passwordHash);
                    $adminStmt->execute();

                    $properties = include __DIR__ . '/../components/properties-data.php';
                    $catMap = [];
                    $catRows = $server->query('SELECT id, slug FROM categories');
                    while ($row = $catRows->fetch_assoc()) {
                        $catMap[$row['slug']] = (int) $row['id'];
                    }

                    $propStmt = $server->prepare('INSERT INTO properties (
                        category_id, name, slug, page_title, hero_image, gallery_images_json, summary,
                        description_json, location, price, price_suffix, beds, baths, sqft, overview_id,
                        nearby, nearby_items_json, details_json, features_json,
                        map_address, map_city, map_state, map_postal, map_area, map_country,
                        map_embed, website_url, website_label, card_highlights_json, is_featured, status
                    ) VALUES (
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, "active"
                    ) ON DUPLICATE KEY UPDATE
                        category_id=VALUES(category_id), name=VALUES(name), page_title=VALUES(page_title), hero_image=VALUES(hero_image),
                        gallery_images_json=VALUES(gallery_images_json), summary=VALUES(summary), description_json=VALUES(description_json),
                        location=VALUES(location), price=VALUES(price), price_suffix=VALUES(price_suffix), beds=VALUES(beds), baths=VALUES(baths), sqft=VALUES(sqft),
                        overview_id=VALUES(overview_id), nearby=VALUES(nearby), nearby_items_json=VALUES(nearby_items_json),
                        details_json=VALUES(details_json), features_json=VALUES(features_json), map_address=VALUES(map_address), map_city=VALUES(map_city),
                        map_state=VALUES(map_state), map_postal=VALUES(map_postal), map_area=VALUES(map_area), map_country=VALUES(map_country),
                        map_embed=VALUES(map_embed), website_url=VALUES(website_url), website_label=VALUES(website_label), card_highlights_json=VALUES(card_highlights_json),
                        status="active"');

                    foreach ($properties as $property) {
                        $categoryName = strtolower((string) ($property['category'] ?? 'plot'));
                        $categorySlug = str_contains($categoryName, 'office') ? 'office' : (str_contains($categoryName, 'farm') ? 'farmhouse' : 'plot');
                        $categoryId = $catMap[$categorySlug] ?? 1;
                        $name = (string) ($property['name'] ?? '');
                        $slug = (string) ($property['slug'] ?? normalize_slug($name));
                        $pageTitle = (string) ($property['pageTitle'] ?? ($name . ' - BM Real Estate'));
                        $heroImage = (string) ($property['heroImage'] ?? 'images/banner/banner-property-1.jpg');
                        $galleryJson = to_json($property['galleryImages'] ?? []);
                        $summary = (string) ($property['summary'] ?? '');
                        $descriptionJson = to_json($property['description'] ?? []);
                        $location = (string) ($property['location'] ?? '');
                        $price = (string) ($property['price'] ?? 'On request');
                        $priceSuffix = (string) ($property['priceSuffix'] ?? '');
                        $beds = (string) ($property['beds'] ?? '');
                        $baths = (string) ($property['baths'] ?? '');
                        $sqft = (string) ($property['sqft'] ?? '');
                        $overviewId = (string) ($property['overviewId'] ?? '');
                        $nearby = (string) ($property['nearby'] ?? '');
                        $nearbyItemsJson = to_json($property['nearbyItems'] ?? []);
                        $detailsJson = to_json($property['details'] ?? []);
                        $featuresJson = to_json($property['features'] ?? []);
                        $map = is_array($property['map'] ?? null) ? $property['map'] : [];
                        $mapAddress = (string) ($map['address'] ?? '');
                        $mapCity = (string) ($map['city'] ?? '');
                        $mapState = (string) ($map['state'] ?? '');
                        $mapPostal = (string) ($map['postal'] ?? '');
                        $mapArea = (string) ($map['area'] ?? '');
                        $mapCountry = (string) ($map['country'] ?? 'India');
                        $mapEmbed = (string) ($property['mapEmbed'] ?? '');
                        $websiteUrl = (string) ($property['websiteUrl'] ?? '');
                        $websiteLabel = (string) ($property['websiteLabel'] ?? 'Click here for more details');
                        $cardHighlightsJson = to_json($property['cardHighlights'] ?? []);

                        $propStmt->bind_param(
                            'issssssssssssssssssssssssssss',
                            $categoryId,
                            $name,
                            $slug,
                            $pageTitle,
                            $heroImage,
                            $galleryJson,
                            $summary,
                            $descriptionJson,
                            $location,
                            $price,
                            $priceSuffix,
                            $beds,
                            $baths,
                            $sqft,
                            $overviewId,
                            $nearby,
                            $nearbyItemsJson,
                            $detailsJson,
                            $featuresJson,
                            $mapAddress,
                            $mapCity,
                            $mapState,
                            $mapPostal,
                            $mapArea,
                            $mapCountry,
                            $mapEmbed,
                            $websiteUrl,
                            $websiteLabel,
                            $cardHighlightsJson
                        );
                        $propStmt->execute();
                    }

                    $galleryStmt = $server->prepare('INSERT INTO gallery_items (title, image_path, sort_order, is_active) VALUES (?, ?, ?, 1)');
                    $galleryDefaults = [
                        ['Dream Avenues', 'images/gallery/dream-avenues.jpg', 1],
                        ['Landmark City', 'images/gallery/landmark-city.jpg', 2],
                        ['The Grand Valley', 'images/gallery/the-grand-valley.jpg', 3],
                        ['UPSIC', 'images/gallery/upsic.jpg', 4],
                        ['Vrindavan Global', 'images/gallery/vrindavan-global.jpg', 5],
                        ['Corporate Park', 'images/gallery/corporate-park.png', 6],
                    ];
                    foreach ($galleryDefaults as $item) {
                        $galleryStmt->bind_param('ssi', $item[0], $item[1], $item[2]);
                        $galleryStmt->execute();
                    }

                    $localConfigPhp = "<?php\n\nreturn " . var_export([
                        'host' => $dbHost,
                        'port' => $dbPort,
                        'database' => $dbName,
                        'username' => $dbUser,
                        'password' => $dbPass,
                        'charset' => $charset,
                    ], true) . ";\n";
                    file_put_contents($localConfigPath, $localConfigPhp);

                    $status = 'Database imported successfully. You can now login to the admin panel.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Install BM Properties Database</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-body admin-auth-body">
    <div class="admin-auth-card setup-card">
        <h1>Database Installer</h1>
        <?php if (!$authorized): ?>
            <div class="alert alert-danger">Unauthorized setup request. Use a valid setup key in URL.</div>
        <?php endif; ?>
        <?php if ($error !== ''): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <?php if ($status !== ''): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></div>
            <a class="btn btn-primary admin-btn" href="login.php">Go to Login</a>
        <?php endif; ?>

        <?php if ($status === '' && $authorized): ?>
            <p>This will create tables, seed categories/properties/gallery data, and create the admin account.</p>
            <form method="post" action="">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="db_host" class="form-label">DB Host</label>
                        <input type="text" class="form-control" id="db_host" name="db_host" value="<?php echo htmlspecialchars($dbHost, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="db_port" class="form-label">DB Port</label>
                        <input type="number" class="form-control" id="db_port" name="db_port" value="<?php echo (int) $dbPort; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="db_name" class="form-label">DB Name</label>
                        <input type="text" class="form-control" id="db_name" name="db_name" value="<?php echo htmlspecialchars($dbName, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="db_user" class="form-label">DB Username</label>
                        <input type="text" class="form-control" id="db_user" name="db_user" value="<?php echo htmlspecialchars($dbUser, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="db_pass" class="form-label">DB Password</label>
                    <input type="password" class="form-control" id="db_pass" name="db_pass" value="<?php echo htmlspecialchars($dbPass, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="mb-3">
                    <label for="admin_username" class="form-label">Admin Username</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username" value="admin" required>
                </div>
                <div class="mb-3">
                    <label for="admin_password" class="form-label">Admin Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                </div>
                <button type="submit" class="btn btn-primary admin-btn">Import Database</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
