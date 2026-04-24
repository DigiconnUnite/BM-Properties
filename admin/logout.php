<?php

require_once __DIR__ . '/../includes/app.php';
admin_logout();
header('Location: login.php');
exit;
