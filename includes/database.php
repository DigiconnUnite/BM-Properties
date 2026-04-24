<?php

function db(): mysqli
{
    static $connection = null;

    if ($connection instanceof mysqli) {
        return $connection;
    }

    $config = require __DIR__ . '/../config/database.php';
    $localConfigPath = __DIR__ . '/../config/database.local.php';
    if (is_file($localConfigPath)) {
        $localConfig = require $localConfigPath;
        if (is_array($localConfig)) {
            $config = array_merge($config, $localConfig);
        }
    }

    $connection = new mysqli(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database'],
        (int) $config['port']
    );

    if ($connection->connect_error) {
        http_response_code(500);
        exit('Database connection failed: ' . htmlspecialchars($connection->connect_error, ENT_QUOTES, 'UTF-8'));
    }

    if (!$connection->set_charset($config['charset'])) {
        http_response_code(500);
        exit('Failed to set database charset.');
    }

    return $connection;
}
