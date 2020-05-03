<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$_SESSION['fromAdminDash'] = '1';
$_SESSION['fromStudent'] = '1';
if(isset($_SESSION['semail'])){
  header('location:student_login_configure.php');
}
?>
<html>
<head>
  <title>Student Login</title>
  <link rel="stylesheet" href="style1.css">
  <script type="text/javascript">
    document.getElementById("home").style.display = "block";
    document.getElementById("contact").style.display = "block";
  </script>
</head>
<body>
<!-- <div class="d1" >
    <form action="student_login_form.php" method="post">
      <div style="width: 50%;margin:0px auto;">
        <div class="input-group input-group-md" style="padding:10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Student ID</span>
            </div>
            <input type="text"  name="id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" autocomplete="off" required>
        </div>
        <div class="input-group input-group-md" style="padding:10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
            </div>
            <input type="password"  name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" autocomplete="off" required>
        </div> 
        <button type="submit" name="submit" class="btn btn-primary btn-md btn-block" style="width:97%; margin:0px auto;" >Submit</button>
      </div> 
    </form>
</div> -->
<div class="login-page">
  <div class="form">
    <form  action="student_login_form.php" method="post" class="login-form">
      <h2> User Login </h2><br>
      <input type="text" name="id" placeholder="username" autocomplete="off" required/>
      <input type="password" name="password" placeholder="password" required/>
      <button type="submit" name="submit">login</button>
      <br><br>
      <p id="message" style="color:red;display:none;">*Invalid Username or Password</p> 
    </form>
  </div>
</div>
<center>
</center>
</body>
</html>

<?php
$con = mysqli_connect('localhost','root','','building_data');
if(isset($_POST["submit"])){
  $sid = $_POST["id"];
  $pass = $_POST["password"];
  $query = "SELECT * FROM `student_login` WHERE ID = '$sid' and PASSWORD = '$pass'";
  $run=mysqli_query($con,$query);
  $row = mysqli_num_rows($run);

   if($row<1){ 
   ?> 
   <script type="text/javascript">
        document.getElementById("message").style.display = "block";  
        document.getElementById("sidebar").style.display = "none"; 
        document.getElementById("menu-toggle ").style.display = "none"; 
    </script>
    <?php 
    }
   else{
       $data = mysqli_fetch_assoc($run);
       $id = $data['ID'];
       $_SESSION['semail'] = $id;
       header('location:student_login_configure.php');
    }
}
?>
