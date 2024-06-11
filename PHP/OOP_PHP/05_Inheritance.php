<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<div>
    <h1>PHP - Inheritance</h1>
    <p>Inheritance in OOP = When a class derives from another class.</p>
    <p>The child class will inherit all the public an  protected properties and methods from the parent class. In addition, it can have its own properties and methods.</p>  
</div>

<?php


    class Employe {


        public $name ;
        public $age ;
        public $Salary;


        function __Construct($n, $a, $s) {
            $this->name = $n;
            $this->age = $a;
            $this->Salary = $s;
        }


        function info() {
            echo "<h3>Employe Profile</h3>";
            echo "Name: " . $this->name . "<br>";
            echo "Age: " . $this->age . "<br>";
            echo "Salary: " . $this->Salary . "<br>";
        }
        
    }

        class manager extends Employe{
            public $ta = 1000;
            public $phone = 300;
            public $totolSalary;

            function info() {   
                $this->totolSalary = $this->Salary + $this->ta + $this->phone;
                echo "<h3>Manager Profile</h3>";
                echo "Name: " . $this->name . "<br>";
                echo "Age: " . $this->age . "<br>";
                echo "Salary: " . $this->totolSalary . "<br>";
        }
        
        }
        

        $e1 = new manager("John", 25, 5000);
        $e2 = new Employe("Aj Patil", 18, 15000);

        $e1->info();
        $e2->info();

?>

</body>
</html>