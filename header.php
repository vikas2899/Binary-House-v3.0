<?php
if(!defined('myheader')){
  header('location:index.php');
}

?>
<html>
<head>
      <title>  Hostel Management System</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
       <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
       <link href="simple-sidebar.css" rel="stylesheet">
      
</head>
<body>
<style>
  img{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;
    }
  p.p1{
      padding: 5px;
}
</style>
<header>
  
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Binary House</a>
  <button id = "togg" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span id = "toggbtn" class="navbar-toggler-icon"></span>
  </button>
  <span  id="menu-toggle"  class="navbar-toggler-icon" style="display:none;"></span>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id="home" style="display:none;">
          <a class="nav-link" href="index.php">Home</a>
      </li>
        <li class="nav-item" id="about" style="display:none;">
          <a class="nav-link" href="#section2">About Us</a>
      </li>
      <li class="nav-item" id="contact" style="display:none;">
          <a class="nav-link" href="contactus.php">Contact Us</a>
      </li> 
        <li id="drop" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="login.php">Admin Login</a>
              <a class="dropdown-item" href="student_login_form.php">Student Login</a>
            </div>
        </li>
        
    </ul>

    
        <form class="form-inline my-2 my-lg-0 " action="login_configure.php" method="post">
          <button class="btn btn-danger pull-right" type="submit" value="logout" name="logout" id="logout" style="display:none">LogOut</button>
        </form>
        <form class="form-inline my-2 my-lg-0 " action="student_login_configure.php" method="post">
          <button class="btn btn-danger pull-right" type="submit" value="logout" name="logout_s" id="logout_s" style="display:none">LogOut</button>
        </form>
  </div>
</nav>
</body>
</html>