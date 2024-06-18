<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "musicuser"; // Replace with your actual database name

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



// Handle music upload
$msg_music = "";
$failed_music = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['music']) && $_FILES['music']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['music'];
        dd($file);
        $file_name = $file['name'];
        $file_type = $file['type'];
        $temp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_destination = "uploads/" . basename($file_name);

        // Check if file is a valid music type (MP3)
        $allowed_types = ['audio/mpeg'];
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($temp_name, $file_destination)) {
                // Insert into database
                $stmt = $conn->prepare("INSERT INTO music (music) VALUES (?)");
                $stmt->bind_param("s", $file_name);

                if ($stmt->execute()) {
                    // Redirect to avoid form resubmission on refresh
                    header("Location: index.php");
                    exit;
                } else {
                    $failed_music = "Something went wrong: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $msg_music = "Failed to move uploaded file.";
            }
        } else {
            $msg_music = "Invalid file type. Only MP3 files are allowed.";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Display Music</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Upload Music</h2>
            <!-- Music Form -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="music">Music Upload</label>
                    <input type="file" class="form-control-file" name="music" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit_music" value="Submit Music">
            </form>
            <?php
                if (!empty($failed_music)) {
                    echo "<div class='alert alert-danger'>$failed_music</div>";
                }
                if (!empty($msg_music)) {
                    echo "<div class='alert alert-warning'>$msg_music</div>";
                }
            ?>
        </div>
    </div>

    <!-- Music List -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Music List</h2>
            <?php
            // SQL query to fetch all music
            $sql = "SELECT id, music FROM music WHERE music IS NOT NULL ORDER BY id ASC";
            $result = $conn->query($sql);

            // Display data in a table
            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr><th>ID</th><th>Music</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>";
                    if ($row["music"]) {
                        $music_path = "uploads/" . htmlspecialchars($row["music"]);
                        echo "<audio controls><source src='" . $music_path . "' type='audio/mpeg'>Your browser does not support the audio tag.</audio>";
                    } else {
                        echo "No music uploaded";
                    }
                    echo "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No music found.</p>";
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
