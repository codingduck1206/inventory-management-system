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
    <link rel="stylesheet" href="https://project-static-files-2026.s3.us-east-1.amazonaws.com/style.css?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=ASIAYKMZHM4P5RB4XTXR%2F20260410%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20260410T094336Z&X-Amz-Expires=300&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGIaCXVzLWVhc3QtMSJIMEYCIQDPrkjnDQ6s5L%2F9rgSA6HGp5MVsPbSwD68k%2B679%2B7KpbwIhAOWnC9eA9AREvZW13Hbl%2BhbIuSPrrBXTc9aoVJpDC0LVKvACCCsQAxoMNTcyMDg4ODcwNjg3IgyRcMLULccY3GkxSGsqzQJvhrqOkE%2B0ATsCvBwgVPheBmc08a2EWxfYU6DQ%2FPY8fN9KHPjyW%2BadIKCHNUyLFIt5JhsZkaYW7Ok1rBkwl5xcUnCbcKpe2QqZgTLso9IsJSDFOpeQuMYs1oGxGM4%2BaOz8ISszbJFA93sn20DOZFKTXkh%2BCVnj7284F%2Fn%2BpgNdHXXU1RTjIYF%2F%2BIEGQxTqPV9Vx%2Fq4b77rok32iOSs8NZ8UZPV7rxWjazHo%2FYwJV6rHP13M%2BhyOufzqiFLWKvgIvNU5JOKAdknlOOqo%2FCMG1M28hh3Zxb5Rs8D3MFaF1ZTkXI5mPwgH6ZniX4v5UEiD%2Fgv83l7gGT%2BR186sNb7gGk24nD80MQkyZKJ9%2F23pnxxPs1l4gxkHfdOloO%2FEgr9sTr4Q%2BRBZzDTRvOJMFPrbm7A7o%2FeBoF0xwsRkiel0thRAx58tcso%2Bjop%2Bn6i1igwvKfizgY6hgLiueoBPf3csvw3CImHBSlnQFI%2BEJXbeFwUvxVcCI2%2Brd52FnxIT%2BbjJu0RKNn3%2FNuLeWwm3PalLfGjMlRS45YtyUAj%2FvoNkqUTDmKTYujL34GRfXn1DXLrhhOLKLhKcVLTPCOAKHsgu63K2v0kL43tBwWQGc1nAs0CxS%2BFiruqVKCAltbrgifHw%2FGep2aekhIpd%2FPA26VrhRLkIqZeqLnKlY6idbZeepuR2qQEkhtvXIxiC9h6WioMWh0PoDDQxE74jlWXUMxrRcjwF8Mm%2FjiiGX%2FO9regzrsV8nLQzjG03hYE8K3zN%2Bw5zsK61djmxlAdvsXFJqBPcz3lfPoe77TVPPawcbr1&X-Amz-Signature=135fe53d207b957273b9bbcb0c2ad1b1e5dc39c6e06879d395e5fa50c93c64b6&X-Amz-SignedHeaders=host&response-content-disposition=inline">
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