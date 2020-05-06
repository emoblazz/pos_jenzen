<?php 
include('session.php');

 $id = $_POST['id'];
 $last = $_POST['last'];
 $first = $_POST['first'];
 $type = $_POST['type'];
 $username = $_POST['username'];
 //$password = $_POST['password'];

 $pass=md5($password);
 $salt="b1b3l9la0i";
 $pass=$salt.$pass;
 
 mysqli_query($con,"UPDATE user SET last='$last',first='$first',username='$username',user_type='$type' where user_id='$id'") or die(mysqli_error()); 

	echo "<script type='text/javascript'>alert('Successfully updated user account details!');</script>";
	echo "<script>document.location='user.php'</script>";
 ?>

