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
    <link rel="stylesheet" href="../fonts/font-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="admin-body admin-auth-body">
    <div class="admin-auth-container">
        <div class="admin-auth-form-section">
            <div class="admin-login-card">
                <div class="admin-login-head">
                    <h1>Welcome back</h1>
                    <p>Sign in to continue to the admin dashboard.</p>
                </div>
                <div class="admin-login-content">

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
                        <div class="admin-input-group">
                            <span class="admin-input-icon icon-profile" aria-hidden="true"></span>
                            <input type="text" class="form-control" id="username" name="username" required
                                autocomplete="username" maxlength="80">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="admin-input-group">
                            <span class="admin-input-icon icon-lockers" aria-hidden="true"></span>
                            <input type="password" class="form-control" id="password" name="password" required
                                autocomplete="current-password" maxlength="200">
                            <button class="admin-password-toggle" type="button" aria-label="Show password" data-target="password">
                                <span class="icon-eye" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary admin-btn admin-btn-block admin-login-submit">
                        <span class="icon-sign-out" aria-hidden="true"></span>
                        Login
                    </button>
                </form>

                <div class="admin-auth-links">
                    <a href="reset-password.php">Reset Password</a>
                </div>
                </div>
            </div>
        </div>

        <div class="admin-auth-image-section">
            <div class="admin-auth-image-content">
                <h2>BM Properties</h2>
                <p>Secure administration for properties, gallery, enquiries, and website content.</p>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.admin-password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                var input = document.getElementById(button.getAttribute('data-target'));
                if (!input) {
                    return;
                }
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });
    </script>
</body>

</html>
