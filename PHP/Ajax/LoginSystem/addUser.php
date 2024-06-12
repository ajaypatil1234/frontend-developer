<?php

$server = "localhost";
$username = "root";
$password = "";
$dbName = "adminpanel";

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    // $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO user (FirstName, LastName, email, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
$imagePath = ''; // Initialize image path variable

if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = basename($_FILES["image"]["name"]);
    move_uploaded_file($tmp_name, "upload/$name");
    $imagePath = "upload/$name";
}

$sql = "INSERT INTO user (FirstName, LastName, email, image) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssss", $firstName, $lastName, $email, $imagePath);


    // Bind parameters
    $stmt->bind_param("sssb", $firstName, $lastName, $email, $imageData);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $sql = "SELECT * FROM  user ORDER BY id ASC ";
        $result = mysqli_query($conn, $sql);

        if ($result){
                    if($result->num_rows === 0){
                        echo "<h1>Not Record Found</h1>";
                    }else{

                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                           echo "
                            <table id='userTable'>
                            <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            </tr>

                           " ;

                        echo "<tr data-userid='" . htmlspecialchars($row["id"]) . "'>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["FirstName"]) . "</td>
                                <td>" . htmlspecialchars($row["LastName"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) ."</td>
                                <td>
                                    <button class='btn btn-info viewBtn'>View</button>
                                    <button class='btn btn-warning editBtn'>Edit</button>
                                    <button class='btn btn-danger deleteBtn'>Delete</button>
                                </td>
                              </tr>"
                              
                              ;
                    }
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }





    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
