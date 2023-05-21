<?php

require_once '../app/vendor/autoload.php';

use Controllers\QuoteController;
use Repositories\QuoteRepository;

require_once '../app/Database/config/db_config.php';
require_once '../app/Controllers/QuoteController.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quoteRepository = new QuoteRepository($pdo);
    $quotesController = new QuoteController($quoteRepository);

    $routes = [
        '/api/quotes' => [
            'GET' => 'getAllQuotes'
        ],
        '/api/quote' => [
            'POST' => 'getQuote'
        ]
    ];

    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (isset($routes[$path]) && isset($routes[$path][$method])) {
        $action = $routes[$path][$method];

        if ($method === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            if(empty($input)) {
                http_response_code(422);
                exit;
            }

            $quoteId = $input['quoteId'];

            if (!$quoteId) {
                http_response_code(422);
                exit;
            }
            $response = $quotesController->$action($quoteId);
        } else {
            $response = $quotesController->$action();
        }

        echo $response;
    } else {
        http_response_code(404);
        echo 'not found test';
    }
} catch (\Exception $e) {
    http_response_code($e->getCode());
    echo json_encode([
        'error' => 'An error occurred'
    ]);
}