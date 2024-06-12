<?php


// Database connection
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "adminPanel";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from database
$sql = "SELECT id, firstName, lastName, email FROM user ORDER BY id ASC";
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
            height: 100vh;
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

<!-- Modal -->
<div class="modal fade" id="guestdatamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add/Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>
            <div class="col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>
            <div class="col-md-12">
                <label for="gmail">Email</label>
                <input type="text" class="form-control" id="gmail">
            </div>
            <div class="col-md-12">
                <label for="">Image</label>
                <input type="file" class="form-control" id="Image">
            </div>
            <input type="hidden" id="record_id">
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary"  id="saveRecord">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    

             <button type="button" class="btn btn-primary float-end m-5" data-bs-toggle="modal" data-bs-target="#guestdatamodal" id="addNew">
                        Add Data
                </button>

    <div class="main-content">
     
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
                    // echo "<h1>Not Record Found </h1>";
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
    

    $("#saveRecord").on("click", function(e) {
        e.preventDefault(); // Prevent default form submission behavior

        // Get the values from the form fields
        var id = $("#record_id").val();
        var fname = $("#fname").val().trim();
        var lname = $("#lname").val().trim();
        var gmail = $("#gmail").val().trim();

        // Make an AJAX request to the server to add the data
        $.ajax({
            url: "userAction.php",
            type: "POST",
            data: { id: id, firstname: fname, lastname: lname, email: gmail },
            success: function(data) {
                if (data.trim() === '1') {
                    // Data added successfully, update the UI
                    var newRow = "<tr data-userid='" + id + "'>" +
                        "<td>" + id + "</td>" +
                        "<td>" + fname + "</td>" +
                        "<td>" + lname + "</td>" +
                        "<td>" + gmail + "</td>" +
                        "<td>" +
                        "<button class='btn btn-info viewBtn'>View</button>" +
                        "<button class='btn btn-warning editBtn'>Edit</button>" +
                        "<button class='btn btn-danger deleteBtn'>Delete</button>" +
                        "</td>" +
                        "</tr>";
                    $("#userTable").append(newRow);

                    // Hide the modal after saving
                    $("#guestdatamodal").modal('hide');
                    // Clear input fields
                    $("#guestdatamodal").find("input").val("");
                    // Clear error messages
                    $(".text-danger").text("");
                    // Remove modal backdrop manually to fix fade issue
                    $('.modal-backdrop').remove();
                }
            },
            error: function(xhr, status, error) {
                // An error occurred during the AJAX request
                alert("An error occurred while processing your request. Please try again later.");
                console.error(xhr.responseText);
            }
        });
    });

    // Other event handlers for viewing, editing, and deleting users go here...



    // View User
    $('.viewBtn').click(function() {
        var row = $(this).closest('tr');
        var firstName = row.find('td:eq(1)').text();
        var lastName = row.find('td:eq(2)').text();
        var email = row.find('td:eq(3)').text();

        $('#viewFirstName').val(firstName);
        $('#viewLastName').val(lastName);
        $('#viewEmail').val(email);
        $('#viewUserModal').modal('show');
    });

    // Edit User
    $('.editBtn').click(function() {
        var row = $(this).closest('tr');
        var userId = row.data('userid');
        var firstName = row.find('td:eq(1)').text();
        var lastName = row.find('td:eq(2)').text();
        var email = row.find('td:eq(3)').text();

        $('#userId').val(userId);
        $('#firstName').val(firstName);
        $('#lastName').val(lastName);
        $('#email').val(email);
        $('#editUserModal').modal('show');
    });

    // Submit the edit user form
    $('#editUserForm').submit(function(e) {
        e.preventDefault();
        $('.error').text('');

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

        if (!isValid) return;

        var formData = $(this).serialize();
        $.ajax({
            url: 'userAction.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                  $('#editUserModal').modal('hide');
                    var userId = $('#userId').val();
                    var firstName = $('#firstName').val();
                    var lastName = $('#lastName').val();
                    var email = $('#email').val();
                    var row = $("tr[data-userid='" + userId + "']");
                    row.find('td:eq(1)').text(firstName);
                    row.find('td:eq(2)').text(lastName);
                    row.find('td:eq(3)').text(email);
            },
            error: function(xhr, status, error) {
                alert('Error updating user details: ' + error);
            }
        });
    });

    // Delete User
    $('.deleteBtn').click(function() {
        var row = $(this).closest('tr');
        var userId = row.data('userid');

        $.ajax({
            url: 'userAction.php',
            type: 'POST',
            data: { action: 'delete', userId: userId },
            success: function(response) {
                if (response === 'Success') {
                    row.remove(); // Remove the deleted row from the table
                } else {
                    alert('Error deleting user: ' + response);
                }
            },
            error: function(xhr, status, error) { 
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

