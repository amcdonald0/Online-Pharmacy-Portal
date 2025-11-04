<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Health Rx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
require_once('database.php');

// Get all products
$query = 'SELECT * FROM ph_products ORDER BY productID';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['productID'];
    $product_name = $_POST['productName'];
    $product_price = $_POST['price'];
    $quantity = 1;

    // If the product is already in the cart, just update the quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        // Add the new product to the cart
        $_SESSION['cart'][$product_id] = [
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $quantity
        ];
    }
    header("Location: index.php");
    exit();
}
?>

<body>
    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_customer.php">Pure Health Rx</a>
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

    <main class="container mt-5">
        <h2 class="text-center mb-4">Products</h2>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <!-- <img src="<?php echo htmlspecialchars($product['productImage']); ?>" class="card-img-top" alt="Product Image"> -->
                        <div class="card-body">
                            <h4 class="card-title"><?php echo htmlspecialchars($product['productName']); ?></h4>
                            <p class="card-text"><?php echo htmlspecialchars($product['productDes']); ?></p>
                            <p class="card-text"><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <form action="add_to_cart.php" method="post">
                                <input type="hidden" name="productID" value="<?php echo htmlspecialchars($product['productID']); ?>">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-primary text-white text-center p-3 mt-5">
        <p>&copy; <?php echo date("Y"); ?> Aretha McDonald</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>