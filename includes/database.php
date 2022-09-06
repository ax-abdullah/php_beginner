<?php 
$dbHost = "localhost";
$dbName = "php_tut";
$dbPass = "";
$dbUser = "root";

$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$connection){
    die("Database connection failed!");
}

?>