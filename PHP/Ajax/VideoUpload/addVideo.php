<?php


// Initialize variables for form inputs
$firstName = $lastName = $email = $video = "";
$firstNameErr = $lastNameErr = $emailErr = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uservideo";
    // Validate input fields
    // if (empty($_POST["firstName"])) {
    //     $firstNameErr = "First Name is required";
    // } else {
    //     $firstName = test_input($_POST["firstName"]);
    // }

    // if (empty($_POST["lastName"])) {
    //     $lastNameErr = "Last Name is required";
    // } else {
    //     $lastName = test_input($_POST["lastName"]);
    // }

    // if (empty($_POST["email"])) {
    //     $emailErr = "Email is required";
    // } else {
    //     $email = test_input($_POST["email"]);
    //     // Check if email address is well-formed
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $emailErr = "Invalid email format";
    //     }
    // }

    // Only video is optional, so we do not need to validate it

    // If all inputs are valid, proceed to insert into database
    // if ($firstName && $lastName && $email) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       $firstName = $_POST['firstName'] ?? '';
       $lastName = $_POST['lastName'] ?? '';
       $email = $_POST['email'] ?? '';
       $video = $_FILES['video'] ?? null;
     
       if ($video && $video['error'] === UPLOAD_ERR_OK) {

        $file_name = $_FILES['video']['name'];
        $file_size = $_FILES['video']['size'];
        $file_tmp =  $_FILES['video']['tmp_name'];
        $file_type = $_FILES['video']['type'];
        $target = "uploads/" . basename($file_name);

        // SQL statement to insert data
        if (move_uploaded_file($file_tmp, $target)) {
              $sql = "INSERT INTO user (firstName, lastName, email, video) VALUES ('$firstName', '$lastName', '$email', '$video')";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">New record created successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
                }
         }else {
            $response = array('status' => 'error', 'message' => 'Failed to upload image.');
        }        

        $conn->close();
    }
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Display Users</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Add User</h2>
            <!-- User Form -->
            <form id="addUserForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                    <span class="text-danger"><?php echo $firstNameErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                    <span class="text-danger"><?php echo $lastNameErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    <span class="text-danger"><?php echo $emailErr; ?></span>
                </div>
               <div class="form-group">
                    <label for="video">Video Upload</label>
                    <input type="file" class="form-control-file" id="video" name="video">
                    <small class="form-text text-muted">Upload video files only (MP4, MOV, etc.)</small>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Users List</h2>
            <!-- Display Users -->
            <?php
                     $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "uservideo";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch all users
            $sql = "SELECT id, firstName, lastName, email, video FROM user";
            $result = $conn->query($sql);

            // Display data in a table
            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Video</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["id"]."</td><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["email"]."</td><td>".$row["video"]."</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
