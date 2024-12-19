<?php
session_start();
require_once 'src/models/Auth.php';

// Initialize Auth class
$auth = new Auth();
$auth->logout();

// Redirect to login page
header('Location: login.php');
exit();
?>
