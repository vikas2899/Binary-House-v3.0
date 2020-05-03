<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
          	<a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc" href="student_form.php">Manage Student</a>
            <a href="manage_building.php" id = "build" class="list-group-item list-group-item-action bg-light">Manage Building</a>
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
          <div class="container-fluid" style="margin:0px;">
          	<br><br><br>
             <div class="container">
  					<div class="row justify-content-md-center">
    					<div class="col-xm-3" style="">
      						 <div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">Add Student Payment Record</h5>
    								<p class="card-text">Used for adding payment record for student who paid the fees.</p>
    								<a href="fee_add.php" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
    					<div class="col-xm-auto">
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
    					<div class="col-xm-3" style="">
      						<div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">View Fees Record</h5>
    								<p class="card-text">Used for Viewing Payment Record of Students</p><br>
    								<a href="fee_view.php" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
  					</div>
			</div>
      	  </div>
      </div>
    </div>
<script type="text/javascript">
 	document.getElementById("drop").style.display = "none";
  	document.getElementById("logout").style.display = "block";
</script>
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>