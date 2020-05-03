<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Successfully Recorded!!!</h4>
<?php 
session_start();
// if($_SESSION["fromRoom"] == '1'){
//       $_SESSION["fromRoom"] = '0';

      
$fname = $_SESSION['fname'];
$gname = $_SESSION['gname'];
$email = $_SESSION['email'];
$addrs = $_SESSION['addrs'];  
$phone = $_SESSION['phone'];
$inst = $_SESSION['inst'];
$gender = $_SESSION['gender'];
$dob = $_SESSION['dob'];
$doa = $_SESSION['doa'];
$nationality = $_SESSION['nationality'];
$nationalID = $_SESSION['nationalID'];
$city = $_SESSION['city'];
$state = $_SESSION['state'];
$zip = $_SESSION['zip'];
$file = $_SESSION['file'];
$food = $_SESSION['food'];      
$con = mysqli_connect("localhost", "root", "", "building_data");
$query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER, dob, doa, nationality, nationalID, city, state, zip, image, hostel_opted) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender','$dob','$doa','$nationality','$nationalID','$city','$state','$zip','$file','$food')";
$query3 = "SELECT ID from student_table where PHONE = '$phone'";
      
$run = mysqli_query($con,$query);
$run3 = mysqli_query($con,$query3);
if($run3){
    while($row = mysqli_fetch_array($run3)){
       $sid = $row['ID'];
    }
}
$query2 = "INSERT INTO `student_login`(`SID`, `ID`, `NAME`, `PASSWORD`) VALUES ('$sid','$email','$fname','$phone')";
$run2 = mysqli_query($con,$query2);
if(!$query2){
  echo "erro";
  echo $query2->error;
  echo $run->error;
}  
$id = "SELECT ID from student_table where PHONE='$phone'";
$run1 = mysqli_query($con,$id);
if($run1){
    while($row = mysqli_fetch_array($run1)){
        $id_send = $row['ID'];
    }
    $uid = $id_send;
}  
$id = $uid;
echo "<p>Credential of Student are as Follows :</p>";
echo "<hr>";
echo "<p>Student ID is : ".$id."</p>";	
$building=$_POST['build'];
echo "<p>Student Building Name : ".$building."</p>";
$selected_room=isset($_POST['room']) ? $_POST['room'] : false;
echo "<p>Student Room No. is : ".$selected_room."</p>";
$flooring=$_POST['floor'];
echo "<p>Student Floor No. : ".$flooring."</p>";
$con = mysqli_connect("localhost", "root", "", "building_data");
$_SESSION['building'] = $_POST['build'];
$_SESSION['floor'] = $_POST['floor'];
$_SESSION['room'] = $_POST['room'];
$selected=$selected_room[0];
if($selected=='b'){
	 $sql="update boys_hostel set available=available-1 where room_no='$selected_room'";
	 if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
	 } 
   else{
	     echo "Error updating record: " . mysqli_error($conn);
	 }
}
else{
	 $sql="update girls_hostel set available=available-1 where room_no='$selected_room'";
	 if (mysqli_query($con, $sql)) {
	   echo "Record updated successfully";

	 } 
   else 
   {
	   echo "Error updating record: " . mysqli_error($conn);
	 }
}
$sql="insert into allocation_data values('$id','$building','$flooring','$selected_room')";
$run = mysqli_query($con,$sql);
if($run){
    echo"<br><br>";
		echo "You Will be Redirected to dashboard in 5 Seconds";
     header('location:main.php');
}
else{
		echo "<p>Failure</p>";
		echo $con->error;
} 
?>
</div>
<style>
   #navbarDropdownMenuLink{
      display: none;
   }
   #logout{
        display:block;
      }
</style>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
</script> 
</div>
    </div>
</body>
</html>
