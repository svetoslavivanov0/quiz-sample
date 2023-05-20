<?php

namespace Controllers;

class QuoteController
{
    private $quote;

    public function __construct($quote) {
        $this->quote = $quote;
    }

    public function getAllQuotes() {
        $quotes = $this->quote->getAllQuotes();
        return json_encode($quotes);
    }

    public function getQuote(int $quoteId) {
        $quote = $this->quote->getQuoteById($quoteId);
        return json_encode([
            'correct' => $quote['correct_author_id']
        ]);
    }
}