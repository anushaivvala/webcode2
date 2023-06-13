<?php 
require 'db.php';
// Retrieve form data
$division = $_POST['division'];
$category_name = $_POST['category_name'];
$amount = $_POST['amount'];
$income_date = $_POST['income_date'];
$description = $_POST['description'];
// Insert data into the database
$sql = "INSERT INTO `income` (`division`,`category_name`, `amount`,`income_date`,`description`) VALUES ('$division', '$category_name', '$amount','$income_date','$description')";
$query = mysqli_query($conn,$sql);
// print_r($query);exit;
// Loction::header('home.php');

if ($query) {
    echo "success";
}

 ?>