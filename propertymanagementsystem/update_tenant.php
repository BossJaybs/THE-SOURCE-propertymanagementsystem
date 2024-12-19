<?php
require_once 'src/models/Tenant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $property_id = $_POST['property_id'];

    $tenantModel = new Tenant();
    $result = $tenantModel->update($id, $name, $email, $contact, $address, $property_id);

    header('Location: tenants.php');
}
?>