<?php

                // Create Databases ;

        $sql  = "create database php_form";
        $result = mysqli_query($conn , $sql);

        if($result){
                echo "Database created successfully";
        }else{
                echo "Database created failed";
        }


?>

