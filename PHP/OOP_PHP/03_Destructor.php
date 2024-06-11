<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP OOP - Destructor !</h1>
    <p>A destructor is called when the object is destructed or the script is stopped or exited.</p>

    <?php

        class abc{

            public function __construct() {
                echo "This is  Construct function <br>";
            }

            public function hello(){
                echo "Hello Everyone  <br>";
            }

            public function __destruct() {
                echo "This is Destruct  function <br>";
            }
        }

        $test = new abc();
        $test->hello();
        $test->hello();
        $test->hello();

    ?>
</body>
</html>