<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    * {
      background-color: #000000;
      color: #ffff;
    }
    .Account_Form {
      margin-top: 100px;
    }
    .form_heading {
      text-align: center;
    }
    .form_content {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding: 20px;
      width: 50%;
      margin: 0 auto;
      box-shadow: 0px 0px 50px #ccc;
    }
    input[type="submit"] {
      width: 40%;
      background-color: #fff;
      color: #000000;
      margin: 0 auto;
      padding: 10px;
      font-weight: 700;
    }
    .form_content input {
      padding: 10px;
      border: 1px solid #fff;
    }
    span {
      color: red;
    }
  </style>
</head>
<body>

<?php
$userName = $userEmail = $userPass = $userCity = "";
$name = $email = $password = $city = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['name'])) {
        $userName = "Name is Required";
    } else {
        $name = test_input($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $userEmail = "Email is Required";
    } else {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $userPass = "Password is Required";
    } else {
        $password = test_input($_POST['password']);
    }

    if (empty($_POST['city'])) {
        $userCity = "City is Required";
    } else {
        $city = test_input($_POST['city']);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;  // Return the sanitized data
}
?>
      
<!-- form  -->
<section class="Account_Form">
  <div class="container">
    <div class="row">
      <form id="signup" action="Formdata.php" method="post">
        <div class="form_content">
          <div class="form_heading">
            <h1>Create New Account</h1>
            <p>Already Registered? Login</p>
          </div>
          <label for="name">Name</label>
          <input type="text" name="name" placeholder="Please Enter Name" />
          <span><?php echo $userName ?></span>

          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Please Enter Email" />
          <span><?php echo $userEmail ?></span>

          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Please Enter Password" />
          <span><?php echo $userPass ?></span>

          <label for="city">City</label>
          <input type="text" name="city" placeholder="Enter City" />
          <span><?php echo $userCity ?></span>

          <input type="submit" value="Sign up" name="save" />
        </div>
      </form>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
