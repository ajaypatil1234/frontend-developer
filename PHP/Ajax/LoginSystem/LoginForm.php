<?php
session_start();

$errors = []; // Array to store validation errors

if(isset($_POST['submit'])){
    // Check if email and password are provided
    if(empty($_POST['email']) || empty($_POST['password'])){
        if(empty($_POST['email'])){
            $errors['email'] = 'Email is required';
        }
        if(empty($_POST['password'])){
            $errors['password'] = 'Password is required';
        }
    } else {
        $email = $_POST['email'];
        $password = md5($_POST['password']); 

        // Database connection
        $conn = new mysqli("localhost", "root", "", "registrationform");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

         

        // Query to check user credentials
        $sql = "SELECT * FROM `form` WHERE `email`='$email' AND `password`='$password'";
        $result = $conn->query($sql);

        // Check if there is a row with matching email and password
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['firstName'] = $row['FirstName'];
            header("Location: Dashboard.php");
            exit();
        } else {
            $errors['login'] = "Invalid email or password.";
        }

        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
 <style>
  
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    }

    .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    }

    h2 {
    text-align: center;
    margin-bottom: 20px;
    }

    .form-group {
    margin-bottom: 15px;
    }

    label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    }

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #5cb85c;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}
a{
    color:black;
    text-decoration : none;
}

.error{
    color:red;
}
.BackButton .btn{
    background-color : blue;
}
    </style>
</head>
 
<body>


    <div class="container">
        <form id="loginForm" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <?php if(isset($errors['email'])) { ?>
                    <span class="error"><?php echo $errors['email']; ?></span>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <?php if(isset($errors['password'])) { ?>
                    <span class="error"><?php echo $errors['password']; ?></span>
                <?php } ?>
            </div>
            <button type="submit" name="submit">Login</button>
            <?php if(isset($errors['login'])) { ?>
                <div class="error"><?php echo $errors['login']; ?></div>
            <?php } ?>
            
        </form>
    </div>
</body>
</html>
