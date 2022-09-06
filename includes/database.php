<?php 
    $dbHost = "localhost";
    $dbName = "php-tut";
    $dbuser = "root";
    $dbPass = "";

    $connection = mysqli_connect($dbHost, $dbuser, $dbPass, $dbName);

    if(!$connection){
        echo "Database Connection Faild!";
        die();
    }
?>