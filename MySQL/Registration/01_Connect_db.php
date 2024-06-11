<?php

        $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "php_form";

        $conn =  mysqli_connect($servername, $username , $password , $dbname);

        // check Connection 
        if(!$conn){
            die("Connection Failed: " . mysqli_connect_error());
        }else{
            echo "Successfully Connected <br>";
        }


    


?>