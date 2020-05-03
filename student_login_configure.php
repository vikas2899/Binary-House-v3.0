<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">
       document.getElementById("drop").style.display = "none"; 
       document.getElementById("logout_s").style.display = "block";
  </script>
</head>
<body>

</body>
</html>
<?php
session_start();
if(isset($_SESSION['semail'])){
  header( "location:studMain.php" );
  if(isset($_POST['logout_s'])){

    header('location:student_login_form.php');
    session_destroy();
  }
}

else{
  header('location:student_login_form.php');
  ?>
  <script type="text/javascript">
    alert("You are LogedIn");
  </script>

    <style>
      #button{
        display: none;
      }
  </style>
  <?php
}

?>