<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>PHP Callback Functions</h2>
    <?php

    function my_callback($item) {
    return strlen($item);
    }

    $strings = ["apple", "orange", "banana", "coconut"];
    $lengths = array_map("  ", $strings);
    echo "<pre>";
    print_r($lengths);
    echo "</pre>";



        // secound example  Callback
    function exclaim($str) {
    return $str . "! ";
    }

    function ask($str) {
    return $str . "? ";
    }

    function printFormatted($str, $format) {
    // Calling the $format callback function
    echo $format($str);
    }

    // Pass "exclaim" and "ask" as callback functions to printFormatted()
    printFormatted("Hello world", "exclaim");
    echo "<br>";
    printFormatted("Hello world", "ask");

    

    ?>
</body>
</html>