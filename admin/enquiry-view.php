<?php

require_once __DIR__ . '/_bootstrap.php';

$pageTitle = 'View Enquiry';
$activePage = 'enquiries';

$id = (int) ($_GET['id'] ?? 0);
$enquiry = $id > 0 ? get_enquiry_by_id($id) : null;

include __DIR__ . '/_layout_top.php';
?>

<section class="admin-card">
  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
    <h2 class="mb-0">Enquiry Details</h2>
    <a class="btn btn-outline-secondary" href="enquiries.php">Back</a>
  </div>

  <?php if (!$enquiry): ?>
    <div class="alert alert-danger mt-3">Enquiry not found.</div>
  <?php else: ?>
    <div class="mt-3">
      <div class="row g-3">
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Date</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['created_at'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Source</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['source'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Name</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['full_name'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Email</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['email'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Phone</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['phone'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Preference</div>
            <div class="admin-detail-value">
              <?php echo htmlspecialchars(ucfirst((string) $enquiry['looking_to']), ENT_QUOTES, 'UTF-8'); ?> /
              <?php echo htmlspecialchars(ucfirst((string) $enquiry['property_group']), ENT_QUOTES, 'UTF-8'); ?>
              — <?php echo htmlspecialchars((string) $enquiry['property_type'], ENT_QUOTES, 'UTF-8'); ?>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="admin-detail">
            <div class="admin-detail-label">Subject</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['subject'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-12">
          <div class="admin-detail">
            <div class="admin-detail-label">Message</div>
            <div class="admin-detail-value"><?php echo nl2br(htmlspecialchars((string) $enquiry['message'], ENT_QUOTES, 'UTF-8')); ?></div>
          </div>
        </div>
        <div class="col-12">
          <div class="admin-detail">
            <div class="admin-detail-label">Page URL</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $enquiry['page_url'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/_layout_bottom.php'; ?>

