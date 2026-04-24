<?php
require_once __DIR__ . '/../../_bootstrap.php';
require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = (int) ($_POST['id'] ?? 0);
  if ($id > 0) {
    delete_enquiry($id);
  }
}

header('Location: index.php');
exit;
