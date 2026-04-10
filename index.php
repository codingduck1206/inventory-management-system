<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="https://project-static-files-2026.s3.us-east-1.amazonaws.com/style.css"> 
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
        <img src="https://project-static-files-2026.s3.us-east-1.amazonaws.com/banner.jpg">
    </div>
</body>
</html>
