<?php 
require 'db.php';
// Retrieve form data
$division = $_POST['expense_division'];
$category_name = $_POST['expense_category_name'];
$amount = $_POST['expense_amount'];
$income_date = $_POST['expense_income_date'];
$description = $_POST['expense_description'];
// Insert data into the database
$sql = "INSERT INTO `expenses` (`division`,`category_name`, `amount`,`income_date`,`description`) VALUES ('$division', '$category_name', '$amount','$income_date','$description')";
$query = mysqli_query($conn,$sql);
// print_r($query);exit;

if ($query) {
    echo "success";
}

 ?>