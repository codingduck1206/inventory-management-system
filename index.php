<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="https://project-static-files-2026.s3.us-east-1.amazonaws.com/style.css?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=ASIAYKMZHM4P5RB4XTXR%2F20260410%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20260410T094336Z&X-Amz-Expires=300&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGIaCXVzLWVhc3QtMSJIMEYCIQDPrkjnDQ6s5L%2F9rgSA6HGp5MVsPbSwD68k%2B679%2B7KpbwIhAOWnC9eA9AREvZW13Hbl%2BhbIuSPrrBXTc9aoVJpDC0LVKvACCCsQAxoMNTcyMDg4ODcwNjg3IgyRcMLULccY3GkxSGsqzQJvhrqOkE%2B0ATsCvBwgVPheBmc08a2EWxfYU6DQ%2FPY8fN9KHPjyW%2BadIKCHNUyLFIt5JhsZkaYW7Ok1rBkwl5xcUnCbcKpe2QqZgTLso9IsJSDFOpeQuMYs1oGxGM4%2BaOz8ISszbJFA93sn20DOZFKTXkh%2BCVnj7284F%2Fn%2BpgNdHXXU1RTjIYF%2F%2BIEGQxTqPV9Vx%2Fq4b77rok32iOSs8NZ8UZPV7rxWjazHo%2FYwJV6rHP13M%2BhyOufzqiFLWKvgIvNU5JOKAdknlOOqo%2FCMG1M28hh3Zxb5Rs8D3MFaF1ZTkXI5mPwgH6ZniX4v5UEiD%2Fgv83l7gGT%2BR186sNb7gGk24nD80MQkyZKJ9%2F23pnxxPs1l4gxkHfdOloO%2FEgr9sTr4Q%2BRBZzDTRvOJMFPrbm7A7o%2FeBoF0xwsRkiel0thRAx58tcso%2Bjop%2Bn6i1igwvKfizgY6hgLiueoBPf3csvw3CImHBSlnQFI%2BEJXbeFwUvxVcCI2%2Brd52FnxIT%2BbjJu0RKNn3%2FNuLeWwm3PalLfGjMlRS45YtyUAj%2FvoNkqUTDmKTYujL34GRfXn1DXLrhhOLKLhKcVLTPCOAKHsgu63K2v0kL43tBwWQGc1nAs0CxS%2BFiruqVKCAltbrgifHw%2FGep2aekhIpd%2FPA26VrhRLkIqZeqLnKlY6idbZeepuR2qQEkhtvXIxiC9h6WioMWh0PoDDQxE74jlWXUMxrRcjwF8Mm%2FjiiGX%2FO9regzrsV8nLQzjG03hYE8K3zN%2Bw5zsK61djmxlAdvsXFJqBPcz3lfPoe77TVPPawcbr1&X-Amz-Signature=135fe53d207b957273b9bbcb0c2ad1b1e5dc39c6e06879d395e5fa50c93c64b6&X-Amz-SignedHeaders=host&response-content-disposition=inline"> 
</head>
<body>
    <div class="container">
        <h2>Inventory Management System</h2>
        <a href="create.php" class="btn">Add New Product</a>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>RM " . htmlspecialchars($row['price']) . "</td>";
                    echo "<td class='action-links'>
                            <a href='update.php?id=" . $row['id'] . "'>Edit</a> | 
                            <a href='delete.php?id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found in the database.</td></tr>";
            }
            ?>
        </table>
        <br>
        <img src="https://project-static-files-2026.s3.us-east-1.amazonaws.com/banner.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=ASIAYKMZHM4P5RB4XTXR%2F20260410%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20260410T094315Z&X-Amz-Expires=300&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGIaCXVzLWVhc3QtMSJIMEYCIQDPrkjnDQ6s5L%2F9rgSA6HGp5MVsPbSwD68k%2B679%2B7KpbwIhAOWnC9eA9AREvZW13Hbl%2BhbIuSPrrBXTc9aoVJpDC0LVKvACCCsQAxoMNTcyMDg4ODcwNjg3IgyRcMLULccY3GkxSGsqzQJvhrqOkE%2B0ATsCvBwgVPheBmc08a2EWxfYU6DQ%2FPY8fN9KHPjyW%2BadIKCHNUyLFIt5JhsZkaYW7Ok1rBkwl5xcUnCbcKpe2QqZgTLso9IsJSDFOpeQuMYs1oGxGM4%2BaOz8ISszbJFA93sn20DOZFKTXkh%2BCVnj7284F%2Fn%2BpgNdHXXU1RTjIYF%2F%2BIEGQxTqPV9Vx%2Fq4b77rok32iOSs8NZ8UZPV7rxWjazHo%2FYwJV6rHP13M%2BhyOufzqiFLWKvgIvNU5JOKAdknlOOqo%2FCMG1M28hh3Zxb5Rs8D3MFaF1ZTkXI5mPwgH6ZniX4v5UEiD%2Fgv83l7gGT%2BR186sNb7gGk24nD80MQkyZKJ9%2F23pnxxPs1l4gxkHfdOloO%2FEgr9sTr4Q%2BRBZzDTRvOJMFPrbm7A7o%2FeBoF0xwsRkiel0thRAx58tcso%2Bjop%2Bn6i1igwvKfizgY6hgLiueoBPf3csvw3CImHBSlnQFI%2BEJXbeFwUvxVcCI2%2Brd52FnxIT%2BbjJu0RKNn3%2FNuLeWwm3PalLfGjMlRS45YtyUAj%2FvoNkqUTDmKTYujL34GRfXn1DXLrhhOLKLhKcVLTPCOAKHsgu63K2v0kL43tBwWQGc1nAs0CxS%2BFiruqVKCAltbrgifHw%2FGep2aekhIpd%2FPA26VrhRLkIqZeqLnKlY6idbZeepuR2qQEkhtvXIxiC9h6WioMWh0PoDDQxE74jlWXUMxrRcjwF8Mm%2FjiiGX%2FO9regzrsV8nLQzjG03hYE8K3zN%2Bw5zsK61djmxlAdvsXFJqBPcz3lfPoe77TVPPawcbr1&X-Amz-Signature=af5e49a75ade708dbbb6fe1ec006b4de50e5ba54a7c047744939906ec25881a9&X-Amz-SignedHeaders=host&response-content-disposition=inline" alt="Inventory Banner" class="header-image">
    </div>
</body>
</html>