<?php
require_once 'src/models/Tenant.php';

if (isset($_GET['id'])) {
    $tenantModel = new Tenant();
    $result = $tenantModel->delete($_GET['id']);

    header('Location: tenants.php');
}
?>
