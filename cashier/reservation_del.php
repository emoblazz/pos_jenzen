<?php
include('session.php');

//$odid=$_REQUEST['odid'];
$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM `order` WHERE order_id ='$id'") or die(mysqli_error($con));
	
	$result2=mysqli_query($con,"DELETE FROM order_details WHERE order_id ='$id'")
	or die(mysqli_error($con));

	echo "<script>document.location='index.php'</script>";

?>