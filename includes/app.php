<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/mailer.php';
require_once __DIR__ . '/migrations.php';

init_secure_session();
run_app_migrations();
