<?php

$search_Value = $_POST["search"];

$conn = mysqli_connect("localhost", "root", "", "db_sms");


$sql = "SELECT * FROM myguests WHERE firstname LIKE '%{$search_Value}%' OR  lastname LIKE '%{$search_Value}%' OR  email LIKE '%{$search_Value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

$output = "";

// Check if there are records
if (mysqli_num_rows($result) > 0) {
    // Loop through the records and create table rows
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <button class='btn btn-info' onclick='ViewUser({$row['id']})'>View</button>
                            <button class='btn btn-primary' onclick='EditUser({$row['id']})'>Edit</button>
                            <button class='btn btn-danger' onclick='DeleteUser({$row['id']})'>Delete</button>
                        </td>
                    </tr>";
    }
} else {
    // If no records are found, display a message
    $output .= "<tr><td colspan='5'>No Records Found</td></tr>";
}

// Print the output (HTML table rows)
echo $output;

// Step 4: Close the database connection
mysqli_close($conn);
?>
 
