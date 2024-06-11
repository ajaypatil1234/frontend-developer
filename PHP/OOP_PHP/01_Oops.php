<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oop in PHP</title>
</head>
<body>
    <h4>What is Oop</h4>
    <div>OOP stands for object-Oriented Programming.
         perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.
    </div>

    <div>
        <h4>Why Need Oop</h4>
        <ul>
            <li>OOP is used to create reusable code.</li>
            <li>Clear Structure</li>
            <li>Easy to Maintain</li>
            <li>Smplify</li>
        </ul>
    </div>

    <?php

        class calculation{  

            // Properties
            public $a , $b , $c;
    
            // Methods
            function sum() {
                
                $this->c  = $this->a + $this->b;
                return $this->c; 
                
            }

             function sub() {
             $this->c  = $this->a - $this->b;
             return $this->c; 
            }
        }

        // Create Object 
         $c1 = new calculation();

         $c1->a=30;
         $c1->b=5;

         $c2 = new calculation();

            $c2->a=50;
            $c2->b=35;

         echo " Sum  value  of c1 ". $c1->sum() . "<br>";
         echo "Sub Value of c2 "   . $c2->sub();

    ?>
</body>
</html>