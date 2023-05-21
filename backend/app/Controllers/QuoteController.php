<?php

namespace Controllers;

use Repositories\QuoteRepositoryInterface;

class QuoteController
{
    private $quoteRepository;

    public function __construct(QuoteRepositoryInterface $quoteRepository) {
        $this->quoteRepository = $quoteRepository;
    }

    public function getAllQuotes() {
        $quotes = $this->quoteRepository->getAll();
        return json_encode($quotes);
    }

    public function getQuote(int $quoteId) {
        $quote = $this->quoteRepository->getQuote($quoteId);
        return json_encode([
            'correct' => $quote['correct_author_id']
        ]);
    }
}