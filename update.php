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

// UPDATE DATA

$id = 3;
$body = 'A history of the Aristocrats';

$sql = 'UPDATE posts SET body = :body WHERE id = :id';
$stmt = $pdo -> prepare($sql);
$stmt -> execute (['body' => $body, 'id' => $id]);

echo 'Post updated <br>';

?>