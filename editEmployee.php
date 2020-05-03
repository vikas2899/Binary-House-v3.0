<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
</script>

</head>
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
            <form action="editEmployee.php" method="post" id="form" style="display:block;">
          		<div class="form-row">
          			<div class="form-group col-md-4">
            			<label for="edit">Please select the option : </label>
            				<select id="edit" name="edit" class="form-control" required>
              				<option>Remove Employee Data</option>
              				<option>Edit Employee Data</option>
            				</select>
          			</div>
          		</div>
				<input type="submit" value = "Next" name="submit" id="btn" class="btn btn-primary">		 
			</form>	
<?php
if(isset($_POST['submit'])){
	$opinion = $_POST['edit'];
	?>
	<script type="text/javascript">
		document.getElementById("edit").disabled = true;
		document.getElementById("edit").value = "<?php echo $opinion ?>";
		document.getElementById("btn").disabled = true;</script>
	</script>		
	<?php
	if($opinion=='Remove Employee Data'){
		echo"<form action='editEmployee.php' method='post'>";
        echo"<div class='form-row'>";
		echo"<div class='form-group col-md-4'>";
            echo"<label for='eid'>Employee ID : </label>";
            echo"<input type='text' class='form-control' id='eid' name='eid' placeholder='Enter Employee's ID here'  required>
        </div>";
        echo"</div>";
        echo"<input type='submit' value='Proceed' name='submitr' class='btn btn-primary'/>";
		echo"</form>";
	}
}
else if(isset($_POST['submitr'])){
	$uid = $_POST['eid'];
	$con = mysqli_connect('localhost','root','','building_data');
	$query = "SELECT * FROM `employee` WHERE empid='$uid'";
	$run = mysqli_query($con,$query);
	$row1 = mysqli_num_rows($run);
	if($row1>=1){
		$query1 = "DELETE FROM `employee` WHERE empid='$uid'";
		$run1 = mysqli_query($con,$query1);
		if($run1){
			echo'<div class="alert alert-success" role="alert">
  				Success! Record Succesfully Removed.
				</div>';
		}
		else{
			echo'<div class="alert alert-danger" role="alert">
  					Opps! Something Went Wrong.
				</div>';
		}
	}
	else{
		echo'<div class="alert alert-danger" role="alert">
  			Sorry! No record Found.
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