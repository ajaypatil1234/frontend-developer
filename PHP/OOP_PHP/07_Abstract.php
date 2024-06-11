<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP OOP - Abstract Classes</h1>
    <p>An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.</p>
    
    <?php

    abstract   class parentclass{
        public $name ;
        abstract protected function calc($a,$b);
    }

    class childClass extends parentClass{
        public  function calc($c , $d){
            echo $c + $d . "<br>";
            echo "Hello World";
        }
    }

    $test = new childClass();

    $test-> calc(10,20);

    ?>

</body>
</html>