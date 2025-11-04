<?php
require('database.php');

	// Check to see if the form was submitted
	if(isset($_POST['submit'])) {

		// Create variables to hold our file path and name of the student nodes
		$file = 'products.xml';
		$node = 'products';
        $format = $POST['format'];

        //Get products from database
        $queryProducts = 'SELECT productID, firstName, lastName, email, p.productName
                            FROM ph_customers
                            JOIN ph_products p ON ph_customers.productID = p.productID
                            ORDER BY ph_customers.lastName';
        
        $statement = $db-> prepare($queryStudents);
        $statement->execute();
        $statement->fetchAll();
        $statemet->closeCursor();

        if($format == 'xml'){
		// Create new DOMDocument object (PHP feature) and set options
		$doc = new DOMDocument('1.0');
		$doc->preserveWhiteSpace = false;
		$doc->load($file);
		$doc->formatOutput = true;

		// Get root element - students
		$root = $doc->documentElement;

		// Remove submit from our POST array, we don't want to add it to the file
		unset($_POST['submit']);

		// Create a new product element and append it to the products (XML)
		$product = $doc->createElement($node);
		$product = $root->appendChild($product);

		// Take the product id and product name form data and insert it inside of 
		// the new product element
		foreach($_POST as $key => $value) {
			$i = $doc->createElement($key, $value);
			$product->appendChild($i);
		}

		
		// Save the file or give an error message. Redirect user to success.php
		$doc->save($file) or die('Oops! Something went wrong. Nothing saved.');
		header('Location:success.php');
	} elseif($format == 'json'){
        header('Location:success.php');
        echo json_encode($product);
    }else {
		echo 'Sorry, nothing was submitted.';
	}
    }
?>