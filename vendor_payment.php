<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	  $(function () {
	    $('#datepicker').datepicker();
	 });
	  document.getElementById("logout").style.display = "block";
  	  document.getElementById("drop").style.display = "none";
  	  document.getElementById("menu-toggle").style.display = "none";
</script>
</head>
<body>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="manage_building.php" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="manage_employee.php" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="manage_attendance.php" class="list-group-item list-group-item-action bg-light">Manage Attendance</a>
            <a href="manage_vendor.php" class="list-group-item list-group-item-action bg-light">Vendor Payments</a>
            <a href="manage_expense.php" class="list-group-item list-group-item-action bg-light">Manage Expense</a>
            <a href="manage_fee.php" class="list-group-item list-group-item-action bg-light">Manage Fees</a>
            <a href="manage_notice.php" class="list-group-item list-group-item-action bg-light">Notice/Events</a>
            <a href="admin_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">

          <br><center>
          <p>Please Provide the following details </p></center>	
         <br><br><br> 	
        <div style="margin-left:50px;margin-right: 50px;">  	
 		<form action="vendor_payment.php" method="post">
		<div class="form-row">
          <div class="form-group col-md-8">
            <label for="company">Company Name</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Name of Payee's company" required>
          </div>  
           <div class="form-group col-md-4">
            <label for="date1">Date of Payment</label>
            <input type="date" class="form-control" id="date1" name="date1" required>
          </div>
      </div>
          <div class="form-row">
          <div class="form-group col-md-4">
            <label for="amount">Amount Paid</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Total Amount in Rupee" required>
          </div>
          <div class="form-group col-md-4">
            <label for="method">Mode of Payment</label>
            <select id="method" name="method" class="form-control" required>
              <option>Cash</option>
              <option>Cheque</option>
              <option>UPI</option>
              <option>NEFT</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="desc">Description</label>
            <input type="text" class="form-control" id="desc" name="desc" placeholder="Cheque No., Transaction ID" required>
          </div>
        </div>
    </div>
        <center>  
        <input type="submit" value="Proceed" name="submit" class="btn btn-primary"/> 
        </center>
	</form>
	</div>
<?php
if(isset($_POST['submit'])){
	$company=isset($_POST['company'])?$_POST['company']:'';
	$date=isset($_POST['date1'])?$_POST['date1']:'';
	$method=isset($_POST['method'])?$_POST['method']:'';
	$amount=isset($_POST['amount'])?$_POST['amount']:'';
	$description=isset($_POST['desc'])?$_POST['desc']:'';
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$query="INSERT into vendor values('$company','$method','$amount','$date','$description')";
	$run=mysqli_query($con, $query);
	if($run){
		echo"<br><br>";
		echo'<div class="alert alert-success" role="alert">
  			Payment Successfully Recorded.
			</div>';
	}
	else{
		echo'<div class="alert alert-danger" role="alert">
  			Opps! An Error Occured.
			</div>';
	}
}	
?>
</div>
      </div>
    </div>	
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>