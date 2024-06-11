<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>PHP Sessions</h1>

<p>what is Sessions ?</p>
<p>Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.</p>

    

    <!--  step 1 -->
    <!-- session_start() -->

    <!-- step 2 -->
    <!-- $_SESSION[name] = value ; -->

    <!-- step 3  -->
    <!-- echo $_SESSION[name]; -->



    <!-- Delete Session  -->
    
    <!-- step 1  -->
    <!-- remove alll session variable  -->
    
    <!-- session_unset() -->

    <!-- step 2 -->
    <!-- y the session  -->destroy

    <!-- session_destroy(); -->
    


    <?php
 
    session_start();
    
    $_SESSION['fav-color'] = "green";

    $_SESSION['favAnimal'] = "Dog";


    echo "Session variables are set.";

    

    
    ?>
</body>
</html>