<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method Chaining </title>
</head>
<body>
    <?php

        class Bill{

            public $dinner = 20;
            public $dessert = 10;
            public $ColdDrink = 5;
            public $total;


            public function dinner($person){
                $this->total += $this->dinner * $person;
                return $this;
            }
            public function dessert($person){
                $this->total += $this->dessert * $person;
                return $this;
            }
            public function coldDrink($person){
                $this->total += $this->ColdDrink * $person;
                return $this;
            }
        }

        $bill =  new Bill();
        echo  $bill->dinner(2)->dessert(1)->coldDrink(1)->total;


    ?>
</body>
</html>