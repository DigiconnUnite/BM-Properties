<?php

function bind_params_dynamic(mysqli_stmt $stmt, string $types, array $values): void
{
    $refs = [];
    foreach ($values as $key => $value) {
        $refs[$key] = &$values[$key];
    }

    array_unshift($refs, $types);
    call_user_func_array([$stmt, 'bind_param'], $refs);
}

function get_categories(bool $onlyActive = true): array
{
    $conn = db();
    $where = $onlyActive ? 'WHERE is_active = 1' : '';
    $sql = "SELECT id, name, slug, sort_order, is_active FROM categories {$where} ORDER BY sort_order ASC, name ASC";
    $result = $conn->query($sql);

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function get_category_by_slug(string $slug): ?array
{
    $conn = db();
    $sql = 'SELECT id, name, slug FROM categories WHERE slug = ? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    return $row ?: null;
}

function map_property_row(array $row): array
{
    $galleryImages = json_decode_or_default($row['gallery_images_json'] ?? '[]');
    $description = json_decode_or_default($row['description_json'] ?? '[]');
    $nearbyItems = json_decode_or_default($row['nearby_items_json'] ?? '[]');
    $details = json_decode_or_default($row['details_json'] ?? '[]');
    $features = json_decode_or_default($row['features_json'] ?? '[]');
    $cardHighlights = json_decode_or_default($row['card_highlights_json'] ?? '[]');

    return [
        'id' => (int) ($row['id'] ?? 0),
        'category_id' => (int) ($row['category_id'] ?? 0),
        'name' => (string) ($row['name'] ?? ''),
        'slug' => (string) ($row['slug'] ?? ''),
        'pageTitle' => (string) ($row['page_title'] ?? ''),
        'category' => (string) ($row['category_name'] ?? ''),
        'detailPage' => 'property-details.php?slug=' . rawurlencode((string) ($row['slug'] ?? '')),
        'heroImage' => (string) ($row['hero_image'] ?? ''),
        'galleryImages' => $galleryImages,
        'summary' => (string) ($row['summary'] ?? ''),
        'description' => $description,
        'location' => (string) ($row['location'] ?? ''),
        'price' => (string) ($row['price'] ?? ''),
        'priceSuffix' => (string) ($row['price_suffix'] ?? ''),
        'beds' => (string) ($row['beds'] ?? ''),
        'baths' => (string) ($row['baths'] ?? ''),
        'sqft' => (string) ($row['sqft'] ?? ''),
        'overviewId' => (string) ($row['overview_id'] ?? ''),
        'nearby' => (string) ($row['nearby'] ?? ''),
        'nearbyItems' => $nearbyItems,
        'details' => $details,
        'features' => $features,
        'map' => [
            'address' => (string) ($row['map_address'] ?? ''),
            'city' => (string) ($row['map_city'] ?? ''),
            'state' => (string) ($row['map_state'] ?? ''),
            'postal' => (string) ($row['map_postal'] ?? ''),
            'area' => (string) ($row['map_area'] ?? ''),
            'country' => (string) ($row['map_country'] ?? ''),
        ],
        'mapEmbed' => (string) ($row['map_embed'] ?? ''),
        'websiteUrl' => (string) ($row['website_url'] ?? ''),
        'websiteLabel' => (string) ($row['website_label'] ?? ''),
        'cardHighlights' => $cardHighlights,
        'isFeatured' => (int) ($row['is_featured'] ?? 0) === 1,
        'status' => (string) ($row['status'] ?? 'active'),
        'category_slug' => (string) ($row['category_slug'] ?? ''),
    ];
}

function get_all_properties(?string $categorySlug = null): array
{
    $conn = db();

    $baseSql = "SELECT p.*, c.name AS category_name, c.slug AS category_slug
        FROM properties p
        LEFT JOIN categories c ON c.id = p.category_id
        WHERE p.status = 'active'";

    if ($categorySlug !== null && $categorySlug !== '') {
        $sql = $baseSql . ' AND c.slug = ? ORDER BY p.created_at DESC';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $categorySlug);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = $baseSql . ' ORDER BY p.created_at DESC';
        $result = $conn->query($sql);
    }

    $items = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $item = map_property_row($row);
            $items[$item['slug']] = $item;
        }
    }

    return $items;
}

function get_property_by_slug(string $slug): ?array
{
    $conn = db();
    $sql = "SELECT p.*, c.name AS category_name, c.slug AS category_slug
            FROM properties p
            LEFT JOIN categories c ON c.id = p.category_id
            WHERE p.slug = ? AND p.status = 'active'
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    return $row ? map_property_row($row) : null;
}

function get_property_by_id(int $id): ?array
{
    $conn = db();
    $sql = "SELECT p.*, c.name AS category_name, c.slug AS category_slug
            FROM properties p
            LEFT JOIN categories c ON c.id = p.category_id
            WHERE p.id = ?
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    return $row ? map_property_row($row) : null;
}

function save_property(array $data, ?int $id = null): int
{
    $conn = db();

    $sqlData = [
        'category_id' => (int) $data['category_id'],
        'name' => $data['name'],
        'slug' => $data['slug'],
        'page_title' => $data['page_title'],
        'hero_image' => $data['hero_image'],
        'gallery_images_json' => to_json($data['gallery_images']),
        'summary' => $data['summary'],
        'description_json' => to_json($data['description']),
        'location' => $data['location'],
        'price' => $data['price'],
        'price_suffix' => $data['price_suffix'],
        'beds' => $data['beds'],
        'baths' => $data['baths'],
        'sqft' => $data['sqft'],
        'overview_id' => $data['overview_id'],
        'nearby' => $data['nearby'],
        'nearby_items_json' => to_json($data['nearby_items']),
        'details_json' => to_json($data['details']),
        'features_json' => to_json($data['features']),
        'map_address' => $data['map_address'],
        'map_city' => $data['map_city'],
        'map_state' => $data['map_state'],
        'map_postal' => $data['map_postal'],
        'map_area' => $data['map_area'],
        'map_country' => $data['map_country'],
        'map_embed' => $data['map_embed'],
        'website_url' => $data['website_url'],
        'website_label' => $data['website_label'],
        'card_highlights_json' => to_json($data['card_highlights']),
        'is_featured' => !empty($data['is_featured']) ? 1 : 0,
        'status' => $data['status'],
    ];

    if ($id === null) {
        $sql = 'INSERT INTO properties (
            category_id, name, slug, page_title, hero_image, gallery_images_json, summary,
            description_json, location, price, price_suffix, beds, baths, sqft, overview_id,
            nearby, nearby_items_json, details_json, features_json,
            map_address, map_city, map_state, map_postal, map_area, map_country,
            map_embed, website_url, website_label, card_highlights_json, is_featured, status
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )';
        $stmt = $conn->prepare($sql);
        $values = [
            $sqlData['category_id'],
            $sqlData['name'],
            $sqlData['slug'],
            $sqlData['page_title'],
            $sqlData['hero_image'],
            $sqlData['gallery_images_json'],
            $sqlData['summary'],
            $sqlData['description_json'],
            $sqlData['location'],
            $sqlData['price'],
            $sqlData['price_suffix'],
            $sqlData['beds'],
            $sqlData['baths'],
            $sqlData['sqft'],
            $sqlData['overview_id'],
            $sqlData['nearby'],
            $sqlData['nearby_items_json'],
            $sqlData['details_json'],
            $sqlData['features_json'],
            $sqlData['map_address'],
            $sqlData['map_city'],
            $sqlData['map_state'],
            $sqlData['map_postal'],
            $sqlData['map_area'],
            $sqlData['map_country'],
            $sqlData['map_embed'],
            $sqlData['website_url'],
            $sqlData['website_label'],
            $sqlData['card_highlights_json'],
            $sqlData['is_featured'],
            $sqlData['status'],
        ];
        bind_params_dynamic($stmt, 'i' . str_repeat('s', 28) . 'is', $values);
        $stmt->execute();

        return (int) $conn->insert_id;
    }

    $sql = 'UPDATE properties SET
        category_id = ?, name = ?, slug = ?, page_title = ?, hero_image = ?, gallery_images_json = ?, summary = ?,
        description_json = ?, location = ?, price = ?, price_suffix = ?, beds = ?, baths = ?, sqft = ?, overview_id = ?,
        nearby = ?, nearby_items_json = ?, details_json = ?, features_json = ?,
        map_address = ?, map_city = ?, map_state = ?, map_postal = ?, map_area = ?, map_country = ?,
        map_embed = ?, website_url = ?, website_label = ?, card_highlights_json = ?, is_featured = ?, status = ?
        WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $values = [
        $sqlData['category_id'],
        $sqlData['name'],
        $sqlData['slug'],
        $sqlData['page_title'],
        $sqlData['hero_image'],
        $sqlData['gallery_images_json'],
        $sqlData['summary'],
        $sqlData['description_json'],
        $sqlData['location'],
        $sqlData['price'],
        $sqlData['price_suffix'],
        $sqlData['beds'],
        $sqlData['baths'],
        $sqlData['sqft'],
        $sqlData['overview_id'],
        $sqlData['nearby'],
        $sqlData['nearby_items_json'],
        $sqlData['details_json'],
        $sqlData['features_json'],
        $sqlData['map_address'],
        $sqlData['map_city'],
        $sqlData['map_state'],
        $sqlData['map_postal'],
        $sqlData['map_area'],
        $sqlData['map_country'],
        $sqlData['map_embed'],
        $sqlData['website_url'],
        $sqlData['website_label'],
        $sqlData['card_highlights_json'],
        $sqlData['is_featured'],
        $sqlData['status'],
        $id,
    ];
    bind_params_dynamic($stmt, 'i' . str_repeat('s', 28) . 'isi', $values);
    $stmt->execute();

    return $id;
}

function delete_property(int $id): void
{
    $conn = db();
    $stmt = $conn->prepare('DELETE FROM properties WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

function get_gallery_items(bool $onlyActive = true): array
{
    $conn = db();
    $where = $onlyActive ? 'WHERE is_active = 1' : '';
    $sql = "SELECT id, title, image_path, sort_order, is_active FROM gallery_items {$where} ORDER BY sort_order ASC, id DESC";
    $result = $conn->query($sql);

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function save_gallery_item(array $data, ?int $id = null): int
{
    $conn = db();
    $title = $data['title'];
    $imagePath = $data['image_path'];
    $sortOrder = (int) $data['sort_order'];
    $isActive = !empty($data['is_active']) ? 1 : 0;

    if ($id === null) {
        $stmt = $conn->prepare('INSERT INTO gallery_items (title, image_path, sort_order, is_active) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssii', $title, $imagePath, $sortOrder, $isActive);
        $stmt->execute();

        return (int) $conn->insert_id;
    }

    $stmt = $conn->prepare('UPDATE gallery_items SET title = ?, image_path = ?, sort_order = ?, is_active = ? WHERE id = ?');
    $stmt->bind_param('ssiii', $title, $imagePath, $sortOrder, $isActive, $id);
    $stmt->execute();

    return $id;
}

function delete_gallery_item(int $id): void
{
    $conn = db();
    $stmt = $conn->prepare('DELETE FROM gallery_items WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

function get_site_settings(): array
{
    $conn = db();
    $row = $conn->query('SELECT * FROM site_settings WHERE id = 1 LIMIT 1')->fetch_assoc();

    if ($row) {
        return $row;
    }

    return [
        'office_address' => 'Block No-25, Sanjay Place, Agra - 282002',
        'phone' => '+91 98370 29310',
        'email' => 'bmrealestateagra@gmail.com',
        'open_time' => 'Monday - Friday: 08:00 - 20:00 | Saturday - Sunday: 10:00 - 18:00',
        'facebook_url' => '#',
        'instagram_url' => '#',
        'youtube_url' => '#',
        'page_title_bg' => 'images/banner/banner2.jpg',
    ];
}

function save_site_settings(array $data): void
{
    $conn = db();
    $sql = 'INSERT INTO site_settings (id, office_address, phone, email, open_time, facebook_url, instagram_url, youtube_url, page_title_bg)
            VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            office_address = VALUES(office_address),
            phone = VALUES(phone),
            email = VALUES(email),
            open_time = VALUES(open_time),
            facebook_url = VALUES(facebook_url),
            instagram_url = VALUES(instagram_url),
            youtube_url = VALUES(youtube_url),
            page_title_bg = VALUES(page_title_bg)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssssss',
        $data['office_address'],
        $data['phone'],
        $data['email'],
        $data['open_time'],
        $data['facebook_url'],
        $data['instagram_url'],
        $data['youtube_url'],
        $data['page_title_bg']
    );
    $stmt->execute();
}

function save_contact_message(array $data): int
{
    $conn = db();
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $stmt = $conn->prepare('INSERT INTO contact_messages (name, email, phone, subject, message, ip_address) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $data['name'], $data['email'], $data['phone'], $data['subject'], $data['message'], $ip);
    $stmt->execute();

    return (int) $conn->insert_id;
}

function get_contact_messages(): array
{
    $conn = db();
    $result = $conn->query('SELECT id, name, email, phone, subject, message, created_at FROM contact_messages ORDER BY created_at DESC');

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function delete_contact_message(int $id): void
{
    $conn = db();
    $stmt = $conn->prepare('DELETE FROM contact_messages WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

function get_admin_by_username(string $username): ?array
{
    $conn = db();
    $stmt = $conn->prepare('SELECT id, username, password_hash, is_active FROM admin_users WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    return $row ?: null;
}

function update_admin_last_login(int $id): void
{
    $conn = db();
    $stmt = $conn->prepare('UPDATE admin_users SET last_login_at = NOW() WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

function get_property_count(): int
{
    $conn = db();
    $row = $conn->query("SELECT COUNT(*) AS total FROM properties WHERE status = 'active'")->fetch_assoc();
    return (int) ($row['total'] ?? 0);
}

function get_gallery_count(): int
{
    $conn = db();
    $row = $conn->query("SELECT COUNT(*) AS total FROM gallery_items WHERE is_active = 1")->fetch_assoc();
    return (int) ($row['total'] ?? 0);
}

function get_message_count(): int
{
    $conn = db();
    $row = $conn->query('SELECT COUNT(*) AS total FROM contact_messages')->fetch_assoc();
    return (int) ($row['total'] ?? 0);
}

function save_category(array $data, ?int $id = null): int
{
    $conn = db();
    $name = $data['name'];
    $slug = $data['slug'];
    $sortOrder = (int) $data['sort_order'];
    $isActive = !empty($data['is_active']) ? 1 : 0;

    if ($id === null) {
        $stmt = $conn->prepare('INSERT INTO categories (name, slug, sort_order, is_active) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssii', $name, $slug, $sortOrder, $isActive);
        $stmt->execute();

        return (int) $conn->insert_id;
    }

    $stmt = $conn->prepare('UPDATE categories SET name = ?, slug = ?, sort_order = ?, is_active = ? WHERE id = ?');
    $stmt->bind_param('ssiii', $name, $slug, $sortOrder, $isActive, $id);
    $stmt->execute();

    return $id;
}

function delete_category(int $id): void
{
    $conn = db();
    $stmt = $conn->prepare('DELETE FROM categories WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
