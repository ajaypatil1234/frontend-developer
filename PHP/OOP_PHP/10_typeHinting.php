<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Hinting</title>
</head>
<body>
    <?php
     // int type return only Number value not another data type 
            function sum(int $v){
                echo $v + 1;
            }

            sum(10);
            echo "<br>";


     // Array type return only Array value not another data type 

            function fruits(array $names){
                foreach($names as $name){
                    echo $name . "<br>";
                }
            }

             $test = ["Apple","Banana","Mango"];   
            fruits($test);


            // class Type 
                class hello{
                    public function sayhello(){
                        echo "Hello  Everyone";
                    }
                }

                class bye{
                    public function saybye(){
                        echo "Bye Everyone";
                    }
                }

                function wow(hello $h){
                    $h->sayhello();
                }

                $test  = new hello();
                wow($test);

    ?>
</body>
</html>

