<?php
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM admin WHERE admin_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='admin.php'</script>";

?>