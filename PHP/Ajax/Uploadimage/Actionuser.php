<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "adminPanel";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    $sql = "INSERT INTO user (firstName, lastName, email, image) VALUES ('$firstName', '$lastName', '$email', '$image')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "User added successfully with image.";
        } else {
            echo "User added successfully, but image upload failed.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM user WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (!empty($image)) {
        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email', image='$image' WHERE id=$id";
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "User updated successfully with image.";
        } else {
            echo "User updated successfully, but image upload failed.";
        }
    } else {
        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }
}
?>
