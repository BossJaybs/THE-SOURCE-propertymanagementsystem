<?php
require_once __DIR__ . '/src/config/Database.php';

// Initialize database connection
$db = new Database();
$conn = $db->connect();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING) ?? '';
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING) ?? '';
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING) ?? '';
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING) ?? '';
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING) ?? '';

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO Properties (Address, City, State, ZIP, Type) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssss", $address, $city, $state, $zip, $type);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Property added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();

    // Redirect after a short delay
    header("Refresh: 2; URL=index.php");
    exit;
} else {
    // If the form wasn't submitted, redirect to the form page
    header("Location: add_property.php");
    exit;
}
?>

