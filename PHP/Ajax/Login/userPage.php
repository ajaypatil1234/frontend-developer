<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "userpanel";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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
                        <label for="addImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="addImage" name="image">
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
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><img src="uploads/<?php echo $user['image']; ?>" width="50" /></td>
                        <td>
                            <button type="button" class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                data-id="<?php echo $user['id']; ?>"
                                data-firstname="<?php echo $user['firstName']; ?>"
                                data-lastname="<?php echo $user['lastName']; ?>"
                                data-email="<?php echo $user['email']; ?>"
                                data-image="<?php echo $user['image']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btnDelete" data-id="<?php echo $user['id']; ?>">
                                Delete
                            </button>
                            <button type="button" class="btn btn-primary btnView" data-bs-toggle="modal" data-bs-target="#viewUserModal"
                                data-firstname="<?php echo $user['firstName']; ?>"
                                data-lastname="<?php echo $user['lastName']; ?>"
                                data-email="<?php echo $user['email']; ?>"
                                data-image="<?php echo $user['image']; ?>">
                                View
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>
<?php else: ?>
    <h1 class="alert alert-danger ">Not records found.</h1>
<?php endif; ?>


<!-- Modal for Edit User -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" enctype="multipart/form-data">
                    <input type="hidden" id="editUserId" name="id">
                    <input type="hidden" id="currentImage" name="currentImage"> <!-- Hidden input for current image -->
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
                        <label for="editImage" class="form-label">New Image</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-success" id="btnEditUser">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for View User -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="user-details">
                    <div class="user-avatar">
                        <img src="" alt="User Avatar" id="viewUserImage">
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
</div>

<script>
    $(document).ready(function () {
        // Function to handle form submission for adding a new user
        $('#addUserForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'UserAction.php?action=add',
                type: 'POST',
                data: formData,
                success: function (data) {
                    $('#addUserModal').modal('hide');
                    $('#message').html(data);
                    location.reload(); // Reload page to display new user
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // Function to handle clicking on edit button
        $(document).on('click', '.btnEdit', function () {
            var id = $(this).data('id');
            var firstname = $(this).data('firstname');
            var lastname = $(this).data('lastname');
            var email = $(this).data('email');
            var image = $(this).data('image');

            $('#editUserId').val(id);
            $('#editFirstName').val(firstname);
            $('#editLastName').val(lastname);
            $('#editEmail').val(email);
            $('#currentImage').val(image);

            $('#editUserModal').modal('show');
        });

        // Function to handle form submission for editing user
        $('#editUserForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'UserAction.php?action=edit',
                type: 'POST',
                data: formData,
                success: function (data) {
                    $('#editUserModal').modal('hide');
                    $('#message').html(data);
                    location.reload(); // Reload page to display updated user
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // Function to handle clicking on delete button
        $(document).on('click', '.btnDelete', function () {
            var id = $(this).data('id');

            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: 'UserAction.php?action=delete&id=' + id,
                    type: 'GET',
                    success: function (data) {
                        $('#message').html(data);
                        location.reload(); // Reload page to remove deleted user from table
                    }
                });
            }
        });

        // Function to handle clicking on view button
        $(document).on('click', '.btnView', function () {
            var firstname = $(this).data('firstname');
            var lastname = $(this).data('lastname');
            var email = $(this).data('email');
            var image = $(this).data('image');

            $('#viewFirstName').text(firstname);
            $('#viewLastName').text(lastname);
            $('#viewEmail').text(email);
            $('#viewUserImage').attr('src', 'uploads/' + image);

            $('#viewUserModal').modal('show');
        });
    });
</script>

</body>
</html>
