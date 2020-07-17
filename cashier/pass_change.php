<?php
include('session.php');

 $id = $_SESSION['id'];
 $new = $_POST['new'];
 $password = mysqli_real_escape_string($con,$new);
	$pass=md5($password);
	$salt="b1b3l9la0i";
	$pass=$salt.$pass;

 mysqli_query($con,"UPDATE user SET password='$pass' where user_id='$id'")
 or die(mysqli_error()); 

	echo "<script type='text/javascript'>alert('Successfully changed password!');</script>";
	echo "<script>document.location='account.php'</script>";
 ?>

