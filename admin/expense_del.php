<?php 
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM category WHERE cat_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='category.php'</script>";

?>