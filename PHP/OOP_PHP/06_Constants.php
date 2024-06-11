         <!DOCTYPE html>
         <html lang="en">
         <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Constants Class</title>
         </head>
         <body>

                <div>
                        <h2>Class Constants</h2>
                        <p>A constant cannot be changed once it is declared.</p>
                        <p>We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name, like here:</p>
                </div>


                <?php

                class Goodbye{

                  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";

                }
               
                 echo Goodbye::LEAVING_MESSAGE;

                ?>  
        </body>
        </html> 