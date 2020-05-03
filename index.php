<?php
  ob_start();		
  define('myheader',TRUE);
  require('header.php');
  $con = mysqli_connect('localhost','root','','building_data');
  $query = 'SELECT * FROM `student_table`';
  $run = mysqli_query($con,$query);
  $row1 = mysqli_num_rows($run);
  $query1 = 'SELECT * FROM `boys_hostel`';
  $query2 = 'SELECT * FROM `girls_hostel`';
  $run1 = mysqli_query($con,$query1);
  $run2 = mysqli_query($con,$query2);
  $roomb = 0;
  $roomg = 0;
  while($row=mysqli_fetch_array($run1)){
     $roomb = $roomb + $row['room_capacity'];
  }
  while($row=mysqli_fetch_array($run2)){
     $roomg = $roomg + $row['room_capacity'];
  }
   $totalr = $roomb+$roomg;
  $query3 = 'SELECT * FROM `boys_hostel`';
  $query4 = 'SELECT * FROM `girls_hostel`';
  $run3 = mysqli_query($con,$query3);
  $run4 = mysqli_query($con,$query4);
  $avab = 0;
  $avag = 0;
  while($row=mysqli_fetch_array($run3)){
    $avab = $avab + $row['available'];
  }
  while($row=mysqli_fetch_array($run4)){
    $avag = $avag + $row['available'];
  }
  $totala = $avab+$avag; 
?>
<!DOCTYPE html>
<html>

<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="fontaws/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:600&display=swap" rel="stylesheet">
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
<style>
<style>
.mySlides {display:none;}
.parallax {
  background-image: url("img/ll.jpg");
  min-height: 500px; 
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.footer{
    background-color: rgb(245,245,245);
    margin:0px auto;
    padding: 20px 0px 20px 0px;
    opacity:0.8;
}
#lik{
  background-color: rgb(41,112,218);
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:50px;
  padding-right:50px;
  padding-left:50px;
}

#lik:hover {
  background-color: rgb(95,148,226);
}

}
</style>
</head>
<body>
  <div class="parallax">
    <br>
  <div  class ="form-row"style="width:100%;height:575px;">
      <div class="form-group col-md-12">
    <br><br><br><br>
    <center>  
    <p style="font-family: 'Pacifico', cursive;color:white;"><span style="font-size:100">Binary House</span><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:25"><i>...just like your own house.</i></span></p>
    <br><br><br>
    <a  href="#section1" id='lik'>Explore</a>
  </center>
  </div>
  </div>  
  <br>
  <div class="container"  style="width:1500px;">
        <div class="row row-content" id="section1" style="margin-left:-110px;margin-right:-100px;">
            <div class="col" style="width:1500px;">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox" style="width:100%;">
                        <div class="carousel-item active" >
                            <img class="d-block img-fluid" src="img/front1.jpg" style="width:95%;height:550px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="img/front2.jpg" style="width:95%;height:550px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="img/front3.jpg" style="width:95%;height:550px;">
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <li data-target="#mycarousel" data-slide-to="2"></li>
                    </ol>
                    <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
      </div>

  <br><br>
  <div >
    <br><br><br>
    <form action="contactus.php" method="post">
    <div class='form-row' style="margin-left:250px;">
        <div class="form-group col-md-3" style="background:white;height:400px;opacity:0.6;margin-left:12px;">
          <br>
          <center><span style="font-family: 'Dancing Script', cursive;font-size:32px;"><i>PREMIUM</i></span><br><br>
            <p style="color:red;font-family:'Baloo Tamma 2',cursive;font-size:20px;"><b>Rs. 8499/Month</b></p>
          </center>
          <hr style="border-top: 1px solid black;">
          <ul style="font-family:'Baloo Tamma 2',cursive;font-size:20px;color:rgb(62,125,136);">
            <li>Single Seater.</li>
            <li>Room Service.</li>
            <li>A/C Facilities.</li>
            <li>Mess Facilities.</li>
          </ul>
          <center><br>
            <input type="hidden" name="price" value="8499"/>
          <input type="submit" class="btn btn-primary" value="Proceed" style="border-radius:25px;padding-left:20px;padding-right: 20px;">
        </center>
        </div>
        <div class="form-group col-md-3" style="opacity:0.6;background:white;margin-left:12px;">
          <br>
          <center><span style="font-family: 'Dancing Script', cursive;font-size:32px;"><i>SPECIAL</i></span><br><br>
            <p style="color:red;font-family:'Baloo Tamma 2',cursive;font-size:20px;"><b>Rs. 6999/Month</b></p>
          </center>
          <hr style="border-top: 1px solid black;">
          <ul style="font-family:'Baloo Tamma 2',cursive;font-size:20px;color:rgb(62,125,136);">
            <li>Double Seater.</li>
            <li>Cooler Facilities.</li>
            <li>Laundary Facilities.</li>
            <li>Mess Facilities.</li>
          </ul>
          <center><br>
          <input type="submit" class="btn btn-primary" value="Proceed" style="border-radius:25px;padding-left:20px;padding-right: 20px;">
        </center> 
        </div>
        <div class="form-group col-md-3" style="opacity:0.6;background:white;margin-left:12px;">
            <br>
          <center><span style="font-family: 'Dancing Script', cursive;font-size:32px;"><i>BASIC</i></span><br><br>
            <p style="color:red;font-family:'Baloo Tamma 2',cursive;font-size:20px;"><b>Rs. 5999/Month</b></p>
          </center>
          <hr style="border-top: 1px solid black;">
          <ul style="font-family:'Baloo Tamma 2',cursive;font-size:20px;color:rgb(62,125,136);">
            <li>Double Seater.</li>
            <li>Cooler Facilities.</li>
            <li>All basic facilities.</li>
            <li>Excludes Mess.</li>
          </ul>
          <center><br>
          <input type="submit" class="btn btn-primary" value="Proceed" style="border-radius:25px;padding-left:20px;padding-right: 20px;">
        </center> 
        </div>
    </div> 
    </form> 
  </div>  
   
  <br><br><br><br><br>
  <div class="jumbotron" id="section2" style="opacity:0.7">
    <h1 class="display-4">About Us</h1>
    <p class="lead">Binary House PVT is providing the hostels/PG Rooms for the students and employees at very affordable prices. For more information please contact to Binary House PVT's Admin at binaryhouse2020@gmail.com. Free feel to explore various facilities provided by us. Thanks!</p>
    <hr class="my-4">
    <p>For more information related to rooms,mess availablity visit 'Know Your Hostel' Tab. Hurry Up!!</p>
    <p class="lead">
    <a class="btn btn-primary btn-lg" href="#section1" role="button">Explore</a>
    </p>
  </div> 
  <br><br>
  
<br><br>
<footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-11 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                      New Delhi,<br>
                      India<br>
                      <i class="fa fa-phone fa-lg"></i>: +91 8376859339<br>
                      <i class="fa fa-fax fa-lg"></i>: +91 9718166034<br>
                      <i class="fa fa-envelope fa-lg"></i><a href="mailto:confusion@food.net">binaryhouse2020@gmail.com</a>
                   </address>
                </div>

                <div class="col-1 col-sm-4 align-self-center" style="align-items:right;">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope fa-lg"></i></a>

                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2020 Binary House PVT.</p>
                </div>
           </div>
        </div>
    </footer>

</div>
<style>
  @media (max-width:900px) {
  img#logo {
    display: none;

  }
}
  </style>
<script>
  document.getElementById("home").style.display = "block";
  document.getElementById("about").style.display = "block";
  document.getElementById("contact").style.display = "block";
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>