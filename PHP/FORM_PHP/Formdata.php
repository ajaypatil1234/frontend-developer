<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "<table border='2px' cellpadding='5px' cellspacing='0'>";
    echo "<tr>";
    echo "<th> UserName </th>";
    echo "<th> Email </th>";     
    echo "<th> Password </th>";     
    echo "<th> City </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . htmlspecialchars($_POST['name']) . "</td>";
    echo "<td>" . htmlspecialchars($_POST['email']) . "</td>";
    echo "<td>" . htmlspecialchars($_POST['password']) . "</td>";
    echo "<td>" . htmlspecialchars($_POST['city']) . "</td>";
    echo "</tr>";
    echo "</table>";
}
?>
