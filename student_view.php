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
              <form action="student_view.php" method="post">
                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label for="choice">Please select the option : </label>
                    <select  name="choice" id="choice" class="form-control" >
                        <option>All Student Record</option>
                        <option>View By Student ID</option>
                    </select>
               </div> 
            </div>
            <input type="submit" id="btn" value="Proceed" name="submit" class="btn btn-primary">
            </form>

<?php
$con = mysqli_connect('localhost','root','','building_data');
if(isset($_POST['submit'])){
	$choice = $_POST['choice'];
	if($choice == 'All Student Record'){
		$query="SELECT * from student_table";
    	$run = mysqli_query($con,$query);
    	if($run){
    		echo"<div class='form-row'>"; 
       		while($row=mysqli_fetch_array($run)){
       		$sname = $row['NAME'];
        	$sid = $row['ID'];
        	$simage = $row['image'];
        	if($simage)
            	$path = 'uploads/'.$simage;
        	else
            	$path = 'uploads/host1.jpg';
        	echo"<div class='form-group col-md-3'>";
        	echo"<div class='card' style='width: 14rem;height:18rem;'>";
        	echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
            	echo"<div class='card-body'>";
                	echo"<p class='card-title'>Name : $sname</p>";
                	echo"<a href='student_view.php?sid=".$sid."' class='card-link'>View</a>";
            	echo"</div>";
        	echo"</div>";
        	echo"</div>";
       		} 
       		echo"</div>";
    	}	
	}
	else if($choice=='View By Student ID'){
    ?>
        <script type="text/javascript">
            
            document.getElementById("choice").disabled = true;
            document.getElementById("choice").value = "<?php echo $choice ?>";
            document.getElementById("btn").disabled = true;
        </script>
    <?php
    	echo"<form action='student_view.php' method='post'>";
    	echo'<div class="form-row">
        	<div class="form-group col-md-4">
            	<label for="sid">Enter the Student ID</label>
            	<input type="text" class="form-control" id="sid" name="sid" placeholder="Student ID" required>
        	</div> 
    	</div>';
    	echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'>";
    	echo"</form>";    
   }
}
if(isset($_POST['submitf'])){
    $sid=$_POST['sid'];
    $query="SELECT * from student_table where ID='$sid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row<1){
        ?>
            <script type="text/javascript">
                alert("No Student Found!");
            </script>
        <?php
        header( "refresh:0.5;url=student_view.php" );
    }
    else{
            if($run){
                   echo"<div class='form-row'>"; 
                   while($row=mysqli_fetch_array($run)){
                    $sname = $row['NAME'];
                    $sid = $row['ID'];
                    $simage = $row['image'];
                    if($simage)
                    $path = 'uploads/'.$simage;
                    else
                    $path = 'uploads/host1.jpg';
                    echo"<div class='form-group col-md-3'>";
                    echo"<div class='card' style='width: 14rem;height:18rem;'>";
                    echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
                    echo"<div class='card-body'>";
                    echo"<p class='card-title'>Name : $sname</p>";
                    echo"<a href='student_view.php?sid=".$sid."' class='card-link'>View</a>";
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
$sid=isset($_GET['sid'])?$_GET['sid']:'';
if($sid!=''){
	$query="SELECT * from student_table where ID='$sid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row>=1){
    	while($row=mysqli_fetch_array($run)){
    		$name = $row['NAME'];
    		$id = $row['ID'];
    		$gname = $row['G_NAME'];
    		$email = $row['EMAIL'];
    		$addr = $row['ADDRESS'];
    		$phone = $row['PHONE'];
    		$inst= $row['INSTITUTE'];
    		$gender = $row['GENDER'];
    		$dob = $row['dob'];
    		$doa = $row['doa'];
    		$nationality = $row['nationality'];
    		$nationalID = $row['nationalID'];
    		$city = $row['city'];
    		$state = $row['state'];
    		$zip = $row['zip'];
    		$image = $row['image'];
    	}
    	echo"<div style='border:1px solid black;border-radius: 10px;background:rgb(120,226,216);padding:10px;'>";
    	echo"<img src='uploads/$image' style='float:right;height:200px;width:230px;'>";
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
    			echo"<span><b>Guardian's Name : </b>".$gname."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    		echo"</div>";	
    	echo"</div>";	
    	echo"<div class='form-row'>";
    		echo"<div class='form-group col-md-12'>";	
    			echo"<span><b>Address : </b>".$addr."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>Date of birth : </b>".$dob."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>Date of joining : </b>".$doa."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    		echo"</div>";	
    	echo"</div>";	
    	echo"<div class='form-row'>";
    		echo"<div class='form-group col-md-12'>";	
    			echo"<span><b>Institute : </b>".$inst."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>Nationality : </b>".$nationality."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>National ID : </b>".$nationalID."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    		echo"</div>";	
    	echo"</div>";			
    	echo"<div class='form-row'>";
    		echo"<div class='form-group col-md-12'>";		
    			echo"<span><b>City : </b>".$city."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>State : </b>".$state."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
    			echo"<span><b>Zip/Postal Code : </b>".$zip."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
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