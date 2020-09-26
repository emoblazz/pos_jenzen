<?php 

include('session.php');
$start=$_SESSION['start'];
$end=$_SESSION['end'];
$query = mysqli_query($con,"select SUM(amount_due) as total,DATE_FORMAT(order_date,'%Y/%m/%d') AS date from `order` where DATE_FORMAT(order_date,'%Y/%m/%d') between '$start' and '$end' group by date")or die(mysqli_error($con));

$query1 = mysqli_query($con,"select SUM(expense_amount) as expense,DATE_FORMAT(expense_date,'%Y/%m/%d') AS expense_date from `expense` where DATE_FORMAT(expense_date,'%Y/%m/%d') between '$start' and '$end' group by expense_date")or die(mysqli_error($con));

$category = array();
$category['name'] = 'Month';

$series1 = array();
$series1['name'] = 'Sales';

$series2 = array();
$series2['name'] = 'Expenses';

while($r = mysqli_fetch_array($query)) {
 //   $count=$r['count'];
    $category['data'][] =$r['date'];
    $series1['data'][] = $r['total'];
   // $series2['data'][] = $series2['name'];

}
while($r1 = mysqli_fetch_array($query1)) {
 //   $count=$r['count'];
    
    $series2['data'][] = $r1['expense'];

}
$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);




print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?> 
