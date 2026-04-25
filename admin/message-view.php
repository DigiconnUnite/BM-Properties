<?php

require_once __DIR__ . '/_bootstrap.php';

$pageTitle = 'View Message';
$activePage = 'messages';

$id = (int) ($_GET['id'] ?? 0);
$message = $id > 0 ? get_contact_message_by_id($id) : null;

include __DIR__ . '/_layout_top.php';
?>

<section class="admin-card">
  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
    <h2 class="mb-0">Message Details</h2>
    <a class="btn btn-outline-secondary" href="messages.php">Back</a>
  </div>

  <?php if (!$message): ?>
    <div class="alert alert-danger mt-3">Message not found.</div>
  <?php else: ?>
    <div class="mt-3">
      <div class="row g-3">
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Date</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $message['created_at'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Subject</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $message['subject'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Name</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $message['name'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Email</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $message['email'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="admin-detail">
            <div class="admin-detail-label">Phone</div>
            <div class="admin-detail-value"><?php echo htmlspecialchars((string) $message['phone'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        </div>
        <div class="col-12">
          <div class="admin-detail">
            <div class="admin-detail-label">Message</div>
            <div class="admin-detail-value"><?php echo nl2br(htmlspecialchars((string) $message['message'], ENT_QUOTES, 'UTF-8')); ?></div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/_layout_bottom.php'; ?>

