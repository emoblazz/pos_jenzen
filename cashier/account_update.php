<?php
include('session.php');

 $id = $_SESSION['id'];
 $last = $_POST['last'];
 $first = $_POST['first'];
 $username = $_POST['username'];

 mysqli_query($con,"UPDATE user SET last='$last',first='$first',username='$username' where user_id='$id'")
 or die(mysqli_error()); 

	echo "<script type='text/javascript'>alert('Successfully updated account details!');</script>";
	echo "<script>document.location='account.php'</script>";
 ?>

