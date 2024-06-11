<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="registrationForm" action="save.php" method="post">
            <h2>Registration Form</h2>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="FirstName" value="<?php echo isset($firstName) ? $firstName : ''; ?>">
                <span class="error"><?php echo isset($errors['FirstName']) ? $errors['FirstName'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="LastName" value="<?php echo isset($lastName) ? $lastName : ''; ?>">
                <span class="error"><?php echo isset($errors['LastName']) ? $errors['LastName'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>
