<?php
require_once 'src/models/Property.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $propertyModel = new Property();
    $propertyModel->update($id, $name, $location, $type, $price, $description);

    header('Location: properties.php');
}
?>
