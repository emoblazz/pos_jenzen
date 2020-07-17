<?php 
include('session.php');

	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	$pass=md5($password);
	$salt="b1b3l9la0i";
	$pass=$salt.$pass;

	$query=mysqli_query($con,"select * from user where last='$last' and first='$first'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('User already added!');</script>";
			echo "<script>document.location='user.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO user(last,first,username,password,user_type) VALUES('$last','$first','$username','$pass','$type')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Successfully added new user account!');</script>";
			echo "<script>document.location='user.php'</script>";   
		}
	
?>