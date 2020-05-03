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
	<title></title>
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
$email=$_SESSION['semail'];
echo"<form action='change_password.php' method='post'>";
echo'<div class="form-row">
         <div class="form-group col-md-4">
             <label for="pass1">Enter Current Password</label>
             <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Current Password" required>
           </div>';
          echo'<div class="form-group col-md-4">
            <label for="pass2">Enter New Password</label>
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="New Password" required>
          </div>';
          echo'<div class="form-group col-md-4">
            <label for="pass1">Confirm Password</label>
            <input type="password" class="form-control" id="pass3" name="pass3" placeholder="Rewrite New Password" required>
          </div>';
          
  echo"<input type='submit' value='Proceed' name='submit' class='btn btn-primary'>";     
echo"</div";
  
echo"</form>";
// echo"<label>New Password</label><input type='text' name='pass2'/><br/>";
// echo"<label>Confirm Password</label><input type='text' name='pass3'/><br/>";
if(isset($_POST['submit'])){
$con = mysqli_connect('localhost','root','','building_data');
$query="SELECT PASSWORD from student_login where ID='$email'";
$run = mysqli_query($con,$query);
while($row = mysqli_fetch_array($run)){
            $password =$row['PASSWORD'];
      }
$password1=isset($_POST['pass1'])?$_POST['pass1']:'';
$password2=isset($_POST['pass2'])?$_POST['pass2']:'';
$password3=isset($_POST['pass3'])?$_POST['pass3']:'';
if($password==$password1){
	if($password2==$password3){
		$query="UPDATE student_login set PASSWORD='$password3' where ID='$email'";
        $run = mysqli_query($con,$query); 
        echo'<div class="alert alert-success" role="alert">
  			Password Changed!!
			</div>'; 
	}else{
		echo'<div class="alert alert-danger" role="alert">
  			Please rewrite password correctly.
		</div>';
	}
}else{
		echo'<div class="alert alert-danger" role="alert">
  			Please write the current password correctly.
		</div>';
}
}
?>
      	</div>
    </div>
	</div>
</body>
</html>