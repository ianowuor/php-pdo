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

// PDO QUERY

$stmt = $pdo -> query('SELECT * FROM posts');

// while ($row = $stmt -> fetch (PDO::FETCH_ASSOC)) {
//     echo $row['title'] . '<br>';
// }

while ($row = $stmt -> fetch ()) {
    echo $row -> title . '<br>';
}

echo '---------------------- <br>';

// PREAPRED STATEMENTS (PREPARE AND EXECUTE)

// UNSAFE

// $sql = 'SELECT * FROM posts WHERE author = "$author"';

// User input
$author = 'Brad';
$is_published = true;
$id = 2;

// FETCH MULTILE POSTS

// POSITIONAL PARAMS

$sql = 'SELECT * FROM posts WHERE author = ?';
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$author]);

$posts = $stmt ->fetchAll ();

foreach ($posts as $post) {
    echo $post -> title . '<br>';
}

echo '---------------------- <br>';

// NAMED PARAMS

$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
$stmt = $pdo -> prepare($sql);
$stmt -> execute(['author' => $author, 'is_published' => $is_published]);

$posts = $stmt ->fetchAll ();

foreach ($posts as $post) {
    echo $post -> title . '<br>';
    echo $post -> is_published . '<br>';
}

// FETCH SINGLE POST

$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo -> prepare($sql);
$stmt -> execute(['id' => $id]);

$post = $stmt -> fetch();

echo $post -> body . '<br>';

// GET ROW COUNT

$stmt = $pdo -> prepare('SELECT * FROM posts WHERE author = ?');
$stmt -> execute ([$author]);
$postCount = $stmt -> rowCount();

echo $postCount . '<br>';

?>