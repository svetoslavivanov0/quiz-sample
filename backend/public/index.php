<?php

require_once '../app/vendor/autoload.php';
require_once '../app/Database/config/db_config.php';
require_once '../app/Controllers/QuoteController.php';

use Controllers\QuoteController;
use Repositories\QuoteRepository;

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
            'POST' => 'getQuoteAuthor'
        ]
    ];

    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (isset($routes[$path]) && isset($routes[$path][$method])) {
        $action = $routes[$path][$method];

        if ($method === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            if(!isset($input)) {
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
        echo 'not found';
    }
} catch (\Exception $e) {
    http_response_code($e->getCode());
    echo json_encode([
        'error' => 'An error occurred'
    ]);
}