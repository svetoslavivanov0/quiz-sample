<?php

namespace Repositories;

interface QuoteRepositoryInterface
{
    public function getAll();

    public function getQuote(int $quoteId);
}