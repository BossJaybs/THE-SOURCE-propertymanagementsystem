
<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome to the Dashboard</h1>
    </header>
    <div class="container">
        <?php
        // Check if the session variable is set
        if (isset($_SESSION['auth']['username'])) {
            echo "<p>You are logged in as " . htmlspecialchars($_SESSION['auth']['username']) . ".</p>";
        } else {
            echo "<p>You are not logged in.</p>";
        }
        ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>