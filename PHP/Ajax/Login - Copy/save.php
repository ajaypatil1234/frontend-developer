<!-- save.php -->
<?php
if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrationform";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `form` (`FirstName`, `LastName`, `email`, `password`) VALUES ('$firstName', '$lastName', '$email', '$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: LoginForm.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
