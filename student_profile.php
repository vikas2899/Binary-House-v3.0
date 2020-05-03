<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
if($_SESSION['fromMain'] == '1'){
	$_SESSION['fromMain'] = '0';
}
else{
	header('location:student_login_form.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<script type="text/javascript">
		document.getElementById("drop").style.display = "none";
    document.getElementById("togg").style.display = "none";
    document.getElementById("toggbtn").style.display = "none";
    document.getElementById("menu-toggle").style.display = "block";
  </script>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<form class="form-inline my-2 my-lg-0 " action="student_login_configure.php" method="post">
  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
      	<div class="list-group list-group-flush">
        	<a href="studMain.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        	<a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        	<a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        	<a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        	<a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        	<a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        	<button class="btn btn-danger pull-right" type="submit" value="logout" name="logout_s" id="logout_s" >LogOut</button>
        	
      	</div>
    </div>
   <div id="page-content-wrapper">
		<div class="container-fluid">
        	<h1 class="mt-4">Heading</h1>
        	<p>Random Text</p>
        	<p>Random Text</p>
      	</div>
    </div>
	</div></form>
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>