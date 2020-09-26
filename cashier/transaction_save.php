<?php 
include('session.php');
$id=$_SESSION['id'];


	$id = $_POST['id'];
	$name = $_POST['prod_name'];
	$qty = $_POST['qty'];
		
			
		$query=mysqli_query($con,"select prod_price,prod_id,prod_qty from product where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$price=$row['prod_price'];
		$prod_qty=$row['prod_qty'];
		
		if ($qty<=$prod_qty)
		{
			$query1=mysqli_query($con,"select * from order_details where prod_id='$name' and order_id='$id'")or die(mysqli_error());
			$count=mysqli_num_rows($query1);
			
			$total=$price*$qty;
			
			if ($count>0){
				mysqli_query($con,"update order_details set qty=qty+'$qty',price=price+'$total' where prod_id='$name' and order_id='$id'")or die(mysqli_error());
		
			}
			else{
				mysqli_query($con,"INSERT INTO order_details(order_id,prod_id,qty,price,total) VALUES('$id','$name','$qty','$price','$total')")or die(mysqli_error($con));
			}

		
		}	
		else
		{

			echo "<script type='text/javascript'>alert('Insuficient inventory for this product!');</script>";
		}
			echo "<script>document.location='home.php?id=$id'</script>";  
?>