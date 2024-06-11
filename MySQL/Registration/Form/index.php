<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            background-color: #000000;
            color: #ffffff;
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
            width: 40%;
            margin: 0 auto;
            box-shadow: 0px 0px 15px #ccc;
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
        .gender {
            display: flex;
            gap: 25px;
        }
        select {
            padding: 10px;
            border: 1px solid #fff;
        }
    </style>
</head>
<body>
<section class="Account_Form">
    <div class="container">
        <div class="row">
            <form id="signup" action="MySQL.php" method="post">
                <div class="form_content">
                    <div class="form_heading">
                        <h1>Create New Account</h1>
                        <p>Already Registered? Login</p>
                    </div>

                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Please Enter Name" />

                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Please Enter Email" />

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Please Enter Password" />

                    <label for="city">City</label>
                    <input type="text" name="city" placeholder="Please Enter City" />

                    <label for="gender">Gender</label>
                    <input type="text" name="gender" placeholder="Please Enter Gender" />

                    <input type="submit" value="Sign up" name="save" />
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
