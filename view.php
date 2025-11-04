<?php
	$products = simplexml_load_file('products.xml');

	foreach($products->product as $product) {
		echo "<p>" . $product->product_id . " " . $product->product_name . "</p>";
	}

?>