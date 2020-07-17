<?php 
include('session.php');

 $id = $_POST['id'];
 $last = $_POST['last'];
 $first = $_POST['first'];
 $email = $_POST['email'];

 mysqli_query($con,"UPDATE admin SET admin_last='$last',admin_first='$first',admin_email='$email' where admin_id='$id'")
 or die(mysqli_error()); 

	echo "<script type='text/javascript'>alert('Successfully updated admin details!');</script>";
	echo "<script>document.location='admin.php'</script>";
 ?>

