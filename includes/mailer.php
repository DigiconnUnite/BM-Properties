<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function mail_config(): array
{
  static $config = null;

  if (is_array($config)) {
    return $config;
  }

  $config = require __DIR__ . '/../config/mail.php';
  return $config;
}

function set_last_mail_error(string $message): void
{
  $GLOBALS['bm_last_mail_error'] = $message;
}

function last_mail_error(): string
{
  return (string) ($GLOBALS['bm_last_mail_error'] ?? '');
}

function send_mail_message(string $toEmail, string $toName, string $subject, string $htmlBody, string $textBody = ''): bool
{
  set_last_mail_error('');

  $autoloadPath = __DIR__ . '/../vendor/autoload.php';
  if (!is_file($autoloadPath)) {
    throw new RuntimeException('PHPMailer dependency not installed. Run composer install.');
  }

  require_once $autoloadPath;

  $config = mail_config();
  $mail = new PHPMailer(true);

  try {
    $mail->CharSet = 'UTF-8';
    $mail->setFrom((string) $config['from_email'], (string) $config['from_name']);
    if (!empty($config['reply_to_email'])) {
      $mail->addReplyTo((string) $config['reply_to_email'], (string) ($config['reply_to_name'] ?? ''));
    }
    $mail->addAddress($toEmail, $toName);

    if ((string) ($config['mailer'] ?? 'smtp') === 'smtp') {
      $mail->isSMTP();
      $mail->Host = (string) ($config['host'] ?? '');
      $mail->Port = (int) ($config['port'] ?? 587);
      $mail->Username = (string) ($config['username'] ?? '');
      $mail->Password = (string) ($config['password'] ?? '');
      $mail->SMTPAuth = $mail->Username !== '';
      $encryption = strtolower((string) ($config['encryption'] ?? 'tls'));
      if ($encryption === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      } else {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      }
    } else {
      $mail->isMail();
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $htmlBody;
    $mail->AltBody = $textBody !== '' ? $textBody : strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $htmlBody));

    return $mail->send();
  } catch (Exception $e) {
    $error = $mail->ErrorInfo !== '' ? $mail->ErrorInfo : $e->getMessage();
    set_last_mail_error($error);
    error_log('Mailer error: ' . $error);
    return false;
  }
}

function email_template(string $title, string $intro, array $rows = [], string $message = '', string $footerNote = ''): string
{
  $rowHtml = '';
  foreach ($rows as $label => $value) {
    $rowHtml .= '<tr>'
      . '<td style="padding:8px 18px 8px 0;color:#0b7a47;font-weight:700;white-space:nowrap;vertical-align:top;">' . htmlspecialchars((string) $label, ENT_QUOTES, 'UTF-8') . ':</td>'
      . '<td style="padding:8px 0;color:#0f1f3d;vertical-align:top;">' . nl2br(htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8')) . '</td>'
      . '</tr>';
  }

  $messageHtml = '';
  if (trim($message) !== '') {
    $messageHtml = '<div style="margin-top:16px;color:#0b7a47;font-weight:700;">Message:</div>'
      . '<div style="margin-top:12px;padding:14px 18px;border:1px solid #d7deea;border-radius:12px;background:#f8fbff;color:#0f1f3d;">'
      . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'))
      . '</div>';
  }

  $footerNote = $footerNote !== '' ? $footerNote : 'This message was generated automatically by BM Properties.';

  return '<div style="margin:0;padding:24px;background:#edf3f8;font-family:Arial,Helvetica,sans-serif;color:#0f1f3d;">'
    . '<div style="max-width:720px;margin:0 auto;background:#ffffff;border-radius:18px;overflow:hidden;">'
    . '<div style="background:#2f8b60;padding:28px 32px;color:#ffffff;">'
    . '<h1 style="margin:0 0 8px;font-size:26px;line-height:1.25;">' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h1>'
    . '<p style="margin:0;font-size:16px;line-height:1.5;">' . htmlspecialchars($intro, ENT_QUOTES, 'UTF-8') . '</p>'
    . '</div>'
    . '<div style="padding:28px 32px;">'
    . ($rowHtml !== '' ? '<table role="presentation" cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;font-size:16px;line-height:1.45;">' . $rowHtml . '</table>' : '')
    . $messageHtml
    . '<div style="margin-top:30px;padding-top:18px;border-top:1px solid #e5ebf3;color:#51617e;font-size:13px;line-height:1.6;">'
    . '&copy; ' . date('Y') . ' BM Properties. All rights reserved.<br>'
    . htmlspecialchars($footerNote, ENT_QUOTES, 'UTF-8')
    . '</div>'
    . '</div>'
    . '</div>'
    . '</div>';
}
