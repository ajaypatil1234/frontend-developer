<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sms";


    $connect  = new mysqli($server , $username , $password , $dbname);

    if($connect->connect_error){
        die("Connection Failed : " . $connect->connect_error);
    }else{
        echo "Connected Successfully <br>";
    }

        // Usage of where clause of fetch data from the database;

    $sql =  "SELECT * FROM  myguests WHERE firstname = 'jayeshree '";
    
    $result = mysqli_query($connect , $sql);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
        }
    }else{
        echo "0 results";
    }

    $connect->close();



?>