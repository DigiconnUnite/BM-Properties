<?php

return [
  'mailer' => getenv('MAIL_MAILER') ?: 'smtp',
  'host' => getenv('MAIL_HOST') ?: 'sandbox.smtp.mailtrap.io',
  'port' => (int) (getenv('MAIL_PORT') ?: 587),
  'username' => getenv('MAIL_USERNAME') ?: '120b154f30d18f',
  'password' => getenv('MAIL_PASSWORD') ?: '793e5ec90f9768',
  'encryption' => getenv('MAIL_ENCRYPTION') ?: 'tls',
  'from_email' => getenv('MAIL_FROM_ADDRESS') ?: 'rahulrajput81680@gmail.com',
  'from_name' => getenv('MAIL_FROM_NAME') ?: 'BM Properties',
  'reply_to_email' => getenv('MAIL_REPLY_TO') ?: '',
  'reply_to_name' => getenv('MAIL_REPLY_TO_NAME') ?: '',
];
