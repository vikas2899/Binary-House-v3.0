<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
            <form action="editBuilding.php" method="post">
            	<div class="form-row">
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

<?php
session_start();
if(isset($_POST['submit'])){
	$choice = $_POST['hostel'];  
	$_SESSION['choice'] = $choice;
	?>  

		<script type="text/javascript">
			document.getElementById("hostel").disabled = true;
			document.getElementById("hostel").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
		</script>
	<?php
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$hostel = $_POST['hostel'];
	if($hostel=='Boys Hostel'){
		echo"<form action='editBuilding.php' method='post' id='formp'>";
		    echo"<div class='form-row'>";
		    echo"<div class='form-group col-md-4'>";
            	echo"<label for='building'>Please select building</label>";
            	echo"<select id='building' name='building' class='form-control' required>";
              			$query = 'SELECT  DISTINCT building_no FROM `boys_hostel`';
						$run = mysqli_query($con,$query);
 						if(mysqli_num_rows($run) > 0){
	 						while($row = mysqli_fetch_array($run)){
	         				echo "<option value=".$row['building_no'].">".$row['building_no']."</option>";
	 						}
            	echo"</select>";
            }
          	echo"</div>";
          	echo"</div>";
          	echo"<input type='submit' value='Next' name='submits' class='btn btn-primary'>";	
        	echo"</form>";	    	
	}
	else{
	 	echo"<form action='editBuilding.php' method='post'>";
	 	    echo"<div class='form-row'>";
		    echo"<div class='form-group col-md-4'>";
            	echo"<label for='building'>Please select building</label>";
            	echo"<select id='building' name='building' class='form-control' required>";
            	$query = "SELECT  DISTINCT building_no FROM `girls_hostel`";
				$run = mysqli_query($con,$query);
 				if(mysqli_num_rows($run) > 0){
	 				while($row = mysqli_fetch_array($run)){
	         			echo "<option value=".$row['building_no'].">".$row['building_no']."</option>";
	 					}
	 			echo "</select>";
            	}
            echo"</div>";
          	echo"</div>";
          	echo"<input type='submit' value='Next' name='submits' class='btn btn-primary'>";	
        	echo"</form>";  
	}
}
else if(isset($_POST['submits'])){
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$type = $_POST['building'];
	$building_type = $type[0];
	$_SESSION['type'] = $type;
	$choice = $_SESSION['choice'];
	echo"<div class='form-row'>";
	echo"<div class='form-group col-md-4'>";
        echo"<label for='building'>Please select Building</label>";
            echo"<select id='building' name='building' class='form-control' required>";
              echo"<option>$type</option>";
            echo"</select>";
          echo"</div>";
        echo"</div>";  
    
    ?>
    <script type='text/javascript'>
		document.getElementById('building').style.pointerEvents='none';
		document.getElementById('building').style.cursor='default';
		document.getElementById('building').disabled= true;
		document.getElementById('hostel').disabled = true;
		document.getElementById('hostel').value = "<?php echo $choice ?>";
		document.getElementById('btn').disabled = true;
	</script>
	<?php
	if($building_type=='b'){
		echo"<form action='editBuilding.php' method='post'>";
		    $type = $_POST['building'];
		    echo"<div class='form-row'>";
		    echo"<div class='form-group col-md-4'>";
            	echo"<label for='floor'>Select Floor No.</label>";
            	echo"<select id='floor' name='floor' class='form-control' required>";
              		$query = "SELECT  DISTINCT floor_no FROM `boys_hostel` WHERE building_no = '$type'";
					$run = mysqli_query($con,$query);
 					if(mysqli_num_rows($run) > 0){
	 					while($row = mysqli_fetch_array($run)){
	         				echo "<option value=".$row['floor_no'].">".$row['floor_no']."</option>";
	 					}
	 			echo "</select>";
            	}
          	echo"</div>";
          	echo"</div>";
          	echo"<input type='submit' value='Next' name='submitf' class='btn btn-primary'>";	
        	echo"</form>";
              
	}
	else{
		echo"<form action='editBuilding.php' method='post'>";
		    $type = $_POST['building'];
		    echo"<div class='form-row'>";
		    echo"<div class='form-group col-md-4'>";
            echo"<label for='floor'>Select Floor No.</label>";
            echo"<select id='floor' name='floor' class='form-control' required>";
              	$query = "SELECT  DISTINCT floor_no FROM `girls_hostel` WHERE building_no = '$type'";
				$run = mysqli_query($con,$query);
 				if(mysqli_num_rows($run) > 0){
	 				while($row = mysqli_fetch_array($run)){
	         			echo "<option value=".$row['floor_no'].">".$row['floor_no']."</option>";
	 					}
	 			echo "</select>";
            	}
            echo"</div>";
            echo"</div>";
            echo"<input type='submit' value='Next' name='submitf' class='btn btn-primary'>";	
        echo"</form>";  
	}

}
else if(isset($_POST['submitf'])){
	$choice = $_SESSION['choice'];
	$type = $_SESSION['type'];
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$floor = $_POST['floor'];
	$_SESSION['floor'] = $floor;
	echo"<div class='form-row'>";
		echo"<div class='form-group col-md-2'>";
			echo"<label for='building'>Select building No..</label>";
			echo"<select name='building' id='building' class='form-control'>";
				echo"<option>$type</option>";
			echo "</select>";
		echo"</div>";
		echo"<div class='form-group col-md-2'>";
			echo"<label for='floor'>Select floor No.</label>";
			echo"<select name='floor' id='floor' class='form-control'>";
				echo"<option>$floor</option>";
			echo "</select>";
		echo"</div>";
	echo"</div>";
	?>
	<script type='text/javascript'>
	    document.getElementById('building').style.pointerEvents='none';
		document.getElementById('building').style.cursor='default';
		document.getElementById('building').disabled = true;
		document.getElementById('floor').style.pointerEvents='none';
		document.getElementById('floor').style.cursor='default';
		document.getElementById('floor').disabled = true;
		document.getElementById('hostel').disabled = true;
		document.getElementById('hostel').value = "<?php echo $choice ?>";
		document.getElementById('btn').disabled = true;
	</script>
	<?php
	if($type[0] == 'b'){
	echo"<form action='editBuilding.php' method='post'>";
 		echo "<div class='form-row'>";
 		echo"<div class='form-group col-md-4'>
            <label for='room'>Select Room no.</label>
            <select id='room' name='room' class='form-control' required>";
              $query = "SELECT room_no FROM `boys_hostel` WHERE building_no = '$type' and floor_no = '$floor'";
 		      	$run = mysqli_query($con,$query);
 				if(mysqli_num_rows($run) > 0){
	 				while($row = mysqli_fetch_array($run)){
	         			echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 					}
	 			echo "</select>";
            	}
          echo"</div>";
          echo"</div>";
           echo"<input type='submit' value='Delete' name='submitdel' class='btn btn-primary'>";
           echo"&nbsp&nbsp&nbsp";
			echo"<input type='submit' value='Edit' name='submitedit' class='btn btn-primary'>";

 		echo"</form>";
 	}
 	else{
 		echo"<form action='editBuilding.php' method='post'>";
 		echo "<div class='form-row'>";
 		echo"<div class='form-group col-md-4'>
            <label for='room'>Select Room no.</label>";
		echo"<select name='room' id='room' class='form-control'>";
 		      	$query = "SELECT room_no FROM `girls_hostel` WHERE building_no = '$type' and floor_no = '$floor'";
 		      	$run = mysqli_query($con,$query);
 				if(mysqli_num_rows($run) > 0){
	 				while($row = mysqli_fetch_array($run)){
	         			echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 					}
	 			echo "</select>";
            	}
            echo"</div>";
          echo"</div>";	
            echo"<input type='submit' value='Delete' name='submitdel' class='btn btn-primary'>";
            echo"&nbsp&nbsp&nbsp";
            echo"<input type='submit' value='Edit' name='submitedit' class='btn btn-primary'>";
 		echo"</select>";  
 		echo"</form>";
 	}	    	
}
else if(isset($_POST['submitdel'])){
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$room = $_POST['room'];
	$building_no = $_SESSION['type'];
	$floor =  $_SESSION['floor'];
	$_SESSION['room'] = $room;
	if($building_no[0] == 'b'){
		$query = "DELETE FROM `boys_hostel` WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room'";
		$run = mysqli_query($con,$query);
		if($run){
			echo"<div class='alert alert-success'>
  			<strong>Success!</strong>Task Performed Succesfully
			</div>";
		}
	}
	else{
		$query = "DELETE FROM `girls_hostel` WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room'";
		$run = mysqli_query($con,$query);
		if($run){
			echo"<div class='alert alert-success'>
  			<strong>Success!</strong>Task Performed Succesfully
			</div>";
		}
	}
}
else if(isset($_POST['submitedit'])){
	$choice = $_SESSION['choice'];
	?>
	<script type="text/javascript">
			document.getElementById("hostel").disabled = true;
			document.getElementById("hostel").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
	</script>
	<?php
	$con = mysqli_connect("localhost", "root", "", "building_data");
    $building_no = $_SESSION['type'];
	$floor =  $_SESSION['floor'];
	$room = $_POST['room'];
	$_SESSION['room'] = $room;
	if($building_no[0] == 'b'){
		$query = "SELECT * FROM `boys_hostel` WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room' ";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run) > 0){
	 		while($row = mysqli_fetch_array($run)){
	         	$room_capacity = $row['room_capacity'];
	         	$available = $row['available'];
	 		}
	
        }
        echo"<p style='color:red;'>**You are going to Modify Building ".$building_no.", Floor ".$floor." and Room ".$room."</p>";
        echo"<br><br>";
		echo"<form action='editBuilding.php' method='post'>";
			echo"<div class='form-row'>
          	<div class='form-group col-md-4'>
            <label for='room_capacity'>Enter New Room Capacity</label>
            <input type='text' class='form-control' id='room_capacity' name='room_capacity' placeholder='Currently $room_capacity' required>
          	</div>
            <div class='form-group col-md-4'>
            <label for='available'>Enter New Available Space</label>
            <input type='text' class='form-control' id='available' name='available' placeholder='Currently $available' required>
          	</div>";
          	echo"</div>";
          	echo"<input type='submit' name='edit' value='Proceed' class='btn btn-primary'>"; 	

		echo"</form>";
	}
	else{
		$query = "SELECT * FROM `girls_hostel` WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room' ";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run) > 0){
	 		while($row = mysqli_fetch_array($run)){
	         	$room_capacity = $row['room_capacity'];
	         	$available = $row['available'];
	 		}
	
        }
        echo"<p style='color:red;'>**You are going to Modify Building ".$building_no.", Floor ".$floor." and Room ".$room."</p>";
        echo"<br><br>";
		echo"<form action='editBuilding.php' method='post'>";
		    echo"<div class='form-row'>
          	<div class='form-group col-md-4'>
            <label for='room_capacity'>Enter New Room Capacity</label>
            <input type='text' class='form-control' id='room_capacity' name='room_capacity' placeholder='Currently $room_capacity' required>
          	</div>";
          	echo"<div class='form-group col-md-4'>
            <label for='available'>Enter New Available Space</label>
            <input type='text' class='form-control' id='available' name='available' placeholder='Currently $available' required>
          	</div>";
          	echo"</div>";
          	echo"<input type='submit' name='edit' value='Proceed' class='btn btn-primary'>";	

		echo"</form>";
	}	
}
else if(isset($_POST['edit'])){
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$room_capacity = $_POST['room_capacity'];
	$available = $_POST['available'];
	$building_no = $_SESSION['type'];
	$floor =  $_SESSION['floor'];
	$room = $_SESSION['room'];
	if($available>$room_capacity){
		echo"<script>";
			echo"alert('Please Enter Valid Values')";
		echo"</script>";	
	}
	else{
		if($building_no[0] == 'b'){

			$query = "UPDATE `boys_hostel` SET `room_capacity`='$room_capacity',`available`='$available' WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room'";
			$run = mysqli_query($con,$query);
			if($run){
				echo"<div class='alert alert-success'>
  				<strong>Success!</strong>Updated Succesfully
				</div>";
			}	
		}
		else{
			$query = "UPDATE `girls_hostel` SET `room_capacity`='$room_capacity',`available`='$available' WHERE building_no = '$building_no' and floor_no = '$floor' and room_no = '$room'";
			$run = mysqli_query($con,$query);
			if($run){
				echo"<div class='alert alert-success'>
  				<strong>Success!</strong>Updated Succesfully
				</div>";
			}
		}
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