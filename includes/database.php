<<<<<<< HEAD
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
||||||| empty tree
=======
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
>>>>>>> 3d1a561e1d7d438753d37d26f1b63f2aee4f3c4b
