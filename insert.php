<?php

$host = 'localhost';
$user = 'owuorian';
$password = 'Valmamucera95';
$dbname = 'pdoposts';

// Set DSN

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance

$pdo = new PDO($dsn, $user, $password);
$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// INSERT DATA

$title = 'The Adeventures of Phil';
$body = 'A thrilling story on the adventures of Young Phil';
$author = 'Young Phil';

$sql = 'INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)';

$stmt = $pdo -> prepare($sql);
$stmt -> execute(['title' => $title, 'body' => $body, 'author' => $author]);
echo 'Post added';

?>