<?php
/**
 * EMERGENCY ADMIN PASSWORD RESET (temporary — delete this file after use)
 *
 * 1. Edit EMERGENCY_RESET_SECRET below to a long random string (not the placeholder).
 * 2. Open in browser: .../admin/emergency-reset-password.php?secret=YOUR_SECRET
 * 3. Choose admin username, set new password, submit.
 * 4. Delete this file from the server.
 *
 * - Localhost: open the URL; you can use the form even while the constant is still the placeholder.
 * - Not localhost: set EMERGENCY_RESET_SECRET in this file, then open ...?secret=THAT_VALUE
 */

declare(strict_types=1);

const EMERGENCY_RESET_SECRET = 'CHANGE_ME_TO_A_LONG_RANDOM_STRING_BEFORE_USE';

require_once __DIR__ . '/../includes/app.php';

if (is_admin_logged_in()) {
    header('Location: index.php');
    exit;
}

$remote = $_SERVER['REMOTE_ADDR'] ?? '';
$isLocal = in_array($remote, ['127.0.0.1', '::1', '::ffff:127.0.0.1'], true);
$urlSecret = (string) ($_GET['secret'] ?? $_POST['secret'] ?? '');

$isDefaultSecret = EMERGENCY_RESET_SECRET === ''
    || EMERGENCY_RESET_SECRET === 'CHANGE_ME_TO_A_LONG_RANDOM_STRING_BEFORE_USE';
$secretOk = !$isDefaultSecret
    && $urlSecret !== ''
    && hash_equals(EMERGENCY_RESET_SECRET, $urlSecret);

if (!$isLocal) {
    if ($isDefaultSecret) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=UTF-8');
        exit(
            "Forbidden: default secret is not allowed from non-localhost.\n\n"
            . "Set EMERGENCY_RESET_SECRET in admin/emergency-reset-password.php, then open:\n"
            . "admin/emergency-reset-password.php?secret=YOUR_SECRET\n"
        );
    }
    if (!$secretOk) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=UTF-8');
        exit(
            "Forbidden: missing or wrong ?secret= value.\n\n"
            . "Open admin/emergency-reset-password.php?secret=THE_SAME_VALUE_AS_IN_THE_FILE\n"
        );
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf_post();

    if (!$isLocal && !hash_equals(EMERGENCY_RESET_SECRET, (string) ($_POST['secret'] ?? ''))) {
        http_response_code(403);
        exit('Invalid secret.');
    }

    $username = clean_text((string) ($_POST['username'] ?? ''));
    $newPassword = (string) ($_POST['new_password'] ?? '');
    $confirm = (string) ($_POST['confirm_password'] ?? '');

    if ($username === '') {
        $error = 'Choose an admin username.';
    } elseif (strlen($newPassword) < 8) {
        $error = 'Password must be at least 8 characters.';
    } elseif (!hash_equals($newPassword, $confirm)) {
        $error = 'Passwords do not match.';
    } else {
        $connPost = db();
        $admin = null;
        $lookup = $connPost->prepare('SELECT id, username, is_active FROM admin_users WHERE LOWER(username) = LOWER(?) LIMIT 1');
        if ($lookup === false) {
            $error = 'Database error. Check server logs.';
        } else {
            $lookup->bind_param('s', $username);
            $lookup->execute();
            $admin = $lookup->get_result()->fetch_assoc() ?: null;
        }

        if ($error === '' && (empty($admin) || !isset($admin['id']))) {
            $list = $connPost->query('SELECT username, is_active FROM admin_users ORDER BY id ASC');
            $known = [];
            if ($list) {
                while ($r = $list->fetch_assoc()) {
                    $u = (string) ($r['username'] ?? '');
                    $a = (int) ($r['is_active'] ?? 0) === 1;
                    if ($u !== '') {
                        $known[] = $u . ($a ? '' : ' (inactive)');
                    }
                }
            }
            if ($known === []) {
                $error = 'No admin users exist. Run the installer first: admin/install.php?key= (see APP_SETUP_KEY in install.php or your env).';
            } else {
                $error = 'No user matches that name (check spelling; usernames are case-insensitive). Accounts in the database: ' . implode(', ', $known);
            }
        } elseif ($error === '' && $admin) {
            $id = (int) $admin['id'];
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $up = $connPost->prepare('UPDATE admin_users SET password_hash = ?, is_active = 1 WHERE id = ?');
            if ($up === false) {
                $error = 'Database error. Check server logs.';
            } else {
                $up->bind_param('si', $hash, $id);
                $up->execute();
                set_flash('auth_success', 'Password updated' . ((int) ($admin['is_active'] ?? 0) !== 1 ? ' and account reactivated' : '') . '. Log in, then delete emergency-reset-password.php from the server.');
                header('Location: login.php');
                exit;
            }
        }
    }
}

$conn = db();
$adminList = [];
$res = $conn->query("SELECT id, username, is_active FROM admin_users ORDER BY id ASC");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $u = (string) ($row['username'] ?? '');
        if ($u === '') {
            continue;
        }
        $active = (int) ($row['is_active'] ?? 0) === 1;
        $adminList[] = ['username' => $u, 'active' => $active];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Emergency password reset</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-body admin-auth-body">
  <div class="admin-auth-card admin-auth-card-wide">
    <h1>Emergency admin password reset</h1>
    <p class="auth-subtitle">Your old password cannot be read from the database (it is hashed). Set a new one here, then delete this PHP file.</p>

    <?php if ($isLocal && $isDefaultSecret): ?>
      <div class="alert alert-warning">
        You are on <strong>localhost</strong>, so you can reset below without editing the file. For any non-localhost access, set <code>EMERGENCY_RESET_SECRET</code> in this file and open <code>?secret=…</code>. Delete this file after resetting.
      </div>
    <?php endif; ?>

    <?php if ($adminList === []): ?>
      <div class="alert alert-danger">
        There are <strong>no</strong> rows in <code>admin_users</code>. Create the first admin with
        <code>admin/install.php?key=…</code> (key defaults in <code>admin/install.php</code> or set <code>APP_SETUP_KEY</code> in the environment), then you can set the password there or return here.
      </div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

      <form method="post" autocomplete="off">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <?php if (!$isLocal): ?>
          <input type="hidden" name="secret" value="<?php echo htmlspecialchars($urlSecret, ENT_QUOTES, 'UTF-8'); ?>">
        <?php endif; ?>

        <div class="mb-3">
          <label class="form-label" for="username">Admin username</label>
          <?php if ($adminList !== []): ?>
            <select class="form-select" id="username" name="username" required>
              <?php foreach ($adminList as $row): ?>
                <?php
                $u = $row['username'];
                $label = $u . ($row['active'] ? '' : ' (inactive — will be reactivated)');
                ?>
                <option value="<?php echo htmlspecialchars($u, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
              <?php endforeach; ?>
            </select>
          <?php else: ?>
            <input class="form-control" type="text" id="username" name="username" required maxlength="80" autocomplete="username" placeholder="No users in DB yet — run admin/install.php first">
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label class="form-label" for="new_password">New password</label>
          <input class="form-control" type="password" id="new_password" name="new_password" required minlength="8" maxlength="200" autocomplete="new-password">
        </div>
        <div class="mb-3">
          <label class="form-label" for="confirm_password">Confirm password</label>
          <input class="form-control" type="password" id="confirm_password" name="confirm_password" required minlength="8" maxlength="200" autocomplete="new-password">
        </div>
        <button class="btn btn-primary admin-btn admin-btn-block" type="submit">Update password</button>
      </form>

    <div class="admin-auth-links mt-3">
      <a href="login.php">Back to login</a>
    </div>
  </div>
</body>
</html>
