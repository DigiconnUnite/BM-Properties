<?php

return [
  'mailer' => getenv('MAIL_MAILER') ?: 'smtp',
  'host' => getenv('MAIL_HOST') ?: '',
  'port' => (int) (getenv('MAIL_PORT') ?: 2525),
  'username' => getenv('MAIL_USERNAME') ?: '',
  'password' => getenv('MAIL_PASSWORD') ?: '',
  'encryption' => getenv('MAIL_ENCRYPTION') ?: 'none',
  'from_email' => getenv('MAIL_FROM_ADDRESS') ?: 'bmrealestateagra@gmail.com',
  'from_name' => getenv('MAIL_FROM_NAME') ?: 'BM Properties',
  'reply_to_email' => getenv('MAIL_REPLY_TO') ?: '',
  'reply_to_name' => getenv('MAIL_REPLY_TO_NAME') ?: '',
];
