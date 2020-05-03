<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("drop").style.display = "none";
  document.getElementById("logout").style.display = "block";

</script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="simple-sidebar.css" rel="stylesheet">
</head>
<script type="text/javascript">
  document.getElementById("alloc").disabled = true;
  document.getElementById("alloc").style.pointerEvents="none";
document.getElementById("alloc").style.cursor="default";
</script>      

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
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">

                
    <div style="width:85%;margin:0px auto; margin-top: 30px;">   
    <form action="student_addData.php" method="post" enctype="multipart/form-data">
        <br>
        <h5>Please fill out all the details of the student.</h5><br>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="firstname" placeholder="Student's Name" required>
          </div>
          <div class="form-group col-md-4">
            <label for="gname">Guardian Name</label>
            <input type="text" class="form-control" id="gname" name="gname" placeholder="Guardian's Name" required>
          </div>
          <div class="form-group col-md-4">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Student's E-mail" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="phone">Mobile No.</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Student's Mobile No." required>
          </div>
          <div class="form-group col-md-4">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Student's Date of Birth" required>
          </div>
          <div class="form-group col-md-4">
            <label for="doa">Date of Admission</label>
            <input type="date" class="form-control" id="doa" name="doa" placeholder="Student's Date of Admission" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="institute">Institute</label>
            <input type="text" class="form-control" id="institute" name="institute" placeholder="Student's Institute (College/School)" required>
          </div>
          <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="raddress">Address</label>
          <input type="text" class="form-control" id="raddress" name="raddress" placeholder="Permanent Address" required>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nationality">Nationality</label>
          <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Student's Nationality" required>
        </div>
        <div class="form-group col-md-8">
          <label for="nationalID">National ID</label>
          <input type="text" class="form-control" id="nationalID" name="nationalID" placeholder="Student's Aadhar No." required>
        </div>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Student's Home City" required>
          </div>
          <div class="form-group col-md-4">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
          </div>
          <div class="form-group col-md-2">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="food">Do you want mess along with Hostel Room : </label>
            <select id="food" name="food" class="form-control" required>
              <option value="Yes" selected>Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="userimage">Student's Photo</label>
            <br>
            <input type="file" name="userimage" id="userimage" value="" required>
          </div>
        </div>
  <input type="submit" name="submit" class="btn btn-primary">
</form>
</div>
       






          </div>
      </div>
</div>          
</body>
</html>
<?php
echo"<br>";
define('myfooter',TRUE);
require('footer.php');
?>