<?php
session_start(); // Start the session to track the user
require_once 'src/models/Auth.php'; // Include the Auth class

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new Auth();
    if ($auth->register($username, $password)) {
        $_SESSION['message'] = "Registration successful! Please log in.";
        header('Location: login.php'); // Redirect after successful registration
        exit();
    } else {
        $error = "Registration failed! Username already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <div class="container">
        <form method="POST" action="register.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
