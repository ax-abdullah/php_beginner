<?php
require_once 'database.php';
if(isset($_POST['submit'])){
    $sql = "INSERT INTO `users` (username, password) VALUES (".$_POST['username']."," .$_POST['password'].")";
    $query = mysqli_query($connection, $sql);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if(empty($username) || empty($password) || empty($confirmPassword)){
        header('location: ../register.php?errors=emptyfield&username='.$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*/", $username)){
        header("location: ../register.php?error=invalidusername&username=$username");
        exit();
    }
    else if($password !== $confirmPassword){
        header("location: ../register.php?errors=passworddoesnotmatch&username=$username");
        exit(); 
    }

}