<?php 
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM supplier WHERE supplier_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='supplier.php'</script>";

?>