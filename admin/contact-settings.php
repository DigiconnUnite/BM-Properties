<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

$message = '';
$settings = get_site_settings();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pageTitleBg = clean_text((string) ($_POST['page_title_bg'] ?? 'images/banner/banner2.jpg'));
    $uploadRoot = realpath(__DIR__ . '/..');
    if (is_string($uploadRoot) && $uploadRoot !== '') {
        $bannerUploadDir = $uploadRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'banner';
        $uploadedBanner = upload_image_file($_FILES['page_title_bg_file'] ?? [], $bannerUploadDir, 'uploads/banner');
        if ($uploadedBanner !== null) {
            $pageTitleBg = $uploadedBanner;
        }
    }

    $payload = [
        'office_address' => clean_text((string) ($_POST['office_address'] ?? '')),
        'phone' => clean_text((string) ($_POST['phone'] ?? '')),
        'email' => clean_text((string) ($_POST['email'] ?? '')),
        'open_time' => clean_text((string) ($_POST['open_time'] ?? '')),
        'facebook_url' => clean_text((string) ($_POST['facebook_url'] ?? '#')),
        'instagram_url' => clean_text((string) ($_POST['instagram_url'] ?? '#')),
        'youtube_url' => clean_text((string) ($_POST['youtube_url'] ?? '#')),
        'page_title_bg' => $pageTitleBg,
    ];

    save_site_settings($payload);
    $settings = get_site_settings();
    $message = 'Contact settings updated successfully.';
}

$pageTitle = 'Contact Settings';
$activePage = 'contact-settings';

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
    <h2>Update Public Contact Details</h2>
    <?php if ($message !== ''): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
    <form method="post" class="admin-form-grid" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
        <div class="admin-form-full"><label>Office Address</label><textarea class="form-control" name="office_address"
                rows="2"><?php echo htmlspecialchars((string) ($settings['office_address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div><label>Phone</label><input class="form-control" name="phone"
                value="<?php echo htmlspecialchars((string) ($settings['phone'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div><label>Email</label><input class="form-control" name="email"
                value="<?php echo htmlspecialchars((string) ($settings['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"></div>
        <div class="admin-form-full"><label>Opening Time</label><input class="form-control" name="open_time"
                value="<?php echo htmlspecialchars((string) ($settings['open_time'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>Facebook URL</label><input class="form-control" name="facebook_url"
                value="<?php echo htmlspecialchars((string) ($settings['facebook_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>Instagram URL</label><input class="form-control" name="instagram_url"
                value="<?php echo htmlspecialchars((string) ($settings['instagram_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>YouTube URL</label><input class="form-control" name="youtube_url"
                value="<?php echo htmlspecialchars((string) ($settings['youtube_url'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>Page Title Background Image</label><input class="form-control" name="page_title_bg"
                value="<?php echo htmlspecialchars((string) ($settings['page_title_bg'] ?? 'images/banner/banner2.jpg'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div><label>Upload Background Image (max 1MB, .jpg/.png/.webp only)</label><input class="form-control"
                type="file" name="page_title_bg_file" accept=".jpg,.jpeg,.png,.webp"></div>
        <div class="admin-form-full"><button class="btn btn-primary admin-btn" type="submit">Save Settings</button>
        </div>
    </form>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>