<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
                <span class="text-danger" id="fname-error"></span>
            </div>
            <div class="col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname">
                <span class="text-danger" id="lname-error"></span>
            </div>
            <div class="col-md-12">
                <label for="gmail">Email</label>
                <input type="text" class="form-control" id="gmail">
                <span class="text-danger" id="gmail-error"></span>
            </div>
            <input type="hidden" id="record_id">
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveRecord">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- View Modal -->
<div class="modal fade" id="viewdatamodal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewModalLabel">View Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label>First Name :-</label>
                <p id="view_fname" class="" style="width: 6rem; font-weight : bold;"></p>
            </div>
            <div class="col-md-12">
                <label>Last Name :-</label>
                <p id="view_lname" style="width: 6rem; font-weight : bold;"></p>
            </div>
            <div class="col-md-12">
                <label>Email :-</label>
                <p id="view_email" style="width: 6rem; font-weight : bold;"></p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
                <button type="button" class="btn btn-primary float-end m-5" data-bs-toggle="modal" data-bs-target="#guestdatamodal" id="addNew">
                        Add Data
                    </button>
        </div>
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header d-flex" style="justify-content: space-between; align-items:center">   
                    <h4>PHP - Ajax - CRUD | how to fetch Data from Database using Jquery Ajax...</h4>
                    <div class="search-bar" style="text-align:end"; >
                             <label for="search">Search</label>
                              <input type="text" id="search" autocomplete="off" class="form-control d-inline-block w-75"> 
                            </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>   
                        </thead>
                        <tbody class="guestData" id="table-data"></tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    
   $(document).ready(function () {

    // Define loadTable function in the global scope
    window.loadTable = function() {
        $.ajax({
            url: "/Ajay/PHP/Ajax/demofetch.php",
            type: "POST",
            success: function (data) {
                $("#table-data").html(data);
            },
        });
    }

    loadTable();

    // Handle add new record
    $("#addNew").on("click", function() {
        $("#guestdatamodal").find("input").val(""); // Clear input fields
        $("#record_id").val(""); // Clear record ID
        $(".text-danger").text(""); // Clear previous error messages
    });

    $("#saveRecord").on("click", function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        // Get the values inside the event handler to ensure they are the latest
        var id = $("#record_id").val();
        var fname = $("#fname").val().trim();
        var lname = $("#lname").val().trim();
        var gmail = $("#gmail").val().trim();

        $(".text-danger").text(""); // Clear previous error messages

        var isValid = true;

        if (fname === "") {
            $("#fname-error").text("First Name is required.");
            isValid = false;
        }
        if (lname === "") {
            $("#lname-error").text("Last Name is required.");
            isValid = false;
        }
        if (gmail === "") {
            $("#gmail-error").text("Email is required.");
            isValid = false;
        } else {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(gmail)) {
                $("#gmail-error").text("Please enter a valid email address.");
                isValid = false;
            }
        }

        if (!isValid) {
            return;
        }

        $.ajax({
            url: "/Ajay/PHP/Ajax/demofetch.php",
            type: "POST",
            data: { id: id, firstname: fname, lastname: lname, email: gmail },
            success: function(data) {
                if (data == 1) {
                    loadTable(); // Refresh the table data
                    $("#guestdatamodal").modal('hide'); // Hide the modal after saving
                    $("#guestdatamodal").find("input").val(""); // Clear input fields
                    $(".text-danger").text(""); // Clear error messages
                } else {
                    alert("Can't Save Records");
                }
            }
        });
    });

    // Define DeleteUser function in the global scope
    window.DeleteUser = function(deleteid) {
        $.ajax({
            url: "/Ajay/PHP/Ajax/demofetch.php",
            type: "POST",
            data: { deleteid: deleteid },
            success: function(data) {
                loadTable(); // Refresh the table data
                if (data == 1) {
                } else {
                    alert("Can't Delete Record");
                }
            }
        });
    }

    // Define EditUser function in the global scope
    window.EditUser = function(id) {
        $.ajax({
            url: "/Ajay/PHP/Ajax/demofetch.php",
            type: "POST",
            data: { editid: id },
            success: function(data) {
                var user = JSON.parse(data);
                $("#record_id").val(user.id);
                $("#fname").val(user.firstname);
                $("#lname").val(user.lastname);
                $("#gmail").val(user.email);
                $("#guestdatamodal").modal('show');
                $(".text-danger").text(""); // Clear previous error messages
            }
        });
    }

    // Define ViewUser function in the global scope
    window.ViewUser = function(id) {
        $.ajax({
            url: "/Ajay/PHP/Ajax/demofetch.php",
            type: "POST",
            data: { viewid: id },
            success: function(data) {
                var user = JSON.parse(data);
                $("#view_fname").text(user.firstname);
                $("#view_lname").text(user.lastname);
                $("#view_email").text(user.email);
                $("#viewdatamodal").modal('show');
            }
        });
    }

    $("#search").on("keyup", function(){
        var search_tern = $(this).val();

        $.ajax({
            url: "/Ajay/PHP/Ajax/Live-Search.php",
            type : "POST",
            data : {search : search_tern},
            success : function(data){
                $("#table-data").html(data)
            }
        })
    })
});

</script>

</body>
</html>

