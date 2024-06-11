<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traits</title>
</head>
<body>
    <h1>PHP OOP Traits</h1>
    <p>Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).</p>
    <?php

        trait  hello{
            public function sayhello() {
                echo "Hello World";
            }
            
        }
        // you can use trait multiple class 
        class test{
            use hello;
        }

    
        
        $test = new test();
        $test->sayhello();
        echo "<br>";


        ?>
</body>
</html>