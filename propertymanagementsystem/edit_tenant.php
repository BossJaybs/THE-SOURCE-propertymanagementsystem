<?php
require_once 'src/models/Tenant.php';
require_once 'src/models/Property.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$tenantModel = new Tenant();
$propertyModel = new Property();

$tenant = $tenantModel->getById($id);
$properties = $propertyModel->getAll();

if (!$tenant) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tenant</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Tenant</h1>
    </header>

    <div class="container">
        <form action="update_tenant.php" method="POST">
            <input type="hidden" name="id" value="<?= $tenant['id'] ?>">

            <input type="text" name="name" value="<?= $tenant['name'] ?>" placeholder="Tenant Name" required>
            <input type="email" name="email" value="<?= $tenant['email'] ?>" placeholder="Tenant Email" required>
            <input type="text" name="contact" value="<?= $tenant['contact'] ?>" placeholder="Tenant Contact" required>
            <textarea name="address" placeholder="Tenant Address"><?= $tenant['address'] ?></textarea>

            <label for="property_id">Property:</label>
            <select name="property_id" id="property_id" required>
                <?php foreach ($properties as $property): ?>
                    <option value="<?= $property['id'] ?>" <?= $property['id'] == $tenant['property_id'] ? 'selected' : '' ?>>
                        <?= $property['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="submit-btn">Update Tenant</button>
        </form>
    </div>
</body>
</html>
