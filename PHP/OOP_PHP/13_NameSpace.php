<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NameSpace</title>
</head>
<body>
    <h1>PHP Namespaces  </h1>
    <p>To define a namespace in PHP, you use the namespace keyword at the top of your PHP file.</p>
    <?php
    
    require '14_ProductNameSpace.php';
    require '15_TestingNameSpace.php';

    // possible two file on Function Name Declare 
        function wow(){
            echo "wow From the index File";
        }


        $obj = new  pro\product();
      // $obj1 = new \test\product();

        
    // first declare namespace name possible two file on Function Name Declare 
        pro\wow();

    ?>
</body>
</html>