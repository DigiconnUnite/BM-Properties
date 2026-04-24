<?php

function init_secure_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    if (headers_sent()) {
        return;
    }

    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();
}

function csrf_token(): string
{
    if (!isset($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf_token(?string $token): bool
{
    return is_string($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function require_csrf_post(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    $token = $_POST['csrf_token'] ?? null;
    if (!verify_csrf_token(is_string($token) ? $token : null)) {
        http_response_code(419);
        exit('Invalid CSRF token. Please refresh and try again.');
    }
}

function normalize_slug(string $value): string
{
    $value = strtolower(trim($value));
    $value = preg_replace('/[^a-z0-9\s-]/', '', $value) ?? '';
    $value = preg_replace('/\s+/', '-', $value) ?? '';
    $value = preg_replace('/-+/', '-', $value) ?? '';

    return trim($value, '-');
}

function clean_text(string $value): string
{
    return trim($value);
}

function split_lines(string $input): array
{
    $parts = preg_split('/\r\n|\r|\n/', $input) ?: [];
    $result = [];

    foreach ($parts as $part) {
        $trimmed = trim($part);
        if ($trimmed !== '') {
            $result[] = $trimmed;
        }
    }

    return $result;
}

function login_throttled(string $username, string $ip): bool
{
    $conn = db();
    $sql = "SELECT COUNT(*) AS attempts FROM admin_login_attempts WHERE attempted_at >= (NOW() - INTERVAL 15 MINUTE) AND is_success = 0 AND (username = ? OR ip_address = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $ip);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $attempts = (int) ($result['attempts'] ?? 0);

    return $attempts >= 5;
}

function record_login_attempt(string $username, string $ip, bool $isSuccess): void
{
    $conn = db();
    $successInt = $isSuccess ? 1 : 0;
    $sql = "INSERT INTO admin_login_attempts (username, ip_address, is_success) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $username, $ip, $successInt);
    $stmt->execute();
}

function is_admin_logged_in(): bool
{
    return isset($_SESSION['admin_user']) && is_array($_SESSION['admin_user']) && isset($_SESSION['admin_user']['id']);
}

function require_admin_auth(): void
{
    if (is_admin_logged_in()) {
        return;
    }

    header('Location: login.php');
    exit;
}

function admin_user(): ?array
{
    return is_admin_logged_in() ? $_SESSION['admin_user'] : null;
}

function admin_login(array $user): void
{
    session_regenerate_id(true);
    $_SESSION['admin_user'] = [
        'id' => (int) $user['id'],
        'username' => (string) $user['username'],
    ];
}

function admin_logout(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
}

function json_decode_or_default(?string $value, array $default = []): array
{
    if (!is_string($value) || trim($value) === '') {
        return $default;
    }

    $decoded = json_decode($value, true);
    return is_array($decoded) ? $decoded : $default;
}

function to_json(array $value): string
{
    return json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '[]';
}
