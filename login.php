<?php
ob_start();
session_start();
?>
<?php
define('myheader',TRUE);
require('header.php');
if(isset($_SESSION['uemail'])){
  header('location:login_configure.php');
}
?>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="style1.css">
  <script type="text/javascript">
    $('#message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
    document.getElementById("home").style.display = "block";
    document.getElementById("contact").style.display = "block";
  </script>
</head>
<body>

<!-- <div class="d1" >
    <form action="login.php" method="post">
      <div style="width: 50%;margin:0px auto;">
        <div class="input-group input-group-md" style="padding:10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Admin ID</span>
            </div>
            <input type="text"  name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" autocomplete="off" required>
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
    <form action="login.php" method="post" class="login-form">
      <h2> Admin Login </h2><br>
      <input type="text" name="email" placeholder="username" autocomplete="off" required/>
      <input type="password" name="password" placeholder="password" required/>
      <button type="submit" name="submit">login</button>
      <br><br>
      <p id="message" style="color:red;display:none;">*Invalid Username or Password</p> 
    </form>
  </div>
</div>
</body>
</html>
<?php
// if(!isset($_POST['submit'])){
//   header('location:login.php');
// }
$con = mysqli_connect('localhost','root','','building_data');
if(isset($_POST["submit"])){
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $query = "SELECT * FROM admin_table WHERE email='$email' AND password='$pass'";
  $run=mysqli_query($con,$query);
  $row = mysqli_num_rows($run);
  if($row<1){
?>
  <script type="text/javascript">
    document.getElementById("message").style.display = "block";    
  </script>
  <?php 
  }
  else{
    $data = mysqli_fetch_assoc($run);
    $id = $data['email'];
    $_SESSION['uemail'] = $id;
    // $_SESSION['admin'] = '1';
    // $_SESSION['fromLogin'] = '1';
    header('location:login_configure.php');
  }
}
?>
