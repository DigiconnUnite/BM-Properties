CREATE TABLE IF NOT EXISTS categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(120) NOT NULL UNIQUE,
    sort_order INT NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS properties (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    name VARCHAR(160) NOT NULL,
    slug VARCHAR(180) NOT NULL UNIQUE,
    page_title VARCHAR(255) NOT NULL,
    hero_image VARCHAR(255) NOT NULL,
    gallery_images_json LONGTEXT NOT NULL,
    summary TEXT NOT NULL,
    description_json LONGTEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    price VARCHAR(120) NOT NULL,
    price_suffix VARCHAR(120) NOT NULL DEFAULT '',
    beds VARCHAR(20) NOT NULL DEFAULT '',
    baths VARCHAR(20) NOT NULL DEFAULT '',
    sqft VARCHAR(50) NOT NULL DEFAULT '',
    overview_id VARCHAR(120) NOT NULL DEFAULT '',
    nearby TEXT NOT NULL,
    nearby_items_json LONGTEXT NOT NULL,
    details_json LONGTEXT NOT NULL,
    features_json LONGTEXT NOT NULL,
    map_address VARCHAR(255) NOT NULL,
    map_city VARCHAR(120) NOT NULL,
    map_state VARCHAR(120) NOT NULL,
    map_postal VARCHAR(40) NOT NULL,
    map_area VARCHAR(120) NOT NULL,
    map_country VARCHAR(120) NOT NULL,
    map_embed TEXT NOT NULL,
    website_url VARCHAR(255) NOT NULL DEFAULT '',
    website_label VARCHAR(120) NOT NULL DEFAULT '',
    whatsapp_number VARCHAR(25) NOT NULL DEFAULT '',
    card_highlights_json LONGTEXT NOT NULL,
    is_featured TINYINT(1) NOT NULL DEFAULT 1,
    status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_properties_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gallery_items (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(180) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    sort_order INT NOT NULL DEFAULT 0,
    uploaded_by VARCHAR(80) NOT NULL DEFAULT 'admin',
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS testimonials (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS explore_cities (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(140) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    property_count INT UNSIGNED NOT NULL DEFAULT 0,
    sort_order INT NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_explore_cities_active_sort (is_active, sort_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS site_settings (
    id TINYINT UNSIGNED PRIMARY KEY,
    office_address TEXT NOT NULL,
    phone VARCHAR(40) NOT NULL,
    email VARCHAR(120) NOT NULL,
    open_time VARCHAR(255) NOT NULL,
    facebook_url VARCHAR(255) NOT NULL DEFAULT '#',
    instagram_url VARCHAR(255) NOT NULL DEFAULT '#',
    youtube_url VARCHAR(255) NOT NULL DEFAULT '#',
    page_title_bg VARCHAR(255) NOT NULL DEFAULT 'images/banner/banner2.jpg',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL,
    phone VARCHAR(40) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admin_users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL UNIQUE,
    email VARCHAR(120) NOT NULL DEFAULT '',
    full_name VARCHAR(140) NOT NULL DEFAULT '',
    password_hash VARCHAR(255) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    last_login_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admin_password_resets (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    admin_user_id INT UNSIGNED NOT NULL,
    token_hash CHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    used_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_admin_reset_hash (token_hash),
    INDEX idx_admin_reset_expiry (expires_at),
    CONSTRAINT fk_admin_password_resets_user FOREIGN KEY (admin_user_id) REFERENCES admin_users(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS enquiries (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admin_login_attempts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_success TINYINT(1) NOT NULL DEFAULT 0,
    INDEX idx_login_attempts (attempted_at),
    INDEX idx_login_user_ip (username, ip_address)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
