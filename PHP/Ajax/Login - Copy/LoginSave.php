<?php
session_start();

if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrationform";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a SQL statement
    $stmt = $conn->prepare("SELECT * FROM `form` WHERE `email`=? AND `password`=?");
    
    // Bind parameters to the statement
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there is a row with matching email and password
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['firstName'] = $row['FirstName'];
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
