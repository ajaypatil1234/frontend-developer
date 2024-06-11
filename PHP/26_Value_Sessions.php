<?php

session_start();

// print_r($_SESSION); 


if (isset($_SESSION['fav-color']) && isset($_SESSION['favAnimal'])) {
    echo "My fav color is " . $_SESSION['fav-color'] . "<br>";
    echo "My fav animal is " . $_SESSION['favAnimal'] . "<br>";
} else {
    echo "Session variables are not set.";
}


?>


