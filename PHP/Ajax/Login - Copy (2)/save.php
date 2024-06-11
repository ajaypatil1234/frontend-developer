<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $firstName = htmlspecialchars(trim($_POST['FirstName']));
    $lastName = htmlspecialchars(trim($_POST['LastName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate input data
    if (empty($firstName)) {
        $errors['FirstName'] = 'First Name is required';
    }

    if (empty($lastName)) {
        $errors['LastName'] = 'Last Name is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
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

         $hashedPassword = md5($password);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `form` (`FirstName`, `LastName`, `email`, `password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email,  $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to login form
            header("Location: LoginForm.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close connections
        $stmt->close();
        $conn->close();
    }
}

// Include the form again with error messages
include 'RegistrationForm.php';
?>
