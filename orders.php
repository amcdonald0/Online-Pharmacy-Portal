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
$query = 'SELECT * FROM ph_orders
                    ORDER BY orderID';
$statement = $db-> prepare($query);
$statement->execute();
$orders = $statement->fetchAll();
$statement->closeCursor();

?>


<!-- the body section -->
<body>
<header><h1>Pure Health Rx | Order Manager</h1>
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
    <h1>Order List</h1>
    <table>
        <tr>
            <th>Order ID</th><th>Customer ID</th><th>Order Date</th>
        </tr>

        <!-- code for the rest of the table here -->
        <?php foreach ($orders as $order) : ?>
            <tr><td><?php echo $order['orderID']; ?> </td>
                <td><?php echo $order['customerID'];?></td>
                <td><?php echo $order['orderDate']; ?> </td>

        </tr>
    <?php endforeach; ?>
    </table>
    
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald</p>
    </footer>
</body>
</html>