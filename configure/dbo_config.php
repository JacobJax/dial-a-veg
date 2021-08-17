<?php
// // dev server
// $host = 'localhost';
// $username = 'yoshi';
// $dbname = 'dial_a_veg';
// $password = 'esting123';

// production server
$host = 'bep5prw5jz4yqcnr9a0w-mysql.services.clever-cloud.com';
$username = 'utzpfviupacs5h9s';
$dbname = 'bep5prw5jz4yqcnr9a0w';
$password = 'lftuwdTXJbp2aw5O3vGm';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>