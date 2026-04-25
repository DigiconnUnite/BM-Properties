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
}
