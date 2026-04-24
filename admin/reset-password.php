<?php

require_once __DIR__ . '/../includes/app.php';

if (is_admin_logged_in()) {
  header('Location: index.php');
  exit;
}

require_csrf_post();

$requestSuccess = '';
$requestError = '';
$resetError = '';
$resetSuccess = '';
$debugResetLink = '';
$token = clean_text((string) ($_GET['token'] ?? $_POST['token'] ?? ''));
$tokenRecord = $token !== '' ? get_admin_password_reset_by_token($token) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = clean_text((string) ($_POST['action'] ?? 'request'));

  if ($action === 'request') {
    $email = strtolower(clean_text((string) ($_POST['email'] ?? '')));

    if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $admin = get_admin_by_email($email);
      if ($admin && (int) $admin['is_active'] === 1) {
        $rawToken = create_admin_password_reset_token((int) $admin['id']);
        $resetLink = 'http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/reset-password.php?token=' . rawurlencode($rawToken);

        $mailSubject = 'BM Properties Admin Password Reset';
        $mailHtml = '<p>Hello ' . htmlspecialchars((string) ($admin['full_name'] !== '' ? $admin['full_name'] : $admin['username']), ENT_QUOTES, 'UTF-8') . ',</p>'
          . '<p>We received a request to reset your admin password. Click the link below to continue:</p>'
          . '<p><a href="' . htmlspecialchars($resetLink, ENT_QUOTES, 'UTF-8') . '">Reset My Password</a></p>'
          . '<p>This link expires in 30 minutes. If you did not request this, you can ignore this email.</p>';
        $mailText = "We received a request to reset your admin password. Use this link: {$resetLink}. This link expires in 30 minutes.";
        send_mail_message((string) $admin['email'], (string) ($admin['full_name'] ?: $admin['username']), $mailSubject, $mailHtml, $mailText);

        $remoteAddr = $_SERVER['REMOTE_ADDR'] ?? '';
        if (in_array($remoteAddr, ['127.0.0.1', '::1'], true)) {
          $debugResetLink = $resetLink;
        }
      }
    }

    $requestSuccess = 'We will send you a password reset mail if your mail is registered with us.';
  }

  if ($action === 'reset') {
    $newPassword = (string) ($_POST['new_password'] ?? '');
    $confirmPassword = (string) ($_POST['confirm_password'] ?? '');

    if ($token === '' || !$tokenRecord) {
      $resetError = 'Reset link is invalid or expired.';
    } elseif (strlen($newPassword) < 8) {
      $resetError = 'Password must be at least 8 characters long.';
    } elseif (!hash_equals($newPassword, $confirmPassword)) {
      $resetError = 'Passwords do not match.';
    } else {
      update_admin_password((int) $tokenRecord['admin_user_id'], password_hash($newPassword, PASSWORD_DEFAULT));
      mark_admin_password_reset_used((int) $tokenRecord['id']);
      set_flash('auth_success', 'Password reset successful. You can now login.');
      header('Location: login.php');
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="admin-body admin-auth-body">
  <div class="admin-auth-card admin-auth-card-wide">
    <?php if ($tokenRecord): ?>
      <h1>Create New Password</h1>
      <p class="auth-subtitle">Enter your new admin password to continue.</p>

      <?php if ($resetError !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($resetError, ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>
      <?php if ($resetSuccess !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($resetSuccess, ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>

      <form method="post">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="action" value="reset">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="mb-3">
          <label class="form-label" for="new_password">New Password</label>
          <input class="form-control" type="password" id="new_password" name="new_password" required minlength="8"
            autocomplete="new-password">
        </div>
        <div class="mb-3">
          <label class="form-label" for="confirm_password">Confirm Password</label>
          <input class="form-control" type="password" id="confirm_password" name="confirm_password" required minlength="8"
            autocomplete="new-password">
        </div>
        <button class="btn btn-primary admin-btn admin-btn-block" type="submit">Update Password</button>
      </form>
      <div class="admin-auth-links">
        <a href="login.php">Back to login</a>
      </div>
    <?php else: ?>
      <h1>Reset Admin Password</h1>
      <p class="auth-subtitle">Enter your registered email and we will send a secure reset link.</p>

      <?php if ($requestSuccess !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($requestSuccess, ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>
      <?php if ($requestError !== ''): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($requestError, ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>
      <?php if ($debugResetLink !== ''): ?>
        <div class="alert alert-warning">Temporary reset link (local only): <a
            href="<?php echo htmlspecialchars($debugResetLink, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($debugResetLink, ENT_QUOTES, 'UTF-8'); ?></a>
        </div><?php endif; ?>

      <form method="post">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="action" value="request">
        <div class="mb-3">
          <label class="form-label" for="email">Registered Email</label>
          <input class="form-control" type="email" id="email" name="email" required autocomplete="email" maxlength="120">
        </div>
        <button class="btn btn-primary admin-btn admin-btn-block" type="submit">Send Reset Link</button>
      </form>
      <div class="admin-auth-links">
        <a href="login.php">Back to login</a>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>