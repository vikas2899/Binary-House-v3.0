<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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

              <form action="employee_list.php" method="post">
                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label for="choice">Please select the option : </label>
                    <select  name="choice" id="choice" class="form-control" >
                        <option>All Employees Record</option>
                        <option>View By Employee ID</option>
                    </select>
               </div> 
            </div>
            <input type="submit" id="btn" value="Proceed" name="submit" class="btn btn-primary">
            </form>

<?php
$choice=isset($_POST['choice'])?$_POST['choice']:'';
if(isset($_POST['submit'])){
if($choice=='All Employees Record'){
	$con = mysqli_connect('localhost','root','','building_data');
	$query="SELECT * from employee";
    $run = mysqli_query($con,$query);
    if($run){
       echo"<div class='form-row'>"; 
       while($row=mysqli_fetch_array($run)){
        $ename = $row['name'];
        $empid = $row['empid'];
        $eimage = $row['image'];
        if($eimage)
            $path = 'Employee_image/'.$eimage;
        else
            $path = 'Employee_image/host1.jpg';
        echo"<div class='form-group col-md-3'>";
        echo"<div class='card' style='width: 14rem;height:18rem;'>";
        echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
            echo"<div class='card-body'>";
                echo"<h5 class='card-title'>Name : $ename</h5>";
                echo"<a href='employee_list.php?eid=".$empid."' class='card-link'>View</a>";
            echo"</div>";
        echo"</div>";
        echo"</div>";
       } 
       echo"</div>";
  ?>
<?php    
    }          
    else{
	    $con->error;
    }
}else if($choice=='View By Employee ID'){
    ?>
        <script type="text/javascript">
            
            document.getElementById("choice").disabled = true;
            document.getElementById("choice").value = "<?php echo $choice ?>";
            document.getElementById("btn").disabled = true;
        </script>
    <?php
    echo"<form action='employee_list.php' method='post'>";
    echo'<div class="form-row">
        <div class="form-group col-md-4">
            <label for="eid">Enter the Employee ID</label>
            <input type="text" class="form-control" id="eid" name="eid" placeholder="Employee ID" required>
        </div> 
    </div>';
    echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'>";
    echo"</form>";    
   }
}    
if(isset($_POST['submitf'])){
    $eid=$_POST['eid'];
    $con = mysqli_connect('localhost','root','','building_data');
    $query="SELECT * from employee where empid='$eid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row<1){
       echo'<div class="alert alert-danger" role="alert">
            Opps! No Record Found.
            </div>';
    }
    else{
            if($run){
                   echo"<div class='form-row'>"; 
                   while($row=mysqli_fetch_array($run)){
                    $ename = $row['name'];
                    $empid = $row['empid'];
                    $eimage = $row['image'];
                    if($eimage)
                    $path = 'Employee_image/'.$eimage;
                    else
                    $path = 'Employee_image/host1.jpg';
                    echo"<div class='form-group col-md-3'>";
                    echo"<div class='card' style='width: 14rem;height:18rem;'>";
                    echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
                    echo"<div class='card-body'>";
                    echo"<h5 class='card-title'>Name : $ename</h5>";
                    echo"<a href='employee_list.php?eid=".$empid."' class='card-link'>View</a>";
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                    } 
                    echo"</div>";
                    }          
            else{
                    $con->error;
            }
    }
}
$eid=isset($_GET['eid'])?$_GET['eid']:'';
if($eid!=''){
     $con = mysqli_connect('localhost','root','','building_data');
   $query="SELECT * from employee where empid='$eid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row>=1){
        while($row=mysqli_fetch_array($run)){
            $name = $row['name'];
            $id = $row['empid'];
            $type = $row['emptype'];
            $email = $row['email'];
            $addr = $row['address'];
            $phone = $row['phone'];
            $des= $row['designation'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $doj = $row['doj'];
            $salary = $row['salary'];
            $nationalID = $row['nationalID'];
            $experience = $row['experience'];
            $state = $row['state'];
            $image = $row['image'];
        }
        echo"<div style='border:1px solid black;border-radius: 10px;background:rgb(120,226,216);padding:10px;'>";
        echo"<img src='Employee_image/$image' style='float:right;height:200px;width:230px;'>";
        echo"<div class='form-row'>";
            echo"<div class='form-group col-md-12'>";
                echo"<span><b>Id : </b>".$id."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b> Name : </b>".$name."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Email : </b>".$email."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"</div>";   
        echo"</div>";   
        echo"<div class='form-row'>";
            echo"<div class='form-group col-md-12'>";
                echo"<span><b>Phone : </b>".$phone."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Gender : </b>".$gender."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Employee Type : </b>".$type."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"</div>";   
        echo"</div>";   
        echo"<div class='form-row'>";
            echo"<div class='form-group col-md-12'>";   
                echo"<span><b>Address : </b>".$addr."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Date of birth : </b>".$dob."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Date of joining : </b>".$doj."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"</div>";   
        echo"</div>";   
        echo"<div class='form-row'>";
            echo"<div class='form-group col-md-12'>";   
                echo"<span><b>Designation : </b>".$des."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>Experience : </b>".$experience."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>National ID : </b>".$nationalID."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"</div>";   
        echo"</div>";           
        echo"<div class='form-row'>";
            echo"<div class='form-group col-md-12'>";       
                echo"<span><b>Salary : </b>".$salary."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<span><b>State : </b>".$state."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"</div>";   
        echo"</div>";
        echo"</div>";           
            
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