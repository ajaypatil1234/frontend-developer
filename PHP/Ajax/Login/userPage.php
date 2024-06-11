<?php
session_start();

// Check if the session variable is set and not empty
if (!isset($_SESSION['firstName'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: LoginForm.php");
    exit();
}

// Check if the last activity session variable is set
if (isset($_SESSION['lastActivity'])) {
    $lastActivity = $_SESSION['lastActivity'];
    $currentTime = time();
    
    // If the time difference exceeds 30 seconds, redirect to the logout page
    if (($currentTime - $lastActivity) > 30) {
        header("Location: Logout.php");
        exit();
    }
}

// Update the last activity time
$_SESSION['lastActivity'] = time();

// Database connection
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "registrationform";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from database
$sql = "SELECT id, firstName, lastName, email FROM form ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: auto;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        header a {
            background-color: red;
            padding: 10px;
            color: white;
            text-decoration: none;
        }
        header h1 {
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
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
        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="userPage.php">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Reports</a></li>
        </ul>   
    </div>
    <div class="main-content">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['firstName']); ?>!</h1>
            <a href="Logout.php">Logout</a>
        </header>
        <section class="content">
            <h2>Users</h2>
            <table id="userTable">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr data-userid='" . htmlspecialchars($row["id"]) . "'>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["firstName"]) . "</td>
                                <td>" . htmlspecialchars($row["lastName"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) ."</td>
                                <td>
                                    <button class='btn btn-info viewBtn'>View</button>
                                    <button class='btn btn-warning editBtn'>Edit</button>
                                    <button class='btn btn-danger deleteBtn'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                ?>
            </table>
        </section>
    </div>
    <!-- View User Modal -->
    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewUserModalLabel">View User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="viewFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="viewFirstName" name="firstName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="viewLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="viewLastName" name="lastName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="viewEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="viewEmail" name="email" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to edit user details -->
                    <form id="editUserForm">
                        <input type="hidden" id="userId" name="userId">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                            <span class="error" id="firstNameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName">
                            <span class="error" id="lastNameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <span class="error" id="emailError"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        // View User
        $('.viewBtn').on('click', function() {
            // Get the user data from the row
            var row = $(this).closest('tr');
            var firstName = row.find('td:eq(1)').text();
            var lastName = row.find('td:eq(2)').text();
            var email = row.find('td:eq(3)').text();

            // Set the user data to the modal
            $('#viewFirstName').val(firstName);
            $('#viewLastName').val(lastName);
            $('#viewEmail').val(email);

            // Show the modal
            $('#viewUserModal').modal('show');
        });

        // Edit User
        $('.editBtn').on('click', function() {
            // Get the user data from the row
            var row = $(this).closest('tr');
            var userId = row.data('userid');
            var firstName = row.find('td:eq(1)').text();
            var lastName = row.find('td:eq(2)').text();
            var email = row.find('td:eq(3)').text();

            // Set the user data to the modal
            $('#userId').val(userId);
            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#email').val(email);

            // Show the modal
            $('#editUserModal').modal('show');
        });

        // Submit the edit user form
        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            // Clear previous error messages
            $('.error').text('');

            // Validate form fields
            var firstName = $('#firstName').val().trim();
            var lastName = $('#lastName').val().trim();
            var email = $('#email').val().trim();
            var isValid = true;

            if (firstName === '') {
                $('#firstNameError').text('First name is required.');
                isValid = false;
            }

            if (lastName === '') {
                $('#lastNameError').text('Last name is required.');
                isValid = false;
            }

            if (email === '') {
                $('#emailError').text('Email is required.');
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            // Get form data
            var formData = $(this).serialize();
            // Submit form data using AJAX
            $.ajax({
                url: 'userAction.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Close the modal
                    $('#editUserModal').modal('hide');
                    // Reload the page to reflect changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert('Error updating user details: ' + error);
                }
            });
        });

        // Delete User
        $('.deleteBtn').on('click', function() {
            var row = $(this).closest('tr');
            var userId = row.data('userid');

            $.ajax({
                url: 'userAction.php',
                type: 'POST',
                data: { action: 'delete', userId: userId },
                success: function(response) {
                    // Handle success
                    // Reload the page to reflect changes
                    location.reload();
                },
                error: function(xhr, status, error) { 
                    // Handle errors
                    alert('Error deleting user: ' + error);
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
$conn->close();
?>

