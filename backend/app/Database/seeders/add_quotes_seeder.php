<?php

require_once '../config/db_config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quotes = [
        [
            'quote' => '“Be yourself; everyone else is already taken.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Oscar Wilde'],
                ['id' => 2, 'name' => 'J. Washington'],
                ['id' => 3, 'name' => 'Albert Einstein'],
            ]),
            'correct_author_id' => 1
        ],
        [
            'quote' => '“Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Marcus Tullius Cicero'],
                ['id' => 2, 'name' => 'Albert Einstein'],
                ['id' => 3, 'name' => 'Bernard M. Baruch'],
            ]),
            'correct_author_id' => 2
        ],
        [
            'quote' => '“Twenty years from now you will be more disappointed by the things that you didn\'t do than by the ones you did do. So throw off the bowlines. Sail away from the safe harbor. Catch the trade winds in your sails. Explore. Dream. Discover.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'H. Jackson Brown Jr'],
                ['id' => 2, 'name' => 'Andre Gide'],
                ['id' => 3, 'name' => 'Narcotics Anonymous'],
            ]),
            'correct_author_id' => 1
        ],
        [
            'quote' => '“The person, be it gentleman or lady, who has not pleasure in a good novel, must be intolerably stupid.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Albert Einstein'],
                ['id' => 2, 'name' => 'Jane Austen'],
                ['id' => 3, 'name' => 'Mark Twain'],
            ]),
            'correct_author_id' => 2
        ],
        [
            'quote' => '“We are all in the gutter, but some of us are looking at the stars.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Neil Gaiman'],
                ['id' => 2, 'name' => 'Allen Saunders'],
                ['id' => 3, 'name' => 'Oscar Wilde'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“I am enough of an artist to draw freely upon my imagination. Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Lao Tzu'],
                ['id' => 2, 'name' => 'Steve Martin'],
                ['id' => 3, 'name' => 'Albert Einstein'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“Everything you can imagine is real.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'John Green'],
                ['id' => 2, 'name' => 'Lemony Snicket'],
                ['id' => 3, 'name' => 'Pablo Picasso'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“I became insane, with long intervals of horrible sanity.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Ralph Waldo Emerson'],
                ['id' => 2, 'name' => 'Frank Herber'],
                ['id' => 3, 'name' => 'Edgar Allan Poe'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“Life isn\'t about finding yourself. Life is about creating yourself.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Nicholas Sparks'],
                ['id' => 2, 'name' => 'Jim Henson'],
                ['id' => 3, 'name' => 'George Bernard Shaw'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“So, this is my life. And I want you to know that I am both happy and sad and I\'m still trying to figure out how that could be.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'Robert Fulghum'],
                ['id' => 2, 'name' => 'Alexandre Dumas-fils'],
                ['id' => 3, 'name' => 'Stephen Chbosky,'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“The trouble with having an open mind, of course, is that people will insist on coming along and trying to put things in it.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'C.S. Lewis'],
                ['id' => 2, 'name' => 'Bill Watterson'],
                ['id' => 3, 'name' => 'Terry Pratchett'],
            ]),
            'correct_author_id' => 3
        ],
        [
            'quote' => '“Knowing yourself is the beginning of all wisdom.”',
            'authors' => json_encode([
                ['id' => 1, 'name' => 'George Orwell'],
                ['id' => 2, 'name' => 'Chuck Palahniuk'],
                ['id' => 3, 'name' => 'Aristotle'],
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
