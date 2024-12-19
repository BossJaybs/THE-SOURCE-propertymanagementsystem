<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Add Property</h1>
    </header>

    <div class="container">
        <form action="create_property.php" method="POST">
            <input type="text" name="name" placeholder="Property Name" required>
            <input type="text" name="location" placeholder="Location" required>
            <select name="type" required>
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
            </select>
            <input type="number" name="price" placeholder="Price" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <button type="submit" class="submit-btn">Add Property</button>
        </form>
    </div>
</body>
</html>

