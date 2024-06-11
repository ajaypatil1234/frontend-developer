<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>
<body>

    <?php
    
    if (isset($_FILES['image'])) {
        // echo "<pre>";   
        // print_r($_FILES);
        // echo "</pre>";

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];


        // move_uploaded_file is function upload images and files

    // Check file size
        if($file_size > 500000){
        echo "Sorry, your file is too large.";
        }else{
        if (move_uploaded_file($file_tmp, "upload-images/" . $file_name)) {
            echo "File uploaded successfully!";
        } else {
            echo "Failed to upload file.";
        }
        }
    }

    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image"/> <br><br>
        <input type="submit"/>
    </form>
</body>
</html>
