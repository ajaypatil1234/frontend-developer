<?php
    
    // SuperGlobal $_GET method 
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    // echo $_GET["name"]; 

    // SuperGlobal $_Post method 

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo $_POST["name"] ;

// SuperGlobal $_REQUEST method 

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    // echo "My name is " .  $_REQUEST["name"] . "<br>";
    // echo "This is My Email Id : ".  $_REQUEST["email"]; 


    // Server 
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

    echo $_SERVER['PHP_SELF'];
    echo $_SERVER['HTTP_HOST']


?>





