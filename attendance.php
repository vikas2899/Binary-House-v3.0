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
$con = mysqli_connect('localhost','root','','building_data');
echo"<br><p align='center'>Mark Student Attendance";
echo"<div style='margin:50px;'>";
echo"<br>";
echo"<form action='attendance.php' method='post'>";
$query="SELECT ID from student_table";
$run = mysqli_query($con,$query);
  echo"<div class='form-row'>";
    echo'<div class="form-group col-md-6">
          <label for="id">Select Student ID : </label>
          <select id="id" name="id" class="form-control" required>';
          if($run){
          while($row=mysqli_fetch_array($run)){
          ?>
          <option>
            <?php echo $row['ID'] ?>
          </option>
          <?php
          }
      echo'</select>
    </div>'; 
  echo'<div class="form-group col-md-6">
            <label for="date">Date of Attendance</label>
            <input type="date" class="form-control" id="date" name="date" required>
       </div>';  
  echo'<div class="form-group col-md-6">
            <label for="presence">Present In Hostel</label>
            <select id="presence" name="presence" class="form-control" required>
              <option>Yes</option>
              <option>No</option>
            </select>
        </div>'; 
  echo'<div class="form-group col-md-6">
            <label for="leave">Leave From Hostel</label>
            <select id="leave" name="leave" class="form-control" required>
              <option>Yes</option>
              <option>No</option>
            </select>
        </div>';

  echo"</div>";  
  echo"<center><br>";
  echo"<input type='submit' value='Proceed' name='submit' class='btn btn-primary'>";
  echo"</center>"; 
  echo"</form>";
  echo"</div>";
}
?>
<?php
if(isset($_POST['submit'])){
  $id=$_POST['id'];
  $date=$_POST['date'];
  $presence=$_POST['presence'];
  $leave=$_POST['leave'];
  $con = mysqli_connect('localhost','root','','building_data');
  $query="INSERT into attendance values('$id','$date','$presence','$leave')";
  $run = mysqli_query($con,$query);
  if($run){
    echo'<div class="alert alert-success">
        <strong>Success!</strong> Attendance Marked Successfully.
        </div>';
  }else{
    $con->error;
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