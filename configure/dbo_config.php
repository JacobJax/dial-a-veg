<?php
// // dev server
// $host = 'localhost';
// $username = 'yoshi';
// $dbname = 'dial_a_veg';
// $password = 'esting123';

// production server
$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pwd = getenv('DB_PWD');

$pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", "$db_user" , "$db_pwd");
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>