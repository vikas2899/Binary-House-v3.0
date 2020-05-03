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
          	<p>Please fill out the details</p></center>
          	<br>
          	<div style="margin-left:50px;margin-right:50px;">
              <form action="expense.php" method="post">
              	<div class="form-row">
          			<div class="form-group col-md-8">
            		<label for="company">Company Name</label>
            		<input type="text" class="form-control" id="company" name="company" placeholder="Company's Name" required>
          			</div>
          		
				<div class="form-group col-md-4">
            		<label for="date1">Date of Payment</label>
            		<input type="date" class="form-control" id="date1" name="date1" placeholder="Date on which payment is made" required>
          		</div>
          		</div>
          		<div class='form-row'>	
				<div class="form-group col-md-4">
            		<label for="amount">Amount</label>
            		<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount paid" required>
          		</div>
          		<div class="form-group col-md-4">
            		<label for="related">Spent On</label>
            		<select id="related" name="related" class="form-control" required>
              		<option>Food</option>
					<option>Water</option>	
					<option>Electricity</option>
					<option>Construction</option>
					<option>Equipment</option>
					<option>Stationary</option>
					<option>Others</option>
            		</select>
          		</div>
          	</div>
          	<center><br>
		<input type="submit" value="Proceed" name="submit" class="btn btn-primary"/></center>
	</form>
</div>

<?php
if(isset($_POST['submit'])){
	$company=isset($_POST['company'])?$_POST['company']:'';
	$date=isset($_POST['date1'])?$_POST['date1']:'';
	$related=isset($_POST['related'])?$_POST['related']:'';
	$amount=isset($_POST['amount'])?$_POST['amount']:'';
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$query="INSERT into expense values('$company','$date','$amount','$related')";
	$run=mysqli_query($con, $query);
	if($run){
		echo'<div class="alert alert-success" role="alert">
  			Data Recorded Successfully!
			</div>';
	}
	else{
		echo'<div class="alert alert-danger" role="alert">
  		Opps! An Error has occured.
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