<?php
require_once 'src/models/Property.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$propertyModel = new Property();
$property = $propertyModel->getById($id);

if (!$property) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Property</h1>
    </header>

    <div class="container">
        <form action="update_property.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $property['id']; ?>">
            <input type="text" name="name" value="<?php echo $property['name']; ?>" placeholder="Property Name" required>
            <input type="text" name="location" value="<?php echo $property['location']; ?>" placeholder="Location" required>
            <select name="type" required>
                <option value="Residential" <?php echo $property['type'] == 'Residential' ? 'selected' : ''; ?>>Residential</option>
                <option value="Commercial" <?php echo $property['type'] == 'Commercial' ? 'selected' : ''; ?>>Commercial</option>
            </select>
            <input type="number" name="price" value="<?php echo $property['price']; ?>" placeholder="Price" required>
            <textarea name="description" placeholder="Description" required><?php echo $property['description']; ?></textarea>
            <button type="submit" class="submit-btn">Update Property</button>
        </form>
    </div>
</body>
</html>