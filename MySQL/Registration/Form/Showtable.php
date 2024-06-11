<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demotable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from the 'register' table
$sql = "SELECT * FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table and add the header row
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>City</th>
                <th>Gender</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["password"]) . "</td>
                <td>" . htmlspecialchars($row["city"]) . "</td>
                <td>" . htmlspecialchars($row["gender"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();



?>
