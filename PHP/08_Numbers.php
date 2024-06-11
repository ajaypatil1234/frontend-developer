<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>PHP Numbers</h1>


<?php
echo (pi());
 echo "<br>";
// min num 
echo(min(0, 150, 30, 20, -8, -200) . "<br>");
// max nub 
echo(max(0, 150, 30, 20, -8, -200). "<br>");

// The abs() function returns the absolute (positive) value of a number:
echo(abs(-6.7));

// The sqrt() function returns the square root of a number:
echo(sqrt(64). "<br>");
echo(sqrt(9). "<br>");
echo(sqrt(25). "<br>");
echo(sqrt(16). "<br>");


// The round() function rounds a floating-point number to its nearest integer:
echo(round(0.60) . "<br>");
echo(round(0.50) . "<br>");
echo(round(0.49) . "<br>");
echo(round(-4.40) . "<br>");
echo(round(-4.60) . "<br>");


// random number 
echo(rand() . "<br>");
?>
</body>
</html>