<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>



        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="">Name :</label>
            <input type="text" name="fname" id=""><br> <br>
            <label for="">Age  :</label>
            <input type="text" name="age" id=""><br> <br>
             <input type="radio" name="gender" value="male">Male   
             <input type="radio" name="gender" value="Female">Female   
             <input type="radio" name="gender" value="other">others  <br> <br>


             <input type="submit" name="save" id="">
        </form>

        <br><br>

    <?php
        if(isset($_POST['save'])){
            echo  $_POST['fname']."<br>";
            echo $_POST['age']."<br>";
            echo $_POST['gender']."<br>";
        }

    ?>

</body>
</html>