<?php
require('database.php');
$query = 'SELECT *
            FROM ph_customers
            ORDER BY customerID';
$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Pharmacy Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    
</head>

<!-- the body section -->
<body>
    <header><h1>Pharmacy Manager</h1></header>

    <main>
        <h1>Add Customer</h1>
        <form action="add_customer.php" method="post"
              id="add_customer_form">



            <label>Customer ID:</label>
            <input type="text" name="customerID"  required><br>
            
            <label>Customer First Name:</label>
            <input type="text" name="firstName"required><br>

            <label>Customer Last Name:</label>
            <input type="text" name="lastName" required><br>
            
            <label>Email:</label>
            <input type="text" name="email" required><br>

            <label>Order Number:</label>
            <input type="number" name="orderNum" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Customer"><br>
        </form>
        <p><a href="customer_list.php">View Customer List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald.</p>
    </footer>
</body>
</html>