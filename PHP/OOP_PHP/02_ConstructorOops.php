<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP - The __construct Function  </h1>
    <div>If you create a __construct() function, PHP will automatically call this function when you create an object from a class.</div>
    <br>
    
    <?php

        // class person {
        //     public $name ;  //property
        //     public $age;
        //     //Methods 
        //     function show() {
        //         echo "Your Name : " . $this->name . " - ".$this->age;
        //     }
        // }

        // $p1 =  new person();
        // $p1-> name = "Ajay Patil Developer";
        // $p1-> age = 18;
        // $p1->  show()

        
//     If you create a __construct() function, PHP will automatically call this function when you create an object from a class.;


        class Person {
            public $name;  //property
            public $age;   //property
 
            // Constructor method
            function __construct($n, $a) {
                $this->name = $n;
                $this->age = $a;  // Corrected assignment
            }

            // Show method to display the name and age
            function show() {
                echo $this->name . " - " . $this->age;
            }
        }

        $p1 = new Person("Hey AjayPatil", 18);
        
        $p1->show();
        
    ?>
</body>
</html>