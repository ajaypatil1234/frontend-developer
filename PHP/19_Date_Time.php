<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and Time</title>
</head>
<body>
    <h1>PHP Date and Time</h1>
    <p>The required format parameter of the date() function specifies how to format the date (or time).</p>
    <ul>
        <li>d - Represents the day of the month (01 to 31)</li>
        <li>m - Represents a month (01 to 12)</li>
        <li>Y - Represents a year (in four digits)</li>
        <li>l (lowercase 'L') - Represents the day of the week</li>
    </ul>
    
    <?php

 echo "<h4> Date Functions </h4>";
    //  echo date('d'). " ";
    //  echo date('m') . " ";
    //  echo date('Y') . "<br>";
        echo date('d/m/Y') . "<br>";
        echo date('l') . "<br>";

echo "<h4> Get Time  Functions </h4>";
    echo "<ul>";
    echo "<li>H - 24-hour format of an hour (00 to 23)</li>";
    echo "<li>h - 12-hour format of an hour with leading zeros (01 to 12)</li>";
    echo "<li>i - Minutes with leading zeros (00 to 59)</li>";
    echo "<li>s - Seconds with leading zeros (00 to 59)</li>";
    echo "<li>a - Lowercase Ante meridiem and Post meridiem (am or pm)</li>";
    echo "</ul>";


    // set time 
      echo "<br>";    
     date_default_timezone_set('Asia/Kolkata');
     echo date('h-i-s') . "<br>";

    ?>

</body>
</html>