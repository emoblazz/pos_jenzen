<?php 
include('session.php');

	
	$expense = $_POST['expense'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];
	
	mysqli_query($con,"INSERT INTO expense(expense,expense_date,expense_amount) VALUES('$expense','$date','$amount')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Successfully added new expense!');</script>";
			echo "<script>document.location='expense.php'</script>";   
		
?>