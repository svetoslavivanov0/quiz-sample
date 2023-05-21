<?php

namespace Controllers;

use Repositories\QuoteRepository;

class QuoteController
{
    private $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository) {
        $this->quoteRepository = $quoteRepository;
    }
    public function getAllQuotes()
    {
        $quotes = $this->quoteRepository->getAll();
        return json_encode($quotes);
    }

    public function getQuoteAuthor(int $quoteId)
    {
        $quote = $this->quoteRepository->getQuote($quoteId);

        if (!$quote) {
            throw new \Exception('No quote');
        }
        return json_encode([
            'correct' => $quote['correct_author_id']
        ]);
    }
}