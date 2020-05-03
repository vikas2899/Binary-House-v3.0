<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<?php

require_once "razorpay-php/Razorpay.php";

use Razorpay\Api\Api;

$keyid='rzp_test_zXp4l7H7cXKeew';
$secretKey='DwAoXVDh99uumnZ6ZUeAn1JQ';
$api = new Api($keyid, $secretKey);

session_start();
$email = $_SESSION['semail'];
$name = $_SESSION['sname'];
$phone = $_SESSION['sphone'];
$amount=$_POST['amount'];
$month=$_POST['month'];
$famount=$amount*100;
$_SESSION['samount']=$amount;
$_SESSION['smonth']=$month;

$order = $api->order->create(array(
  'receipt' => rand(1000,9999).'ORD',
  'amount' => $famount,
  'payment_capture' => 1,
  'currency' => 'INR'
  )
);
$_SESSION['orderReceipt']=$order->receipt;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form action="charge.php" method="POST">
<br><br><br> 
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key ="<?php echo $keyid ?>" 
    data-amount ="<?php echo $order->amount ?>" 
    data-currency ="INR"
    data-order_id ="<?php echo $order->id ?>"
    data-buttontext="Pay with Razorpay"
    data-name="Hostel"
    data-description="Hostel fees"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="<?php echo $name ?>"
    data-prefill.email="<?php echo $email ?>"
    data-prefill.contact="<?php echo $phone ?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hn Element" name="hidden">
<br><br>
<p style="color:red">You are going to pay INR <?php echo $amount?> to Binary House PVT.</p>
</form> 
</center> 
      </div>
    </div>
  </div>
</body>
</html>