<?php
                                                    //show FORM INSERT DATA;

    include '01_Connect_db.php';
    

    //show the data from the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    //find the number of records returned  -->
    $num = mysqli_num_rows($result) ;
    echo $num;
 

    if($num > 0){
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Website</th>
                    <th>Gender</th>
                </tr>";
            echo "<br>";

        // The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
        while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["password"]) . "</td>
                <td>" . htmlspecialchars($row["website"]) . "</td>
                <td>" . htmlspecialchars($row["gender"]) . "</td>
              </tr>";
    };
}

?>