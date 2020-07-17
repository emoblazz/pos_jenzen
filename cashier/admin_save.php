<?php 
include('session.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$email = $_POST['email'];
	
	$query=mysqli_query($con,"select * from admin where admin_last='$last' and admin_first='$first'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('User already added!');</script>";
			echo "<script>document.location='admin.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO admin(admin_last,admin_first,admin_email) VALUES('$last','$first','$email')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Successfully added new admin user!');</script>";
			echo "<script>document.location='admin.php'</script>";   
		}
	
?>