<?php
require_once('database.php');

//Get all courses
$query = 'SELECT * FROM ph_products
                ORDER BY productId';
$statement = $db-> prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

if (!isset ($product_id)){
    //Get course id
    $product_id = filter_input(INPUT_GET, 'product_id');
    if($product_id == NULL || $product_id == FALSE){
        $product_id = $products[0]['productID'];
    }
}

//Get name for selected product
$queryProduct = 'SELECT * FROM ph_products
                WHERE productID = :product_id';
$statement1 = $db-> prepare($queryProduct);
$statement1->bindValue(':product_id', $product_id);
$statement1->execute();
$product = $statement1->fetch();
$product_name = $product['productName'];
$statement1->closeCursor();

//Get customers for selected product
$queryCustomers = 'SELECT * FROM ph_customers
                WHERE productID = :product_id
                ORDER BY customerID';
$statement2 = $db->prepare($queryCustomers);
$statement2-> bindValue(':product_id', $product_id);
$statement2->execute();
$customer = $statement2->fetchAll();
$statement2->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Pharmacy Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Pure Health Rx | Admin Manager</h1>

<p><a href="index.php">Home</a>
&nbsp;
<a href="product_list.php">Products</a>
&nbsp;
<a href="customer_list.php">Customers</a>
&nbsp;
<a href="index_customer.php">Customer View</a>
&nbsp;
<a href="orders.php">Orders</a>
</p>

</header>
<main>
    <center><h1>Actions</h1></center>

    <aside>
        <!-- display a list of categories -->
        <h2>Pharmacy</h2>
        <nav>
        <ul>
            
        </ul>
        </nav>          
    </aside>

    <section>
  

        <p><a href="add_product_form.php">Add Product</a></p>

        <p><a href="add_customer_form.php">Add Customers</a></p>    

    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); 
    include("view.php");
    ?> Aretha McDonald</p>
</footer>
</body>
</html>
