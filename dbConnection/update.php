<?php
// Database Details
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Admin123!!');
define('DB_NAME', 'simpledb');

// PDO Connections
try {
    $options = array (
        PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8',
    );
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $dbConnect = new PDO($dsn, DB_USER, DB_PASS, $options);
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}


// SQL Query
$sql = "UPDATE `users` SET `city` = :city, `phone` = :tel WHERE `id` = :id";
$query = $dbConnect->prepare($sql);

// Binding Parameters

$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':tel', $tel, PDO::PARAM_INT);
$query->bindParam(':id', $id, PDO::PARAM_INT);

// Define Values
$city = "Tanta";
$tel = "01111111111";
$id = 22;

// Execute
$query->execute();

//Checking
if ($query->rowCount() > 0) {
    $count = $query->rowCount();
    echo $count . "rows were affected";
} else {
    echo "No affected rows";
}