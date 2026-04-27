<?php

require_once __DIR__ . '/../includes/app.php';

if (is_admin_logged_in()) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = get_flash('auth_success');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf_post();

    $username = clean_text((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

    if ($username === '' || $password === '') {
        $error = 'Please enter username and password.';
    } elseif (login_throttled($username, $ip)) {
        $error = 'Too many failed attempts. Try again after 15 minutes.';
    } else {
        $user = get_admin_by_username($username);
        $isValid = $user && (int) $user['is_active'] === 1 && password_verify($password, (string) $user['password_hash']);

        record_login_attempt($username, $ip, $isValid);

        if ($isValid) {
            admin_login($user);
            update_admin_last_login((int) $user['id']);
            header('Location: index.php');
            exit;
        }

        $error = 'Invalid credentials.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="admin-body admin-auth-body">
    <div class="admin-auth-wrap">
        <!-- <aside class="admin-auth-brand-panel">
            <h1>BM Properties</h1>
            <p>Secure administration for properties, gallery, enquiries, and website content.</p>
            <ul>
                <li>Manage live property listings</li>
                <li>Review messages and enquiries</li>
                <li>Keep website images and content fresh</li>
            </ul>
        </aside> -->
        <div class="admin-auth-card">
            <h2>Admin Login</h2>
            <p class="auth-subtitle">Use your credentials to continue</p>

            <?php if ($success !== ''): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>
            <?php if ($error !== ''): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <form method="post" action="" class="admin-auth-form">
                <input type="hidden" name="csrf_token"
                    value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required
                        autocomplete="username" maxlength="80">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        autocomplete="current-password" maxlength="200">
                </div>
                <button type="submit" class="btn btn-primary admin-btn admin-btn-block">Login</button>
            </form>

            <div class="admin-auth-links">
                <a href="reset-password.php">Reset Password</a>
            </div>
        </div>
    </div>
</body>

</html>
