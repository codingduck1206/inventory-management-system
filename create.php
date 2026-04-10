<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://project-static-files-2026.s3.us-east-1.amazonaws.com/style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        <form method="post" action="create.php">
            <label>Name:</label>
            <input type="text" name="name" required>
            
            <label>Description:</label>
            <textarea name="description" rows="4" required></textarea>
            
            <label>Price (RM):</label>
            <input type="number" step="0.01" name="price" required>
            
            <input type="submit" value="Save Product">
        </form>
        <br>
        <a href="index.php">← Back to Product List</a>
    </div>
</body>
</html>
