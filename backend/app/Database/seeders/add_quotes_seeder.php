<?php

require_once '../config/db_config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quotes = [
        [
            'quote' => 'Quote 1',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Author 1'],
                ['id' => 2, 'name' => 'Author 2'],
                ['id' => 3, 'name' => 'Author 3'],
            ]),
            'correct_author_id' => 1
        ],
        [
            'quote' => 'Quote 2',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Author 1'],
                ['id' => 2, 'name' => 'Author 2'],
                ['id' => 3, 'name' => 'Author 3'],
            ]),
            'correct_author_id' => 2
        ],
        [
            'quote' => 'Quote 3',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Author 1'],
                ['id' => 2, 'name' => 'Author 2'],
                ['id' => 3, 'name' => 'Author 3'],
            ]),
            'correct_author_id' => 1
        ],
        [
            'quote' => 'Quote 4',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Author 1'],
                ['id' => 2, 'name' => 'Author 2'],
                ['id' => 3, 'name' => 'Author 3'],
            ]),
            'correct_author_id' => 2
        ],
        [
            'quote' => 'Quote 5',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Author 1'],
                ['id' => 2, 'name' => 'Author 2'],
                ['id' => 3, 'name' => 'Author 3'],
            ]),
            'correct_author_id' => 3
        ],
    ];

    $sql = "INSERT INTO quotes (quote, authors, correct_author_id) VALUES (:quote, :authors, :correct_author_id)";
    $stmt = $pdo->prepare($sql);

    foreach ($quotes as $quote) {
        $stmt->bindParam(':quote', $quote['quote']);
        $stmt->bindParam(':authors', $quote['authors']);
        $stmt->bindParam(':correct_author_id', $quote['correct_author_id']);
        $stmt->execute();
    }

    echo "Seeding successful!";
} catch(PDOException $e) {
    echo "Seeding failed: " . $e->getMessage();
}
