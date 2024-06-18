<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "userVideo";

// Create connection
$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add User
if (isset($_POST['action']) && $_POST['action'] == 'addUser') {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    
    // File upload validations
    $video = $_FILES['video'] ?? null;
    // $valid_extensions = ['jpg', 'jpeg'];
    // $valid_extensions = ['png'];
    // $valid_extensions = ['jpg', 'jpeg' , 'png'];
    //   $valid_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

    // $max_size = 2 * 1024 * 1024; // 2MB in bytes
    
    if ($video && $video['error'] === UPLOAD_ERR_OK) {
        $file_name = $video['name'];
        $file_tmp = $video['tmp_name'];
        $file_size = $video['size'];
        
        // Validate file extension
        // $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        // if (!in_array($file_ext, $valid_extensions)) {
        //     $response = array('status' => 'error', 'message' => 'Only JPG and PNG images are allowed.');
        //     echo json_encode($response);
        //     exit();
        // }
        
        // Validate file size
        // if ($file_size > $max_size) {
        //     $response = array('status' => 'error', 'message' => 'File size exceeds 2MB limit.');
        //     echo json_encode($response);
        //     exit();
        // }
        
        // Move uploaded file to target directory
        $target = "uploads/" . basename($file_name);
        if (move_uploaded_file($file_tmp, $target)) {
            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO user (firstName, lastName, email, video) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $file_name);
            
            if ($stmt->execute()) {
                $response = array('status' => 'success', 'message' => 'User added successfully with Video.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error adding user: ' . $stmt->error);
            }
            $stmt->close();
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to upload image.');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Image upload failed or no image selected.');
    }
    
    echo json_encode($response);
    exit();
}

// Delete User
if (isset($_POST['action']) && $_POST['action'] == 'deleteUser') {
    $id = $_POST['id'];

    $stmtFetch = $conn->prepare("SELECT image FROM user WHERE id=?");
    $stmtFetch->bind_param("i", $id);
    $stmtFetch->execute();
    $resultFetch = $stmtFetch->get_result();

    if ($resultFetch->num_rows > 0) {
        $row = $resultFetch->fetch_assoc();
        $videoName = $row['video'];

        $stmtDelete = $conn->prepare("DELETE FROM user WHERE id=?");
        $stmtDelete->bind_param("i", $id);

        if ($stmtDelete->execute()) {
            if (!empty($videoName) && file_exists("uploads/$videoName")) {
                unlink("uploads/$videoName");
            }
            $response = array('status' => 'success', 'message' => 'User deleted successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Error deleting user: ' . $stmtDelete->error);
        }
        $stmtDelete->close();
    } else {
        $response = array('status' => 'error', 'message' => 'User not found.');
    }
    $stmtFetch->close();
    echo json_encode($response);
    exit();
}

// Update User
// if (isset($_POST['action']) && $_POST['action'] == 'updateUser') {
//     $id = $_POST['id'];
//     $firstName = $_POST['firstName'] ?? '';
//     $lastName = $_POST['lastName'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $newvideo = $_FILES['video'] ?? null;

//     $stmtFetch = $conn->prepare("SELECT video FROM user WHERE id=?");
//     $stmtFetch->bind_param("i", $id);
//     $stmtFetch->execute();
//     $resultFetch = $stmtFetch->get_result();

//     if ($resultFetch->num_rows > 0) {
//         $row = $resultFetch->fetch_assoc();
//         $currentImage = $row['image'];

//         if ($newImage && $newImage['error'] === UPLOAD_ERR_OK) {
//             // New image uploaded, validate and check if it is identical to the current image
//             $valid_extensions = ['jpg', 'jpeg'];
//             $max_size = 2 * 1024 * 1024; // 2MB in bytes

//             $file_name = $newImage['name'];
//             $file_tmp = $newImage['tmp_name'];
//             $file_size = $newImage['size'];
//             $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

//             // Validate file extension
//             if (!in_array($file_ext, $valid_extensions)) {
//                 $response = array('status' => 'error', 'message' => 'Only JPG images are allowed.');
//                 echo json_encode($response);
//                 exit();
//             }

//             // Validate file size
//             if ($file_size > $max_size) {
//                 $response = array('status' => 'error', 'message' => 'File size exceeds 2MB limit.');
//                 echo json_encode($response);
//                 exit();
//             }

//             // Check if the new image is identical to the current image
//             if ($file_name === $currentImage && file_get_contents($file_tmp) === file_get_contents("uploads/$currentImage")) {
//                 $response = array('status' => 'error', 'message' => 'New image is identical to the current image.');
//                 echo json_encode($response);
//                 exit();
//             }

//             // Move uploaded file to target directory
//             $target = "uploads/" . basename($file_name);
//             if (move_uploaded_file($file_tmp, $target)) {
//                 // Remove old image if exists
//                 if (!empty($currentImage) && file_exists("uploads/$currentImage")) {
//                     unlink("uploads/$currentImage");
//                 }

//                 // Update user with new image
//                 $stmt = $conn->prepare("UPDATE user SET firstName=?, lastName=?, email=?, image=? WHERE id=?");
//                 $stmt->bind_param("ssssi", $firstName, $lastName, $email, $file_name, $id);

//                 if ($stmt->execute()) {
//                     $response = array('status' => 'success', 'message' => 'User updated successfully with new image.');
//                 } else {
//                     $response = array('status' => 'error', 'message' => 'Error updating user: ' . $stmt->error);
//                 }
//                 $stmt->close();
//             } else {
//                 $response = array('status' => 'error', 'message' => 'Failed to upload image.');
//             }
//         } else {
//             // No new image, update without image
//             $stmt = $conn->prepare("UPDATE user SET firstName=?, lastName=?, email=? WHERE id=?");
//             $stmt->bind_param("sssi", $firstName, $lastName, $email, $id);

//             if ($stmt->execute()) {
//                 $response = array('status' => 'success', 'message' => 'User updated successfully.');
//             } else {
//                 $response = array('status' => 'error', 'message' => 'Error updating user: ' . $stmt->error);
//             }
//             $stmt->close();
//         }
//     } else {
//         $response = array('status' => 'error', 'message' => 'User not found.');
//     }
//     $stmtFetch->close();
//     echo json_encode($response);
//     exit();
// }

// Fetch users for initial display
$sql = "SELECT * FROM user ORDER BY id ASC";
$result = $conn->query($sql);
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX CRUD Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
     /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .alert {
            margin-top: 10px;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #0d3866;
            color: #fff;
            font-weight: bold;
            text-align:center;
        }

        .table td {
            background-color: #f9f9f9;
            text-align: center;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f0f0f0;
        }

        .table img {
            height: 60px;
            border-radius: 10%;
            width: 75px;
            object-fit: cover;
        }

        /* Button Styles */
        .btn {
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
        }

        .btn-view {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: #fff;
        }

        .btn-view:hover {
            background-color: #138496;
            border-color: #117a8b;
            color: #fff;
        }
                /* Modal Content Styling */
        .modal-content {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #2c709e;
            color: #fff;
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 20px;
        }

        /* User Details Styling */
        .user-details {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            margin-right: 20px;
        }

        .user-avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .user-info {
            font-size: 1rem;
        }

        .user-info p {
            margin-bottom: 10px;
        }

        .user-info .label {
            font-weight: bold;
            margin-right: 5px;
            color: #007bff;
        }

    </style>
</head>
<body>

<div id="message"></div> <!-- Message Div -->

<button type="button" class="btn btn-primary m-5" data-bs-toggle="modal" data-bs-target="#addUserModal">
    Add user
</button>

<!-- Modal for Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" enctype="multipart/form-data">
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
                        <label for="addVideo" class="form-label">video</label>
                        <input type="file" class="form-control" id="addVideo" name="video">
                    </div>
                    <button type="submit" class="btn btn-success" id="btnAddUser">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Table to display users -->
<?php if (!empty($users)): ?>
    <!-- Table to display users -->
    <section class="content">
        <table id="userTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><img src="uploads/<?php echo $user['video']; ?>" width="50" /></td>
                        <td>
                            <button type="button" class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                data-id="<?php echo $user['id']; ?>"
                                data-firstname="<?php echo $user['firstName']; ?>"
                                data-lastname="<?php echo $user['lastName']; ?>"
                                data-email="<?php echo $user['email']; ?>"
                                data-video="<?php echo $user['video']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btnDelete" data-id="<?php echo $user['id']; ?>">
                                Delete
                            </button>
                            <button type="button" class="btn btn-primary btnView" data-bs-toggle="modal" data-bs-target="#viewUserModal"
                                data-firstname="<?php echo $user['firstName']; ?>"
                                data-lastname="<?php echo $user['lastName']; ?>"
                                data-email="<?php echo $user['email']; ?>"
                                data-video="<?php echo $user['video']; ?>">
                                View
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php else: ?>
    <h1 class="alert alert-danger ">Not records found.</h1>
<?php endif; ?>


<!-- Modal for Edit User -->
<!-- <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" enctype="multipart/form-data">
                    <input type="hidden" id="editUserId" name="id">
                    <input type="hidden" id="currentImage" name="currentImage"> 
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
                        <p for="editCurrentImage" class="form-label">Current Image :-</p>
                        <img src="" id="editCurrentImage" width="100">
                    </div>
                    <div class="mb-3">
                        <label for="editNewImage" class="form-label">Update Image </label>
                        <input type="file" class="form-control" id="editNewImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnEditUser">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


<!-- Modal for View User -->
<!-- <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">User Details</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="user-details">
                    <div class="user-avatar">
                        <img src="" id="viewImage" alt="User Image">
                    </div>
                    <div class="user-info">
                        <p><span class="label">First Name:</span> <span id="viewFirstName"></span></p>
                        <p><span class="label">Last Name:</span> <span id="viewLastName"></span></p>
                        <p><span class="label">Email:</span> <span id="viewEmail"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<script>
$(document).ready(function(){

    // Add User - AJAX Form Submission
    $('#addUserForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('action', 'addUser');

        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                    setTimeout(function(){
                        location.reload(); // Reload page after 1 second
                    }, 1000);
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    setTimeout(function(){
                        $('#message').empty(); // Clear message after 3 seconds
                    }, 3000);
                }
                $('#addUserModal').modal('hide'); // Close modal on success or error
                $('#addUserForm')[0].reset(); // Reset
            },
            error: function(xhr, status, error) {
                console.error('Error adding user');
                $('#message').html('<div class="alert alert-danger">Error adding user. Please try again later.</div>');
                setTimeout(function(){
                    $('#message').empty(); // Clear message after 3 seconds
                }, 3000);
                $('#addUserModal').modal('hide'); // Close modal on error
                $('#addUserForm')[0].reset(); // Reset
            }
        });
    });

    // Delete User - AJAX Request
    $('.btnDelete').click(function(){
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: { action: 'deleteUser', id: id },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        setTimeout(function(){
                            location.reload(); // Reload page after 1 second
                        }, 1000);
                    } else {
                        $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                        setTimeout(function(){
                            $('#message').empty(); // Clear message after 3 seconds
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting user');
                    $('#message').html('<div class="alert alert-danger">Error deleting user. Please try again later.</div>');
                    setTimeout(function(){
                        $('#message').empty(); // Clear message after 3 seconds
                    }, 3000);
                }
            });
        }
    });

    // Edit User - Populate form fields
    // $('.btnEdit').click(function(){
    //     var id = $(this).data('id');
    //     var firstName = $(this).data('firstname');
    //     var lastName = $(this).data('lastname');
    //     var email = $(this).data('email');
    //     var currentImage = $(this).data('image'); // Assuming you have data-image attribute

    //     $('#editUserId').val(id);
    //     $('#editFirstName').val(firstName);
    //     $('#editLastName').val(lastName);
    //     $('#editEmail').val(email);
    //     $('#currentImage').val(currentImage); // Set the value of currentImage input

    //     // Update current image in the modal
    //     $('#editCurrentImage').attr('src', 'uploads/' + currentImage); // Display current image in modal
    // });

    // // Update User - AJAX Form Submission
    // $('#editUserForm').submit(function(e) {
    //     e.preventDefault();
        
    //     var formData = new FormData(this);
    //     formData.append('action', 'updateUser');

    //     var imageFile = $('#editNewImage')[0].files[0];
    //     if (imageFile) {
    //         var fileSize = imageFile.size; // in bytes
    //         var validExtensions = ['jpg', 'jpeg'];
    //         var fileExtension = imageFile.name.split('.').pop().toLowerCase();

    //         // Validate file extension
    //         if ($.inArray(fileExtension, validExtensions) == -1) {
    //             $('#message').html('<div class="alert alert-danger">Only JPG images are allowed.</div>');
    //             setTimeout(function(){
    //                 $('#message').empty(); // Clear message after 3 seconds
    //             }, 3000);
    //             return;
    //         }

    //         // Validate file size
    //         var maxSize = 2 * 1024 * 1024; // 2MB in bytes
    //         if (fileSize > maxSize) {
    //             $('#message').html('<div class="alert alert-danger">File size exceeds 2MB limit.</div>');
    //             setTimeout(function(){
    //                 $('#message').empty(); // Clear message after 3 seconds
    //             }, 3000);
    //             return;
    //         }

    //         // Append image file to FormData
    //         formData.append('image', imageFile);
    //     }

    //     // AJAX call to update user
    //     $.ajax({
    //         url: 'index.php',
    //         type: 'POST',
    //         data: formData,
    //         dataType: 'json',
    //         processData: false,
    //         contentType: false,
    //         success: function(response) {
    //             console.log('Response:', response);
    //             if (response.status === 'success') {
    //                 $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
    //                 setTimeout(function(){
    //                     location.reload(); // Reload page after 1 second
    //                 }, 1000);
    //             } else {
    //                 $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
    //                 setTimeout(function(){
    //                     $('#message').empty(); // Clear message after 3 seconds
    //                 }, 3000);
    //             }
    //             $('#editUserModal').modal('hide'); // Close modal on success or error
    //             $('#editUserForm')[0].reset(); // Reset
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error updating user:', error);
    //             $('#message').html('<div class="alert alert-danger">Error updating user. Please try again later.</div>');
    //             setTimeout(function(){
    //                 $('#message').empty(); // Clear message after 3 seconds
    //             }, 3000);
    //             $('#editUserModal').modal('hide'); // Close modal on success or error
    //              $('#editUserForm')[0].reset(); /// Reset form
    //         }
    //     });
    // });

    // // View User - Populate modal fields
    // $('.btnView').click(function(){
    //     var firstName = $(this).data('firstname');
    //     var lastName = $(this).data('lastname');
    //     var email = $(this).data('email');
    //     var image = $(this).data('image');

    //     $('#viewFirstName').text(firstName);
    //     $('#viewLastName').text(lastName);
    //     $('#viewEmail').text(email);
    //     $('#viewImage').attr('src', 'uploads/' + image); // Display image in modal
    // });

});

</script>

</body>
</html>
