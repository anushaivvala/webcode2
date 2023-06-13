<!DOCTYPE html>
<html>
 <?php require 'header.php'; ?>

<body>
           <?php require 'navbar.php'; ?><br><br><br>

  <div class="container">
    <h2>Income Categories</h2>
    <div class="row">
      <?php
        require'db.php';
        // SQL query to fetch income categories
        $query = "SELECT category_name,SUM(amount) as total FROM `income` GROUP BY `category_name`";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          $categoryName = $row['category_name'];
          $amount = $row['total'];
      ?>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $categoryName; ?></h5>
              <p class="card-text">Amount: <?php echo $amount; ?></p>
            </div>
          </div>
        </div>
      <?php
        }

      ?>
    </div>
  </div>
<br><br>

  <div class="container">
    <h2>Expense Categories</h2>
    <div class="row">
      <?php
        require'db.php';
        // SQL query to fetch expenses categories
        $query = "SELECT category_name,SUM(amount) as total FROM `expenses` GROUP BY `category_name`";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          $categoryName = $row['category_name'];
          $amount = $row['total'];
      ?>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $categoryName; ?></h5>
              <p class="card-text">Amount: <?php echo $amount; ?></p>
            </div>
          </div>
        </div>
      <?php
        }

      ?>
    </div>
  </div>
</body>
</html>