<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$name = $_SESSION['sname'];
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
  function toggle(){
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
    }
</script>
<link rel="stylesheet" href="popup.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><?php echo "Welcome ".$name ?></div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
          <a href="payment_form.php" class="list-group-item list-group-item-action bg-light">Payment</a>
          <a href="order.php" class="list-group-item list-group-item-action bg-light">Order History</a>
          <a href="invoice.php" class="list-group-item list-group-item-action bg-light">Generate Invoice</a>
          <a href="feedback.php" class="list-group-item list-group-item-action bg-light">Feedback</a>
          <a href="mealTiming.php" class="list-group-item list-group-item-action bg-light">Meal Timing</a>
          <a href="notice_view_stu.php" class="list-group-item list-group-item-action bg-light">Notice Board</a>
          <a href="updateDetail.php" class="list-group-item list-group-item-action bg-light">Update Details</a>
          <a href="change_password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
          </div>
    </div>
   <div id="page-content-wrapper">
    <div class="container-fluid">


<?php
$con = mysqli_connect('localhost','root','','building_data');
$query="SELECT * from notice_board order by 'date1' desc";
$run = mysqli_query($con,$query);
      echo'<div class="container_i" id="blur">
           <div class="content_i">';
      echo"<br>";
      echo"<center><p>Notice Board</p>";     
      echo"<br><br>";     
      echo"<div style='margin-left:50px;margin-right:50px;'>";
      echo"<table class='table table-striped'>";
        echo"<tr>";
            echo"<th>Sno</th>";
            echo"<th>Subject</th>";
            echo"<th>Action</th>";
            echo"<th>Created on</th>";
        echo"</tr>";  
        while($row = mysqli_fetch_array($run)){
            echo"<tr>";
                $serial = $row['serial'];
                echo"<td name='serial1' value='$serial'>".$row['serial']."</td>";
                echo"<td>".$row['notice']."</td>";
                 echo"<td><a class='ahr' href='notice_view_stu.php?serial=".$serial."'>View</a>";
               echo"<td style='width:30px;'>".$row['createdDate']."</td>";
            echo"</tr>";
        }    
      echo"</table></center>";
      echo"</div>";

        $t=isset($_GET['serial'])?$_GET['serial']:'';
        if($t!=''){
          $query = "SELECT description FROM `notice_board` WHERE serial = '$t'";
          $run=mysqli_query($con,$query);
          $row = mysqli_num_rows($run);
          if($row>=1){
            while($row = mysqli_fetch_array($run)){
              $des = $row['description'];
            }
          }
        echo         '</div>
              </div>';
          echo' <div id="popup">
                <p>'.$des.'</p>
                <a href="#" onclick="toggle()">Close</a>
            </div>';
        ?>
        <script type="text/javascript">
              setInterval(toggle(),3000 );
            </script>
        <?php    
      }
?>
 </div>
      </div>
    </div>
</body>
</html>