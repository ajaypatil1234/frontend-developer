<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "adminPanel";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
    $target = "uploads/" . basename($image);

    $sql = "INSERT INTO user (firstName, lastName, email, image) VALUES ('$firstName', '$lastName', '$email', '$image')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $_SESSION['message'] = "User added successfully with image.";
        } else {
            $_SESSION['message'] = "User added successfully, but image upload failed.";
        }
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM user WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "User deleted successfully.";
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
    $target = "uploads/" . basename($image);

    // Check if a new image is uploaded
    if (!empty($image)) {
        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email', image='$image' WHERE id=$id";
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $_SESSION['message'] = "User updated successfully with new image.";
        } else {
            $_SESSION['message'] = "User updated successfully, but image upload failed.";
        }
    } else {
        // If no new image is uploaded, update other fields only
        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "User updated successfully.";
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }
    header('Location: index.php');
    exit();
}

// Fetch user details for viewing
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $viewData = [
            'id' => $row['id'],
            'firstName' => $row['firstName'],
            'lastName' => $row['lastName'],
            'email' => $row['email'],
            'image' => $row['image']
        ];
        echo json_encode($viewData); // Output as JSON for AJAX
        exit();
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-5" data-bs-toggle="modal" data-bs-target="#addUserModal">
  Add user
</button>

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="index.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="addFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="addFirstName" name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="addLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="addLastName" name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="addEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="addEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="addImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="addImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <table id="userTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Fetch users from the database and display here -->
            <?php
            $sql = "SELECT * FROM user ORDER BY id ASC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['firstName']}</td>
                        <td>{$row['lastName']}</td>
                        <td>{$row['email']}</td>
                        <td><img src='uploads/{$row['image']}' width='50'></td>
                        <td>
                            <a href='index.php?delete={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            <button class='btn btn-success btn-sm editBtn' data-bs-toggle='modal' data-bs-target='#editUserModal'
                                data-id='{$row['id']}' data-firstname='{$row['firstName']}' data-lastname='{$row['lastName']}' data-email='{$row['email']}'>
                                Edit
                            </button>
                            <button class='btn btn-primary btn-sm viewBtn' data-bs-toggle='modal' data-bs-target='#viewUserModal'
                                data-id='{$row['id']}'>
                                View
                            </button>
                        </td>
                        </tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="editUserId" name="id">
                    <div class="mb-3">
                        <label for="editFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="editFirstName" name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="editLastName" name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">View User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="userDetails">
                    <h5 id="viewFirstName"></h5>
                    <h5 id="viewLastName"></h5>
                    <p id="viewEmail"></p>
                    <img id="viewImage" src="" width="200">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Edit button click handler
    $('.editBtn').on('click', function(){
        var id = $(this).data('id');
        var firstName = $(this).data('firstname');
        var lastName = $(this).data('lastname');
        var email = $(this).data('email');

        $('#editUserId').val(id);
        $('#editFirstName').val(firstName);
        $('#editLastName').val(lastName);
        $('#editEmail').val(email);
    });

    // Clear edit modal fields on close
    $('#editUserModal').on('hidden.bs.modal', function () {
        $('#editUserForm').trigger('reset');
    });

    // View button click handler
    $('.viewBtn').on('click', function(){
        var id = $(this).data('id');

        $.ajax({
            url: 'index.php?view=' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#viewFirstName').text('First Name: ' + response.firstName);
                $('#viewLastName').text('Last Name: ' + response.lastName);
                $('#viewEmail').text('Email: ' + response.email);
                $('#viewImage').attr('src', 'uploads/' + response.image);

                $('#viewUserModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching user details');
            }
        });
    });
});
</script>

</body>
</html>

