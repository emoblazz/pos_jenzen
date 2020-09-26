<?php 
include('session.php');
$uid=$_SESSION['id'];	


	$discount = $_POST['discount'];
	$amount_due = $_POST['amount_due'];
	$cust_name = $_POST['cust_name'];
	$id = $_POST['id'];
	
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	
	$total=$amount_due-$discount;

	

		$tendered = $_POST['tendered'];
		$change = $_POST['change'];

		mysqli_query($con,"update `order` set order_status='paid',order_total='$total',user_id='$uid',discount='$discount',amount_due='$amount_due',cash_tendered='$tendered',cash_change='$change' where order_id='$id'")or die(mysqli_error());
		
		$remarks="successfully added new sales worth $amount_due";  
		$date = date("Y-m-d H:i:s");

	
		echo "<script>document.location='receipt.php?id=$id'</script>";  	
		
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
?>