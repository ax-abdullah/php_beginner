<?php
if(isset($_POST['submit'])){
    require_once 'database.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("location: ../login.php?please&fill&all&fields");
        exit();
    }
    // header("location: ../login.php?username=$username&password=$password");

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?errors=sql&error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);
    if($row = mysqli_fetch_assoc($result)){
        if(password_verify($password,$row['password'])){
            // generate a session
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['usersession'] = $row['username'];
            header('location: ../index.php?message=success');
            exit();
        }else{
            header("location: ../login.php?errors=wrong&password");
        }
    }
    else{
        header("location: ../login.php?errors=user&not&found");
    }

}    else{
    header("location: ../index.php?errors=access&forbidden");
}
