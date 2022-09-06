<<<<<<< HEAD
<?php 
    require_once('includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php $connection ?>
</body>
</html>
||||||| empty tree
=======
    <?php
        require_once('includes/header.php');

        $sql = 'SELECT * FROM users';
        $result = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($result);
        // echo $rowCount;
        // $rows =  mysqli_fetch_all($result);
        // print_r($rows);
        if($rowCount){
            while($row = mysqli_fetch_assoc($result)){
                echo $row['id']. " ".$row['username']. "<br>";
            }
        }
        else{
            echo "No results found!";
        }
        require_once 'includes/footer.php';
    ?>
>>>>>>> 3d1a561e1d7d438753d37d26f1b63f2aee4f3c4b
