<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        function myMessage() {
            echo "Hello world!";
          }
          myMessage();

          echo "</br>";


            //PHP Function Arguments

        //   function familyName($fname){
        //     echo "$fname Refsnes.<br>";
        //   }

        //   familyName("Ajay");
        //   familyName("Patil");
        //   familyName("Aj");
        //   familyName("Patil");


          function familyName($fname, $year) {
            echo "$fname Refsnes. Born in $year <br>";
          }
          
          familyName("Hege", "1975");
          familyName("Stale", "1978");
          familyName("Kai Jim", "1983");



        function setHeight($minheight = 50) {
  echo "The height is : $minheight <br>";
}

       setHeight(350);
       setHeight();
        setHeight(80);
       setHeight(135);

        ?>
</body>
</html>