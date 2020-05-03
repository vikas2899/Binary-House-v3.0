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
          	<form action="viewBuilding.php" method="post">
					<div class="row">
          				<div class="form-group col-md-4">
            			<label for="hostel">Please select the hostel type : </label>
            			<select id="hostel" name="hostel" class="form-control" required>
              			<option selected>Boys Hostel</option>
              			<option>Girls Hostel</option>
            			</select>
            			</div>
          			</div>	
          			<input type="submit" value="Procced" name="submit" id="btn" class="btn btn-primary"/>	
			  </form>

<?php
$con = mysqli_connect('localhost','root','','building_data');
if(isset($_POST['submit'])){
	$choice = $_POST['hostel'];
	if($choice=='Boys Hostel'){
		$query = 'SELECT * FROM `boys_hostel`';
		$run = mysqli_query($con,$query);
		echo"<div style='margin-left:50px;margin-right:50px;'>";
		echo"<table class='table table-striped'>";
			echo"<tr>";
				echo"<th> Building No. </th>";
				echo"<th> Floor No. </th>";
				echo"<th> Room No. </th>";
				echo"<th> Room Capacity </th>";
				echo"<th> Available </th>";
			echo"</tr>";
			while($row = mysqli_fetch_array($run)){
				$building = $row['building_no'];
				$floor = $row['floor_no'];
				$room = $row['room_no'];
				$capacity = $row['room_capacity'];
				$available = $row['available'];
				echo"<tr>";
					echo"<td>".$building."</td>";
					echo"<td>".$floor."</td>";
					echo"<td>".$room."</td>";
					echo"<td>".$capacity."</td>";
					echo"<td>".$available."</td>";
				echo"</tr>";
			}
		echo"</table>";
		echo"</div>";
	}
	else{
		$query = 'SELECT * FROM `girls_hostel`';
		$run  = mysqli_query($con,$query);
		echo"<div style='margin-left:50px;margin-right:50px;'>";
		echo"<table class='table table-striped'>";
			echo"<tr>";
				echo"<th> Building No. </th>";
				echo"<th> Floor No. </th>";
				echo"<th> Room No. </th>";
				echo"<th> Room Capacity </th>";
				echo"<th> Available </th>";
			echo"</tr>";
			while($row = mysqli_fetch_array($run)){
				$building = $row['building_no'];
				$floor = $row['floor_no'];
				$room = $row['room_no'];
				$capacity = $row['room_capacity'];
				$available = $row['available'];
				echo"<tr>";
					echo"<td>".$building."</td>";
					echo"<td>".$floor."</td>";
					echo"<td>".$room."</td>";
					echo"<td>".$capacity."</td>";
					echo"<td>".$available."</td>";
				echo"</tr>";
			}
		echo"</table>";
		echo"</div>";	
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