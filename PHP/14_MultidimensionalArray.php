<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php

        $emp = [
            [1, "Krishna" , "Manager" , 50000],
            [2, "Salman" , "Salesman" , 20000],
            [3, "Mohan" , "Operators" , 12000],
            [4, "Amir" , " Driver " , 25000],
        ];

            // echo "<pre>";
            // print_r($emp);
            // echo "</pre>";


            // This is very Long code to display 


        // echo $emp[0][0]. " ";
        // echo $emp[0][1]. " ";
        // echo $emp[0][2]. " ";
        // echo $emp[0][3]. " ";
        // echo "<br>";
        // echo $emp[1][0]. " ";
        // echo $emp[1][1]. " ";
        // echo $emp[1][2]. " ";
        // echo $emp[1][3]. " ";
        // echo "<br>";
        // echo $emp[2][0]. " ";
        // echo $emp[2][1]. " ";
        // echo $emp[2][2]. " ";
        // echo $emp[2][3]. " ";
        // echo "<br>";
        // echo $emp[3][0]. " ";
        // echo $emp[3][1]. " ";
        // echo $emp[3][2]. " ";
        // echo $emp[3][3]. " ";
        // echo "<br>";
        
    



            // Sort Code in Dislay use For Loop  
            // for($row = 0 ; $row < 4 ; $row++){
            //     for($col = 0; $col < 4; $col++){
            //         echo $emp[$row][$col];
            //     }
            //     echo "<br>";
            // }


            //  Sort Code  Use ForEach loop

            
            echo "<table border='2px' cellpadding='5px' cellspacing='0'>";
            foreach($emp as $v1){
                echo"<tr>";
                foreach($v1 as $v2){
                   echo "<td>$v2</td>";
            }
                echo"</tr>";
            }
            echo "</table>"    
    


        ?>
</body>
</html>