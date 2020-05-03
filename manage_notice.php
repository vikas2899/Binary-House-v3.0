<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
          	<a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc" href="student_form.php">Manage Student</a>
            <a href="manage_building.php" id = "build" class="list-group-item list-group-item-action bg-light">Manage Building</a>
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
          <div class="container-fluid" style="margin:0px;">
          	<br><br><br>
             <div class="container">
  					<div class='form-row'>
                <div class="form-group col-md-4"> 
    					<div class="col-xm-3" style="">
      						 <div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">Add new notice</h5>
    								<p class="card-text">Used for adding notice for hostel Students.</p>
                    <br>
    								<a href="notice.php" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
            </div>
            <div class="form-group col-md-4">
    					<div class="col-xm-3" style="">
      						<div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">View all Notices</h5>
    								<p class="card-text">Used for Viewing All notices</p><br>
                    <br>
    								<a href="notice_view.php" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
            </div>  
              <div class="form-group col-md-4"> 
              <div class="col-xm-auto">
                  <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">View Feedbacks</h5>
                    <p class="card-text">Used for Viewing Student's Feedback.</p><br>
                    <a href="fetch_feedback.php" class="card-link">Proceed</a>
                  </div>
                </div>
            </div>
          </div>
  					</div><br>
            <div class='form-row'>
               <div class="form-group col-md-4"> 
              <div class="col-xm-auto">
                  <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">View Messages</h5>
                    <p class="card-text">Used for viewing Query Messages</p><br>
                    <a href="query_message.php" class="card-link">Proceed</a>
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
                        $query = 'SELECT * FROM `feedback`';
                        $run = mysqli_query($con,$query);
                        $row = mysqli_num_rows($run);
                      ?>
                      <img style="float:left;" src="img/feedback.png">
                      <span style="font-size:50px;float:right;height:10px;"><?php echo $row?></span><br><br><br>
                      <p class="card-text" style="float:right;">Total Feedbacks.</p>
                      <br><br>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
			</div>
      	  </div>
      </div>
    </div>
<script type="text/javascript">
	document.getElementById("build").style.pointerEvents="none";
	document.getElementById("build").style.cursor="default";
 	document.getElementById("drop").style.display = "none";
  	document.getElementById("logout").style.display = "block";
</script>
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>