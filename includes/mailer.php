<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function mail_config(): array
{
  static $config = null;

  if (is_array($config)) {
    return $config;
  }

  $baseConfig = require __DIR__ . '/../config/mail.php';
  $localConfigPath = __DIR__ . '/../config/mail.local.php';
  if (is_file($localConfigPath)) {
    $localConfig = require $localConfigPath;
    if (is_array($localConfig)) {
      $baseConfig = array_merge($baseConfig, $localConfig);
    }
  }

  $config = $baseConfig;
  return $config;
}

function send_mail_message(string $toEmail, string $toName, string $subject, string $htmlBody, string $textBody = ''): bool
{
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
    error_log('Mailer error: ' . $e->getMessage());
    return false;
  }
}
