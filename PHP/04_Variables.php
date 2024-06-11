<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>In PHP, a variable starts with the $ sign, followed by the name of the variable:</p>
    <p>$ Is Define varibles</p>
    <h4>PHP Variables Scope</h4>
    <details>
        <summary>PHP has three different variable scopes:</summary>
        <ul>
            <li>local</li>
            <li>global</li>
            <li>static</li>
        </ul>
    </details>

    
    <?php

            // basic variable define 
            $name  = "Variable Define";
            $number = 5;


            echo "</br>";
            echo $name;
            echo "</br>";
            echo $number;



            // Global Scope 

             echo "<h4>Global and Local Scope</h4>";
             $x = 5; //global scope  

            function myTest() {
                 // using x inside this function will generate an error
                echo "<P>Variable x inside function is :  </p>";
                }
                myTest();

            echo "<P> variable x outside function is : $x </p>";


            // Local Scope 
            
            echo "<h4> Local Scope</h4>";
              // local scope
            function myLocalvariable() {
             $y = 5; // local scope
            echo "<p>Variable x inside function is:$y</p>";
            } 
            myLocalvariable();
            // using x outside the function will generate an error
            echo "<p>Variable x outside function is:    </p>";



            // Global keyword 
            echo "<h4>PHP The global Keyword</h4>";

            $X = 5;
            $Y = 10;
                
            function myglobal() {
                global $X,$Y;
                $Y = $X + $Y;
            }
            myglobal();
            echo "$Y </br>";



            $index = 5;
            $GlobalIndex = 10;

            function MyGlobalKeyword() {
                 $GLOBALS['GlobalIndex'] = $GLOBALS['index'] + $GLOBALS['GlobalIndex'];
            }
            MyGlobalKeyword();
            echo $GlobalIndex; 


            echo "<h4>PHP The static Keyword</h4>";
            
            function staticKeyword() {
                static $A = 0;
                echo $A;
                $A++;
            }

            staticKeyword();
            echo "</br>";
            staticKeyword();
            echo "</br>";
            staticKeyword();
            echo "</br>";
            staticKeyword();
             echo "</br>";
            staticKeyword();
            // $first = 15;
            // echo $first;
            // $first = 20;
            // echo $first;
    ?>
</body>
</html>