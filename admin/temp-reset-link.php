<?php

require_once __DIR__ . '/../includes/app.php';

$remoteAddr = $_SERVER['REMOTE_ADDR'] ?? '';
if (!in_array($remoteAddr, ['127.0.0.1', '::1'], true)) {
    http_response_code(403);
    exit('Forbidden');
}

// Generate a one-time reset token for the first active admin user.
$conn = db();
$row = $conn->query("SELECT id FROM admin_users WHERE is_active = 1 ORDER BY id ASC LIMIT 1")->fetch_assoc();
if (!$row || !isset($row['id'])) {
    http_response_code(404);
    exit('No active admin user found.');
}

$token = create_admin_password_reset_token((int) $row['id']);
header('Location: reset-password.php?token=' . rawurlencode($token));
exit;

