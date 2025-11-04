<?php
require('database.php');
$query = 'SELECT *
            FROM ph_products
            ORDER BY productID';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Pure Health Rx</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    
</head>

<!-- the body section -->
<body>
    <header><h1>Pharmacy Manager</h1></header>

    <main>
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Product ID:</label>
            <input type="text" name="productID" title="Product ID should start with 'P' followed by 3 digits (e.g., P002)" required><br>

            <label>Product Name:</label>
            <input type="text" name="productName" required><br>

            <label>Product Description:</label>
            <input type="text" name="productDes" required><br>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" required><br>
            
            <label>Stock Quantity:</label>
            <input type="number" name="stockQuantity" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="product_list.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald.</p>
    </footer>
</body>
</html>