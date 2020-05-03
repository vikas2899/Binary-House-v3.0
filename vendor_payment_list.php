<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<html>
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
	   document.getElementById("logout").style.display = "block";
  		document.getElementById("drop").style.display = "none";
  		document.getElementById("menu-toggle").style.display = "none";
    </script>
	<title>view attendance</title>
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

	<form action='vendor_payment_list.php' method='post'>
		<div class='form-row'>	
			<div class="form-group col-md-4">
            <label for="choice">Select from the following option : </label>
            <select id="choice" name="choice" class="form-control" required>
              <option>Date Wise</option>
			  <option>Company Wise</option>
    		  <option>All</option>
            </select>
          </div>
		</div>	
	<input type='submit' value='Next' id='btn' method='post' class="btn btn-primary">
    </form>
<?php
$choice=isset($_POST['choice'])?$_POST['choice']:'';
if($choice=='Date Wise'){
	?>
	<script type="text/javascript">
			document.getElementById("choice").disabled = true;
			document.getElementById("choice").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
	</script>
	<?php
	echo"<form action='vendor_payment_list.php' method='post'>";
	echo'<div class="form-row">';
	echo'<div class="form-group col-md-4">
        <label for="date">Date of Payment</label>
        <input type="date" class="form-control" id="date" name="date" required>
     </div>';
     echo"</div>";
    echo"<input type='submit' value='Proceed' name='submitd'  class='btn btn-primary'>";
}else if($choice=='Company Wise'){
	?>
	<script type="text/javascript">
			document.getElementById("choice").disabled = true;
			document.getElementById("choice").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
	</script>
	<?php
	   echo"<form action='vendor_payment_list.php' method='post'>";
	   echo"<div class='form-row'>";
	   echo'<div class="form-group col-md-4">
            <label for="company">Company Name : </label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name here" required>
          </div>';
       echo"</div>";   
       echo"<input type='submit' value='Proceed' name='submitc' class='btn btn-primary'>";
}else if($choice=='All'){
  ?>
  	<script type="text/javascript">
  		document.getElementById("choice").value = "<?php echo $choice ?>";
  	</script>
  <?php
  $con = mysqli_connect("localhost", "root", "", "building_data");
$query="SELECT * from vendor";
$run = mysqli_query($con,$query);
    if($run){
    	echo"<br><br>";
    	echo"<div style='margin-left:50px;margin-right:50px;'>";
    	echo "<table class='table table-striped'>";
			echo "<tr>";
					echo "<th> Payment To </th>";
					echo "<th> Method </th>";
					echo "<th> Amount</th>";
					echo "<th> Date </th>";
					echo "<th> Description </th>";
			echo "</tr>";
	while($row = mysqli_fetch_array($run)){		
			echo "<tr>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['method']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['description']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
    } 
}
if(isset($_POST['submitd'])){

	$date=$_POST['date'];
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$query="SELECT * from vendor where date1='$date'";
	$run = mysqli_query($con,$query);
	$row = mysqli_num_rows($run);
	if($row>=1){
    	if($run){
    	    echo"<br><br>";
    		echo"<div style='margin-left:50px;margin-right:50px;'>";
    		echo "<table class='table table-striped'>";
			echo "<tr>";
					echo "<th> Payment To </th>";
					echo "<th> Method </th>";
					echo "<th> Amount</th>";
					echo "<th> Date </th>";
					echo "<th> Description </th>";
			echo "</tr>";
			while($row = mysqli_fetch_array($run)){		
				echo "<tr>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['method']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['description']."</td>";
            	echo "</tr>";   
        	}
        	echo "</table>";
    	}
	}
	else{
            echo'<div class="alert alert-danger" role="alert">
  			Sorry, No Record Found.
			</div>';
	}
}
else if(isset($_POST['submitc'])){
	$company=$_POST['company'];
	$con = mysqli_connect("localhost", "root", "", "building_data");
	$query="SELECT * from vendor where company='$company'";
	$run = mysqli_query($con,$query);
	$row = mysqli_num_rows($run);
	if($row>=1){
    	if($run){
    		echo"<br><br>";
    		echo"<div style='margin-left:50px;margin-right:50px;'>";
    		echo "<table class='table table-striped'>";
				echo "<tr>";
					echo "<th> Payment To </th>";
					echo "<th> Method </th>";
					echo "<th> Amount</th>";
					echo "<th> Date </th>";
					echo "<th> Description </th>";
				echo "</tr>";
		while($row = mysqli_fetch_array($run)){		
				echo "<tr>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['method']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['description']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
    	}
    }
    else{
    	echo'<div class="alert alert-danger" role="alert">
  			Sorry, No Record Found.
			</div>';
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