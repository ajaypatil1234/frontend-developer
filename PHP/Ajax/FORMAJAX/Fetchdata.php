<?php

// Step 1: Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "db_sms");

if (!$conn) {
    die(json_encode(["status" => 0, "message" => "Connection failed: " . mysqli_connect_error()]));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteid'])) {
        $deleteid = $_POST['deleteid'];
        $sql = "DELETE FROM myguests WHERE id = $deleteid";
        echo (mysqli_query($conn, $sql)) ? 1 : 0;
        exit;
    }

    if (isset($_POST['editid'])) {
        $editid = $_POST['editid'];
        $result = mysqli_query($conn, "SELECT * FROM myguests WHERE id = $editid");
        echo json_encode(mysqli_fetch_assoc($result));
        exit;
    }

    if (isset($_POST['viewid'])) {
        $viewid = $_POST['viewid'];
        $result = mysqli_query($conn, "SELECT * FROM myguests WHERE id = $viewid");
        echo json_encode(mysqli_fetch_assoc($result));
        exit;
    }

    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])) {
       
        $firstname =    mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname =     mysqli_real_escape_string($conn, $_POST["lastname"]);
        $email =        mysqli_real_escape_string($conn, $_POST["email"]);
        $id =           mysqli_real_escape_string($conn, $_POST["id"]);

        if (empty($firstname) || empty($lastname) || empty($email)) {
            echo json_encode(["status" => 0, "message" => "All fields are required."]);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["status" => 0, "message" => "Invalid email format."]);
            exit;
        }

        if (empty($id)) {
            $sql = "INSERT INTO myguests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
            echo json_encode(["status" => (mysqli_query($conn, $sql)) ? 1 : 0, "message" => "Record saved successfully."]);
        } else {
            $sql = "UPDATE myguests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id";
            echo json_encode(["status" => (mysqli_query($conn, $sql)) ? 1 : 0, "message" => "Record updated successfully."]);
        }
        exit;
    }
}

$result = mysqli_query($conn, "SELECT * FROM myguests ORDER BY id ASC");
$output = "";

if (mysqli_num_rows($result) > 0) {
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
    $output .= "<tr><td colspan='5'>No Records Found</td></tr>";
}

echo $output;
mysqli_close($conn);
?>
