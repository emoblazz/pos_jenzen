<?php

     include 'dist/includes/dbcon.php';     
     if (isset($_GET['prod_id']))
		{
		$prod_id=$_GET['prod_id'];
		//$session_id=$_SESSION['id'];
		$queryc=mysqli_query($con,"SELECT * FROM cart where prod_id='$prod_id'")or die(mysqli_error($con));
			$rowc=mysqli_num_rows($queryc);
			$row1=mysqli_fetch_array($queryc);
			if ($rowc<1)
			{
				mysqli_query($con,"INSERT INTO cart(prod_id,qty) VALUES('$prod_id','1')")or die(mysqli_error($con));       	
			}
			else {
              	mysqli_query($con,"UPDATE cart SET qty = qty + 1 where prod_id='$prod_id'")or die(mysqli_error($con)); 		
			}
		}
     echo  '<script>window.location = "cart.php"</script>';
?>
