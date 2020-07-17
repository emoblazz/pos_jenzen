<?php 
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM user WHERE user_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='user.php'</script>";

?>