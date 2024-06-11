<?php
    // connect dba_close

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_sms";

    // Create connection
    $conn = new mysqli($server, $username, $password, $database);

    $sql = "SELECT * FROM myguests ORDER BY id ASC";
    $result = mysqli_query($conn , $sql)or die("SQL Query Failed");

    $output= "";

    if(mysqli_num_rows($result) > 0){
        $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    </tr>';

                    while($row = mysqli_fetch_assoc($result)){
                            $output .= "<tr><td>{$row['id']}</td><td>{$row['firstname']}</td><td>{$row['lastname']}</td> </tr>";
            }
           $output .="</table>"; 

           mysqli_close($conn);
           
           echo $output;
    }





?>