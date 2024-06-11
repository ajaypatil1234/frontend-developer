<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array in PHP</h1>
    <?php

       $colors = array("red" , "blue" , "green", "Black");
        //     echo $colors[0] = "White";

        //    echo "<pre>";
        //    print_r is special array print function 
        //    print_r($colors);
        //   echo "</pre>"


    // loop in define array 
        echo "<ul>";
        for($i= 0 ; $i < 4 ; $i++) {
            echo "<li> $colors[$i] </li>";
        }
        echo "</ul>";


    // Associative Array

        $age = array(
            "bill" => "18",
            "elon" => 36.50,
            "musk" => 54,
        );


        $age["musk"]=50;

          echo "<pre>";
          var_dump($age);
          echo "</pre>";

     
        echo $age["bill"] . "<br>";     
        echo $age["elon"]. "<br>";     
        echo $age["musk"] . "<br>";    



        // add in one value in array 
        $fruits = array("Apple" , "Banana" , "Cherry");
        $fruits[]= "Mango";

        var_dump($fruits);


        $cars = array("brand" => "Ford", "model" => "Mustang");
        $cars["color"] = "Red";

        var_dump($cars);


         // Add Multiple Array Items
            $fruits = array("Apple" , "Banana" , "Cherry");
            array_push($fruits , "orange" , "Kiwi" , "Lemon");

            //Output the array:
            var_dump($fruits);

            // Add Multiple Items to Associative Arrays

            $cars = array("brand" => "Ford", "model" => "Mustang");
            $cars +=  ["color" => "Red" , "year" => 2005];
            var_dump($cars)   
            
    ?>
</body>
</html>