<?php
    
    // Create Table 
        
        $sqltable = "CREATE TABLE users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            email VARCHAR(100),
            password VARCHAR(100),
            website VARCHAR(100),
            gender VARCHAR(100),
             city VARCHAR(100)
        )";

         // if (mysqli_query($conn, $sqltable)) {
    //     echo "Table MyGuests created successfully <br>";
    // } else {
    //     echo "Error creating table: " . mysqli_error($conn);
    // }

?>
