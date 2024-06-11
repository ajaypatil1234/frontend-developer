<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP echo and print Statements</h1>
    <p>echo and print are more or less the same. They are both used to output data to the screen</p>
    <p>The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.</p>

    <pre>
            echo "Ajay" , "Patil";
            echo "Ajay" . "Patil";
            echo <b> Ajay Patil</b>;
            echo "Ajay  Patil";
    </pre>

        <?php
            echo "Ajay" , "Patil </br>";
            echo "Ajay" . "Patil </br>";
            echo "<b> Ajay Patil</b> </br>";
            echo "Ajay Patil </br>  </br>";

            // echo can use double inverted comma  and single inverted comma
            // echo and use round brackets  ()
                echo 'Single inverted comma </br>';
                echo "Double inverted comma </br>";
                echo ('Round brackets </br>');
        ?>

        <h4>The PHP print Statement</h4>
        <p>The print statement can be used with or without parentheses: print or print().</p>

        <?php
            print "<h2>PHP is Fun!</h2>";
            print "Hello world!<br>";
            print "I'm about to learn PHP!";
        ?>
</body>
</html>