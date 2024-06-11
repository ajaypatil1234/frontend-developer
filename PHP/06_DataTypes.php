<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>What is Data Types?</h1>
    <h4>PHP Data Types</h4>
    <ul>
        <li>String
            <p>$X = "Hello world" -String</p>
        </li>
        <li>Integer
            <p>$X = 33 - Integer</p>
        </li>
        <li>Float
        <p>$x = 30.50   -Float</p>        
    </li>
        <li>Boolean 
            <p>$x = true/fasle   - Boolean</p>
        </li>
        <li>Array
            <p>$cars = array("Volvo","BMW","Toyota");   - Array</p>
        </li>
        <li>Object :- 
            <p>$Obj = {
                name:'ajay',
                last_name : 'patil',
                city :'surat'
            </p>
        </li>
        <li>NULL 
            <p>$null = null;</p>
        </li>
    </ul>

    <?php
            // check var_dump in String 
            $string = "Hey Aj Patil";
            echo $string . "<br>";

            // var dump is return data type name and  index number 
            var_dump($string);



            // check var_dump in Number 
            $Number = 2005;
            echo $Number . "<br>";

            // var dump is return data type name and  index number 
            var_dump($Number);



            // check var_dump in Float 
            $Float = 23.09;
            echo $Float . "<br>";

            // var dump is return data type name and  index Number 
            var_dump($Float);


            
            // check var_dump in Boolean     
            $boolea = true;
            echo $boolea . "<br>";

            // var dump is return data type name and  index Number 
            var_dump($boolea);



            
            // check var_dump in Array 
            $array = array('html','Css' , 'Js');
            echo $array[0] ;

            // var dump is return data type name and  index Number 
            var_dump($array);
    ?>
</body>
</html>