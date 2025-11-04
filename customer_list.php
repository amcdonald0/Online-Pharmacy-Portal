<?php
require_once('database.php');

// Get all courses
$query = 'SELECT * FROM ph_customers
                    ORDER BY customerID';
$statement = $db-> prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Customer Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Pure Health Rx | Customer Manager</h1>

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
    <h1>Course List</h1>
    <table>
        <tr>
            <th>ID</th><th>Name</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
        <?php foreach ($customers as $customer) : ?>
            <tr><td><?php echo $customer['customerID']; ?> </td>
                <td><?php echo $customer['firstName']; ?> </td>
                <td><?php echo $customer['lastName']; ?> </td>
                <td><?php echo $customer['email']; ?> </td>

        </tr>
    <?php endforeach; ?>
    </table>
    <p>
    <h2>Add Customer</h2>
    
    <form action="add_customer.php" method="post"
              id="add_course_form">

        <label>Customer Id:</label>
        <input type="number" name="customerID"><br>
        <label>First Name:</label>
        <input type="text" name="firstName" width="200"><br>
        <label>Last Name:</label>
        <input type="text" name="lastName"><br>
        <label>Customer Email:</label>
        <input type="email" name="email" width="200"><br>
        <label>Order Number:</label>
        <input type="number" name="orderNum"><br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Customer"><br>

    </form>


    <br>
    <p><a href="customer_list.php">List Customers</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald</p>
    </footer>
</body>
</html>