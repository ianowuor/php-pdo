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

// SEARCH DATA

$search = '%story%';
$sql = 'SELECT * FROM posts WHERE body LIKE ?';
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$search]);

$posts = $stmt -> fetchAll();

foreach ($posts as $post) {
    echo $post -> body . '<br>';
}

?>