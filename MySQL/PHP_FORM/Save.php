
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_POST['submit'])){

    
    // This is the database connection file


    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "B2BFORM";

    $connect = mysqli_connect($server, $username, $password, $database);

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }else{
        echo "Connection Successfull <br>";
    }


        // This create Database

        // $create_database = "CREATE DATABASE B2BFORM";

        // $result = mysqli_query($connect, $create_database);


        // if($result){
        //     echo "Database Created Successfully <br>";
        // }else{
        //     echo "Database Creation Failed: " . mysqli_error($connect);
        // }



        // This create Table
        
        // $sql = "CREATE TABLE B2BTable(
        //     id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        //     Full_Name VARCHAR(255) NOT NULL,
        //     Contact_No VARCHAR(255) NOT NULL,
        //     Email VARCHAR(255) NOT NULL,
        //     Gender VARCHAR(255) NOT NULL,
        //      City VARCHAR(255) NOT NULL
        // )";

        // $result = mysqli_query($connect, $sql);
        
        // if($result){
        //     echo "Table Created Successfully <br>";
        // }else{
        //     echo "Table Creation Failed: " . mysqli_error($connect);
        // }



        // Insert Data
        
            $Full_Name = $_POST['Full_Name'];
            $Contact_No = $_POST['Contact_No'];
            $Email = $_POST['Email'];
            $Gender = $_POST['Gender'];
            $City = $_POST['City'];
            $Address = $_POST['Address'];



                $sql = "INSERT INTO B2BTable(Full_Name, Contact_No, Email, Gender, City, Address) 
                VALUES('$Full_Name', '$Contact_No', '$Email', '$Gender', '$City', '$Address')";

                $result = mysqli_query($connect, $sql);

                if($result){
                    echo "Data Inserted Successfully <br>";
                    header("Location: ShowTable.php");
                }else{
                    echo "Data Insertion Failed: " . mysqli_error($connect);
                }
                
         

    }




?>
</body>
</html>