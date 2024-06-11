<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>String PHP</h1>
<?php
        

        $str = "Hello World";
        
        
        //Uppercase string 
        echo   strtoupper( $str) . "<br>";
        
        
        // lower CASE
        echo   strtolower( $str) . "<br>"; 
        
        
        //   lcfirst is first later in lowercase 
        echo   lcfirst( $str) . "<br>"; 
        
        
        //   ucfirst is first later  in uppercase 
        echo  ucfirst( $str) . "<br>"; 
        
        
        // ucwords convert the first character of each word a string to Uppercase
        $str = "hello world ";
        echo ucwords($str)."<br>";
        
        
        
        // Str_replace() is work string word replace 
                       // word          replace name         assign var
        echo str_replace("hello world" , "This is for Testing" , $str ). "<br> ";

        
        
        //strrev() it is used to reverse a string
        echo strrev($str)."<br> ";

        
        
        // strlen lenght 
        echo strlen("Hello world!") . "<br> <br>";

        
        
        
        
        // Substr it return a part of string 
        //  - string 
        // - start 
        // -lenght

        $demo = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore et adipisci quibusdam ullam nam molestias magni odio velit dicta error voluptatum excepturi, enim hic incidunt doloribus officiis ex, nihil doloremque reiciendis praesentium recusandae voluptates corporis. Omnis unde magnam accusantium veniam delectus corporis fugit? Eum commodi aspernatur soluta eius. Obcaecati a velit nisi totam. Molestiae officiis eveniet nemo, laborum laudantium fugit. Similique repellat molestiae incidunt nostrum, veniam, maiores, culpa debitis quasi accusamus dolore est! Voluptas cumque nemo saepe error, aut amet, doloremque dicta quis alias provident officia ea odio, quo doloribus dolores? Laudantium pariatur soluta porro dolore enim? Expedita, amet non.";

        echo substr($demo , 0 , 116 )."<br> <br>";




        // trime remove space arond content 
        $x = " Hello World! ";

        echo "<input value='" . $x . "'>";
        echo "<br>";
        echo "<input value='" . trim($x) . "'>" ."<br> <br>";
        


        // Concatenate String 

        $a = "He";
        $b = "llo";
        $c = $a . $b;
        echo $c ."<br>";



        
?>

</body>
</html>