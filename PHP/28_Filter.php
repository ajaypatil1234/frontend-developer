

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3>PHP filter_var() Function</h3>
<div>The filter_var() function both validate and sanitize data.</div>

<?php

$var = 22;

// var_dump return   check value and data types 
// var_dump(filter_var($var , FILTER_VALIDATE_INT));
$options  =  array("options" => array("min_range" => 20 , "max_range" => 30));

// // FILTER_VALIDATE_INT is check only  integer value 
if(filter_var($var , FILTER_VALIDATE_INT , $options )){
    echo "<br> $var is Integer ";
}else{
    echo "<br> $var in not Integer";
}



// FILTER_VALIDATE_FLOAT is check only  Float value 
// $var = '22';
// if(filter_var($var , FILTER_VALIDATE_FLOAT )){
//     echo "<br> $var is Float ";
// }else{
//     echo "<br> $var in not Float";
// }


// FILTER_VALIDATE_BOOLEAN is check only  BOOLEAN value 
// $var = true;
// var_dump(filter_var($var , FILTER_VALIDATE_BOOLEAN));
// if(filter_var($var , FILTER_VALIDATE_BOOLEAN , FILTER_NULL_ON_FAILURE)){
//     echo "<br> $var is Boolean ";
// }else{
//     echo "<br> $var in not Boolean";
// };


// FILTER_VALIDATE_EMAIL is check only  EMAIL value 
// $var = "AjayPatil@gmail.com";
// var_dump(filter_var($var , FILTER_VALIDATE_EMAIL));
// if(filter_var($var , FILTER_VALIDATE_EMAIL)){
//     echo "<br> $var is Valid EMAIL ";
// }else{
//     echo "<br> $var in not Valied EMAIL";
// }



// FILTER_VALIDATE_URL is check only  URL value 
    // Filter Flage Path Required is path "/" in Url
    // Filter Flage QUERY Required is QUERY "?" in Url
// $var = "https://NarayanInfotech.com?test";

// var_dump(filter_var($var , FILTER_VALIDATE_URL));
// if(filter_var($var , FILTER_VALIDATE_URL ,  FILTER_FLAG_QUERY_REQUIRED)){
//     echo "<br> $var is Valid URL ";
// }else{
//     echo "<br> $var in not Valied URL";
// }


// FILTER_VALIDATE_IP is check only  IP value 

// $var = "192.135.1.100";

// if(filter_var($var , FILTER_VALIDATE_IP)){
//     echo "<br> $var is Valid IP ";
// }else{
//     echo "<br> $var in not Valied IP";
// }


// //    Sanitize string  

// $str = "<h1>Hello World!</h1>";
// $newstr = filter_var($str, FILTER_SANITIZE_STRING);
// echo $newstr;

?>
</body>
</html>


