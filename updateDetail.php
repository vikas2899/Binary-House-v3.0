<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$name = $_SESSION['sname'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
       // document.getElementById("drop").style.display = "none"; 
        document.getElementById("logout_s").style.display = "block";
       //  // document.getElementById("sidebar").style.display = "block";
        document.getElementById("drop").style.display = "none";
        document.getElementById("menu-toggle").style.display = "none";
  </script>
</head>
<body>
	<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      	<div class="sidebar-heading"><?php echo "Welcome ".$name ?></div>
      	<div class="list-group list-group-flush">
        	<a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        	<a href="payment_form.php" class="list-group-item list-group-item-action bg-light">Payment</a>
          <a href="order.php" class="list-group-item list-group-item-action bg-light">Order History</a>
          <a href="invoice.php" class="list-group-item list-group-item-action bg-light">Generate Invoice</a>
        	<a href="feedback.php" class="list-group-item list-group-item-action bg-light">Feedback</a>
          <a href="mealTiming.php" class="list-group-item list-group-item-action bg-light">Meal Timing</a>
        	<a href="notice_view_stu.php" class="list-group-item list-group-item-action bg-light">Notice Board</a>
          <a href="updateDetail.php" class="list-group-item list-group-item-action bg-light">Update Details</a>
          <a href="change_password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
        	
      	</div>
    </div>
   <div id="page-content-wrapper">
		<div class="container-fluid">
			<center>
				<br>
        	<p>Please fill out the following information you want to update : </p>
        	</center>
        	<br><br>
        	<div style="margin-right:40px;margin-left: 40px;">
			<form action='updateDetail.php' method='post'>
				<div class="form-row">
          		  <div class="form-group col-md-4">
            		<label for="name">Full Name</label>
            		<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
          		  </div>
          		  <div class="form-group col-md-8">
            		<label for="name">Address</label>
            		<input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
          		  </div>
          		  <div class="form-group col-md-4">
            		<label for="number">Phone Number</label>
            		<input type="text" class="form-control" id="number" name="number" placeholder="Enter your Phone Number" required>
          		  </div>
          		  <div class="form-group col-md-4">
            		<label for="ins">Institute</label>
            		<input type="text" class="form-control" id="ins" name="ins" placeholder="Enter your Institute Name" required>
          		  </div>
          		  <div class="form-group col-md-4">
            		<label for="gender">Gender</label>
            		<select id="gender" name="gender" class="form-control" required>
              		<option>Male</option>
              		<option>Female</option>
            		</select>
          			</div>
          		</div> 	
			<input type='submit' value='Proceed' name='submit' class="btn btn-primary"/><br/>
			</form>
		</div>
<?php
if(isset($_POST['submit'])){	
	$email = $_SESSION['semail'];
	$name=isset($_POST['name'])?$_POST['name']:'';
	$address=isset($_POST['address'])?$_POST['address']:'';
	$number=isset($_POST['number'])?$_POST['number']:'';
	$institute=isset($_POST['ins'])?$_POST['ins']:'';
	$gender=isset($_POST['gender'])?$_POST['gender']:'';
	$con = mysqli_connect('localhost','root','','building_data');
	$query = "UPDATE student_table set NAME='$name',ADDRESS='$address',PHONE='$number',INSTITUTE='$institute',GENDER='$gender' where email='$email'";
	$query1 = "UPDATE student_login set NAME='$name' where ID='$email'";
	$run=mysqli_query($con,$query);
	$run1= mysqli_query($con,$query1);
	if($run && $run1){
		echo"<br>";
		echo'<div class="alert alert-success" role="alert">
  			Details updated successfully.This will reflect once you login again.Thanks
			</div>';
	}else{
		echo"<br>";
		echo'<div class="alert alert-danger" role="alert">
  		Opps! Some Error Occured.
		</div>';
	}
}
?>
    	</div>
    </div>
	</div>
</body>
</html>