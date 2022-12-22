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

// DELETE DATA

$id = 2;

$sql = 'DELETE FROM posts WHERE id = :id';
$stmt = $pdo -> prepare ($sql);
$stmt -> execute (['id' => $id]);
echo 'Post deleted <br>';


?>