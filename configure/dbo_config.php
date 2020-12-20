<?php
// // dev server
// $host = 'localhost';
// $username = 'yoshi';
// $dbname = 'dial_a_veg';
// $password = 'esting123';

// production server
$host = 'remotemysql.com';
$username = '69AUP95Yt4';
$dbname = '69AUP95Yt4';
$password = 'ezmcbDwDP3';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>