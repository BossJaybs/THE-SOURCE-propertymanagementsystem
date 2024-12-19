<?php
require_once 'src/models/Tenant.php';
require_once 'src/models/Property.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $property_id = $_POST['property_id'];

    $tenantModel = new Tenant();
    $result = $tenantModel->create($name, $email, $contact, $address, $property_id);

    if ($result) {
        header('Location: tenants.php');
    } else {
        echo "Error: Email already exists!";
    }
}
?>
