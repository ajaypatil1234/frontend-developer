<?php

    include 'ConnectDB.php';
    

    if(isset($_POST['submit'])){



    $Fullname = $_POST['Fullname'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ContactNumber = $_POST['ContactNumber'];
    $DOB = $_POST['DOB'];
    $Comments = $_POST['Comments'];
    $Gender = $_POST['Gender'];
    $Countries = $_POST['Countries'];
    $City = $_POST['City'];

    $errors = array();


    if($Fullname == "" || empty($Fullname)){
        $errors['error1'] = "Please enter your full name";
    }


    if (empty($_POST["Email"])) {
        $errors['error2'] = "Please Enter Email";
    } elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        $errors['error2'] = "Invalid Email Format";
    }


      if (empty($_POST["Password"])) {
        $errors['error3'] = "Please Enter Password";
    }


    if (empty($_POST["ContactNumber"])) {
        $errors['error4'] = "Please Enter Contact Number";
    }//  elseif (!preg_match("/^\d{5}-\d{5}$/", $_POST["ContactNumber"])) {
    //     $errors['error4'] = "Invalid Contact Number Format";
    // }

     // Date of Birth validation
    if (empty($_POST["DOB"])) {
        $errors['error5'] = "Please Enter Date of Birth";
    }
    
    // Comments validation
    if (empty($_POST["Comments"])) {
        $errors['error6'] = "Please Enter Comments";
    }
    
    // Gender validation
    if (empty($_POST["Gender"])) {
        $errors['error7'] = "Please Select Gender";
    }
    
    // Countries validation
    if (empty($_POST["Countries"])) {
        $errors['error8'] = "Please Select at Least One Country";
    }
    
    // City validation
    if (empty($_POST["City"])) {
        $errors['error9'] = "Please Select City";
    }


   if (!empty($errors)) {
        $query = http_build_query($errors);
        header("Location: index.php?$query");
        exit();
    }

    else{
         // data Insert in Table 
        $sql = "INSERT INTO user_info(Fullname , Email , Password , ContactNumber , DOB , Comments , Gender , Countries , City) 
        VALUES ('$Fullname' , '$Email' , '$Password' , '$ContactNumber' , '$DOB' , '$Comments' , '$Gender' , '$Countries' , '$City')";

        $result = mysqli_query($connect , $sql);

        if($result){
            echo "Data inserted successfully";
            header("Location: View.php");
        }else{
            echo "Data insertion failed: " . mysqli_error($connect);
        }
        
               }
        
        }

?>