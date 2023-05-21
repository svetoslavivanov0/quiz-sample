<?php

require_once '../config/db_config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        CREATE TABLE IF NOT EXISTS quotes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            quote TEXT NOT NULL,
            authors TEXT NOT NULL,
            correct_author_id INT NOT NULL
        )
    ";

    $pdo->exec($sql);

    echo "Migration successful!";
} catch(PDOException $e) {
    echo "Migration failed: " . $e->getMessage();
}
