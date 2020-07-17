<?php 
include('session.php');

$id=$_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM expense WHERE expense_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='expense.php'</script>";

?>