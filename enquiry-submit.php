<?php

require_once __DIR__ . '/includes/app.php';

require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit;
}

$wantsJson = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower((string) $_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
  || (isset($_SERVER['HTTP_ACCEPT']) && str_contains((string) $_SERVER['HTTP_ACCEPT'], 'application/json'))
  || (isset($_POST['ajax']) && (string) $_POST['ajax'] === '1');

$fullName = clean_text((string) ($_POST['full_name'] ?? ''));
$email = strtolower(clean_text((string) ($_POST['email'] ?? '')));
$phone = clean_text((string) ($_POST['phone'] ?? ''));
$subject = clean_text((string) ($_POST['subject'] ?? 'Website Enquiry'));
$message = clean_text((string) ($_POST['message'] ?? ''));
$lookingTo = clean_text((string) ($_POST['looking_to'] ?? 'sell'));
$propertyGroup = clean_text((string) ($_POST['property_group'] ?? 'residential'));
$propertyType = clean_text((string) ($_POST['property_type'] ?? 'Flat/Apartment'));
$source = clean_text((string) ($_POST['source'] ?? 'header-modal'));
$returnUrl = clean_text((string) ($_POST['return_url'] ?? 'index.php'));

if (!in_array($lookingTo, ['sell', 'rent', 'pg'], true)) {
  $lookingTo = 'sell';
}
if (!in_array($propertyGroup, ['residential', 'commercial'], true)) {
  $propertyGroup = 'residential';
}

$isValid = true;
if ($fullName === '' || strlen($fullName) < 2 || strlen($fullName) > 140) {
  $isValid = false;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $isValid = false;
}
if (!is_valid_phone($phone, 10)) {
  $isValid = false;
}
if ($message === '' || strlen($message) < 10) {
  $isValid = false;
}

if ($isValid) {
  save_enquiry([
    'full_name' => $fullName,
    'email' => $email,
    'phone' => normalize_phone($phone),
    'subject' => $subject,
    'message' => $message,
    'looking_to' => $lookingTo,
    'property_group' => $propertyGroup,
    'property_type' => $propertyType,
    'source' => $source,
    'page_url' => $returnUrl,
  ]);

  $mailSubject = 'Thank you for your enquiry - BM Properties';
  $mailHtml = '<p>Hello ' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . ',</p>'
    . '<p>Thank you for your interest in our properties. We have received your enquiry and our team will contact you shortly to assist you further.</p>'
    . '<p><strong>Your Enquiry Details:</strong></p>'
    . '<ul>'
    . '<li><strong>Looking to:</strong> ' . htmlspecialchars(ucfirst($lookingTo), ENT_QUOTES, 'UTF-8') . '</li>'
    . '<li><strong>Property Type:</strong> ' . htmlspecialchars($propertyType, ENT_QUOTES, 'UTF-8') . '</li>'
    . '<li><strong>Property Category:</strong> ' . htmlspecialchars(ucfirst($propertyGroup), ENT_QUOTES, 'UTF-8') . '</li>'
    . '</ul>'
    . '<p>We appreciate your interest and will get back to you soon.</p>'
    . '<p>Best regards,<br>BM Properties Team</p>';
  $mailText = 'Thank you for your interest in our properties. We have received your enquiry and our team will contact you shortly to assist you further.';
  
  try {
    send_mail_message($email, $fullName, $mailSubject, $mailHtml, $mailText);
  } catch (Exception $e) {
    // Log error but don't fail the enquiry save
    error_log('Failed to send enquiry auto-reply to ' . $email . ': ' . $e->getMessage());
  }

  $notice = 'Thank you for your enquiry. Our team will contact you shortly.';
  if (!$wantsJson) {
    set_flash('global_notice', $notice);
  }
} else {
  $notice = 'Please fill valid enquiry details and try again.';
  if (!$wantsJson) {
    set_flash('global_notice', $notice);
  }
}

if ($returnUrl === '' || str_contains($returnUrl, '://')) {
  $returnUrl = 'index.php';
}

if ($wantsJson) {
  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode([
    'ok' => $isValid,
    'message' => $notice,
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

header('Location: ' . $returnUrl);
exit;
