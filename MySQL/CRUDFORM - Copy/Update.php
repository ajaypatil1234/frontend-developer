    <?php

        include 'ConnectDB.php';

        $id = $_GET['id'];

        $sql = "SELECT * FROM user_info WHERE id = $id";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result); 

    

        if(isset($_POST['submit'])){

            $fullname =          mysqli_real_escape_string($connect, $_POST['Fullname']);
            $email =             mysqli_real_escape_string($connect, $_POST['Email']);
            $password =         mysqli_real_escape_string($connect, $_POST['Password']);
            $contactNumber =    mysqli_real_escape_string($connect, $_POST['ContactNumber']);
            $dob =             mysqli_real_escape_string($connect, $_POST['DOB']);
            $comments =         mysqli_real_escape_string($connect, $_POST['Comments']);
            $gender =          mysqli_real_escape_string($connect, $_POST['Gender']);
            $countries =        mysqli_real_escape_string($connect, $_POST['Countries']);
            $city =              mysqli_real_escape_string($connect, $_POST['City']);


            $sql_Update = "UPDATE user_info SET
               Fullname =   '$fullname',
               Email =      '$email',
               Password =   '$password', 
               ContactNumber = '$contactNumber', 
               DOB =         '$dob', 
               Comments =     '$comments', 
               Gender =      '$gender', 
               Countries = '$countries', 
               City =       '$city' 
               WHERE id =   $id";


            if(mysqli_query($connect, $sql_Update)){
                header("Location: View.php");
            }
            else{
                  echo "Error updating record: " . mysqli_error($connect);
            }


        }

    
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Comprehensive HTML Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3a1c71, #d76d77, #ffaf7b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }
        .form-header {
            background: black;
            color: white;
            padding: 10px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
            margin: -30px -30px 20px -30px;
        }

        .groupdiv{
            display: flex;
            align-items: center;
            gap: 30px;
        }
        
        .citygroupP{
            margin-top: 10px;
        }

        .btn-submit {
            background: #ff5e6c;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: #ff3a50;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h3>Update Form</h3>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="Fullname" value="<?php echo $row['Fullname']; ?>">
            </div>

        

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="Email" value="<?php echo $row['Email']; ?>">
            </div>

                <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="Password" value="<?php echo $row['Password']; ?>">
            </div>

            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="tel" class="form-control" id="contactNumber" name="ContactNumber" value="<?php echo $row['ContactNumber']; ?>" placeholder="00000-000000" autocomplete="off">
            </div>


            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="DOB" value="<?php echo $row['DOB']; ?>">
            </div>

            
                  <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea class="form-control" id="comments" name="Comments" rows="4"><?php echo htmlspecialchars($row['Comments']); ?></textarea>
                </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check groupdiv">
                    <input type="radio" class="form-check-input" id="genderMale" name="Gender" value="male" <?php if($row['Gender'] == 'male') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="genderFemale" name="Gender" value="female"  <?php if($row['Gender'] == 'female') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
            </div>

            <label>Countries you have visited:</label>
            <div class="form-group groupdiv">
                <div class="form-check groupdiv">
                    <input type="checkbox" class="form-check-input" id="countryUSA" name="Countries" value="USA" <?php if($row['Countries'] == 'USA') echo 'checked'; ?>>
                    <label class="form-check-label" for="countryUSA">USA</label>
                </div>
                <div class="form-check groupdiv">
                    <input type="checkbox" class="form-check-input" id="countryCanada" name="Countries" value="Canada" <?php if($row['Countries'] == 'Canada') echo 'checked'; ?>>
                    <label class="form-check-label" for="countryCanada" >Canada</label>
                </div>
                <div class="form-check groupdiv">
                    <input type="checkbox" class="form-check-input" id="countryUK" name="Countries" value="UK" <?php if($row['Countries'] == 'UK') echo 'checked'; ?>>
                    <label class="form-check-label" for="countryUK">UK</label>
                </div>
                <div class="form-check groupdiv">
                    <input type="checkbox" class="form-check-input" id="countryAustralia" name="Countries" value="Australia" <?php if($row['Countries'] == 'Australia') echo 'checked'; ?>>
                    <label class="form-check-label" for="countryAustralia">Australia</label>
                </div>
                <div class="form-check groupdiv">
                    <input type="checkbox" class="form-check-input" id="countryIndia" name="Countries" value="India" <?php if($row['Countries'] == 'India') echo 'checked'; ?>>
                    <label class="form-check-label" for="countryIndia">India</label>
                </div>
            </div>

            <div class="form-group citygroup">
                <label for="city">City:</label>
                <select class="form-control" id="city" name="City">
                    <option <?php if($row['City'] == 'New York') echo 'selected'; ?>>New York</option>
                    <option <?php if($row['City'] == 'Los Angeles') echo 'selected'; ?>>Los Angeles</option>
                    <option <?php if($row['City'] == 'Chicago') echo 'selected'; ?>>Chicago</option>
                    <option <?php if($row['City'] == 'Houston') echo 'selected'; ?>>Houston</option>
                    <option <?php if($row['City'] == 'Phoenix') echo 'selected'; ?>>Phoenix</option>
                </select>
            </div>

            <button type="submit"  name="submit" class="btn btn-submit btn-warning btn-block">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
