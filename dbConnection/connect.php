<?php

/*** Definaions */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Admin123!!');
define('DB_NAME', 'simpledb');

/*** Connection */
try {
    $dbOptions = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    );
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $dbConnect = new PDO ($dsn, DB_USER, DB_PASS, $dbOptions);
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e) {
    exit("ERORR: Please connect your system developer ");
}

$sql = "INSERT INTO users (`name`, `phone`, `city`, `date_added`) VALUES (:name, :phone, :city, :date)";
$query = $dbConnect-> prepare($sql);

$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_INT);
$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':date', $date, PDO::PARAM_STR);

$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$date = date('Y-m-d h:m:s');

$query-> execute();