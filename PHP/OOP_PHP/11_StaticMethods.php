<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Method </title>
</head>
<body>
    <div>
        <h1>PHP OOP - Static Methods</h1>
        <p>Static methods can be called directly - without creating an instance of the class first.</p>
    </div>


        <?php

        class base {
            public  static $name  = 'Check Static Method ';
            public static function show(){
                echo self::$name;
            }
        }
            // without object create get the value 
            echo base::$name;
            echo "<br>";
            base::show();

            // $test = new base();
            // $test->show();

        ?>
</body>
</html>