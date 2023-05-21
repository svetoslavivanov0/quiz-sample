<?php
define('BASE_PATH',realpath(__DIR__.'/../../'));

require_once __DIR__.'/../../vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createUnsafeImmutable(BASE_PATH);
$dotEnv->load();

$host = getenv('DB_HOST'); // Hostname
$database = getenv('DB_TABLE'); // Database name
$username = getenv('DB_NAME'); // Database username
$password = getenv('DB_PASSWORD'); // Database password
