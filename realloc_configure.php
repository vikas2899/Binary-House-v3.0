<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<script type="text/javascript">
  document.getElementById("alloc").style.display = "block";
  document.getElementById("realloc").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("logout").style.display = "block";
  document.getElementById("menu-toggle").style.display = "none";
</script>
<?php
if(isset($_POST['submit'])){
$opinion = $_POST['realloc'];
}
if($opinion=='Leave Hostel')
{
echo"<form action='realloc_configure_leave.php' method='post'>";
echo"<label>Enter sid which want to leave the hostel</label>";
echo"<input type='text' name='sid'/><br/>";
echo"<input type='submit' value='Go' name='submit'/>";
echo"</form>";
}
else{
echo"<form action='realloc_configure_change.php' method='post'>";
echo"<label>Enter sid which want to change the room</label>";
echo"<input type='text' name='sid'/><br/>";
echo"<input type='submit' value='Go' name='submit'/>";
echo"</form>";
}