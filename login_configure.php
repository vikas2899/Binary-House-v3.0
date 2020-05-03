<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
  
</script>

</head>
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
            <br><br>
            <div class='form-row'>
                  <div class="form-group col-lg-4">
                 <div class="col-xm-3" style="">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <br>
                      <?php
                        $con = mysqli_connect('localhost','root','','building_data');
                        $query = 'SELECT * FROM `boys_hostel`';
                        $query1 = 'SELECT * FROM `girls_hostel`';
                        $run = mysqli_query($con,$query);
                        $run1 = mysqli_query($con,$query1);
                        $roomb = 0;
                        $roomg = 0;
                        while($row=mysqli_fetch_array($run)){
                          $roomb = $roomb + $row['room_capacity'];
                        }
                        while($row=mysqli_fetch_array($run1)){
                          $roomg = $roomg + $row['room_capacity'];
                        }
                        $totalr = $roomb+$roomg;
                      ?>
                      <img style="float:left;" src="img/room.png">
                      <span style="font-size:50px;float:right;height:10px;"><?php echo $totalr?></span><br><br><br>
                      <p class="card-text" style="float:right;">Total Rooms.</p>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="form-group col-lg-4">
                 <div class="col-xm-3" style="">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <br>
                      <?php
                        $con = mysqli_connect('localhost','root','','building_data');
                        $query = 'SELECT * FROM `boys_hostel`';
                        $query1 = 'SELECT * FROM `girls_hostel`';
                        $run = mysqli_query($con,$query);
                        $run1 = mysqli_query($con,$query1);
                        $avab = 0;
                        $avag = 0;
                        while($row=mysqli_fetch_array($run)){
                          $avab = $avab + $row['available'];
                        }
                        while($row=mysqli_fetch_array($run1)){
                          $avag = $avag + $row['available'];
                        }
                        $totala = $avab+$avag;
                      ?>
                      <img style="float:left;" src="img/ava.png">
                      <span style="font-size:50px;float:right;height:10px;"><?php echo $totala?></span><br><br><br>
                      <p class="card-text" style="float:right;">Available Rooms.</p>
                      
                    </div>
                  </div>
                 </div>
                </div>
                <div class="form-group col-lg-4">
                 <div class="col-xm-3" style="">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <?php
                        $con = mysqli_connect('localhost','root','','building_data');
                        $query = 'SELECT * FROM `student_table`';
                        $run = mysqli_query($con,$query);
                        $row = mysqli_num_rows($run);
                      ?>
                      <img style="float:left;" src="img/student.jpg">
                      <span style="font-size:50px;float:right;height:10px;"><?php echo $row?></span><br><br><br>
                      <p class="card-text" style="float:right;">Total Customers.</p>
                    </div>
                  </div>
                 </div>
                </div>
              </div> <br><br>
              <div class='form-row'>
                  <div class="form-group col-lg-4">
                 <div class="col-xm-3" style="">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <?php
                        $con = mysqli_connect('localhost','root','','building_data');
                        $query = 'SELECT * FROM `employee`';
                        $run = mysqli_query($con,$query);
                        $row = mysqli_num_rows($run);
                      ?>
                      <img style="float:left;" src="img/employee.png">
                      <span style="font-size:50px;float:right;height:10px;"><?php echo $row?></span><br><br><br>
                      <p class="card-text" style="float:right;">Total Employees.</p>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
    
            
 </div>
      </div>
    </div>
</body>
</html>
<?php
session_start(); 
if(isset($_SESSION['uemail'])){
  if(isset($_POST['logout'])){

    header('location:login.php');
    session_destroy();
  }
}
else{
  header('location:login.php');
  ?>
  <style>
      #button{
        display: none;
    }
  </style>
  <?php
}

?>
<?php
define('myfooter',TRUE);
require('footer.php');
?>