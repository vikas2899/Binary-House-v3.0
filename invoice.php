<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$name = $_SESSION['sname'];
$email = $_SESSION['semail'];
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

			<?php
				$con = mysqli_connect('localhost','root','','building_data');
				$query="SELECT * from transaction where email = '$email'";
				$run = mysqli_query($con,$query);
				if($run){   
      				echo"<br><br>";
      				echo"<div style='margin-left:50px;margin-right:50px;'>";
    				echo "<table class='table'>";
					echo "<tr>";
						echo "<th> Order Receipt </th>";
						echo "<th> Amount </th>";
						echo "<th> Paid On </th>";
						echo "<th> Action </th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($run)){		
						echo "<tr>";
                		$id = $row['order_id'];
                		echo "<td>".$row['orderReceipt']."</td>";
                		echo "<td>".$row['Amount']."</td>";
                		echo "<td>".$row['created_at']."</td>";
                		echo"<td><a class='ahr' href='invoice.php?id=".$id."'>View/Download</a>";
            			echo "</tr>";   
        			}
        			echo "</table>";
      				echo"</div>";  
    			}
                $t=isset($_GET['id'])?$_GET['id']:'';
        		if($t!=''){
        			$_SESSION['order_id'] = $t;
        			header('location:invoice_print.php');
        		}
        	
			?>

		</div>
	</div>
</div>
</body>
</html>			