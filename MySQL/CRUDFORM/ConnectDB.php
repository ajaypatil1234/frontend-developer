<?php

  $server = "localhost";
    $user="root";
    $password= "";
    $database = "crudform";

    $connect = mysqli_connect($server , $user , $password , $database);

    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        // echo "Connected successfully";
    }



?>