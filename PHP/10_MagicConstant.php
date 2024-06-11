<?php


     // The current line number.
    echo "Line Number : " . __LINE__ ."<br>";

     // The file name including the full path.
    echo "The Full path of this File is  : " . __FILE__ ."<br>";

   // The directory of the file.
    echo "The Full path of this DIR is  : " . __DIR__ ."<br>";

//If inside a function, the function name is returned.
    function MyFunction() {
        echo "The Function Name is : " . __FUNCTION__;
    }
    MyFunction();

    echo "<br>";

//If used inside a class, the class name is returned.
//     class Fruits {
//   public function myValue(){
//     return __CLASS__;
//   }
// }
//    $kiwi = new Fruits();
//   echo $kiwi->myValue();    
    

//   If used inside a function that belongs to a class, both class and function name is returned.
class Fruits {
  public function myValue(){
    return __METHOD__;
  }
}
$kiwi = new Fruits();
echo $kiwi->myValue();


// If used inside a namespace, the name of the namespace is returned.

// namespace myArea;

function myValue(){
  return __NAMESPACE__;
}
echo myValue();
    echo "<br>";


// If used inside a trait, the trait name is returned.
trait message1 {
  public function msg1() {
    echo __TRAIT__; 
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();

?>


