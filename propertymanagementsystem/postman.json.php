<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set JSON content type header
header('Content-Type: application/json');

// Sample data matching your JSON structure
$data = [
    "name" => "John Doe",
    "email" => "john@example.com",
    "contact" => "1234567899",
    "address" => "123 Main St, City, Country",
    "property_id" => 1
];

// Convert to JSON and output
echo json_encode($data, JSON_PRETTY_PRINT);
?>