<?php
    require_once('database.php');

// Get the product form data
$product_id = filter_input(INPUT_POST, 'productID');
$product_name = filter_input(INPUT_POST, 'productName');
$product_desc = filter_input(INPUT_POST, 'productDes');
$price = filter_input(INPUT_POST, 'price');
$stock_quantity = filter_input(INPUT_POST, 'stockQuantity');

// Add the product to the database  
if ($product_id == null||$product_name == null|| $product_desc == null|| 
$price == null|| $stock_quantity == null){
    $error= "Invalid product data. Check all fields and try again.";
    include('error.php');
} else{
    require_once('database.php');
}

// Validate the inputs
if (empty($product_id) || empty($product_name) || empty($product_desc) || empty($price) || empty($stock_quantity)) {
    $error = "Invalid Customer data. Check all fields and try again.";
    include('error.php');
} else {
    // Prepare the data array
    $customer_data = [
        'productID' => $product_id,
        'productName' => $product_name,
        'productDes' => $product_desc,
        'price' => $price,
        'stockQuantity' => $stock_quantity
    ];

    // Convert the data array to JSON
    $json_data = json_encode($customer_data, JSON_PRETTY_PRINT);

    // Write the JSON data to a file
    $file = 'products.json';
    if (file_put_contents($file, $json_data . PHP_EOL, FILE_APPEND)) {
        echo "Data successfully saved to $file";
    } else {
        echo "Error saving data to file.";
    }
}
   //Add the product to the database
$query = 'INSERT INTO ph_products
                (productID, productName, productDes, price, stockQuantity)
                VALUES
                    (:id, :prodName, :prodDes, :price, :quantity)';
$statement = $db-> prepare($query);
$statement->bindValue(':id', $product_id);
$statement->bindValue(':prodName', $product_name);
$statement->bindValue(':prodDes', $product_desc);
$statement->bindValue(':price', $price);
$statement->bindValue(':quantity', $stock_quantity);

$statement->execute();
$statement->closeCursor();

// Display the Product List page
    include('product_list.php');

// Check to see if the form was submitted
if(isset($_POST['submit'])) {

    // Create variables to hold our file path and name of the student nodes
    $file = 'products.xml';
    $node = 'product';

    // Create new DOMDocument object (PHP feature) and set options
    $doc = new DOMDocument('1.0');
    $doc->preserveWhiteSpace = false;
    $doc->load($file);
    $doc->formatOutput = true;

    // Get root element - bu_students
    $root = $doc->documentElement;

    // Remove submit from our POST array, we don't want to add it to the file
    unset($_POST['submit']);

    // Create a new student element and append it to the bu_students (XML)
    $product = $doc->createElement($node);
    $product = $root->appendChild($student);

    // Take the firstName and lastName form data and insert it inside of 
    // the new student element
    foreach($_POST as $key => $value) {
        $i = $doc->createElement($key, $value);
        $product->appendChild($i);
    }
    
    // Save the file or give an error message. Redirect user to success.php
    $doc->save($file) or die('Oops! Something went wrong. Nothing saved.');
    header('Location:success.php');
} else {
    echo 'Sorry, nothing was submitted.';
}


?>