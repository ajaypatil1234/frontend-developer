<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="card"> 
                <div class="card-header">   
                    <h4>PHP - Ajax - CRUD 
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#guestdatamodal" id="addNew">Add Data</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>   
                        </thead>
                        <tbody id="table-data"></tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

$(document).ready(function () {
    function loadTable() {
        $.post("Fetchdata.php", function (data) {
            $("#table-data").html(data);
        });
    }

    loadTable();

    $("#addNew").on("click", function() {
        $("#guestdatamodal input").val(""); // Clear input fields
        $(".text-danger").text(""); // Clear error messages
    });

    $("#saveRecord").on("click", function (e) {
        e.preventDefault();

        var id    = $("#record_id").val();
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

        $.post("Fetchdata.php", { id: id, firstname: fname, lastname: lname, email: gmail }, 
        function (data) {
            var response = JSON.parse(data);
            if (response.status == 1) {
                loadTable();
                $("#guestdatamodal").modal('hide');
            } else {
                alert(response.message);
            }
        });
    });

    window.DeleteUser = function (id) {
        $.post("Fetchdata.php", { deleteid: id }, function (data) {
            if (data == 1) {
                loadTable();
            } else {
                alert("Can't Delete Record");
            }
        });
    }

    window.EditUser = function (id) {
        $.post("Fetchdata.php", { editid: id }, function (data) {
            var user = JSON.parse(data);
            $("#record_id").val(user.id);
            $("#fname").val(user.firstname);
            $("#lname").val(user.lastname);
            $("#gmail").val(user.email);
            $("#guestdatamodal").modal('show');
        });
    }

    window.ViewUser = function (id) {
        $.post("Fetchdata.php", { viewid: id }, function (data) {
            var user = JSON.parse(data);
            $("#view_fname").text(user.firstname);
            $("#view_lname").text(user.lastname);
            $("#view_email").text(user.email);
            $("#viewdatamodal").modal('show');
        });
    }
});
</script>

</body>
</html>
