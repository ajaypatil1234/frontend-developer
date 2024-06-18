<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload and Display PDF Files</title>
</head>
<body>

    <h2>Upload PDF File</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="pdfFile">Choose a PDF file to upload:</label>
        <input type="file" name="pdfFile" id="pdfFile">
        <button type="submit" name="submitUpload">Upload File</button>
    </form>

    <?php
    // Handle file upload and database insertion
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitUpload"])) {
        
        // Database connection details
        $servername = "localhost";  // Change this to your database server name
        $username = "root";         // Change this to your database username
        $password = "";             // Change this to your database password
        $dbname = "userpdfdata";    // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // File upload handling
        $pdfFileName = $_FILES["pdfFile"]["name"];
        $pdfTmpName = $_FILES["pdfFile"]["tmp_name"];
        
        // Directory where uploaded files will be stored
        $uploadDirectory = "uploads/";

        // Move uploaded file to designated directory
        if (move_uploaded_file($pdfTmpName, $uploadDirectory . $pdfFileName)) {
            echo "PDF file uploaded successfully.";

            // Read the file content
            $pdfContent = file_get_contents($uploadDirectory . $pdfFileName);
            
            // Prepare SQL insert statement
            $stmt = $conn->prepare("INSERT INTO userdata (filedata) VALUES (?, ?)");
            $stmt->bind_param("sb", $pdfFileName, $pdfContent);

            // Execute the statement
            if ($stmt->execute()) {
                echo "File data inserted into database.";
            } else {
                echo "Error inserting file data into database: " . $stmt->error;
            }

            // Close statement
            $stmt->close();

        } else {
            echo "Error uploading PDF file.";
        }

        // Close database connection
        $conn->close();
    }
    ?>

    <hr>

    <h2>Display PDF Files</h2>

    <?php
    // Database connection details
    $servername = "localhost";  // Change this to your database server name
    $username = "root";         // Change this to your database username
    $password = "";             // Change this to your database password
    $dbname = "userpdfdata";    // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve PDF file data from database
    $sql = "SELECT filedata	 FROM userdata";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $filename = $row['file_name'];

            // Display link to PDF file
            echo '<a href="display_pdf.php?filename=' . urlencode($filename) . '" target="_blank">' . $filename . '</a><br>';
        }
    } else {
        echo "No PDF files found in the database.";
    }

    // Close database connection
    $conn->close();
    ?>

</body>
</html>
