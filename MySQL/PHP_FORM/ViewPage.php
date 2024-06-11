<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        echo "<h1 class='text-center'>View Data</h1>";


      
        while ($row = mysqli_fetch_assoc($result)) {
            $modalId = "viewModal" . $row["id"];

            // Modal for each row
            echo "
            <div class=' '>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row["id"] . "'>View Data</h1>
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
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
        echo "<h1>No results found</h1>";
    }

    mysqli_close($connect);
    ?>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
