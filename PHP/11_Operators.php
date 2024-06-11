<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP  Operators</h1>
    <p>Operators are used to perform operations on variables and values.</p>

    <ul>
        <li>Arithmetic operators</li>
        <li>Assignment operators</li>
        <li>Comparison operators</li>
        <li>Logical operators</li>
    </ul>
    
        <?php

        echo "<h3>Arithmetic operators</h3>";
    // Arithmetic operators
        $a = 5;
        $b = 15;
        $c = $a + $b;
        $d = 5;


        // Addition 
        echo ' add : '. $c;
        echo "</br>";

        // subs
        $c = $a - $b;
        echo "Sub:" . $c;
        echo "</br>";


        // Multy
        $c = $a * $b;
        echo  "  Mult:" . $c;
        echo "</br>";

        // divide 
        $c = $a / $b;
        echo  "divide:" . $c;
        echo "</br>";


        //  Module 
        $c = $a % $b;
        echo  "module:" . $c;
        echo "</br>";

    //    Increment ++
        $d++;
        echo "Increment :-" .  $d;
        echo "</br>";

        $d--;
        echo "Decrement :-" .  $d;


       echo "<h3>Comparison Operators</h3>";


    //   == value equal match 
      $x = 5;
      $y = 5;
      var_dump($x == $y);


    // != not equal
     $x = 5;
     $y = 6;
     var_dump($x != $y);

    // Greather than 
    $x = 7;
    $y = 6;
    var_dump($x > $y); 

    // less than 
    $x = 7;
    $y = 6;
    var_dump($x < $y);

    // Greather than equal
    $x = 1;
    $y = 7;
    var_dump($x >= $y); 


    // less thann Equal 
    $x = 7;
    $y = 7;
    var_dump($x <= $y); 

    echo" <h4>Logical and Ternary Operators </h4>";


    // The && operator returns true if both expressions are true, otherwise it returns false.

    $x = 0;
    $y = 1;
    $z = $x && $y;
    var_dump($z);

    //The || returns true if one or both expressions are true, otherwise it returns false
    $x = 0;
    $y = 1;
    $z = $x || $y;
    var_dump($z);

    //The NOT operator (!) returns true for false statements and false for true statements.

    $x = 0;
    $y = 1;
    $z = !$a;
    var_dump($z);


    // Ternary Operators 

    $x = 2;
    $x > 20 ? $myFlage = "yes" : $myFlage =  "No";
    echo $myFlage;
    echo "</br>";

    echo "<h4>Assignment operators </h4>";


     // simple Basic  Assign
    $a = 18;
    echo $a; 
    echo "</br>";

    $a = 18;
    $b = $a ;
    echo $b;
    echo "</br>";



    // add asign 
    $a = 5;
    $b = 6 ;
    echo "first value : " . $a ;
    echo "</br>";
    $a += $b;                   //add asign value $a = 5 + 6 = 11
    echo "add assign value :" . $a;
    echo "</br>";

    // add asign 
    $a = 5;
    $b = 6 ;
    echo "first value : " . $a ;
    echo "</br>";
    $a -= $b;                   //sub asign value $a = 5 - 6 = 1
    echo "add assign value :" . $a;
    echo "</br>";


    // Multi asign 
    $a = 5;
    $b = 6 ;
    echo "first value : " . $a ;
    echo "</br>";
    $a *= $b;                   //Multi asign value $a = 5 * 6 = 30
    echo "add assign value :" . $a;
    echo "</br>";



    // divide  asign 
    $a = 5;
    $b = 6 ;
    echo "first value : " . $a ;
    echo "</br>";
    $a /= $b;                   //divide asign value $a = 5 / 6 = 0.83333333333333
    echo "add assign value :" . $a;
    echo "</br>";
    


       // Module  asign 
        $a = 5;
        $b = 6 ;
        echo "first value : " . $a ;
        echo "</br>";
        $a %= $b;                   //module asign value $a % 5 % 6 = 5
        echo "add assign value :" . $a;
        echo "</br>";
    
?>
</body>
</html> 