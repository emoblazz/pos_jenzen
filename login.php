<?php include('session.php');

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];
$type=$_POST['type'];

$email = mysqli_real_escape_string($con,$user_unsafe);
$password = mysqli_real_escape_string($con,$pass_unsafe);
$pass=md5($password);
$salt="b1b3l9la0i";
$pass=$salt.$pass;

$query=mysqli_query($con,"select * from user where username='$email' and password='$pass' and user_type='$type'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);
           $id=$row['user_id'];
           $first=$row['first'];
           $last=$row['last'];
           //$type=$row['type'];
           $counter=mysqli_num_rows($query);
		  	if ($counter == 0) 
			  {	
			 	 echo "<script type='text/javascript'>alert('Invalid username or password!');
			 	 document.location='index.php'</script>";
			  } 
			  elseif ($counter > 0)
			  {
			  	$_SESSION['id']=$id;	
				$_SESSION['pic']='default.gif';
				$_SESSION['name']=$first." ".$last;
			  
				$id=$_SESSION['id'];
				  $date=date("Y-m-d H:i");
				          mysqli_query($con,"INSERT INTO history_log(action,date,user_id) VALUES('successfully logged in!','$date','$id')")or die(mysqli_error($con)); 
				   if ($type=="Admin")       
				  		echo "<script type='text/javascript'>document.location='admin/home.php'</script>";
					if ($type=="Cashier")       
				  echo "<script type='text/javascript'>document.location='cashier/index.php'</script>";
			  	}
				  
?>
	
