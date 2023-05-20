<?php

namespace Models;

use PDO;

class Quote
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Gets the quotes
     * @return mixed
     */
    public function getAllQuotes() {
        $stmt = $this->pdo->prepare("SELECT * FROM QUOTES");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Gets a quote
     * @param int $quoteId
     * @return mixed
     */
    public function getQuoteById(int $quoteId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM QUOTES WHERE ID = ?");
        $stmt->execute([$quoteId]);

        $result = $stmt->fetch();

        return $result;
    }
}