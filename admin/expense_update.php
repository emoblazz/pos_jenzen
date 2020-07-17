<?php
include('session.php');

 $id = $_POST['id'];
 $amount = $_POST['amount'];
 $expense = $_POST['expense'];

 mysqli_query($con,"UPDATE expense SET expense='$expense',expense_amount='$amount' where expense_id='$id'")
 or die(mysqli_error($con)); 

	echo "<script type='text/javascript'>alert('Successfully updated expense details!');</script>";
	echo "<script>document.location='expense.php'</script>";
 ?>

