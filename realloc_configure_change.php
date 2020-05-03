<?php
session_start();
$con = mysqli_connect('localhost','root','','building_data');
$id = $_POST['sid'];
$_SESSION['id'] = $id;
$query = "SELECT * FROM `student_table` WHERE ID = '$id'";
$run = mysqli_query($con,$query);
$row = mysqli_num_rows($run);
if($row>=1){
	while($row = mysqli_fetch_array($run)){

		$_SESSION['name'] = $row['NAME'];
		$_SESSION['gname'] = $row['G_NAME'];
		$_SESSION['email'] = $row['EMAIL'];
		$_SESSION['addr'] = $row['ADDRESS'];
		$_SESSION['phone'] = $row['PHONE'];
		$_SESSION['inst'] = $row['INSTITUTE'];
		$_SESSION['gender'] = $row['GENDER'];
		$_SESSION['dob'] = $row['dob'];
		$_SESSION['doa'] = $row['doa'];
		$_SESSION['nationality'] = $row['nationality'];
		$_SESSION['nationalID'] = $row['nationalID'];
		$_SESSION['city'] = $row['city'];
		$_SESSION['state'] = $row['state'];
		$_SESSION['zip'] = $row['zip'];
		$_SESSION['image'] = $row['image'];
	}
	$query1 = "SELECT * FROM `allocation_data` WHERE student_id = '$id'";
	$run1 = mysqli_query($con,$query1);
	$row1 = mysqli_num_rows($run1);
	if($row1>=1){
		while($row1 = mysqli_fetch_array($run1)){
			$_SESSION['building'] = $row1['building_no'];
			$_SESSION['floor'] = $row1['floor_no'];
			$_SESSION['room_no'] = $row1['room_no'];
		}
	}
	$room = $_SESSION['room_no'];
	$building = $room[0];
	if($building == 'b'){
		$query2 = "UPDATE boys_hostel set available = available+1 WHERE room_no = '$room'";
		$query3 = "DELETE from allocation_data WHERE student_id = '$id'";
		$query4 = "DELETE from student_table where ID = '$id'";
		$query5 = "DELETE from student_login where SID = '$id'";
		$run2 = mysqli_query($con,$query2);
		$run3 = mysqli_query($con,$query3);
		$run4 = mysqli_query($con,$query4);
		$run5 = mysqli_query($con,$query5);
		header('location:realloc_form.php');
	}
	else{
		$query2 = "UPDATE girls_hostel set available = available+1 WHERE room_no = '$room'";
		$query3 = "DELETE from allocation_data WHERE student_id = '$id'";
		$query4 = "DELETE from student_table where ID = '$id'";
		$query5 = "DELETE from student_login where SID = '$id'";
		$run2 = mysqli_query($con,$query2);
		$run3 = mysqli_query($con,$query3);
		$run4 = mysqli_query($con,$query4);
		$run5 = mysqli_query($con,$query5);
		header('location:realloc_form.php');
	}

}
else{
	?>
	<script type="text/javascript">
		alert("No Record Found!");
	</script>
	<?php
	header( "refresh:0.1;url=realloc.php");
}
	

?>
<?php
define('myfooter',TRUE);
require('footer.php');
?>