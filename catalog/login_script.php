<?php 
session_start();
include('dist/includes/dbcon.php');

$station=$_REQUEST['station'];


        $_SESSION['id']=$station;	
		echo  '<script>window.location = "index.php"</script>';
    
?>
