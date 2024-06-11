<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        th, td {
            padding: 9px 0px;
            text-align: center;
        }
        thead tr {
           background: linear-gradient(
            121deg,
            rgba(0, 67, 124, 1) 0%,
            rgba(0, 43, 79, 1) 100%
        );
            color: #ffffff;
            text-align: left;
        }
        tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }


        /* Modal Custom Styles */
        .modal-header {
            background: linear-gradient(121deg, rgba(0, 67, 124, 1) 0%, rgba(0, 43, 79, 1) 100%);
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-content {
            border-radius: 10px;
            border: none;
        }
        .modal-body {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }
        .modal-body .row {
            margin-bottom: 10px;
        }
        .modal-body .col-4 {
            font-weight: 600;
        }
        .btn-close {
            background: transparent;
            border: none;
            font-size: 1.2rem;
        }
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }
        
    </style>
</head>
<body>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "B2BFORM";

    $connect = mysqli_connect($server, $username, $password, $database);

    if (!$connect) {
        die("Connection Failed: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM B2BTable ORDER BY id ASC";  // Add ORDER BY id DESC to get results in descending order
    $result = mysqli_query($connect, $sql);


    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h1 class='text-center'>Table Data</h1>";
        echo '<button class="btn btn-primary ms-4"> <a href="Index.php" class="text-white" style="text-decoration: none; ">Add Data</a></button>';
        echo "<table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>City</th>   
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            $modalId = "viewModal" . $row["id"];
            echo "<tr>
                    <td class='text-center'>" . htmlspecialchars($row["id"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["Full_Name"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["Contact_No"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["Email"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["City"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["Gender"]) . "</td>
                    <td class='text-center'>" . htmlspecialchars($row["Address"]) . "</td>  
                    <td class='text-center'>
                        <a href='ViewPage.php' class='btn btn-success comman-button' data-bs-toggle='modal' data-bs-target='#" . $modalId . "'>View</a>
                        <a href='Edit.php?id=" . $row["id"] . "' class='btn btn-warning comman-button'>Edit</a>
                        <a href='Delete.php?id=" . $row["id"] . "' class='btn btn-danger comman-button'>Delete</a>
                    </td>
                </tr>";


            // Modal for each row
            echo "
            <div class='modal fade' id='" . $modalId . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row["id"] . "' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row["id"] . "'>View Data</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                       <div class='row'>
                                <div class='col-4'>Name:</div>
                                <div class='col-8'>" . htmlspecialchars($row["Full_Name"]) . "</div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>Contact:</div>
                                <div class='col-8'>" . htmlspecialchars($row["Contact_No"]) . "</div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>Email:</div>
                                <div class='col-8'>" . htmlspecialchars($row["Email"]) . "</div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>City:</div>
                                <div class='col-8'>" . htmlspecialchars($row["City"]) . "</div>
                            </div>
                       
                            <div class='row'>
                                <div class='col-4'>Gender:</div>
                                <div class='col-8'>" . htmlspecialchars($row["Gender"]) . "</div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>Address:</div>
                                <div class='col-8'>" . htmlspecialchars($row["Address"]) . "</div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='button' class='btn btn-primary'> <a href='05_Edit.php?id=" . $row["id"] . "' class='text-white' style='text-decoration: none;'>Save changes</a></button>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        echo "</tbody></table>";
    } else {
        echo "<h1>No results found</h1>";
    }

    mysqli_close($connect);
    ?>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
