<?php


    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_sms";

    // Create connection
    $conn = new mysqli($server, $username, $password, $database);

    $sql = "INSERT INTO myguests (firstname , lastname) VALUES ('{$firstname}', '{$lastname}') ";

    if(mysqli_query($conn , $sql)){
        echo 1;
    }else{
        echo 0 ;
    }

?>