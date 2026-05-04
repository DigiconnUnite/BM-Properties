<?php

function has_column(string $table, string $column): bool
{
  $conn = db();
  $database = $conn->real_escape_string((string) $conn->query('SELECT DATABASE() AS db')->fetch_assoc()['db']);
  $tableEscaped = $conn->real_escape_string($table);
  $columnEscaped = $conn->real_escape_string($column);
  $sql = "SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$database}' AND TABLE_NAME = '{$tableEscaped}' AND COLUMN_NAME = '{$columnEscaped}' LIMIT 1";
  $result = $conn->query($sql);

  return $result instanceof mysqli_result && $result->num_rows > 0;
}

function table_exists(string $table): bool
{
  $conn = db();
  $tableEscaped = $conn->real_escape_string($table);
  $result = $conn->query("SHOW TABLES LIKE '{$tableEscaped}'");

  return $result instanceof mysqli_result && $result->num_rows > 0;
}

function column_type(string $table, string $column): string
{
  $conn = db();
  $database = $conn->real_escape_string((string) $conn->query('SELECT DATABASE() AS db')->fetch_assoc()['db']);
  $tableEscaped = $conn->real_escape_string($table);
  $columnEscaped = $conn->real_escape_string($column);
  $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$database}' AND TABLE_NAME = '{$tableEscaped}' AND COLUMN_NAME = '{$columnEscaped}' LIMIT 1";
  $result = $conn->query($sql);

  if ($result instanceof mysqli_result) {
    $row = $result->fetch_assoc();
    return (string) ($row['COLUMN_TYPE'] ?? '');
  }

  return '';
}

function run_app_migrations(): void
{
  static $hasRun = false;

  if ($hasRun) {
    return;
  }

  $hasRun = true;
  $conn = db();

  if (!has_column('admin_users', 'email')) {
    $conn->query("ALTER TABLE admin_users ADD COLUMN email VARCHAR(120) NOT NULL DEFAULT '' AFTER username");
  }

  if (!has_column('admin_users', 'full_name')) {
    $conn->query("ALTER TABLE admin_users ADD COLUMN full_name VARCHAR(140) NOT NULL DEFAULT '' AFTER email");
  }

  if (!has_column('properties', 'whatsapp_number')) {
    $conn->query("ALTER TABLE properties ADD COLUMN whatsapp_number VARCHAR(25) NOT NULL DEFAULT '' AFTER website_label");
  }

  if (!has_column('properties', 'listing_type')) {
    $conn->query("ALTER TABLE properties ADD COLUMN listing_type ENUM('for_sale', 'for_rent', 'for_sale_rent') NOT NULL DEFAULT 'for_sale' AFTER whatsapp_number");
  }

  if (has_column('properties', 'listing_type') && strpos(column_type('properties', 'listing_type'), 'for_sale_rent') === false) {
    $conn->query("ALTER TABLE properties MODIFY COLUMN listing_type ENUM('for_sale', 'for_rent', 'for_sale_rent') NOT NULL DEFAULT 'for_sale'");
  }

  if (!table_exists('admin_password_resets')) {
    $conn->query("CREATE TABLE admin_password_resets (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            admin_user_id INT UNSIGNED NOT NULL,
            token_hash CHAR(64) NOT NULL,
            expires_at DATETIME NOT NULL,
            used_at DATETIME NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_admin_reset_hash (token_hash),
            INDEX idx_admin_reset_expiry (expires_at),
            CONSTRAINT fk_admin_password_resets_user FOREIGN KEY (admin_user_id) REFERENCES admin_users(id) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  }

  if (!table_exists('enquiries')) {
    $conn->query("CREATE TABLE enquiries (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(140) NOT NULL,
            email VARCHAR(120) NOT NULL,
            phone VARCHAR(25) NOT NULL,
            subject VARCHAR(180) NOT NULL,
            message TEXT NOT NULL,
            looking_to ENUM('sell','rent','pg') NOT NULL DEFAULT 'sell',
            property_group ENUM('residential','commercial') NOT NULL DEFAULT 'residential',
            property_type VARCHAR(100) NOT NULL,
            source VARCHAR(60) NOT NULL DEFAULT 'header-modal',
            page_url VARCHAR(255) NOT NULL DEFAULT '',
            ip_address VARCHAR(45) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_enquiry_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  }

  if (table_exists('enquiries') && has_column('enquiries', 'looking_to')) {
    $conn->query("ALTER TABLE enquiries MODIFY COLUMN looking_to ENUM('sell','rent','pg','buy') NOT NULL DEFAULT 'sell'");
    $conn->query("UPDATE enquiries SET looking_to = 'buy' WHERE looking_to = 'pg'");
    $conn->query("ALTER TABLE enquiries MODIFY COLUMN looking_to ENUM('sell','rent','buy') NOT NULL DEFAULT 'sell'");
  }

  if (!has_column('gallery_items', 'uploaded_by')) {
    $conn->query("ALTER TABLE gallery_items ADD COLUMN uploaded_by VARCHAR(80) NOT NULL DEFAULT 'admin' AFTER sort_order");
  }

  if (!table_exists('testimonials')) {
    $conn->query("CREATE TABLE testimonials (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(140) NOT NULL,
            subtitle VARCHAR(180) NOT NULL DEFAULT '',
            message TEXT NOT NULL,
            image_path VARCHAR(255) NOT NULL,
            rating TINYINT UNSIGNED NOT NULL DEFAULT 5,
            sort_order INT NOT NULL DEFAULT 0,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_testimonials_active_sort (is_active, sort_order)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  }

  if (!table_exists('explore_cities')) {
    $conn->query("CREATE TABLE explore_cities (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            city_name VARCHAR(140) NOT NULL,
            image_path VARCHAR(255) NOT NULL,
            property_count INT UNSIGNED NOT NULL DEFAULT 0,
            sort_order INT NOT NULL DEFAULT 0,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_explore_cities_active_sort (is_active, sort_order)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  }

  if (!has_column('site_settings', 'trusted_partners_heading')) {
    $conn->query("ALTER TABLE site_settings ADD COLUMN trusted_partners_heading VARCHAR(180) NOT NULL DEFAULT 'Trusted by over 20+ major companies' AFTER page_title_bg");
  }

  if (!table_exists('trusted_partners')) {
    $conn->query("CREATE TABLE trusted_partners (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            company_name VARCHAR(140) NOT NULL,
            logo_path VARCHAR(255) NOT NULL,
            sort_order INT NOT NULL DEFAULT 0,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_trusted_partners_active_sort (is_active, sort_order)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $seedPartners = [
      ['Ahinsa', 'images/partners/ahinsa.png', 1],
      ['Corporate Park', 'images/partners/corporate-park.png', 2],
      ['Landmark City', 'images/partners/landmark-city.png', 3],
      ['Lodha', 'images/partners/lodha.png', 4],
      ['UPSIC', 'images/partners/upsic.png', 5],
    ];
    $stmt = $conn->prepare('INSERT INTO trusted_partners (company_name, logo_path, sort_order, is_active) VALUES (?, ?, ?, 1)');
    foreach ($seedPartners as $partner) {
      $stmt->bind_param('ssi', $partner[0], $partner[1], $partner[2]);
      $stmt->execute();
    }
  }

  if (!table_exists('top_properties')) {
    $conn->query("CREATE TABLE top_properties (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(160) NOT NULL,
            image_path VARCHAR(255) NOT NULL,
            detail_url VARCHAR(255) NOT NULL DEFAULT '',
            tag_label VARCHAR(120) NOT NULL DEFAULT '',
            highlights_json LONGTEXT NOT NULL,
            summary TEXT NOT NULL,
            sort_order INT NOT NULL DEFAULT 0,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_top_properties_active_sort (is_active, sort_order)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
  }
}
