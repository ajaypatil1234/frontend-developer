<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Loops in PHP</h1>


    <pre>
        $a = 1;      //  <---  Initialization
        while($a <= 10){    //   <---  Condition 
        echo "while Loops";
        $a+= 1;     // <--- Increment
        }
    </pre>

    
   <?php

    
    echo "<h4>While Loop</h4>";

        $a = 1;      //  <---  Initialization
        while($a <= 10){    //   <---  Condition 
            echo "while Loops <br>" ;
            $a+= 1;     // <--- Increment
        }

        $i = 1;
       while ($i < 6) {
        echo $i . "<br>";
        $i++;
    };


    echo "<h4> do while Loop In PHP</h4>";


    $i = 1;         //  <---  Initialization
    do{
        echo $i .")  Do while Loop". "<br>";
        $i++;                  // <--- Increment
    } while($i <= 5);  //   <---  Condition 


     $n = 5; 



    echo "<h4> For  Loop in PHP</h4>";

for($i = 1 ; $i <= 10 ; $i++){
    echo "Hello For Loops <br>";
}





    echo "ForEach Loops in PHP <br> <br>" ;
        $arr =  array("red" , "Blue" , "Green");
        foreach ($arr as $value) {
                 echo $value . "<br><br>";
        }



        // do while breaK 
        $i = 1;
        do{
            if($i == 6)break;
            echo "$i <br>" ;
            $i++;
        }while($i <= 10);


            // Continue 
            for ($x = 0; $x < 10; $x++) {
            if ($x == 4) {
                continue;
            }
            echo "The number is: $x <br>";
            }

    ?>
</body>
</html>