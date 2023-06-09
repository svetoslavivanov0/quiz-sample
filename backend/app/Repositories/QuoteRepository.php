<?php

namespace Repositories;

use PDO;

class QuoteRepository
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM QUOTES ORDER BY RAND() LIMIT 10");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getQuote(int $quoteId)
    {
        $stmt = $this->db->prepare("SELECT * FROM QUOTES WHERE id = ? LIMIT 1");
        $stmt->execute([$quoteId]);

        $result = $stmt->fetch();

        return $result;
    }
}