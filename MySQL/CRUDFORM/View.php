<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Table</title>
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

            include 'ConnectDB.php';


            $sql = "SELECT * FROM user_info ORDER BY id ASC";
            $result = mysqli_query($connect , $sql);

            // if($result){
            //     echo "Data fetched successfully";
            // }else{
            //     echo "Data fetching failed: " . mysqli_error($connect);
            // }


            if( $result && mysqli_num_rows($result) > 0){
                echo "<a href='index.php' class='btn btn-primary mt-5 ms-3'>Add Data</a>";
              echo "<table>
                 <thead>
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>ContactNumber</th>
                    <th>DOB</th>   
                    <th>Comments</th>
                    <th>Gender</th>
                    <th>Countries</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
            while($row = mysqli_fetch_assoc($result)){
                $modalId = "modal".$row['id'];
                echo "<tr>
                        
                    <th>".$row['id']."</th>
                    <th>".$row['Fullname']."</th>
                    <th>".$row['Email']."</th>
                    <th>".$row['Password']."</th>
                    <th>".$row['ContactNumber']."</th>   
                    <th>".$row['DOB']."</th>
                    <th>".$row['Comments']."</th>
                    <th>".$row['Gender']."</th>
                    <th>".$row['Countries']."</th>
                    <th>".$row['City']."</th>
                    <td class='text-center'>
                        <a href='' class='btn btn-success comman-button' data-bs-toggle='modal' data-bs-target='#" . $modalId . "'>View</a>
                        <a href='Update.php?id=".$row['id']."' class='btn btn-primary comman-button'>Edit</a>
                        <a href='Delete.php?id=".$row['id']."' class='btn btn-danger comman-button'>Delete</a>
                    </td>
                    </tr>";


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
                                                 <div class='col-4'>Fullname : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Fullname']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>Email : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Email']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>Password : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Password']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>ContactNumber : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['ContactNumber']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>DOB : </div>   
                                                 <div class='col-8'>" . htmlspecialchars($row['DOB']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>Comments : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Comments']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>Gender : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Gender']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>Countries : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['Countries']) ."</div>
                                                 </div>
                                                 <div class='row'>
                                                 <div class='col-4'>City : </div>   
                                                 <div class='col-8'>". htmlspecialchars($row['City']) ."</div>
                                                 </div>
                                     
                                        
                                        </div>
                                             <div class='modal-footer'>
                                               <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                               <button type='button' class='btn btn-primary'> <a href='Update.php?id=" . $row["id"] . "' class='text-white' style='text-decoration: none;'>Save changes</a></button>
                                 </div>
                                </div>
                            </div>
                            </div>
                    </div>
                                  ";


            }
            echo "</tbody></table>";
            }else{
                echo "<tr>
                        <td colspan='8'>No data found</td>
                    </tr>";
            }

            


        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

