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
        'email' => (string) ($user['email'] ?? ''),
        'full_name' => (string) ($user['full_name'] ?? ''),
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

function normalize_phone(string $value): string
{
    return preg_replace('/[^0-9]/', '', $value) ?? '';
}

function is_valid_phone(string $value, int $minDigits = 10): bool
{
    return strlen(normalize_phone($value)) >= $minDigits;
}

function set_flash(string $key, string $message): void
{
    if (!isset($_SESSION['flash']) || !is_array($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }
    $_SESSION['flash'][$key] = $message;
}

function get_flash(string $key): string
{
    if (!isset($_SESSION['flash'][$key]) || !is_string($_SESSION['flash'][$key])) {
        return '';
    }

    $message = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);

    return $message;
}

function upload_image_file(array $file, string $directory, string $baseUrlPath, ?string &$error = null): ?string
{
    $error = null;

    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        $uploadError = (int) ($file['error'] ?? UPLOAD_ERR_NO_FILE);
        if ($uploadError === UPLOAD_ERR_INI_SIZE || $uploadError === UPLOAD_ERR_FORM_SIZE) {
            $error = 'Image size must be 1MB or less.';
        } elseif ($uploadError !== UPLOAD_ERR_NO_FILE) {
            $error = 'Unable to read the uploaded image. Please try again.';
        }
        return null;
    }

    $tmpName = (string) ($file['tmp_name'] ?? '');
    if ($tmpName === '' || !is_uploaded_file($tmpName)) {
        $error = 'Unable to read the uploaded image. Please try again.';
        return null;
    }

    $maxBytes = 1024 * 1024; // 1MB
    $size = (int) ($file['size'] ?? 0);
    if ($size <= 0) {
        $error = 'Uploaded image is empty. Please choose a valid WEBP image.';
        return null;
    }
    if ($size > $maxBytes) {
        $error = 'Image size must be 1MB or less.';
        return null;
    }

    $fileName = strtolower((string) ($file['name'] ?? ''));
    if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'webp') {
        $error = 'Only WEBP images are allowed.';
        return null;
    }

    $mimeType = '';
    if (function_exists('mime_content_type')) {
        $mimeType = (string) mime_content_type($tmpName);
    } elseif (function_exists('finfo_file')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = (string) finfo_file($finfo, $tmpName);
        finfo_close($finfo);
    } else {
        $imageInfo = @getimagesize($tmpName);
        if ($imageInfo !== false && isset($imageInfo['mime'])) {
            $mimeType = (string) $imageInfo['mime'];
        }
    }

    if (!in_array($mimeType, ['image/webp', 'image/x-webp'], true)) {
        $error = 'Only valid WEBP images are allowed.';
        return null;
    }

    if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
        $error = 'Upload folder is not available.';
        return null;
    }

    $canConvertToWebp = function_exists('imagewebp')
        && function_exists('imagecreatefromwebp');

    if ($canConvertToWebp) {
        // Check available memory before processing large images
        $memoryLimit = ini_get('memory_limit');
        $memoryLimitBytes = -1;
        if (preg_match('/^(\d+)(.)$/', $memoryLimit, $matches)) {
            $mem = (int) $matches[1];
            switch (strtoupper($matches[2])) {
                case 'G':
                    $memoryLimitBytes = $mem * 1024 * 1024 * 1024;
                    break;
                case 'M':
                    $memoryLimitBytes = $mem * 1024 * 1024;
                    break;
                case 'K':
                    $memoryLimitBytes = $mem * 1024;
                    break;
                default:
                    $memoryLimitBytes = $mem;
            }
        }

        // Estimate memory needed for image processing (width * height * 4 bytes * 2 for safety)
        $imageInfo = @getimagesize($tmpName);
        if ($imageInfo !== false) {
            $estimatedMemory = $imageInfo[0] * $imageInfo[1] * 4 * 2;
            if ($memoryLimitBytes > 0 && $estimatedMemory > $memoryLimitBytes * 0.8) {
                $error = 'Image is too large to process. Please use a smaller image (under 2000x2000 pixels).';
                return null;
            }
        }

        $webpName = bin2hex(random_bytes(16)) . '.webp';
        $webpPath = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $webpName;
        $image = null;

        try {
            $image = @imagecreatefromwebp($tmpName) ?: null;
        } catch (Exception $e) {
            $error = 'Unable to process WEBP image. Please try a different image.';
            return null;
        }

        if ($image !== null && @imagewebp($image, $webpPath, 82)) {
            @imagedestroy($image);
            $webpSize = filesize($webpPath);
            if ($webpSize !== false && (int) $webpSize > 0 && (int) $webpSize <= $maxBytes) {
                return rtrim($baseUrlPath, '/') . '/' . $webpName;
            }
            @unlink($webpPath);
            $error = 'Compressed WEBP image is still larger than 1MB.';
        } elseif ($image !== null) {
            @imagedestroy($image);
        }
    }

    // Fallback when GD cannot re-encode WEBP: store the original WEBP only.
    $fallbackName = bin2hex(random_bytes(16)) . '.webp';
    $fallbackPath = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fallbackName;
    if (!@move_uploaded_file($tmpName, $fallbackPath)) {
        $error = 'Unable to save the uploaded WEBP image.';
        return null;
    }

    $fallbackSize = filesize($fallbackPath);
    if ($fallbackSize === false || (int) $fallbackSize <= 0 || (int) $fallbackSize > $maxBytes) {
        @unlink($fallbackPath);
        $error = 'Image size must be 1MB or less.';
        return null;
    }

    return rtrim($baseUrlPath, '/') . '/' . $fallbackName;
}

function upload_partner_logo_file(array $file, string $directory, string $baseUrlPath, ?string &$error = null): ?string
{
    $error = null;

    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        $uploadError = (int) ($file['error'] ?? UPLOAD_ERR_NO_FILE);
        if ($uploadError === UPLOAD_ERR_INI_SIZE || $uploadError === UPLOAD_ERR_FORM_SIZE) {
            $error = 'Logo size must be 1MB or less.';
        } elseif ($uploadError !== UPLOAD_ERR_NO_FILE) {
            $error = 'Unable to read the uploaded logo. Please try again.';
        }
        return null;
    }

    $tmpName = (string) ($file['tmp_name'] ?? '');
    if ($tmpName === '' || !is_uploaded_file($tmpName)) {
        $error = 'Unable to read the uploaded logo. Please try again.';
        return null;
    }

    $size = (int) ($file['size'] ?? 0);
    if ($size <= 0 || $size > (1024 * 1024)) {
        $error = 'Logo size must be 1MB or less.';
        return null;
    }

    $extension = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
    $allowed = [
        'webp' => ['image/webp', 'image/x-webp'],
        'png' => ['image/png'],
        'jpg' => ['image/jpeg'],
        'jpeg' => ['image/jpeg'],
    ];
    if (!isset($allowed[$extension])) {
        $error = 'Only WEBP, PNG, JPG, or JPEG logos are allowed.';
        return null;
    }

    $mimeType = function_exists('mime_content_type') ? (string) mime_content_type($tmpName) : '';
    if ($mimeType !== '' && !in_array($mimeType, $allowed[$extension], true)) {
        $error = 'Please upload a valid logo image.';
        return null;
    }

    if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
        $error = 'Upload folder is not available.';
        return null;
    }

    $fileName = bin2hex(random_bytes(16)) . '.' . $extension;
    $targetPath = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName;
    if (!@move_uploaded_file($tmpName, $targetPath)) {
        $error = 'Unable to save the uploaded logo.';
        return null;
    }

    return rtrim($baseUrlPath, '/') . '/' . $fileName;
}
