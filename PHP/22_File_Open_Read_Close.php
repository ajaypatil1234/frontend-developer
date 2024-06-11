<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File open and close</title>
</head>
<body>
        <?php


    // file OPEN 
     $file =  fopen("22_readme.txt" , "r");

    // file read 
        // read how many charcter show in number 
    // echo fread($file , 100 )
    // echo fread($file , filesize("22_readme.txt") );


    // Fget File only one line get 
    //  echo fgets($file)   

    //  fcolse mean file is close 
       fclose($file);

      ?>


</body>
</html>