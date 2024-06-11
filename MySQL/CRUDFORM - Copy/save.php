<?php

    include 'ConnectDB.php';
  
    
    // create Database     
 

    // $create_database = "CREATE DATABASE CrudForm";
    // $result = mysqli_query($connect , $create_database);

    // if($result){
    //     echo "Database created successfully";
    // }else{
    //     echo "Database creation failed: " . mysqli_error($connect);
    // }


    //  Create Table 

    //   $sql =  "CREATE TABLE user_info(
    //     id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    //     Fullname VARCHAR(255) NOT NULL,
    //     Email VARCHAR(255) NOT NULL,
    //     Password VARCHAR(255) NOT NULL,
    //     ContactNumber INT(10) NOT NULL,
    //     DOB DATE NOT NULL,
    //     Comments TEXT NOT NULL,
    //     Gender VARCHAR(255) NOT NULL,
    //     Countries VARCHAR(255) NOT NULL,
    //     City VARCHAR(255) NOT NULL
    //     )";

    
        

    //     $result = mysqli_query($connect , $sql);

    //     if($result){
    //         echo "Table created successfully";
    //     }else{
    //         echo "Table creation failed: " . mysqli_error($connect);
    //     }


    $Fullname = $_POST['Fullname'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ContactNumber = $_POST['ContactNumber'];
    $DOB = $_POST['DOB'];
    $Comments = $_POST['Comments'];
    $Gender = $_POST['Gender'];
    $Countries = $_POST['Countries'];
    $City = $_POST['City'];



    // data Insert in Table 

    $sql = "INSERT INTO user_info(Fullname , Email , Password , ContactNumber , DOB , Comments , Gender , Countries , City) 
    VALUES ('$Fullname' , '$Email' , '$Password' , '$ContactNumber' , '$DOB' , '$Comments' , '$Gender' , '$Countries' , '$City')";

    $result = mysqli_query($connect , $sql);

    if($result){
        echo "Data inserted successfully";
        header("Location: View.php");
    }else{
        echo "Data insertion failed: " . mysqli_error($connect);
    }



?>