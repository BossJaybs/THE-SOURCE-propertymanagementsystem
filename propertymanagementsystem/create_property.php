<?php
require_once 'src/models/Property.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $propertyModel = new Property();
    $propertyModel->create($name, $location, $type, $price, $description);

    header('Location: properties.php');
}
?>
