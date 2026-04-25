<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (string) ($_POST['action'] ?? '') === 'delete') {
  $id = (int) ($_POST['id'] ?? 0);
  if ($id > 0) {
    delete_enquiry($id);
  }
  header('Location: enquiries.php');
  exit;
}

$pageTitle = 'Enquiries';
$activePage = 'enquiries';
$enquiries = get_enquiries();

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
  <h2>Incoming Enquiries</h2>
  <div class="table-responsive">
    <table class="table admin-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Preference</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($enquiries as $enquiry): ?>
          <tr>
            <td><?php echo htmlspecialchars((string) $enquiry['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars((string) $enquiry['full_name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
              <?php echo htmlspecialchars((string) $enquiry['phone'], ENT_QUOTES, 'UTF-8'); ?><br>
              <?php echo htmlspecialchars((string) $enquiry['email'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td>
              <?php echo htmlspecialchars(ucfirst((string) $enquiry['looking_to']), ENT_QUOTES, 'UTF-8'); ?> /
              <?php echo htmlspecialchars(ucfirst((string) $enquiry['property_group']), ENT_QUOTES, 'UTF-8'); ?><br>
              <?php echo htmlspecialchars((string) $enquiry['property_type'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td class="message-cell">
              <strong><?php echo htmlspecialchars((string) $enquiry['subject'], ENT_QUOTES, 'UTF-8'); ?></strong><br>
              <?php
              $msg = (string) $enquiry['message'];
              $preview = strlen($msg) > 80 ? (substr($msg, 0, 80) . '...') : $msg;
              echo nl2br(htmlspecialchars($preview, ENT_QUOTES, 'UTF-8'));
              ?>
            </td>
            <td>
              <a class="btn btn-sm btn-outline-primary me-2"
                href="enquiry-view.php?id=<?php echo (int) $enquiry['id']; ?>">View</a>
              <form method="post" class="inline-form" action="modules/enquiries/delete.php"
                onsubmit="return confirm('Delete this enquiry?');">
                <input type="hidden" name="csrf_token"
                  value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo (int) $enquiry['id']; ?>">
                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php include __DIR__ . '/_layout_bottom.php'; ?>