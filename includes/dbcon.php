<?php
$con = mysqli_connect("localhost","root","","pos");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
  }
  date_default_timezone_set('Asia/Manila');
?>