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
    // VALUES (NULL, 'Vijay', 'Kumar', 'vijay@gmail.com')" ;
    // $result = mysqli_query($connect , $sql);

    // if($result){
    //     echo "Data inserted successfully <br> <br>";
    // }else{
    //     echo "Data not inserted";
    // }



                    //  // Delete  the Data in table

                    //     $delete    = "DELETE FROM `myguests`  WHERE `firstname` = 'vijay' ";
                    //     $result   = mysqli_query($connect,$delete);

                    //     if($result){
                    //         echo "data deleted successfully <br>";
                    //     }else{
                    //         echo "data deleted failed";
                    //     }






// MySQL provides a LIMIT clause that is used to specify the number of records to return.
    $sql =  "SELECT * FROM  myguests LIMIT 5";
    
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