<?php 
include('session.php');

	
	//$code = $_POST['subject_code'];
	$category = $_POST['category'];
	
	$query=mysqli_query($con,"select * from category where cat_name='$category'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('Category already added!');</script>";
			echo "<script>document.location='category.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$category')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
			echo "<script>document.location='category.php'</script>";   
		}
	
?>