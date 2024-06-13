<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
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

    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Get user ID
        $userId = $_POST['userId'];

        // Delete user
        $sql = "DELETE FROM user WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userId);

        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'add') {
        // Get form data
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];

        // Insert user data
        $sql = "INSERT INTO user (firstName, lastName, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $firstName, $lastName, $email);

        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Get form data
        $userId = $_POST['userId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];

        // Update user data
        $sql = "UPDATE user SET firstName=?, lastName=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $firstName, $lastName, $email, $userId);

        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
