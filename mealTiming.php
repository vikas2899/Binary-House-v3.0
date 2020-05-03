<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$name = $_SESSION['sname'];
?>
<html>
<head>
	<title>Meal Timing</title>
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
	<br>		
	<center><p>Meal TimeTable</p></center><br/>
	<div style="margin-left:40px;margin-right:60px;">
	<table class="table">
	<tr>
	 <td align="center"></td>
	 <th>Breakfast</th>
	 <th>Lunch</th>
	 <th>Snacks</th>
	 <th>Dinner</th>
	</tr>
	<tr>
	 <th align="center">Monday
	 <td>Sandwich</td>
	 <td>Kadhi Chawal</td>
	 <td>Patties</td>
	 <td>Aloo Gobhi</td>
	</tr>
	<tr>
	 <th align="center">Tuesday
	 <td>Poha</td>
	 <td>Urad Dal</td>
	 <td>Samosa</td>
	 <td>Dum Aloo</td>
	</tr>
	<tr>
	 <th align="center">Wednesday
	 <td>Bread Butter</td>
	 <td>Masoor Dal</td>
	 <td>Chowmein Samosa</td>
	 <td>Kadhai Paneer</td>
	</tr>
	<tr>
	 <th align="center">Thursday
	 <td>Cutlet</td>
	 <td>Chana Masala</td>
	 <td>Maggi</td>
	 <td>Bindi with Raita</td>
	</tr>
	<tr>
	 <th align="center">Friday
	 <td>Jawe</td>
	 <td>Moong Dal</td>
	 <td>Burger</td>
	 <td>Pao Bhaji</td>
	</tr>
	<tr>
	 <th align="center">Saturday
	 <td>Aloo Puri</td>
	 <td>Rajma Chawal</td>
	 <td>-</td>
	 <td>Chole Bathure</td>
	</tr>
	<tr>
	 <th align="center">Sunday
	 <td>Aloo Kachori</td>
	 <td>Chole Chawal</td>
	 <td>Chips Packet</td>
	 <td>Nan Daal(Dal Makhni and Shahi Paneer)</td>
	</tr>
    </table>
	</div>

    	</div>
    </div>
	</div>
</body>
</html>
