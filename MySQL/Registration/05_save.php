<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {

        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "php_form";

        // Create connection
        $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);







        // Check connection
        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }
         else {

            // echo "Successfully Connected <br>";
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];                                
                    $website = $_POST['website'];
                    $gender = $_POST['gender'];
                    $city = $_POST['city'];

                    // Prepare SQL statement
                    $sql = "INSERT INTO users (name, email, password, website, gender , city) 
                    VALUES ('$name', '$email', '$password', '$website', '$gender' , '$city')";

                        // Execute SQL statement
                        if (mysqli_query($conn, $sql)) {
                            echo "Data inserted successfully <br>";
                            header("Location: 06_viewPage.php");
                        
                        } else {
                            echo "Data insertion failed: " . mysqli_error($conn);
                        }
                        
                    // Close connection
                        mysqli_close($conn);


                }   
                        
                      

                            // this get last id a
                        //   $last_id = mysqli_insert_id($conn);
                        //   echo "Data inserted successfully. Last inserted ID is: " . $last_id . "<br>";
                        

            }
        
?>
