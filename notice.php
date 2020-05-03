<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<html>
<head>
	<title>Notice</title>
	<script type="text/javascript">
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
          	    <br><br><br>
				<form action="notice.php" method="post">
				<div style="margin-left:165px; margin-right:60px;">	
				<div class="form-row">
          			<div class="form-group col-md-10">
            			<label for="Notice">Notice Heading</label>
            			<input type="text" class="form-control" id="notice" name="notice" placeholder="Subject of Notice" required>
          			</div>	
          		</div>	
          		<div class="form-row">
				 	<div class="form-group">
    					<label for="desc">Notice Description</label>
    					<textarea class="form-control" id="desc" name="desc" rows="10" cols="97" placeholder="Write Notice Description Here......."></textarea>
  				 	</div>
  				</div>
				<input type="submit" value="Submit" name="submit" class="btn btn-primary">
			</div>
				</form>
<?php
if(isset($_POST['submit'])){
	$notice=$_POST['notice'];
	$text=$_POST['desc'];
	$con = mysqli_connect('localhost','root','','building_data');
	$query="INSERT into notice_board(notice,description) values('$notice','$text')";
	$run = mysqli_query($con,$query);
	if($run){
		?>
			<script type="text/javascript">
				alert("Notice Added SuccessFully!");
			</script>
		<?php
	}else{
		echo"not added";
	}
}	
?>
 			</div>
      </div>
</div>	
</body>
<html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>