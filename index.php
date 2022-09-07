    <?php
        require_once('includes/header.php');
        // session_start();
        if(isset($_SESSION['id'])){
            echo "you are logged in ".$_SESSION['usersession']."<br>";
        }
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
