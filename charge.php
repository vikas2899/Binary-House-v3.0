<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Acknowlegdement</title>
	<script type="text/javascript"> 
        document.getElementById("logout_s").style.display = "block";
        document.getElementById("drop").style.display = "none";
        document.getElementById("menu-toggle").style.display = "none";
  </script>
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      	<div class="sidebar-heading">Welcome</div>
      	<div class="list-group list-group-flush">
        	<a href="studMain.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        	<a href="payment_form.php" class="list-group-item list-group-item-action bg-light">Payment</a>
          <a href="order.php" class="list-group-item list-group-item-action bg-light">Order History</a>
          <a href="invoice.php" class="list-group-item list-group-item-action bg-light">Generate Invoice</a>
        	<a href="feedback.php" class="list-group-item list-group-item-action bg-light">Feedback</a>
          <a href="mealTiming.php" class="list-group-item list-group-item-action bg-light">Meal Timing</a>
        	<a href="notice_board.php" class="list-group-item list-group-item-action bg-light">Notice Board</a>
          <a href="updateDetail.php" class="list-group-item list-group-item-action bg-light">Update Details</a>
          <a href="change_password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
        	
      	</div>
    </div>
   <div id="page-content-wrapper">
        	

<?php
    session_start();
	$razorpay_payment_id = $_POST['razorpay_payment_id'];
	$razorpay_order_id=$_POST['razorpay_order_id'];
	$razorpay_signature=$_POST['razorpay_signature'];
	$email = $_SESSION['semail'];
	$month = $_SESSION['smonth'];
    $amount = $_SESSION['samount'];
    $order =$_SESSION['orderReceipt'];

	$con = mysqli_connect('localhost','root','','building_data');
	$sql="INSERT INTO `transaction`(`email`, `payment_id`, `order_id`, `signature_hash`, `month`,`orderReceipt`, `Amount`) VALUES ('$email','$razorpay_payment_id','$razorpay_order_id','$razorpay_signature','$month','$order','$amount')";
	$run = mysqli_query($con,$sql);
	if($run){
		 echo"<br><br>";
		 echo'<div class="alert alert-success" role="alert" style="margin-left:20px;margin-right:20px;">
  			<h4 class="alert-heading">Payment Success</h4>
  			<p>Please take screenshot of below details for future references.</p>
  			<hr>
  			<p class="mb-0">Razorpay Success ID : '.$razorpay_payment_id.' </p>
  			<p>You will be redirecting to dashboard after 5 seconds</p>
			</div>';
	     header("refresh:7; url = studMain.php"); 
    
	 }else{
	 	echo "Error Occured";
	 }
	$con->close();
?>
      	</div>
    </div>
	</div>
</body>
</html>