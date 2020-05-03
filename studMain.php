<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$email = $_SESSION['semail'];
$con = mysqli_connect('localhost','root','','building_data');
$query = "SELECT NAME FROM `student_login` WHERE ID = '$email'";
$run=mysqli_query($con,$query);
while($row = mysqli_fetch_array($run)){
	         $name =  $row['NAME'];
}    
$_SESSION['sname'] = $name;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <script type="text/javascript">
       // document.getElementById("drop").style.display = "none"; 
        document.getElementById("logout_s").style.display = "block";
       //  // document.getElementById("sidebar").style.display = "block";
        document.getElementById("drop").style.display = "none";
        document.getElementById("menu-toggle").style.display = "none";
  </script>
<!--   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="simple-sidebar.css" rel="stylesheet"> -->
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
        	
      	</div>
    </div>
	</div>
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>