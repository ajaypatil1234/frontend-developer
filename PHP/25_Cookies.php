<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    
        <h2>What is Cookies ?</h2>
         <div>:- A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and  cookie values.</div>

         <p>setcookie(name, value, expire, path, domain, secure, httponly);</p>
          <p>setcookie("category" , "Books" , time() + 86400 , "/");</p>  

   <?php
        // Syntax of set a Cookie 
        setcookie("category" , "Books" , time() + 86400 , "/");

        //    Delete cookie  
        // setcookie("category" , "" , time() - 86400 , "/");



        // cookies count 
        if(count($_COOKIE) >  0){
            echo "Cookies are enabled";
        }else{
            echo "Cookies are disabled .";
        }




   ?>
</body>
</html>