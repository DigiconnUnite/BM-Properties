<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$error = '';
$editing = null;
$settings = get_site_settings();

if (isset($_GET['edit'])) {
  $editId = (int) $_GET['edit'];
  $editing = $editId > 0 ? get_trusted_partner_by_id($editId) : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = (string) ($_POST['action'] ?? 'save');

  if ($action === 'heading') {
    $heading = clean_text((string) ($_POST['trusted_partners_heading'] ?? ''));
    save_trusted_partners_heading($heading !== '' ? $heading : 'Trusted by over 20+ major companies');
    $message = 'Trusted companies heading updated.';
    $settings = get_site_settings();
  } elseif ($action === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
      delete_trusted_partner($id);
      $message = 'Company deleted.';
    }
  } else {
    $id = (int) ($_POST['id'] ?? 0);
    $existing = $id > 0 ? get_trusted_partner_by_id($id) : null;

    $companyName = clean_text((string) ($_POST['company_name'] ?? ''));
    $sortOrder = max(0, (int) ($_POST['sort_order'] ?? 0));
    $isActive = isset($_POST['is_active']) ? 1 : 0;
    $logoPath = (string) ($existing['logo_path'] ?? '');
    $oldLogoPath = $logoPath;

    $file = $_FILES['logo_file'] ?? [];
    $hasFile = (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE);
    if ($hasFile) {
      $uploadRoot = realpath(__DIR__ . '/..');
      if (is_string($uploadRoot) && $uploadRoot !== '') {
        $partnerDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'partners';
        $uploadError = null;
        $uploadedLogo = upload_partner_logo_file($file, $partnerDir, 'uploads/partners', $uploadError);
        if ($uploadedLogo !== null) {
          $logoPath = $uploadedLogo;
        } else {
          $error = $uploadError ?? 'Unable to upload logo.';
        }
      } else {
        $error = 'Unable to locate upload directory.';
      }
    }

    if ($error === '') {
      if ($companyName === '') {
        $error = 'Company name is required.';
      } elseif ($logoPath === '') {
        $error = 'Please upload a logo.';
      }
    }

    if ($error === '') {
      save_trusted_partner([
        'company_name' => $companyName,
        'logo_path' => $logoPath,
        'sort_order' => $sortOrder,
        'is_active' => $isActive,
      ], $id > 0 ? $id : null);

      if ($oldLogoPath !== '' && $oldLogoPath !== $logoPath) {
        delete_uploaded_file($oldLogoPath);
      }

      $message = $id > 0 ? 'Company updated.' : 'Company added.';
      $editing = null;
    }
  }
}

$pageTitle = 'Trusted Companies';
$activePage = 'partners';
$partners = get_trusted_partners(false);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<section class="admin-card">
  <h2>Section Heading</h2>
  <?php if ($message !== ''): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
  <?php if ($error !== ''): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>

  <form method="post" class="admin-form-grid">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="action" value="heading">
    <div class="admin-form-full">
      <label>Heading</label>
      <input class="form-control" name="trusted_partners_heading"
        value="<?php echo htmlspecialchars((string) ($settings['trusted_partners_heading'] ?? 'Trusted by over 20+ major companies'), ENT_QUOTES, 'UTF-8'); ?>"
        required maxlength="180">
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Heading</button>
    </div>
  </form>
</section>

<section class="admin-card">
  <h2><?php echo $editing ? 'Edit Company' : 'Add Company'; ?></h2>
  <form method="post" class="admin-form-grid" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="id" value="<?php echo (int) ($editing['id'] ?? 0); ?>">
    <input type="hidden" name="action" value="save">

    <div>
      <label>Company Name</label>
      <input class="form-control" name="company_name"
        value="<?php echo htmlspecialchars((string) ($editing['company_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div>
      <label>Sort Order</label>
      <input class="form-control" type="number" min="0" name="sort_order"
        value="<?php echo (int) ($editing['sort_order'] ?? 0); ?>">
    </div>
    <div>
      <label>Logo (WEBP, PNG, JPG, max 1MB)</label>
      <input class="form-control" type="file" name="logo_file" accept=".webp,.png,.jpg,.jpeg,image/webp,image/png,image/jpeg" <?php echo $editing ? '' : 'required'; ?>>
      <?php if (!empty($editing['logo_path'])): ?>
        <div class="admin-city-preview">
          <span>Current Logo</span>
          <img src="<?php echo htmlspecialchars(resolve_asset_path((string) $editing['logo_path'], '..'), ENT_QUOTES, 'UTF-8'); ?>"
            alt="<?php echo htmlspecialchars((string) ($editing['company_name'] ?? 'Company logo'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
      <?php endif; ?>
    </div>
    <div class="admin-checkbox-wrap">
      <label><input type="checkbox" name="is_active" <?php echo isset($editing) ? ((int) ($editing['is_active'] ?? 1) === 1 ? 'checked' : '') : 'checked'; ?>> Active</label>
    </div>
    <div class="admin-form-full">
      <button class="btn btn-primary admin-btn" type="submit">Save Company</button>
      <?php if ($editing): ?><a class="btn btn-outline-secondary admin-btn" href="partners.php">Cancel</a><?php endif; ?>
    </div>
  </form>
</section>

<section class="admin-card">
  <h2>Companies List</h2>
  <div class="table-responsive">
    <table class="table admin-table">
      <thead>
        <tr>
          <th>Logo</th>
          <th>Company</th>
          <th>Sort</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($partners as $partner): ?>
          <tr>
            <td>
              <img class="admin-table-thumb"
                src="<?php echo htmlspecialchars(resolve_asset_path((string) ($partner['logo_path'] ?? ''), '..'), ENT_QUOTES, 'UTF-8'); ?>"
                alt="<?php echo htmlspecialchars((string) ($partner['company_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
            </td>
            <td>
              <div class="admin-table-main"><?php echo htmlspecialchars((string) ($partner['company_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
              <div class="admin-table-sub"><?php echo htmlspecialchars((string) ($partner['logo_path'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
            </td>
            <td><?php echo (int) ($partner['sort_order'] ?? 0); ?></td>
            <td>
              <span class="admin-badge-status <?php echo (int) ($partner['is_active'] ?? 0) === 1 ? 'active' : 'inactive'; ?>">
                <?php echo (int) ($partner['is_active'] ?? 0) === 1 ? 'Active' : 'Inactive'; ?>
              </span>
            </td>
            <td class="admin-gallery-actions">
              <a class="btn btn-sm btn-outline-primary" href="partners.php?edit=<?php echo (int) ($partner['id'] ?? 0); ?>">Edit</a>
              <form method="post" class="inline-form" onsubmit="return confirm('Delete this company?');">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo (int) ($partner['id'] ?? 0); ?>">
                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (count($partners) === 0): ?>
          <tr>
            <td colspan="5">No trusted companies found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
<?php admin_layout_bottom(); ?>
