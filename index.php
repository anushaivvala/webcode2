<!doctype html>
<html lang="en">
  <?php require 'header.php'; ?>
  <body style="background-color: #e3f2fd;">
           <?php require 'navbar.php'; ?>
        <div class="container-fluid mt-3">
          <div class="card">
  <div class="card-header">
    <div class="row">
    <h3>Dashboard</h3>
  </div>
  </div>
  <div class="card-body">
    <form method="POST" action="dashboard.php">
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-2 pull-right" style="padding: 0;">
                <select class="form-control" name="time_period" id="time_period">
                    <option value="">Filter here</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">weekly</option>
                    <option value="yearly">Yearly</option>
          </select>
        </div>
       <div class="col-md-2">
        <input type="submit" class="btn btn-primary" value="Show">
        <!-- <button style="margin-left: 60px;"class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button> -->
      </div>
    </div>
</form>
    <div class="row mt-3">
      <div class="col-md-6">
        <h4>Income Table</h4>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">Division</th>
              <th scope="col">CategoryName</th>
              <th scope="col">Amount</th>
              <th scope="col">Description</th>
              <th scope="col">Income date</th>
              <th scope="col">Date&Time</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            require 'db.php';
            $quer = "SELECT * FROM `income`";
            $res = mysqli_query($conn,$quer);
           $total = 0;
            while ($row = mysqli_fetch_assoc($res)) {
              $total += $row['amount'];
             ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['income_date']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              
            </tr>
        <?php  } ?>
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
              <th scope="col">CategoryName</th>
              <th scope="col">Amount</th>
              <th scope="col">Description</th>
              <th scope="col">Expenditure date</th>
              <th scope="col">Date&Time</th>
            </tr>
          </thead>
          <tbody>
             <?php 
            $i=1;
            require 'db.php';
            $quer = "SELECT * FROM `expenses`";
            $res = mysqli_query($conn,$quer);
            $total = 0;
            while ($row = mysqli_fetch_assoc($res)) {
           $total += $row['amount'];
             ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['income_date']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              
            </tr>
        <?php  } ?>
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
</div>
          
        </div>


<?php require 'footer.php'; ?>
  </body>
</html>
<style type="text/css">
  .nav-item:hover{
   background-color: #e3f2fd;
  }
  .navbar{
       position: sticky;
       top: 0px;
       z-index: 1; 
        }
</style>