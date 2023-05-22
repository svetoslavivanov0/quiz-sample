<?php

require_once '../app/vendor/autoload.php';
require_once '../app/Database/config/db_config.php';

use Controllers\QuoteController;
use Repositories\QuoteRepository;
use Services\GetResponseService;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quoteRepository = new QuoteRepository($pdo);
    $controller = new QuoteController($quoteRepository);

    $getResponseService = new GetResponseService($quoteRepository, $controller);
    $response = $getResponseService->handle();

    echo $response;
} catch (\Exception $e) {
    http_response_code($e->getCode());
    echo json_encode([
        'error' => 'An error occurred'
    ]);
}