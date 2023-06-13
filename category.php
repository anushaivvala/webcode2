<!DOCTYPE html>
<html>
  <?php require 'header.php'; ?>

<body>
           <?php require 'navbar.php'; ?><br><br><br>

    <div class="container">

        <div class="row">
        <form method="POST" action="category_search.php">
            <div class="row">
                     <div class="col-md-4">
                       <label>Division</label>
                       <select class="form-control" name="division" id="division"  onchange="populateCategories()" required>
                         <option>select Division</option>
                         <option value="office">Office</option>
                         <option value="personal">Personal</option>
                       </select>
                     </div>
                     <div class="col-md-4">
                       <label>Categories</label>
                       <select class="form-control" id="category_name" name="category_name">
                         <option value="">Select Category</option>
                       </select>
                     </div>
                <div class="col-md-4">
                    <label>&nbsp;</label><br>
            <button type="submit" class="btn btn-primary">Search</button>
                </div>
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
    
<script type="text/javascript">
   function populateCategories() {
      var divisionSelect = document.getElementById("division");
      var categorySelect = document.getElementById("category_name");
      var division = divisionSelect.value;
      
      // Clear existing options
      categorySelect.innerHTML = "";
      
      if (division === "office") {
        var options = ["Fuel", "Loan", "Food","Medical"];
      } else if (division === "personal") {
        var options = ["Movie", "Loan", "Medical"];
      } else {
        var options = [];
      }
      
      // Add new options
      for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.value = options[i];
        option.text = options[i];
        categorySelect.appendChild(option);
      }
    }
</script>

    </div>
</body>
</html>