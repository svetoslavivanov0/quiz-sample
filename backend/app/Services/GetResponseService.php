<?php

namespace Services;

use Controllers\QuoteController;
use Repositories\QuoteRepository;

class GetResponseService
{
    private QuoteRepository $quoteRepository;
    private QuoteController $controller;

    public function __construct(
        QuoteRepository $quoteRepository,
        QuoteController $quoteController,
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->controller = $quoteController;
    }

    /**
     * @return string
     */
    public function handle(): string
    {
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
                $response = $this->controller->$action($quoteId);
            } else {
                $response = $this->controller->$action();
            }

            return $response;
        } else {
            http_response_code(404);
            return 'not found';
        }
    }
}