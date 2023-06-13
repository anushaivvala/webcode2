<?php

require 'db.php';
// Retrieve form data
$id = $_POST['expid']; 
$division = $_POST['expdivision_edit']; 
$category_name = $_POST['expcategory_edit']; 
$amount = $_POST['expamount_edit']; 
$description = $_POST['expdescription_edit']; 
$income_date = $_POST['expincomedate_edit']; 

// SQL query to update income
 $sql = "UPDATE `expenses` SET `division` = '$division',`category_name` = '$category_name',`amount` = '$amount',`description` = '$description',`income_date` = '$income_date' WHERE `id` = '$id'";

// Execute the query
mysqli_query($conn,$sql);

echo "success";

?>