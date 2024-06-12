<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $fields = ['FirstName', 'LastName', 'email', 'password'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = ucfirst($field) . ' is required';
        }
    }

    // If no errors, proceed with form processing (e.g., saving to database)
    if (empty($errors)) {
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "registrationform";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize input data again before inserting into the database
        $firstName = htmlspecialchars(trim($_POST['FirstName']));
        $lastName = htmlspecialchars(trim($_POST['LastName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $hashedPassword = md5($password);

        // Insert data into the database
        $sql = "INSERT INTO `form` (`FirstName`, `LastName`, `email`, `password`) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to login form
            header("Location: LoginForm.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
}

// Include the form again with error messages
include 'RegistrationForm.php';
?>
