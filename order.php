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
    <title>Transaction history</title>
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
            <form action="pdf_gen.php" method="post">
                <br><br><br>
                <center>
                <input type="submit" value="Get Transaction History" name="submit" class="btn btn-primary">
            </center>
            </form>    

<?php

 $email=$_SESSION['semail'];
?>          
        </div>
    </div>
    </div>
</body>
</html>