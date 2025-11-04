<?php
    
    require_once('database.php');

// Get the student form data
$customer_id = filter_input(INPUT_POST, 'customerID');
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$orderNum = filter_input(INPUT_POST, 'orderNum');
// Add the student to the database  
if ($customer_id == null || $customer_id == false ||
        $first_name == null || $last_name == null ||
        $email == null || $email == false || $orderNum == null){
    $error= "Invalid Customer data. Check all fields and try again.";
    include('error.php');
} else{
    require_once('database.php');
}
//Add student to database
$query = 'INSERT INTO ph_customers
                (customerID, firstName, lastName, email, orderNum)
                VALUES
                    (:customer_id, :first_name, :last_name, :email, :orderNum)';
$statement = $db-> prepare($query);
$statement->bindValue(':customer_id', $customer_id);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':email', $email);
$statement->bindValue(':orderNum', $orderNum);

$statement->execute();
$statement->closeCursor();
    // Display the Customer List page
    include('customer_list.php');

?>
