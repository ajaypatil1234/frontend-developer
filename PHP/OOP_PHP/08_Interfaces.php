<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Interfaces </title>
</head>
<body>
    <h1>PHP OOP - Interfaces</h1>
    <p>An interface is a contract that defines the methods that a class must implement.</p>
    
    <?php
        interface parent1{
            public function calc($a,$b);
        }

        interface parent2{
            public function sub($c,$d);
        }

        class childclass implements parent1,parent2{
            public function calc($a,$b){
                echo $a+$b;
            }
            public function sub($c,$d){
                echo $c - $d;
            }
        }


        $test = new childclass();
        $test->calc(10,20);
        echo "<br>";
        $test->sub(20,10);

    ?>
</body>
</html>

