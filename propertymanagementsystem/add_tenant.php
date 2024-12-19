<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tenant</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Add Tenant</h1>
    </header>

    <div class="container">
        <form action="create_tenant.php" method="POST">
            <input type="text" name="name" placeholder="Tenant Name" required>
            <input type="email" name="email" placeholder="Tenant Email" required>
            <input type="text" name="contact" placeholder="Tenant Contact" required>
            <textarea name="address" placeholder="Tenant Address"></textarea>
            
            <label for="property_id">Property:</label>
            <select name="property_id" id="property_id" required>
                <option value="">Select Property</option>
                <?php
                require_once 'src/models/Property.php';
                $propertyModel = new Property();
                $properties = $propertyModel->getAll();
                foreach ($properties as $property) {
                    echo "<option value='{$property['id']}'>{$property['name']}</option>";
                }
                ?>
            </select>
            
            <button type="submit" class="submit-btn">Add Tenant</button>
        </form>
    </div>
</body>
</html>
