<?php
if(isset($_POST['submit'])){
    require_once 'database.php';
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
    else{
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?errors=mysql&error");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if($rowCount > 0){
                header("location: ../register.php?errors=user&already&registered");
                exit();
            }
            else{
                $sql = "INSERT INTO users (username, password) VALUES (?,?)";
                $stmt = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../register.php?errors=sql&error");
                    exit();
                }
                else{
                    $hased = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $username, $hased);
                    mysqli_stmt_execute($stmt);
                    header("location: ../login.php?message=success");
                }
            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

}