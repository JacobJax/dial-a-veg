<?php
$host = 'localhost';
$username = 'yoshi';
$dbname = 'dial_a_veg';
$password = 'esting123';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>