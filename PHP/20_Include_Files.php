<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>PHP include and require Statements</h1>
<ul>
    <li>require will produce a fatal error (E_COMPILE_ERROR) and stop the script</li>
    <li>include will only produce a warning (E_WARNING) and the script will continue</li>
</ul>
        <?php

        // incluid 
        //   include '20_iclude.php'  ;

          // require 
         require '20_include.php';
         

        ?>
</body>
</html>