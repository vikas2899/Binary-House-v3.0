<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
?>
<html>
<head>
<title>Expand Hostel</title>
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
              <form action="expand.php" method="post">
					<div class="row">
          				<div class="form-group col-md-4">
            			<label for="hostel">Please select the hostel type : </label>
            			<select id="hostel" name="hostel" class="form-control" required>
              			<option selected>Boys Hostel</option>
              			<option>Girls Hostel</option>
            			</select>
            			</div>
          			</div>	
          			<input type="submit" value="Next" name="submit" id="btn" class="btn btn-primary"/>	
			  </form>
      
</body>
<script type="text/javascript">
	document.getElementById("build").style.pointerEvents="none";
	document.getElementById("build").style.cursor="default";
</script>
</html>
<?php
if(isset($_POST['submit'])){
	    
	    $choice=$_POST['hostel'];
		?>
		<script type="text/javascript">
			
			document.getElementById("hostel").disabled = true;
			document.getElementById("hostel").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
		</script>
		<?php
		if($choice=='Boys Hostel'){
				echo"<form action='expand_config.php' method='post'>";
				    echo"<div class='form-row'>";
          				echo"<div class='form-group col-md-4'>";
            			echo"<label for='build1'>Select Building Number : </label>";
            			echo"<input type='text' class='form-control' name='build1' placeholder='Building Number' id='build1' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'/>";
          				echo"</div>";
				echo"<div class='form-group col-md-4'>";
				echo"<label for='floor'>Floor Number</label>";
                echo"<input type='text' class='form-control' id='floor' name='floor' placeholder='Name of floor' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' required>";
				echo"</div>";
				echo"<div class='form-group col-md-4'>";
				echo"<label for='room'>Room Number</label>";
                echo"<input type='text' class='form-control' id='room' name='room' placeholder='Room Number'  onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' required>";
				echo"</div>";
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"</div>";
				echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'/>";
				echo"</form>";

		}else{
				echo"<form action='expand_config.php' method='post'>";
				echo"<div class='form-row'>";
				echo'<div class="form-group col-md-4">';
            		echo'<label for="build1">Select Building Number : </label>';
            		echo"<input type='text' class='form-control' id='build1' name='build1' placeholder='Building Number' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'/><br/>";
          			echo'</div>';	
				echo"<div class='form-group col-md-4'>";
				echo"<label for='floor'>Floor Number</label>";
                echo"<input type='text' class='form-control' id='floor' name='floor' placeholder='Name of floor' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' required>";
				echo"</div>";
				echo"<div class='form-group col-md-4'>";
				echo"<label for='room'>Room Number</label>";
                echo"<input type='text' class='form-control' id='room' name='room' placeholder='Room Number'  onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' required>";
				echo"</div>";	
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"</div>";
				echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'/>";
				echo"</form>";
						
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