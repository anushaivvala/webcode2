<?php

require 'db.php';
// Retrieve form data
$id = $_POST['id']; 
$division = $_POST['division_edit']; 
$category_name = $_POST['category_edit']; 
$amount = $_POST['amount_edit']; 
$description = $_POST['description_edit']; 
$income_date = $_POST['incomedate_edit']; 

// SQL query to update income
 $sql = "UPDATE `income` SET `division` = '$division',`category_name` = '$category_name',`amount` = '$amount',`description` = '$description',`income_date` = '$income_date' WHERE `id` = '$id'";

// Execute the query
mysqli_query($conn,$sql);

echo "success";

?>