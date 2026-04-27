<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$adminId = (int) (admin_user()['id'] ?? 0);
$admin = get_admin_by_id($adminId);
$settings = get_site_settings();
if (!$admin) {
  admin_logout();
  header('Location: login.php');
  exit;
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = clean_text((string) ($_POST['action'] ?? 'update_profile'));

  if ($action === 'update_profile') {
    $username = clean_text((string) ($_POST['username'] ?? ''));
    $fullName = clean_text((string) ($_POST['full_name'] ?? ''));
    $email = strtolower(clean_text((string) ($_POST['email'] ?? '')));

    if ($username === '' || strlen($username) < 4) {
      $error = 'Username must be at least 4 characters.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Please enter a valid email address.';
    } else {
      update_admin_profile($adminId, $username, $fullName, $email);
      $admin = get_admin_by_id($adminId);
      admin_login($admin);
      $message = 'Profile updated successfully.';
    }
  }

  if ($action === 'change_password') {
    $currentPassword = (string) ($_POST['current_password'] ?? '');
    $newPassword = (string) ($_POST['new_password'] ?? '');
    $confirmPassword = (string) ($_POST['confirm_password'] ?? '');

    if (!password_verify($currentPassword, (string) $admin['password_hash'])) {
      $error = 'Current password is incorrect.';
    } elseif (strlen($newPassword) < 8) {
      $error = 'New password must be at least 8 characters.';
    } elseif (!hash_equals($newPassword, $confirmPassword)) {
      $error = 'New password and confirm password do not match.';
    } else {
      update_admin_password($adminId, password_hash($newPassword, PASSWORD_DEFAULT));
      $message = 'Password updated successfully.';
    }
  }

  if ($action === 'update_contact_settings') {
    if ($error === '') {
      save_site_settings([
        'office_address' => clean_text((string) ($_POST['office_address'] ?? '')),
        'phone' => clean_text((string) ($_POST['phone'] ?? '')),
        'email' => clean_text((string) ($_POST['email'] ?? '')),
        'open_time' => clean_text((string) ($_POST['open_time'] ?? '')),
        'facebook_url' => clean_text((string) ($_POST['facebook_url'] ?? '#')),
        'instagram_url' => clean_text((string) ($_POST['instagram_url'] ?? '#')),
        'youtube_url' => clean_text((string) ($_POST['youtube_url'] ?? '#')),
        'page_title_bg' => (string) ($settings['page_title_bg'] ?? 'images/banner/banner2.webp'),
      ]);
      $settings = get_site_settings();
      $message = 'Contact settings updated successfully.';
    }
  }
}

$pageTitle = 'My Profile';
$activePage = 'profile';

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
  <h2>Profile Details</h2>
  <?php if ($message !== ''): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
  <?php if ($error !== ''): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

  <form method="post" class="admin-form-grid">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="action" value="update_profile">
    <div>
      <label for="full_name">Name</label>
      <input id="full_name" class="form-control" name="full_name"
        value="<?php echo htmlspecialchars((string) ($admin['full_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
        maxlength="140">
    </div>
    <div>
      <label for="username">Username</label>
      <input id="username" class="form-control" name="username" required
        value="<?php echo htmlspecialchars((string) ($admin['username'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
        maxlength="80">
    </div>
    <div class="admin-form-full">
      <label for="email">Email</label>
      <input id="email" type="email" class="form-control" name="email" required
        value="<?php echo htmlspecialchars((string) ($admin['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" maxlength="120">
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Profile</button>
    </div>
  </form>
</section>

<section class="admin-card">
  <h2>Contact Settings</h2>
  <form method="post" class="admin-form-grid" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="action" value="update_contact_settings">
    <div class="admin-form-full">
      <label>Office Address</label>
      <textarea class="form-control" name="office_address"
        rows="2"><?php echo htmlspecialchars((string) ($settings['office_address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <div>
      <label>Phone</label>
      <input class="form-control" name="phone"
        value="<?php echo htmlspecialchars((string) ($settings['phone'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Email</label>
      <input class="form-control" name="email"
        value="<?php echo htmlspecialchars((string) ($settings['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div class="admin-form-full">
      <label>Opening Time</label>
      <input class="form-control" name="open_time"
        value="<?php echo htmlspecialchars((string) ($settings['open_time'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Facebook URL</label>
      <input class="form-control" name="facebook_url"
        value="<?php echo htmlspecialchars((string) ($settings['facebook_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>Instagram URL</label>
      <input class="form-control" name="instagram_url"
        value="<?php echo htmlspecialchars((string) ($settings['instagram_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div>
      <label>YouTube URL</label>
      <input class="form-control" name="youtube_url"
        value="<?php echo htmlspecialchars((string) ($settings['youtube_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Contact Settings</button>
    </div>
  </form>
</section>

<section class="admin-card">
  <h2>Change Password</h2>
  <form method="post" class="admin-form-grid">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="action" value="change_password">
    <div>
      <label for="current_password">Current Password</label>
      <input id="current_password" class="form-control" type="password" name="current_password" required
        autocomplete="current-password">
    </div>
    <div></div>
    <div>
      <label for="new_password">New Password</label>
      <input id="new_password" class="form-control" type="password" name="new_password" required minlength="8"
        autocomplete="new-password">
    </div>
    <div>
      <label for="confirm_password">Confirm New Password</label>
      <input id="confirm_password" class="form-control" type="password" name="confirm_password" required minlength="8"
        autocomplete="new-password">
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Update Password</button>
    </div>
  </form>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>
