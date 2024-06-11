<?php
  

$server = "localhost";
$username = "root";
$password = "";
$database = "B2BFORM";

$connect = mysqli_connect($server, $username, $password, $database);

if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}



$id = $_GET['id'];

// Fetch data to display in the form
$sql = "SELECT * FROM B2BTable WHERE id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result); 



// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
    $full_name =    mysqli_real_escape_string($connect, $_POST['Full_Name']);
    $contact_no =   mysqli_real_escape_string($connect, $_POST['Contact_No']);
    $email =        mysqli_real_escape_string($connect, $_POST['Email']);
    $gender =       mysqli_real_escape_string($connect, $_POST['Gender']);
    $city =         mysqli_real_escape_string($connect, $_POST['City']);
    $address =      mysqli_real_escape_string($connect, $_POST['Address']);
    $id =           mysqli_real_escape_string($connect, $_POST['id']);

    // Update query
    $sql_update = "UPDATE B2BTable SET 
        Full_Name='$full_name', 
        Contact_No='$contact_no', 
        Email='$email', 
        Gender='$gender', 
        City='$city', 
        Address='$address'
        WHERE id=$id";

    if (mysqli_query($connect, $sql_update)) {
        // echo "Record updated successfully";
        header("Location: ShowTable.php");
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrao cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- style.css  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>


            <section class="mt-5">
            <div class="container ">
                <div class="row ">
                <div class="heading-container">
                    <h1 class="update-heading">Update Data</h1>
                     </div>
                    <div class="form_row">

                <!-- This is Image Section  -->
                        <div class="col-lg-7 col-md-6 col-12">
                        <div class="b2b_left_block">
                           <img src="image/updateimg.png" class="img-fluid b2b-img" alt="B2B-image">
                        <h1 class="b2b-title">
                        Update your important information
                        </h1>
                        <p class="common-paragraph">to accelerate the speed of your digital expansion.</p>
                        </div>
                        </div>



                <!-- this IS Form section  -->
            <div class="col-lg-5">

            <form class="B2B_form"  method="POST">
                
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <div class="mb-3">
            <label class="form-label required">Full Name</label>
            <input type="text" class="form-control input_text" name="Full_Name" placeholder="Enter Name" id="full_name" value="<?php echo $row['Full_Name']; ?>">
            </div>

            <div class="mb-3">
            <label for="contact_no" class="form-label required">Contact No.</label>
            <div class="input-group">
            <span class="input-group-text" id="basic-addon1">+91</span>
            <input type="text" class="form-control" name="Contact_No" id="contact_no" placeholder="00000-00000" autocomplete="off" value="<?php echo $row['Contact_No']; ?>">
            </div>
            </div>


            <div class="mb-3">
            <label for="InputEmail" class="form-label required">Mail ID</label>
            <input type="email" name="Email" class="form-control" id="InputEmail" placeholder="Enter Email" aria-describedby="email" autocomplete="off" value="<?php echo $row['Email']; ?>">
            </div>


          <div class="mb-3">
         <label for="dealer_name" class="form-label required">Gender</label>
        <div class="gender-option">
        <div class="form-check">
            <input type="radio" name="Gender" class="form-check-input" value="male" id="male" <?php if($row['Gender'] == 'male') echo 'checked'; ?>>
            <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="Gender" class="form-check-input" value="female" id="female" <?php if($row['Gender'] == 'female') echo 'checked'; ?>>
            <label for="female" class="form-check-label">Female</label>
        </div>
        <div class="form-check">
            <input type="radio" name="Gender" class="form-check-input" value="other" id="other" <?php if($row['Gender'] == 'other') echo 'checked'; ?>>
            <label for="other" class="form-check-label">Other</label>
        </div>
    </div>
</div>

    

            <div class="mb-3">
            <label for="city" class="form-label required">City</label>
            <select name="City" class="form-select">
                 <option <?php if($row['City'] == 'Select City') echo 'selected'; ?>>Select City</option>
                 <option <?php if($row['City'] == 'Mumbai') echo 'selected'; ?>>Mumbai</option>
                 <option <?php if($row['City'] == 'Delhi') echo 'selected'; ?>>Delhi</option>
                 <option <?php if($row['City'] == 'Kolkata') echo 'selected'; ?>>Kolkata</option>
                 <option <?php if($row['City'] == 'Chennai') echo 'selected'; ?>>Chennai</option>
                        </select>
            </select>
            </div>



            <div class="mb-3">
            <label for="address" class="form-label required"> Address</label>
            <input type="text" name="Address" id="dealer_address" class="form-control input_address" placeholder="Enter Address" autocomplete="off" value="<?php echo $row['Address']; ?>">
            </div>

            <div class="B2B_sub_btn">
            <button type="submit" name="submit" class="mt-2 common-button">
            Update
            </button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </section>

<!-- Bootstrap script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
