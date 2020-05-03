<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		document.getElementById("logout").style.display = "block";
	</script>
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
 		
<?php
session_start();
// $uid =  $_SESSION['uid'];
$pass = $_SESSION['pass'];
$phone = $_SESSION['phone'];

// $fname = $_SESSION['fname'];
// $gname = $_SESSION['gname'];
// $email = $_SESSION['email'];
// $addrs = $_SESSION['addrs'];
// $phone = $_SESSION['phone'];
// $inst = $_SESSION['inst'];
// $gender = $_SESSION['gender'];


// if($_SESSION["fromData"] == '1'){
// 	$_SESSION["fromData"] = '0';
// 	$_SESSION["fromRoom"] = '1';

$con = mysqli_connect("localhost", "root", "", "building_data");
// $query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender')";
// $query2 = "INSERT INTO student_login(ID,NAME,PASSWORD) VALUES ('$email','$fname','$phone')";
// $run = mysqli_query($con,$query);
// $run2 = mysqli_query($con,$query2);
// $id = "SELECT ID from student_table where PHONE='$phone'";
// $run1 = mysqli_query($con,$id);
// if($run1){
//    while($row = mysqli_fetch_array($run1)){
//       $id_send = $row['ID'];
//    }
//    $uid = $id_send;
// }
// $_SESSION['uid'] = $uid;


$selected_build = isset($_POST['building']) ? $_POST['building'] : false;
$selected_floor = isset($_POST['floor']) ? $_POST['floor'] : false;
    if($selected_build[0] == 'b'){
 	echo "<form action='check.php' method='post' enctype='multipart/form-data'>";
 	      echo"<br>
          <center>
                <p>Please Select the Room No.</p>
          </center>";
 	      echo"<br><br><br>";
 	      echo"<div class='form-row'>";
 	          echo"<div class='form-group col-md-4'>";

 	          echo"</div>";	
              echo"<div class='form-group col-md-4'>";
              	echo"<div class='card' style='width: 18rem;'>";
              	    echo"<div class='card-body'>"; 
              	        echo"<p align='center'>Room Number</p><hr>";
              			echo"<label for'room'>Select Room No. :</label>";
 	      				echo"<select name='room' id='room' class='form-control'>";
 						$sql = "select room_no from boys_hostel where building_no='$selected_build' and floor_no='$selected_floor' and available>0";
 						$result = mysqli_query($con, $sql);
 						if(mysqli_num_rows($result) > 0){
	 					while($row = mysqli_fetch_array($result)){
	         				echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 					}
	 					echo "</select>";
	 				echo"</div>";
	 				echo"<br><br><br>";	
                echo"</div>";                            
              echo"</div>";
              echo"<div class='form-group col-md-4'>";

 	          echo"</div>";
           echo"</div>";    
 	      
	 	echo "<input type='hidden' name='build' value=".$selected_build.">";
	 	echo "<input type='hidden' name='floor' value=".$selected_floor.">";
	 	echo"<center>";
	 	echo"<input type='submit' name='submit' value='Proceed' class='btn btn-primary'/></form>";
	 	echo"</center>";
	}else{
		?>
		<script>
		   alert("No Floor or Room Available");
		</script>
	<?php	
		$query = "DELETE FROM `student_table` WHERE PHONE = '$phone'";
		$query1 = "DELETE FROM `student_login` WHERE PASSWORD = '$pass'";
		$run1 = mysqli_query($con,$query);
		$run2 = mysqli_query($con,$query1);
		header( "refresh:1;url=student_addData.php" );
	}
}	
 else{
 	echo "<form action='check.php' method='post' enctype='multipart/form-data'>";
 	echo"<br>
          <center>
                <p>Please Select the Room No.</p>
          </center>";
 	      echo"<br><br><br>";
 	      echo"<div class='form-row'>";
 	          echo"<div class='form-group col-md-4'>";

 	          echo"</div>";	
              echo"<div class='form-group col-md-4'>";
              	echo"<div class='card' style='width: 18rem;'>";
              	    echo"<div class='card-body'>"; 
              	        echo"<p align='center'>Room Number</p><hr>";
 						echo"<label for='room'>Room No</label>";
 						echo"<select name='room' id='room' class='form-control'>";
 							$sql = "select room_no from girls_hostel where building_no='$selected_build' and floor_no='$selected_floor' and available>0";
 							$result = mysqli_query($con, $sql);
 							if(mysqli_num_rows($result) > 0){
	 							while($row = mysqli_fetch_array($result)){
	         						echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 							}
	 						echo "</select>";
	 						echo"</div>";
	 				echo"<br><br><br>";	
                echo"</div>";                            
              echo"</div>";
              echo"<div class='form-group col-md-4'>";

 	          echo"</div>";
           echo"</div>";  
	 	   echo "<input type='hidden' name='build' value=".$selected_build.">";
	 	   echo "<input type='hidden' name='floor' value=".$selected_floor.">";
	 	   echo"<center>";
	 	   echo "<input type='submit' name='submit' value='Proceed' class='btn btn-primary' /></form>";
	 	   echo"</center>";
	 }else{
	 	?>
	 	<script>
	 	   alert("No Floor or Room available");
	 	</script>
	 <?php	
		$query = "DELETE FROM `student_table` WHERE PHONE = '$phone'";
		$query1 = "DELETE FROM `student_login` WHERE PASSWORD = '$pass'";
		$run1 = mysqli_query($con,$query);
		$run2 = mysqli_query($con,$query1);
		header( "refresh:1;url=student_addData.php" );
	}
} 
?>
<style>
   #navbarDropdownMenuLink{
      display: none;
   }
</style>
  </div>
      </div>
    </div>
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>