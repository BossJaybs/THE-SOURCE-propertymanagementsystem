<?php
require_once 'src/controllers/TenantController.php';

$tenantController = new TenantController();
$tenants = $tenantController->getTenants();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tenants</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Tenants</h1>
    </header>

    <div class="container">
        <a href="index.php" class="add-property-btn">Home</a>
        <a href="add_tenant.php" class="add-property-btn">Add Tenant</a>
        <a href="add_property.php" class="add-property-btn">Add Property</a>
        <table class="property-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Property</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tenants as $tenant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tenant['name']); ?></td>
                    <td><?php echo htmlspecialchars($tenant['email']); ?></td>
                    <td><?php echo htmlspecialchars($tenant['contact']); ?></td>
                    <td><?php echo htmlspecialchars($tenant['address']); ?></td>
                    <td><?php echo htmlspecialchars($tenant['property_id']); ?></td>
                    <td>
                        <a href="edit_tenant.php?id=<?php echo $tenant['id']; ?>" class="edit-btn">Edit</a>
                        <a href="delete_tenant.php?id=<?php echo $tenant['id']; ?>" class="delete-btn">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

