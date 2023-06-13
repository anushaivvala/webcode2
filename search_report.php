<?php
// Assuming you have a database connection established
require 'db.php';
// Retrieve the start and end dates from the form submission
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Query to fetch income data between the specified dates
$income_query = "SELECT * FROM `income` WHERE `income_date` BETWEEN '$start_date' AND '$end_date'";
$income_result = mysqli_query($conn, $income_query);

// Query to fetch expense data between the specified dates
$expense_query = "SELECT * FROM `expenses` WHERE `income_date` BETWEEN '$start_date' AND '$end_date'";
$expense_result = mysqli_query($conn, $expense_query);

?>

<!DOCTYPE html>
<html>
  <?php require 'header.php'; ?>

<body>
           <?php require 'navbar.php'; ?><br><br><br>

    <div class="container">

        <div class="row">
        <form method="POST" action="search_report.php">
            <div class="row">
                <div class="col-md-4">
            <div class="form-group">
                   <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" required> 
                </div>
            </div>
                
                <div class="col-md-4">
            
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            </div>
                <div class="col-md-4">
                    <label>&nbsp;</label><br>
            <button type="submit" class="btn btn-primary">Track</button>
                </div>

        </form>
    </div>

     <div class="row mt-3">
      <div class="col-md-6">
        <h4>Income Table</h4>
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
            <?php $i=1;$total = 0; while ($row = mysqli_fetch_assoc($income_result)) { $total+=$row['amount']; ?>
            <tr>
             <td><?php echo $i++; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['income_date']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
            </tr>
           <?php } ?>
           <tr>
              <td colspan="3"></td>
              <td>Total: <?php echo $total; ?> </td>
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
       <h4>Expenditure Table</h4>
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
            <?php $i=1;$total = 0; while ($row = mysqli_fetch_assoc($expense_result)) { $total += $row['amount'];  ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['income_date']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              
            </tr>
           <?php } ?>
           <tr>
              <td colspan="3"></td>
              <td>Total: <?php echo $total; ?> </td>
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