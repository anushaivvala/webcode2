<!DOCTYPE html>
<html>
  <?php require 'header.php'; ?>

<body>
           <?php require 'navbar.php'; ?><br><br><br>

    <div class="container">

<?php
require'db.php';

// Retrieving data based on the selected time period
$selectedOption = $_POST['time_period'];

if ($selectedOption == "monthly") {
    $query = "SELECT MONTH(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `income` GROUP BY MONTH('income_date')";
} elseif ($selectedOption == "weekly") {
    $query = "SELECT WEEK(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `income` GROUP BY WEEK('income_date')";
} elseif ($selectedOption == "yearly") {
    $query = "SELECT YEAR(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `income` GROUP BY YEAR('income_date')";
} else {
    echo "Invalid time period selected.";
    exit();
}

$result = mysqli_query($conn,$query);

?>

     <div class="row mt-3">
      
      <div class="col-md-6">
        <h4><?php echo $selectedOption; ?>&nbsp;
Income Table</h4>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">Division</th>
              <th scope="col">Category</th>
              <th scope="col">Amt</th>
              <th scope="col">Description</th>
              <th scope="col">Income date</th>
              <th scope="col">Date&Time</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            require 'db.php';
            if ($result->num_rows > 0) {
   $totals = 0;
    while ($row = $result->fetch_assoc()) {
        $totals += $row['total'];
             ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['total']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['income_date']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              
            </tr>
        <?php  } }?>
        <tr>
              <td colspan="3"></td>
              <td>Total: <?php echo $totals; ?> </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
           
          </tbody>
        </table>
      </div>
    </div>

      <div class="col-md-6">

       <h4><?php echo $selectedOption; ?>&nbsp;
Expenditure Table</h4>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">Division</th>
              <th scope="col">Category</th>
              <th scope="col">Amt</th>
              <th scope="col">Description</th>
              <th scope="col">Expenditure date</th>
              <th scope="col">Date&Time</th>
            </tr>
          </thead>
          <tbody>
             <?php 
            $i=1;
            require 'db.php';

    $selectedOptions = $_POST['time_period'];

if ($selectedOptions == "monthly") {
    $querys = "SELECT MONTH(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `expenses` GROUP BY MONTH('income_date')";
} elseif ($selectedOptions == "weekly") {
    $querys = "SELECT WEEK(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `expenses` GROUP BY WEEK('income_date')";
} elseif ($selectedOptions == "yearly") {
    $querys = "SELECT YEAR(income_date) AS timeperiod, SUM(amount) AS total,division,category_name,description,created_at,income_date FROM `expenses` GROUP BY YEAR('income_date')";
} else {
    echo "Invalid time period selected.";
    exit();
}
$results = mysqli_query($conn,$querys);

 if ($results->num_rows > 0) {
   $totalss = 0;
    while ($rows= $results->fetch_assoc()) {
        $totalss += $rows['total'];
             ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $rows['division']; ?></td>
              <td><?php echo $rows['category_name']; ?></td>
              <td><?php echo $rows['total']; ?></td>
              <td><?php echo $rows['description']; ?></td>
              <td><?php echo $rows['income_date']; ?></td>
              <td><?php echo $rows['created_at']; ?></td>
              
            </tr>
        <?php  } }?>

        <tr>
              <td colspan="3"></td>
              <td>Total: <?php echo $totalss; ?> </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
    </div>

</div>
</body>
</html>