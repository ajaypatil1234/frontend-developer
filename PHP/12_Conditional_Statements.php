<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>PHP Conditional Statements</h1>
<h4>Conditional Statements</h4>
<ul>
    <li>Use if to specify a block of code to be executed, if a specified condition is true</li>
    <li>Use else to specify a block of code to be executed, if the same condition is false</li>
    <li>Use else if to specify a new condition to test, if the first condition is false</li>
    <li>Use switch to specify many alternative blocks of code to be executed</li>
</ul>

        <?php

        // if else 
                // $age = 17;
                // if($age >= 18) {
                //     echo "Yes you can Vote";
                // }elseif($age == 17){
                //     echo "please wait one more year";
                // }else{
                //     echo "No you can't Vote";
                // }



                // nested if
                $age = 18;
                if($age >=18){
                    if($age < 66){
                        echo "yes can vote";
                    }else{
                        echo "you can't vote";
                    }
                }else{
                    echo "you can't vote";
                }



                echo "<br>";


                $t = date("H");

                if ($t < "20") {
                echo "Have a good day!";
                } else {
                echo "Have a good night!";
                }
        ?>
</body>
</html>