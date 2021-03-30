<?php
//Database Details
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Admin123!!');
define('DB_NAME', 'simpledb');

//PDO Connection
try {
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8',
    );
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" .DB_NAME;
    $dbConnect = new PDO ($dsn, DB_USER, DB_PASS, $options);
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

// Query
$sql = "SELECT * FROM users";
$query = $dbConnect->prepare($sql);

// Binding VARs
//$query->bindParam(':city', $city, PDO::PARAM_STR);

// Input Values
$city = "Cairo";

// Execute
$query->execute();

//Pulled Data
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query ->rowCount() > 0) {
    foreach ($results as $result) {
        echo $result->name . ", " . $result->phone . ", " . $result->city ."<br />";
    }
}