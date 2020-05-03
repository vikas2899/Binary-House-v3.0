<?php
  ob_start();		
  define('myheader',TRUE);
  require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="contact.css">
	<script type="text/javascript">
		document.getElementById("home").style.display = "block";
	</script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.footer{
    		background-color: rgb(245,245,245);
		    margin:0px auto;
		    padding: 20px 0px 20px 0px;
		    opacity:0.8;
			}
		.mySlides {display:none;}
		.parallax {
		  background-image: url("img/ll.jpg");
		  min-height: 500px; 
		  background-attachment: fixed;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		}	
	</style>
</head>
<body>
	<div class="parallax">
	<br>
<div class="container" id="section3" style="width:100%;" style="opacity:0.5;">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Leave us a message. We will get back to you soon.</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="img/contact.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="contactus.php" method="post">
        <label for="fname">Full Name</label>
        <input type="text" id="fname" name="name" placeholder="Your name.." required>
        <label for="email">Email Id</label>
        <input type="email" id="email" name="email" placeholder="Your email id.." required>
        <label for="phone">Contact Number</label>
        <input type="text" id="phone" name="phone" placeholder="Your mobile number.." required>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" required></textarea>
        <input type="submit" value="Submit" name="submit">
      </form>
    </div>
  </div>
</div>
<br><br><br><br>
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
</body>
</html>
<?php
if(isset($_POST['submit'])){
	session_start();
	$con = mysqli_connect('localhost','root','','building_data');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
  $price = $_POST['price'];
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	$query = "INSERT INTO `contactus`(`name`, `email`, `phone`, `message`, `price`) VALUES ('$name','$email','$phone','$subject','$price')";
	$run=mysqli_query($con,$query);
	if($run){
		?>
		<script type="text/javascript">
			alert("Thanks for Registration.")
		</script>
		<?php
		header('location:contactMail.php');
	}
}   

?>