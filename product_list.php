<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Pharmacy Product Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<?php
require_once('database.php');

// Get all courses
$query = 'SELECT * FROM ph_products
                    ORDER BY productID';
$statement = $db-> prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

?>


<!-- the body section -->
<body>
<header><h1>Pure Health Rx | Product Manager</h1>
<p><a href="index.php">Home</a>
&nbsp;
<a href="product_list.php">Products</a>
&nbsp;
<a href="customer_list.php">Customers</a>
&nbsp;
<a href="orders.php">Orders</a>
</p>

</header>
<main>
    <h1>Product List</h1>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Description</th> <th>Price</th><th>Quantity</th>
        </tr>

        <!-- code for the rest of the table here -->
        <?php foreach ($products as $product) : ?>
            <tr><td><?php echo $product['productID']; ?> </td>
                <td><?php echo $product['productName'];?></td>
                <td><?php echo $product['productDes']; ?> </td>
                <td><?php echo $product['price']; ?> </td>
                <td><?php echo $product['stockQuantity']; ?> </td>

        </tr>
    <?php endforeach; ?>
    </table>
    <p>
    <h2>Add Product</h2>
    
    <form action="add_product.php" method="post"
              id="add_product_form">

        <label>Product Id:</label>
        <input type="text" name="productID"><br>
        <label>Product Name:</label>
        <input type="text" name="productName" width="200"><br>
        <label>Product Desription:</label>
        <input type="text" name="productDes" width="200"><br>
        <label>Price:</label>
        <input type="number" name="price" width="200"><br>
        <label>Stock Quantity:</label>
        <input type="number" name="stockQuantity" width="200"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product"><br>

    </form>


    <br>
    <p><a href="product_list.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald</p>
    </footer>
</body>
</html>