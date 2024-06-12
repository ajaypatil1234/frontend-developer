<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "adminPanel";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form data for adding a new user is present
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])) {
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);

        if (empty($id)) {
            // Insert data into the database
            $sql = "INSERT INTO user (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
            if (mysqli_query($conn, $sql)) {
                echo 1; // Return success
              
            } else {
                echo 0; // Return failure
            }
        }
    }

    // Check if the action is to delete a user
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Get user ID
        $userId = $_POST['userId'];

        // Delete user
        $sql = "DELETE FROM user WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userId);

        if ($stmt->execute()) {
            echo "Success"; // Return success
        } else {
            echo "Error: " . $stmt->error; // Return error
        }

        $stmt->close();
    } else {
        // Get form data for updating user details
        $userId = $_POST['userId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];

        // Update user data
        $sql = "UPDATE user SET firstName=?, lastName=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $firstName, $lastName, $email, $userId);

        if ($stmt->execute()) {
            echo "Success"; // Return success
        } else {
            echo "Error: " . $stmt->error; // Return error
        }

        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
