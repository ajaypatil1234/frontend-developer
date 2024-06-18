<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "storevideo";

// Create connection
$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging function
if (!function_exists('dd')) {
    function dd(...$args) {
        echo '<pre>';
        array_map(function($x) {var_dump($x);}, $args);
        echo '</pre>';
        die;
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['video']) && $_FILES['video']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['video'];

        $file_name = $file['name'];
        $file_type = $file['type'];
        $temp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_destination = "uploads/" . basename($file_name);

        // Check if file is a valid video type
        $allowed_types = ['video/mp4', 'video/avi', 'video/mov', 'video/mpeg'];
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($temp_name, $file_destination)) {
                $stmt = $conn->prepare("INSERT INTO video (video) VALUES (?)");
                $stmt->bind_param("s", $file_name);

                if ($stmt->execute()) {
                    // Redirect to avoid form resubmission on refresh
                    header("Location: demo.php");
                    exit;
                } else {
                    $failed = "Something went wrong: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $msg = "Failed to move uploaded file.";
            }
        } else {
            $msg = "Invalid file type. Only MP4, AVI, MOV, and MPEG are allowed.";
        }
    } else {
        $msg = "No file uploaded or upload error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Display Videos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Upload Video</h2>
            <!-- Video Form -->
            <form action="demo.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="video">Video Upload</label>
                    <input type="file" class="form-control-file" id="video" name="video" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </form>
            <?php
                if (isset($failed)) {
                    echo "<div class='alert alert-danger'>$failed</div>";
                }
                if (isset($msg)) {
                    echo "<div class='alert alert-warning'>$msg</div>";
                }
            ?>
        </div>
        <div class="col-md-6">
            <h2>Video List</h2>
            <!-- Display Videos -->
            <?php
            // SQL query to fetch all videos
            $sql = "SELECT id, video FROM video ORDER BY id ASC";
            $result = $conn->query($sql);

            // Display data in a table
            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr><th>ID</th><th>Video</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    $video_path = "uploads/" . htmlspecialchars($row["video"]);
                    echo "<tr><td>" . $row["id"] . "</td><td>
                        <video width='320' height='240' controls>
                            <source src='" . $video_path . "' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
