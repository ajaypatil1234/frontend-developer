<?php

    include('ConnectDB.php');



    $id  =  $_GET['id'];
    $sql = "DELETE FROM user_info WHERE id = $id";
    
    $result = mysqli_query($connect, $sql);
    if($result){
        header("Location: View.php");
    }







?>

