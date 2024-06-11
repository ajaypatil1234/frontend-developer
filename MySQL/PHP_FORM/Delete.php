<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "B2BFORM";

    $connect = mysqli_connect($server, $username, $password, $database);

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }else{
        echo "Connection Successfull <br>";
    }
 


    

    $id = $_GET['id'];

    $sql = "DELETE FROM B2BTable WHERE id = $id";

     mysqli_query($connect, $sql);

     header("Location: ShowTable.php");


?>
    
