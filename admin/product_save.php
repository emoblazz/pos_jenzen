<?php 
include('session.php');

	
	$uid=$_SESSION['id'];
     $date = date("Y-m-d H:i:s");
	$name = $_POST['name'];
	$price = $_POST['price'];
	$supplier = $_POST['supplier'];
	$reorder = $_POST['reorder'];
	$category = $_POST['category'];
	//$image = $_POST['image'];
     $desc = $_POST['desc'];

	$query2=mysqli_query($con,"select * from product where prod_name='$name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Product already exist!');</script>";
			echo "<script>document.location='product.php'</script>";  
		}
		else
		{	

			$pic = $_FILES["image"]["name"];
               if ($pic=="")
               {
                    $pic="default.gif";
               }
               else
               {
                    $pic = $_FILES["image"]["name"];
                    $type = $_FILES["image"]["type"];
                    $size = $_FILES["image"]["size"];
                    $temp = $_FILES["image"]["tmp_name"];
                    $error = $_FILES["image"]["error"];
               
                    if ($error > 0){
                         die("Error uploading file! Code $error.");
                         }
                    else{
                         if($size > 100000000000) //conditions for the file
                              {
                              die("Format is not allowed or file size is too big!");
                              }
                    else
                          {
                         move_uploaded_file($temp, "../images/".$pic);
                          }
                         }
               } 
			
			mysqli_query($con,"INSERT INTO product(prod_name,prod_price,cat_id,reorder,supplier_id,prod_desc,prod_pic)
			VALUES('$name','$price','$category','$reorder','$supplier','$desc','$pic')")or die(mysqli_error($con));

               $remarks="added new product $name";  
     
               mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
					  echo "<script>document.location='product.php'</script>";  
		}
		
?>