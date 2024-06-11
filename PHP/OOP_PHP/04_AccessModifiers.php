<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Modifiers</title>     
</head>
<body>
        <h1>OOP - Access Modifiers</h1>

        <?php

        //Public 
            echo "public - the property or method can be accessed from everywhere. This is default <br>";
            
                   class base {
                    
                    public $name;

                    public function __construct($n){
                        $this->name = $n;
                    }


                    public function show() {
                        echo "Your Position  : " . $this->name  ."<br>";
                    }
                }
                    $test = new base("Frontend Developer");
                    // this overWrite a in Public Method 
                    $test->name= "Web Developer  ;";
                     $test-> show();

                   echo "<br>";  


        //Protected
          echo "protected - the property or method can be accessed within the class and by classes derived from that class <br>";      
                  
                  class test {
                    protected $name;

                    public function __construct($n){
                        $this->name = $n;
                    }

                    protected function show() {
                        echo "Your Position  : " . $this->name  ."<br>";
                    }

                }

                    class derived extends base {
                        public function get() {
                            echo "Your Name  : " .$this->name . "<br>";
                        }
                    }
                    
                    
                    $test = new derived("Aj Patil ;");
                    // this overWrite a in Protectesd Method can Error Show  
                    // $test->name= "Web Developer;";
                     $test-> get();


                   echo "<br>";  


                   // 2nd Example    Protect only assing in Class      

                   class Protect{
                      protected $email  = "abc@gmail.com";
                    }

                    // protect value only get in Class 
                    class admin extends Protect {
                        public function getEmail(){
                            return $this->email;
                        }
                    }
                    
                    $admin = new admin();
                    echo $admin->getEmail();

                   echo "<br>";  


        //Private
          echo "private - the property or method can ONLY be accessed within the class <br>";              
                    
                  class secure {
                    private $name;

                    private function __construct($n){
                        $this->name = $n;
                    }

                    private function show() {
                        echo "Your Position  : " . $this->name  ."<br>";
                    }

                }

                    class securederived extends base {
                        public function get() {
                            echo "Your Name  : " .$this->name . "<br>";
                        }
                    }
                    
                    $secure = new base("Frontend Developer ;");
                    // this overWrite a in Protectesd Method can Error Show  
                    // $secure->name= "Web Developer;";
                     $secure-> show();


                    // Privite Access Modifier  2nd Example 

                    class User{
                        public $name = 'Aj';
                        private $password = 123456; 

                        public function getpass(){
                            return $this->password;
                        }

                    }

                    $user = new User();
                    echo $user->name;
                    // private not get outside of the class 
                    // echo $user->password;

                    echo $user->getpass();
                    

        ?>  
</body>
</html>