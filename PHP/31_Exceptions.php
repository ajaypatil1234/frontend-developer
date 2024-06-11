<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php

            function division($n) {
                try {
                    if ($n <= 0){
                        throw new Exception ("<br> Enter the Valid Number");
                    }
                    $div = 2 / $n;
                    echo "<br>" . $div;
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }

                // division(2);
                // division(0);
                division(4);


             // getMessage() -> this inbuilt function show  the message    
            // getLine()  -> This inbuilt function show Which Line Error Line number show 
            //getFile() -> this inbuilt function show which file Error show 
        ?>

</body>
</html>