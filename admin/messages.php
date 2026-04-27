<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (string) ($_POST['action'] ?? '') === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
        delete_contact_message($id);
    }
    header('Location: messages.php');
    exit;
}

$pageTitle = 'Contact Messages';
$activePage = 'messages';
$messages = get_contact_messages();

include __DIR__ . '/_layout_top.php';
?>
<section class="admin-card">
    <h2>Incoming Messages</h2>
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?php echo htmlspecialchars((string) $message['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars((string) $message['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php echo htmlspecialchars((string) $message['phone'], ENT_QUOTES, 'UTF-8'); ?><br>
                            <?php echo htmlspecialchars((string) $message['email'], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td><?php echo htmlspecialchars((string) $message['subject'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="message-cell">
                            <?php
                            $msg = (string) $message['message'];
                            $preview = strlen($msg) > 80 ? (substr($msg, 0, 80) . '...') : $msg;
                            echo nl2br(htmlspecialchars($preview, ENT_QUOTES, 'UTF-8'));
                            ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-primary me-2 js-message-view"
                                data-target="message-row-<?php echo (int) $message['id']; ?>">View</button>
                            <form method="post" class="inline-form" action="modules/messages/delete.php"
                                onsubmit="return confirm('Delete this message?');">
                                <input type="hidden" name="csrf_token"
                                    value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int) $message['id']; ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="message-row-<?php echo (int) $message['id']; ?>" class="d-none">
                        <td colspan="6">
                            <div class="admin-detail">
                                <div class="admin-detail-label">Full Message</div>
                                <div class="admin-detail-value">
                                    <?php echo nl2br(htmlspecialchars((string) $message['message'], ENT_QUOTES, 'UTF-8')); ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script src="../js/admin-messages.js"></script>
<?php include __DIR__ . '/_layout_bottom.php'; ?>