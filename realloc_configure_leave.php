<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<script type="text/javascript">
  document.getElementById("drop").style.display = "none";
  document.getElementById("logout").style.display = "block";
  document.getElementById("menu-toggle").style.display = "none";
</script>
</html>
<head></head>
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
              <center>
				<br><br><br>
				<div class="alert alert-danger" id="errmsg" style="display:none;">
  				<strong>Error!   </strong>No such Student ID found. Redirecting to previous Page... 
				</div>
				<div class='alert alert-success' role='alert' id="susmsg" style="display:none;">
				Successfully Completed.... Redirecting to home page in 5 seconds.
				</div>
			</center>
 		  </div>
      </div>
   </div>
	
</body>
<?php
if(isset($_POST['submit'])){
	$uid = $_POST['sid'];
	$con = mysqli_connect('localhost','root','','building_data');
	$query = "SELECT * from allocation_data where student_id='$uid'";
	$run = mysqli_query($con,$query);
	$row1 = mysqli_num_rows($run);
	if($row1>=1){
		while($row = mysqli_fetch_array($run)){
			$room = $row['room_no'];
		}
		$query1 = "SELECT EMAIL from student_table where ID='$uid'";
		$run1 = mysqli_query($con,$query1);
		$row2 = mysqli_num_rows($run1);
		if($row2>=1){
			while($row3 = mysqli_fetch_array($run1)){
				$email = $row3['EMAIL'];
			}
			$building = $room[0];
			if($building == 'b'){
			$query2 = "UPDATE boys_hostel set available = available+1 WHERE room_no = '$room'";
			$query3 = "DELETE from allocation_data WHERE student_id = '$uid'";
			$query4 = "DELETE from student_table where ID = '$uid'";
			$query5 = "DELETE FROM `student_login` WHERE SID = '$uid'";
			$run2 = mysqli_query($con,$query2);
			$run3 = mysqli_query($con,$query3);
			$run4 = mysqli_query($con,$query4);
			$run5 = mysqli_query($con,$query5);
		//header('location:student_form.php');
			// echo"<h4>Successfully Removed!!</h4><br/>";
			// echo"Kindly clear your all dues before leaving the hostel if any";
			// echo $uid;
			// echo"<h3>Thanks for part being with ABC Hostels Pvt. Ltd. I hope you enjoyed our services.</h3>";
			?>
			<script type="text/javascript">
				document.getElementById("susmsg").style.display = "block";
			</script>
			<?php
			  header( "refresh:3;url=realloc.php" );
			}
			else{
			$query2 = "UPDATE girls_hostel set available = available+1 WHERE room_no = '$room'";
			$query3 = "DELETE from allocation_data WHERE student_id = '$uid'";
			$query4 = "DELETE from student_table where ID = '$uid'";
			$query5 = "DELETE from student_login where SID = '$uid'";
			$run2 = mysqli_query($con,$query2);
			$run3 = mysqli_query($con,$query3);
			$run4 = mysqli_query($con,$query4);
			$run5 = mysqli_query($con,$query5);
			//header('location:student_form.php');
			// echo"<h4>Successfully Removed!!</h4><br/>";
			// echo $uid;
			// echo"Kindly clear your all dues before leaving the hostel if any";
			// echo"<h3>Thanks for part being with ABC Hostels Pvt. Ltd. I hope you enjoyed our services.</h3>";
			?>
			<script type="text/javascript">
				document.getElementById("susmsg").style.display = "block";
			</script>
			<?php
			  header( "refresh:3;url=realloc.php" );
			}
		}
		else{
		?>
			<script type="text/javascript">
				document.getElementById("errmsg").style.display = "block";
			</script>
		<?php
	      header( "refresh:3;url=realloc.php" );
		}
	}
	else{
		?>
		<script type="text/javascript">
			document.getElementById("errmsg").style.display = "block";
		</script>
		<?php
	    header( "refresh:3;url=realloc.php" );
	}
}
?>
<?php
define('myfooter',TRUE);
require('footer.php');
?>