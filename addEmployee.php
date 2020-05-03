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
	   document.getElementById("drop").style.display = "none";
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
 	<div style="width:85%;margin:0px auto; margin-top: 30px;">		
	<form action="addEmployee.php" method="post" enctype="multipart/form-data">
    <br>
        <h5>Please fill out all the details of the employee.</h5><br>
		<div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Employee's Name" autocomplete="off" required>
          </div>
		 <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
            </select>
          </div>
         <div class="form-group col-md-4">
            <label for="etype">Employee Type</label>
            <input type="text" class="form-control" id="etype" name="etype" placeholder="Permanent/Temporary Staff" autocomplete="off" required>
          </div>
     </div>
     <div class="form-row">
     	 <div class="form-group col-md-4">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
          </div>
          <div class="form-group col-md-4">
            <label for="phone">Contact No. </label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Employee's Mobile No. " required>
          </div>
          <div class="form-group col-md-4">
            <label for="doj">Date of Joining</label>
            <input type="date" class="form-control" id="doj" name="doj" required>
          </div>
     </div>	
     	<div class="form-group">
            <label for="Address">Address </label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Employee's Permanent Address" required>
          </div>
     <div class="form-row">
     	  <div class="form-group col-md-6">
            <label for="email">Email </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Employees's Email" required>
          </div>
          <div class="form-group col-md-6">
            <label for="des">Designation </label>
            <input type="text" class="form-control" id="des" name="des" placeholder="Employees's Designation" required>
          </div>
     </div>	
     <div class="form-row">
          <div class="form-group col-md-4">
            <label for="salary">Salary </label>
            <input type="text" class="form-control" id="salary" name="salary" placeholder="Employees's Salary in Indian Rupee" required>
          </div>     	
     	  <div class="form-group col-md-4">
            <label for="state">State </label>
            <input type="text" class="form-control" id="state" name="state" placeholder="Employees's State of Living" required>
          </div>
          <div class="form-group col-md-4">
            <label for="nationalID">National ID </label>
            <input type="text" class="form-control" id="nationalID" name="nationalID" placeholder="Employees's National ID" required>
          </div>
     </div>
     <div class="form-row">
     	  <div class="form-group col-md-4">
            <label for="exp">Working Experience </label>
            <input type="text" class="form-control" id="exp" name="exp" placeholder="Experience in years" required>
          </div>
          <div class="form-group col-md-4">
            <label for="empimage">Employee's Photo</label>
            <input type="file" name="empimage" id="empimage">
          </div> 
     </div>     
		 <input type="submit" value="Proceed" name="submit" class="btn btn-primary"/>
    </form>
</div>
  </div>
      </div>
    </div>  
</body>
</html>
<?php
if(isset($_POST['submit'])){
$con = mysqli_connect('localhost','root','','building_data');	
$file = $_FILES['empimage'];
$filename = $file['name'];
$fileTempName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileExt = explode('.',$filename);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg','jpeg','png','pdf');
if(in_array($fileActualExt,$allowed)){
    if($fileError===0){
        if($fileSize<1000000){
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'Employee_image/'.$fileNameNew;
            move_uploaded_file($fileTempName,$fileDestination);
            $name=$_POST['name'];
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$phone=$_POST['phone'];
			$doj=$_POST['doj'];
			$emptype=$_POST['etype'];
			$salary=$_POST['salary'];
			$address=$_POST['address'];
			$designation=$_POST['des'];
			$email = $_POST['email'];
			$state = $_POST['state'];
			$nationalID = $_POST['nationalID'];
			$exp = $_POST['exp'];

			$query = "INSERT into employee(emptype,name,gender,dob,phone,doj,address,salary,designation,email,state,nationalID,experience,image) values('$emptype','$name','$gender','$dob','$phone','$doj','$address','$salary','$designation','$email','$state','$nationalID','$exp','$fileNameNew')";
			$run = mysqli_query($con,$query);
			if($run){
		    	?>
					<script>
						alert("Successfully Recorded");
					</script>
		    	<?php
			}
        }else{
              echo "File too big";
        }
    }
}else{
    echo "File is not allowed";
}

}		
?>
<?php
define('myfooter',TRUE);
require('footer.php');
?>
