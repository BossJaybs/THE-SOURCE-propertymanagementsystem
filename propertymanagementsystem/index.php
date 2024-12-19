<?php
session_start(); // Start the session to track the user
require_once 'src/models/Auth.php'; // Include the Auth class

// Create the Auth object to check if the user is authenticated
$auth = new Auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Property Management System</h1>

        <div class="auth-buttons">
            <?php if (!$auth->isAuthenticated()): ?>
                <!-- Show Login/Register buttons if user is NOT logged in -->
                <a href="login.php" class="auth-btn">Login</a>
                <a href="register.php" class="auth-btn">Register</a>
            <?php else: ?>
                <!-- Optionally, show a logout button if the user is logged in -->
                <a href="logout.php" class="auth-btn">Logout</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Content goes here -->
    <div class="container">
        <?php if ($auth->isAuthenticated()): ?>
            <!-- Show dashboard links only if the user is logged in -->
            <div class="dashboard-links">
                <a href="properties.php" class="dashboard-btn">Manage Properties</a>
                <a href="tenants.php" class="dashboard-btn">Manage Tenants</a>
            </div>
        <?php else: ?>
            <!-- If the user is not logged in, display a message -->
            <div class="welcome-message">
                <p>Welcome! Please log in to manage your properties and tenants.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
