<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$email = $_SESSION['semail'];
$con = mysqli_connect('localhost','root','','building_data');
$query="SELECT NAME,PHONE,hostel_opted from student_table where email='$email'";
$run = mysqli_query($con,$query);
while($row = mysqli_fetch_array($run)){
             $name =$row['NAME'];
             $phone=$row['PHONE'];
             $hostel=$row['hostel_opted'];
        }        
$_SESSION['sname']=$name;
$_SESSION['sphone']=$phone;
if($hostel=='Yes'){
	$amount=7000;
}else{
	$amount=5000;
}

?>
<html>
<head>
	<title>Payment</title>
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
              <?php 

                echo"<br>";
				if($hostel=='Yes'){
       			echo"<p>You have Opted for Hostel Room along with mess facilities.
       			You have to pay <b>INR 6999/month</b> Only.</p>"; 
				}else{
       			echo"<p>You have Opted for Hostel Room without mess facilities.
       			You have to pay <b>INR 5999/month</b> Only.</p>"; 
				}
				?>
		  <br>		
		  <form action="payment.php" method="post">
		  	<div class="form-row">
          		<div class="form-group col-md-4">
            		<label for="amount">Amount to be paid :</label>
            		<input type="text" class="form-control" id="amount" name="amount" value="<?php echo $amount ?>" required readonly>
          		</div>
          		<div class="form-group col-md-4">
            		<label for="month">Select Month</label>
            		<select id="month" name="month" class="form-control" required>
              		<option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option>
            		</select>
          		</div>
          	</div>	
			<input type="hidden" name="email" value="<?php $email ?>" />
			<input type="hidden" name="name" value="<?php  $name ?>" />
			<input type="hidden" name="phone" id="phone" />
			<input type="submit" value="Proceed" name="submit" class="btn btn-primary"><br/>
		</form>

 		  </div>
      </div>
</div>	
<script type="text/javascript">
	// document.getElementById("amount").style.pointerEvents="none";
	// document.getElementById("amount").style.cursor="default";
</script>	
</body>
</html>