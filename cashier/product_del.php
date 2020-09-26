<?php
include('session.php');

$odid=$_REQUEST['odid'];
$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM order_details WHERE order_details_id ='$odid'")
	or die(mysqli_error());

	echo "<script>document.location='home.php?id=$id'</script>";

?>