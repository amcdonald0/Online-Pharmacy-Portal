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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Health Rx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pure Health Rx</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_customer.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer_products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="bi bi-cart"></i> Cart (0)</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary ms-3" href="admin_login.php">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-fluid p-5 bg-light text-center">
        <h1>Welcome to Pure Health Rx</h1>
        <p>Your health is our priority. Explore our products and services.</p>
        
    </div>

    <!-- Image Links Section -->
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="card">
                    <img src="https://www.bodylogicmd.com/wp-content/uploads/2020/01/best-supplements-for-men-over-40.jpg" class="card-img-top" alt="Products">
                    <div class="card-body">
                        <h5 class="card-title">Medications</h5>
                        <p class="card-text">Find the best medication for your needs.</p>
                        <a href="customer_products.php" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="col-md-12">
                <div class="card">
                    <img src="https://images.squarespace-cdn.com/content/v1/638dba2c08f7d34f01df014a/28c66f79-ceb0-4dcb-a55d-920de0866dda/rdanpharmacy-1.jpeg0" class="card-img-top" alt="Vitamins">
                    <div class="card-body">
                        <h5 class="card-title">Vitamins & Supplements</h5>
                        <p class="card-text">Boost your health with our range of vitamins.</p>
                        <a href="customer_products.php" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="col-md-12">
                <div class="card">
                    <img src="https://isdhealthsolutions.com/wp-content/uploads/2021/05/General-Womens-Healt.png" class="card-img-top" alt="Service 1">
                    <div class="card-body">
                        <h5 class="card-title">Consultation</h5>
                        <p class="card-text">Get professional advice from our pharmacists.</p>
                        <a href="#" class="btn btn-primary">Coming Soon!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 Pure Health Rx. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

</body>
</html>
