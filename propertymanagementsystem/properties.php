<?php
require_once 'src/models/Property.php';

$propertyModel = new Property();
$properties = $propertyModel->getAll(); // Fetching all properties
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Property Management System</h1>
    </header>

    <div class="container">
        <a href="index.php" class="add-property-btn">Home</a>
        <a href="add_property.php" class="add-property-btn">Add Property</a>
        <a href="add_tenant.php" class="edit-btn">Add Tenant</a>
        <?php if (empty($properties)): ?>
            <p>No properties found.</p>
        <?php else: ?>
            <table class="property-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($property['name']); ?></td>
                        <td><?php echo htmlspecialchars($property['location']); ?></td>
                        <td><?php echo htmlspecialchars($property['type']); ?></td>
                        <td><?php echo '₱' . number_format($property['price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($property['description']); ?></td>
                        <td>
                            <a href="edit_property.php?id=<?php echo $property['id']; ?>" class="edit-btn">Edit</a>
                            <a href="delete_property.php?id=<?php echo $property['id']; ?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
