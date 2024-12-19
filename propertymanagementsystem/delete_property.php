<?php
require_once 'src/models/Property.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $propertyModel = new Property();
    $propertyModel->delete($id);
}

header('Location: properties.php');
exit;
?>
