<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demotable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['city'], $_POST['gender'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO register (name, email, password, city, gender) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $password, $city, $gender);
    
    if ($stmt->execute() === TRUE) {
        // Redirect to Showtable.php
        header("Location: Showtable.php");
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
