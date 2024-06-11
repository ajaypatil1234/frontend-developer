<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>What is Json ?</h1>
    <div>JSON stands for JavaScript Object Notation, and is a syntax for storing and exchanging data.</div>
        <br><br>

    <div>PHP - json_encode()</div>
    <div>The json_encode() function is used to encode a value to JSON format.</div>

<br>
    <?php

            echo "PHP - json_encode() <br> <br>";
        

            $age = array("peter" => 35 , "Ben" => 37 , "Joe" => 43);

             // Convert the PHP array to a JSON string   json_encode()
            $jsondata = json_encode($age);     

            // Output the JSON string
            echo $jsondata;
            echo "<br> <br>";

            // This example shows how to encode an indexed array into a JSON array:
             $cars = array("Volvo", "BMW", "Toyota");
             echo json_encode($cars); 
             echo "<br> <br>";
            

             echo "PHP - json_decode() <br>";
            // The json_decode() function is used to decode a JSON object into a PHP object or an associative array.

             $jsonobj = '{"Peter": 47,"Ben":42,"Joe":19}';
             
            // function has a second parameter, and when set to true, JSON objects are decoded into associative arrays.
             var_dump(json_decode($jsonobj , true));


            $obj = json_decode($jsonobj);

            echo $obj->Peter;
            echo $obj->Ben;
            echo $obj->Joe;
    
    ?>
    


</body>
</html>