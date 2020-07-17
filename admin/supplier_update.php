<?php
include('session.php');

 $id = $_POST['id'];
 $name = $_POST['name'];
 $address = $_POST['address'];
 $contact = $_POST['contact'];

 mysqli_query($con,"UPDATE supplier SET supplier_name='$name',supplier_address='$address',supplier_contact='$contact' where supplier_id='$id'")
 or die(mysqli_error($con)); 

	echo "<script type='text/javascript'>alert('Successfully updated supplier details!');</script>";
	echo "<script>document.location='supplier.php'</script>";
 ?>

