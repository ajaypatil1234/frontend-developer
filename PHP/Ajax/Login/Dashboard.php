<?php
session_start();

// Check if the session variable is set and not empty
if (isset($_SESSION['firstName'])) {
    $firstName = $_SESSION['firstName'];
} else {
    // If the session variable is not set, redirect to the login page
    header("Location: LoginForm.php");
    exit();
}

// Check if the last activity session variable is set
if (isset($_SESSION['lastActivity'])) {
    $lastActivity = $_SESSION['lastActivity'];
    $currentTime = time();
    
    // If the time difference exceeds 30 seconds, redirect to the logout page
    if (($currentTime - $lastActivity) > 30) {
        header("Location: Logout.php");
        exit();
    }
}

// Update the last activity time
$_SESSION['lastActivity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        header a {
            background-color: red;
            padding: 10px;
            color: white;
            text-decoration: none;
        }
        header h1 {
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .cards {
            display: flex;
            justify-content: space-between;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            font-size: 24px;
            margin: 10px 0 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="userPage.php">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Reports</a></li>
        </ul>   
    </div>
    <div class="main-content">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($firstName); ?>!</h1>
            <a href="Logout.php">Logout</a>
        </header>
        <section class="content">
            <h2>Dashboard Overview</h2>
            <div class="cards">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>1,234</p>
                </div>
                <div class="card">
                    <h3>New Registrations</h3>
                    <p>56</p>
                </div>
                <div class="card">
                    <h3>Sales</h3>
                    <p>$12,345</p>
                </div>
            </div>
        </section>
          
    </div>
        

</body>
</html>
