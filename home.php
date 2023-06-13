<!doctype html>
<html lang="en">
  <?php require 'header.php';



   ?>
  <body style="background-color: #e3f2fd;">
           <?php require 'navbar.php'; ?>
        <div class="container-fluid mt-3">
          <div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-2">
    <h3>Home</h3>
        
      </div>
      <div class="col-md-7"></div>
      <div class="col-md-3">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#incomeModal">Add Income/Expenses</button>
      </div>
  </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-10"></div>
     <!--  <div class="col-md-4 pull-right" style="padding: 0;">
                <select class="form-control" name="filter_type" id="filter_type">
                    <option value="0">Filter here</option>
                    <option value="1">This Month</option>
                    <option value="2">Last Month</option>
                    <option value="3">This Year</option>
                    <option value="4">Last Year</option>
          </select>
        </div> -->
        
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
              <th scope="col">Action</th>
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
              <?php $currtime = time();
                $oldtime = strtotime($row['created_at']) + (12 * 3600);
                if($currtime > $oldtime){
?>
<td><button class="btn btn-secondary">No Edit</button> </td>   
                <?php } 
                else{
?>
              
<td><button class="btn btn-primary editIncomeBtn" data-id="<?php echo $row['id']; ?>">Edit</button> </td>              
                <?php } ?>
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
              <th scope="col">Expense date</th>
              <th scope="col">Date&Time</th>
              <th scope="col">Action</th>
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

               <?php $currtime = time();
                $oldtime = strtotime($row['created_at']) + (12 * 3600);
                if($currtime > $oldtime){
?>
<td><button class="btn btn-secondary">No Edit</button> </td>   
                <?php } 
                else{
?>
              <td><button class="btn btn-primary editExpenseBtn" data-id="<?php echo $row['id']; ?>">Edit</button> </td>
              <?php } ?>
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

    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
  </div>
</div>
          
        </div>

<!-- Modal -->
<div class="modal fade" id="incomeModal" tabindex="-1" aria-labelledby="incomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-income-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Income</button>
                <button class="nav-link" id="nav-expense-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Expenses</button>
              </div>
            </nav>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-income-tab">
                 <form action="" id="incomeForm" method="post">
                   <div class="row">
                     <div class="col-md-4 mt-3">
                       <label>Division</label>
                       <select class="form-control" name="division" id="division"  onchange="populateCategories()" required>
                         <option>select Division</option>
                         <option value="office">Office</option>
                         <option value="personal">Personal</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Categories</label>
                       <select class="form-control" id="category_name" name="category_name">
                         <option value="">Select Category</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Amount</label>
                       <input type="number" required name="amount" id="amount" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Description</label>
                       <input type="text" required name="description" id="description" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Date</label>
                       <input type="date" required id="income_date" name="income_date" class="form-control">
                     </div>

                   </div>
                 </form>


              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-expense-tab">
                <form action="" id="expenseForm" method="post">
                        <div class="row">
                     <div class="col-md-4 mt-3">
                       <label>Division</label>
                       <select class="form-control" name="division" id="expense_division"  onchange="expensePopulateCategories()" required>
                         <option>select Division</option>
                         <option value="office">Office</option>
                         <option value="personal">Personal</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Categories</label>
                       <select class="form-control" id="expense_category_name" name="category_name">
                         <option value="">Select Category</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Amount</label>
                       <input type="number" required name="amount" id="expense_amount" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Description</label>
                       <input type="text" required name="description" id="expense_description" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Date</label>
                       <input type="date" required id="expense_income_date" name="income_date" class="form-control">
                     </div>

                   </div>
                 </form>

              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="incomeModal" id="incomeClose">Close</button>
        <button type="button" id="saveIncome"  class="btn btn-primary">Save Income</button>
        <button type="button" id="expenseClose" class="btn btn-secondary" data-bs-dismiss="expenseModal">Close</button>
        <button type="button" id="saveExpense"  class="btn btn-primary">Save Expense</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editIncomeModal" tabindex="-1" aria-labelledby="incomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-income-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Income</button>
                <button class="nav-link" id="nav-expense-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Expenses</button>
              </div>
            </nav>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-income-edit-tab">
                 <form action="" id="incomeForm" method="post">
                   <div class="row">
                     <div class="col-md-4 mt-3">
                       <label>Division</label>
                       <select class="form-control" name="division" id="division_edit"  onchange="incomePopulateCategories()" required>
                         <option>select Division</option>
                         <option value="office">Office</option>
                         <option value="personal">Personal</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Categories</label>
                       <select class="form-control" id="category_edit" name="category_name">
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Amount</label>
                       <input type="number" required name="amount" id="amount_edit" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Description</label>
                       <input type="text" required name="description" id="description_edit" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Date</label>
                       <input type="date" required id="incomedate_edit" name="income_date" class="form-control">
                     </div>
                        <input type="hidden" name="recordId" id="recordId">
                   </div>
                 </form>


              </div>
              <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-expense-edit-tab">
                <form action="" id="expenseForm" method="post">
                        <div class="row">
                     <div class="col-md-4 mt-3">
                       <label>Division</label>
                       <select class="form-control" name="division" id="expdivision_edit"  onchange="editExpensePopulateCategories()" required>
                         <option>select Division</option>
                         <option value="office">Office</option>
                         <option value="personal">Personal</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Categories</label>
                       <select class="form-control" id="expcategory_edit" name="category_name">
                         <option value="">Select Category</option>
                       </select>
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Amount</label>
                       <input type="number" required name="amount" id="expamount_edit" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Description</label>
                       <input type="text" required name="description" id="expdescription_edit" class="form-control">
                     </div>
                     <div class="col-md-4 mt-3">
                       <label>Date</label>
                       <input type="date" required id="expincomedate_edit" name="expincome_date" class="form-control">
                     </div>
                        <input type="hidden" name="recordId" id="exprecordId">

                   </div>
                 </form>

              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="incomeModal" id="editIncomeClose">Close</button>
        <button type="button" id="editIncome"  class="btn btn-primary">Save Income</button>
        <button type="button" id="editExpenseClose" class="btn btn-secondary" data-bs-dismiss="expenseModal">Close</button>
        <button type="button" id="editExpense"  class="btn btn-primary">Save Expense</button>
      </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
  </body>
<script type="text/javascript">

  $(document).ready(function() { 

    $('.editIncomeBtn').on('click', function() {
     var recordId = $(this).data('id'); 
      var division_edit = $(this).closest('tr').find('td:eq(1)').text();
     var category_edit = $(this).closest('tr').find('td:eq(2)').text();
      var amount_edit = $(this).closest('tr').find('td:eq(3)').text();
      var description_edit = $(this).closest('tr').find('td:eq(4)').text();
      var incomedate_edit = $(this).closest('tr').find('td:eq(5)').text();
      $('#recordId').val(recordId); 
      $('#division_edit').val(division_edit);
         var divisionSelect = document.getElementById("division_edit");
      var categorySelect = document.getElementById("category_edit");
      var division = divisionSelect.value;
      var category = category_edit;
      
      // Clear existing options
      categorySelect.innerHTML = "";
      
      if (category === "Fuel") {
        var options = ["Fuel"];
      }
      else if(category === "Loan"){
        var options = ["Loan"];
      }else if(category === "Food"){
        var options = ["Food"];
      }else if(category === "Medical"){
        var options = ["Medical"];
      }else if(category === "Movie"){
        var options = ["Movie"];
      }
      else {
        var options = [];
      }
      
      // Add new options
      for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.value = options[i];
        option.text = options[i];
        categorySelect.appendChild(option);
      }
      $('#category_edit').val(category_edit);
      $('#amount_edit').val(amount_edit);
      $('#description_edit').val(description_edit); 
      $('#incomedate_edit').val(incomedate_edit); 
       $('#editIncomeModal').modal('show');
        }); 
   

  $('#editIncome').click(function() {
      // Send AJAX request to update the record

          var id_edit = $('#recordId').val();
          var division_edit = $('#division_edit').val();
          var category_edit = $('#category_edit').val();
          var amount_edit = $('#amount_edit').val();
          var description_edit = $('#description_edit').val();
          var incomedate_edit = $('#incomedate_edit').val();

      $.ajax({
        url: 'update_income.php',
        type: 'POST',
        data: {

          id: id_edit,
          division_edit: division_edit,
          category_edit: category_edit,
          amount_edit: amount_edit,
          description_edit: description_edit,
          incomedate_edit: incomedate_edit
          
        },
        success: function(response) {
          // Handle success response

          console.log(response);
          // alert('Record updated successfully');
          location.reload();
          $('#editIncomeModal').modal('hide');
          // You can perform additional actions here, such as refreshing the data table
        },
        error: function(xhr, status, error) {
          // Handle error response
          alert('An error occurred while updating the record');
          console.log(xhr.responseText);
        }
      });
      });



      $('.editExpenseBtn').on('click', function() {
     var exprecordId = $(this).data('id'); 
     var expdivision_edit = $(this).closest('tr').find('td:eq(1)').text();
     var expcategory_edit = $(this).closest('tr').find('td:eq(2)').text();
      var expamount_edit = $(this).closest('tr').find('td:eq(3)').text();
      var expdescription_edit = $(this).closest('tr').find('td:eq(4)').text();
      var expincomedate_edit = $(this).closest('tr').find('td:eq(5)').text();
      $('#exprecordId').val(exprecordId); 
      $('#expdivision_edit').val(expdivision_edit);
      var divisionSelect = document.getElementById("expdivision_edit");
      var categorySelect = document.getElementById("expcategory_edit");
      var division = divisionSelect.value;
      var category = expcategory_edit;
      
      // Clear existing options
      categorySelect.innerHTML = "";
      
      if (category === "Fuel") {
        var options = ["Fuel"];
      }
      else if(category === "Loan"){
        var options = ["Loan"];
      }else if(category === "Food"){
        var options = ["Food"];
      }else if(category === "Medical"){
        var options = ["Medical"];
      }else if(category === "Movie"){
        var options = ["Movie"];
      }
      else {
        var options = [];
      }
      
      // Add new options
      for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.value = options[i];
        option.text = options[i];
        categorySelect.appendChild(option);
      }
      $('#expcategory_edit').val(expcategory_edit);
      $('#expamount_edit').val(expamount_edit);
      $('#expdescription_edit').val(expdescription_edit); 
      $('#expincomedate_edit').val(expincomedate_edit); 
       $('#editIncomeModal').modal('show');
        }); 
   

  $('#editExpense').click(function() {
      // Send AJAX request to update the record

          var expid_edit = $('#exprecordId').val();
          var expdivision_edit = $('#expdivision_edit').val();
          var expcategory_edit = $('#expcategory_edit').val();
          var expamount_edit = $('#expamount_edit').val();
          var expdescription_edit = $('#expdescription_edit').val();
          var expincomedate_edit = $('#expincomedate_edit').val();

      $.ajax({
        url: 'update_expense.php',
        type: 'POST',
        data: {

          expid: expid_edit,
          expdivision_edit: expdivision_edit,
          expcategory_edit: expcategory_edit,
          expamount_edit: expamount_edit,
          expdescription_edit: expdescription_edit,
          expincomedate_edit: expincomedate_edit
          
        },
        success: function(response) {
          // Handle success response

          console.log(response);
          location.reload();
          $('#editIncomeModal').modal('hide');
          // You can perform additional actions here, such as refreshing the data table
        },
        error: function(xhr, status, error) {
          // Handle error response
          alert('An error occurred while updating the record');
          console.log(xhr.responseText);
        }
      });
      });


      });

 $('#expenseClose').hide();
    $('#saveExpense').hide();
$(document).ready(function() {
  // Handle click event on the Save button
  $('#nav-expense-tab').click(function() {
    $('#incomeClose').hide();
    $('#saveIncome').hide();
    $('#expenseClose').show();
    $('#saveExpense').show();
  });
  
  // Handle click event on the Save button
  $('#nav-income-tab').click(function() {
    $('#incomeClose').show();
    $('#saveIncome').show();
    $('#expenseClose').hide();
    $('#saveExpense').hide();
  });

  $('#editIncomeClose').hide();
    $('#editIncome').hide();
  // Handle click event on the Save button
  $('#nav-expense-edit-tab').click(function() {
    $('#editIncomeClose').hide();
    $('#editIncome').hide();
    $('#editExpenseClose').show();
    $('#editExpense').show();
  });
  
  // Handle click event on the Save button
  $('#nav-income-edit-tab').click(function() {
    $('#editIncomeClose').show();
    $('#editIncome').show();
    $('#editExpenseClose').hide();
    $('#editExpense').hide();
  });
  $('#saveIncome').click(function() {
    // Get the form data
    var division = $('#division').val();
    var category_name = $('#category_name').val();
    var amount = $('#amount').val();
    var income_date = $('#income_date').val();
    var description = $('#description').val();

    // Make AJAX request to the PHP file
    $.ajax({
      url: 'income_insert.php',
      type: 'POST',
      data: {
        division: division,
        category_name: category_name,
        amount: amount,
        income_date: income_date,
        description: description
      },
      success: function(response) {
        // Handle the response from the PHP file
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle error
        console.log(error);
      }
    });
       location.reload();

    $('#incomeModal').modal('hide');

    });


  $('#saveExpense').click(function() {
    // Get the form data
    var expense_division = $('#expense_division').val();
    var expense_category_name = $('#expense_category_name').val();
    var expense_amount = $('#expense_amount').val();
    var expense_income_date = $('#expense_income_date').val();
    var expense_description = $('#expense_description').val();

    // Make AJAX request to the PHP file
    $.ajax({
      url: 'expense_insert.php',
      type: 'POST',
      data: {
        expense_division: expense_division,
        expense_category_name: expense_category_name,
        expense_amount: expense_amount,
        expense_income_date: expense_income_date,
        expense_description: expense_description
      },
      success: function(response) {
        // Handle the response from the PHP file
       
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle error
        console.log(error);
      }
    });
       location.reload();

    $('#incomeModal').modal('hide');

    });

    });


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

      function incomePopulateCategories() {
      var divisionSelect = document.getElementById("division_edit");
      var categorySelect = document.getElementById("category_edit");
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





    function expensePopulateCategories() {
      var divisionSelect = document.getElementById("expense_division");
      var categorySelect = document.getElementById("expense_category_name");
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

     function editExpensePopulateCategories() {
      var divisionSelect = document.getElementById("expdivision_edit");
      var categorySelect = document.getElementById("expcategory_edit");
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