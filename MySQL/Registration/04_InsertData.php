<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db_sms";

// Establish connection to the MySQL server and select the database
 $con = mysqli_connect($server, $username, $password, $db);
    //check connection
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    echo "Successfully Connected<br>";
}



    // Insert the Data in Table 
    $sql = "INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`) VALUES ('3', 'Rahul', 'Patil', 'rahul@gmail.com');";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "Record inserted successfully";
    }else{
        echo "Error inserting record: " . mysqli_error($con);
    }

?>

