<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$name = $_SESSION['sname'];
?>
<html>
<head>
	<title>Feedback Form</title>
	<script type="text/javascript"> 
        document.getElementById("logout_s").style.display = "block";
        document.getElementById("drop").style.display = "none";
        document.getElementById("menu-toggle").style.display = "none";
  </script>
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      	<div class="sidebar-heading"><?php echo "Welcome ".$name ?></div>
      	<div class="list-group list-group-flush">
        	<a href="studMain.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
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
	<p>Feedback Form</p>
	<br>
	<div style="margin-left:290px;">
	<form action ="feedback.php" method="post">
		<div class='form-row'>
		<div class="form-group col-md-7">
            <label for="type">Select Feedback Type : </label>
            <select id="type" name="type" class="form-control" required>
              <option>Cleanliness</option>
			  <option>Mess</option>
			  <option>Facility</option>
			  <option>Others</option>
            </select>
          </div>
        </div>  
		<div class='form-row'>
        <div class="form-group">
    		<label for="area">Feedback Description</label>
    		<textarea class="form-control" id="area" name="area" rows="10" cols="60" placeholder="Write Feedback Description Here......." required></textarea>
  		</div> 
  	</div>
  	</div>	
		<input type="submit" value='Submit' name='submit' class="btn btn-primary"/>
	</form>
</center>

<?php
if(isset($_POST['submit'])){
	$email = $_SESSION['semail'];
	$type=isset($_POST['type'])?$_POST['type']:'';
	$desc=isset($_POST['area'])?$_POST['area']:'';
	$con = mysqli_connect('localhost','root','','building_data');
	$query = "INSERT into feedback(`email`, `type`, `description`) values('$email','$type','$desc')";
	$run=mysqli_query($con,$query);
	if($run){
		echo"<br>";
		echo'<div class="alert alert-success" role="alert">
  		Submitted Successfully!!
		</div>';
	}else{
		echo"Not submitted";
	}
}
?>
	  	</div>
    </div>
	</div>	
</body>
</html>