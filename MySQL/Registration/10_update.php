<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sms";


    $connect  = new mysqli($server , $username , $password , $dbname);

    if($connect->connect_error){
        die("Connection Failed : " . $connect->connect_error);
    }else{
        echo "Connected Successfully <br> <br>";
    }


    // Insert The data 

    // $sql = "INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`) 
    // VALUES (NULL, 'Vijay', 'Kumar', 'vijay@gmail.com')";
    // $result = mysqli_query($connect , $sql);

    // if($result){
    //     echo "Data inserted successfully <br> <br>";
    // }else{
    //     echo "Data not inserted";
    // }



      // Update the Data 


    $sql = "UPDATE `myguests` SET `firstname` = 'Nikhil' WHERE `myguests`.`id` = 10";
    $result2 = mysqli_query($connect , $sql);

      // this is used to get the number of rows affected by the query
    $aff = mysqli_affected_rows($connect);
     echo "Affected rows : " . $aff . "<br> ";


    if($result2){
        echo " Data updated successfully <br> <br>";
    }else{
        echo "Data not updated";
    }


    






    $sql =  "SELECT * FROM  myguests";
    
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