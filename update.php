<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdi", $name, $description, $price, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://project-static-files-2026.s3.us-east-1.amazonaws.com/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            
            <label>Description:</label>
            <textarea name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            
            <label>Price (RM):</label>
            <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            
            <input type="submit" value="Update Product">
        </form>
        <br>
        <a href="index.php">← Back to Product List</a>
    </div>
</body>
</html>
