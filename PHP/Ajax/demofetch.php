<?php

// Step 1: Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "db_sms");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Handle form submission (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Handle deletion
    if (isset($_POST['deleteid'])) {
        $deleteid = $_POST['deleteid'];
        $sql = "DELETE FROM myguests WHERE id = $deleteid";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    // Handle fetching data for edit
    if (isset($_POST['editid'])) {
        $editid = $_POST['editid'];
        $sql = "SELECT * FROM myguests WHERE id = $editid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        }
        exit;
    }

    // Handle fetching data for view
    if (isset($_POST['viewid'])) {
        $viewid = $_POST['viewid'];
        $sql = "SELECT * FROM myguests WHERE id = $viewid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        }
        exit;
    }

    // Handle insertion and updating
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])) {
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);

        if (empty($id)) {
            // Insert data into the database
            $sql = "INSERT INTO myguests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
            if (mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            // Update data in the database
            $sql = "UPDATE myguests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo 0;
            }
        }
        exit; // Stop script execution after handling POST request
    }
}

// Step 3: Fetch data from the database
$sql = "SELECT * FROM myguests ORDER BY id ASC";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

$output = "";

// Check if there are records
if (mysqli_num_rows($result) > 0) {
    // Loop through the records and create table rows
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr class='text-center'>
                        <td>{$row['id']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <button class='btn btn-info' onclick='ViewUser({$row['id']})'>View</button>
                            <button class='btn btn-primary' onclick='EditUser({$row['id']})'>Edit</button>
                            <button class='btn btn-danger' onclick='DeleteUser({$row['id']})'>Delete</button>
                        </td>
                    </tr>";
    }
} else {
    // If no records are found, display a message
    $output .= "<tr><td colspan='5'>No Records Found</td></tr>";
}

// Print the output (HTML table rows)
echo $output;

// Step 4: Close the database connection
mysqli_close($conn);
?>
