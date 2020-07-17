<?php 
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM stockin WHERE stockin_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='stockin.php'</script>";

?>