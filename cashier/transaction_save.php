<?php 
include('session.php');
$id=$_SESSION['id'];


	//$cid = $_POST['cid'];
	$name = $_POST['prod_name'];
	$qty = $_POST['qty'];
		
			
		$query=mysqli_query($con,"select prod_price,prod_id,prod_qty from product where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$price=$row['prod_price'];
		$prod_qty=$row['prod_qty'];
		
		if ($qty<=$prod_qty)
		{
			$query1=mysqli_query($con,"select * from temp_trans where prod_id='$name'")or die(mysqli_error());
			$count=mysqli_num_rows($query1);
			
			$total=$price*$qty;
			
			if ($count>0){
				mysqli_query($con,"update temp_trans set qty=qty+'$qty',price=price+'$total' where prod_id='$name'")or die(mysqli_error());
		
			}
			else{
				mysqli_query($con,"INSERT INTO temp_trans(prod_id,qty,price) VALUES('$name','$qty','$price')")or die(mysqli_error($con));
			}

		
		}	
		else
		{

			echo "<script type='text/javascript'>alert('Insuficient inventory for this product!');</script>";
		}
			echo "<script>document.location='home.php'</script>";  
?>