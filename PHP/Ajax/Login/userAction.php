<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "userpanel";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$msg = '';

// Check if action is set through GET or POST request
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ADD operation
    if ($action == 'add') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];

        // Upload image
        $target = "uploads/" . basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert record into database
            $sql = "INSERT INTO user (firstName, lastName, email, image) VALUES ('$firstName', '$lastName', '$email', '$image')";
            if ($conn->query($sql) === TRUE) {
                $msg = '<div class="alert alert-success">User added successfully!</div>';
            } else {
                $msg = '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger">Error uploading image.</div>';
        }
    }

    // EDIT operation
    if ($action == 'edit') {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];
        $currentImage = $_POST['currentImage'];

        if (!empty($image)) {
            // Upload new image
            $target = "uploads/" . basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                // Remove old image
                if (file_exists('uploads/' . $currentImage)) {
                    unlink('uploads/' . $currentImage);
                }
            } else {
                $msg = '<div class="alert alert-danger">Error uploading new image.</div>';
            }
        } else {
            $image = $currentImage; // Keep current image if no new image is uploaded
        }

        // Update record in database
        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email', image='$image' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success">User updated successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
}

// DELETE operation
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $action == 'delete') {
    $id = $_GET['id'];

    // Retrieve image to delete from database
    $sql = "SELECT image FROM user WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];

        // Delete record from database
        $sql = "DELETE FROM user WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success">User deleted successfully!</div>';

            // Remove image from uploads folder
            if (file_exists('uploads/' . $image)) {
                unlink('uploads/' . $image);
            }
        } else {
            $msg = '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }
    }
}

// Close database connection
$conn->close();

// Redirect to userPage.php with message
header('location: userPage.php?msg=' . urlencode($msg));
exit;
?>
