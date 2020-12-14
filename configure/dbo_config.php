<?php
$host = 'localhost';
$username = 'yoshi';
$dbname = 'p_blog';
$password = 'esting123';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>