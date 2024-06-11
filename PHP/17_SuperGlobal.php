<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
         Name: <input type="text" name="name"><br>
         E-mail: <input type="text" name="email"><br>
        <input type="submit" name="save">
        </form>
        <br>

         <?php
            if(isset($_POST['save'])){
                echo $_POST['name']."<br>";
                echo $_POST['email'] ."<br>";
            }

         ?>   
        
</body>
</html>