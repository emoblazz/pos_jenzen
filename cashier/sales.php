<?php 
include('session.php');
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Sales Transaction</title>
<?php include('head.php');?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo" onload="myFunction()">
<?php include('header.php');?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include('sidebar.php');?>
	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<?php //include('profile_sidebar.php');?>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-shopping-cart"></i>Sales Transaction
										</div>
									</div>
									<div class="portlet-body" style="height: 100px">
										<form method="post" action="">
											<div class="col-md-7">
										  		<div class="form-group">
													<label for="date">Date/Range</label>
											 
														<input type="text" name="date" class="form-control" id="reservation" required> 
										  		</div><!-- /.form group -->
											</div>
											
											<div class="col-md-5">
												<div class="form-group">
													<label for="date"></label>
													<div class="input-group">
														<button class="btn btn-lg btn-primary" type="submit" tabindex="3" name="display">Print</button>
													</div>
												</div>	
											</div>
										</form>	
									</div>
								</div>
							</div>

									<?php
									if (isset($_POST['display']))
										{
											$date=$_POST['date'];
											$date=explode('-',$date);
											$id=$_SESSION['id'];		
											$start=date("Y/m/d",strtotime($date[0]));
											$end=date("Y/m/d",strtotime($date[1]));
											
											?>
											<div class="col-md-12">
											<?php


									?>      
               
          				
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
							<a class = "btn btn-primary btn-print" href = "index.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>   
						
				<h5 style="text-align:center"><b>Sales Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?></b></h5>
									<table id="" class="table table-bordered table-striped">
						                    <thead>
						                      <tr>
						            			<th>Date</th>
						            			<th>Qty</th>
						                        <th>Product</th>
						            			<th>Price</th>
						                        <th>Amount</th>
						                      </tr>
						                    </thead>
						                    <tbody>
						<?php
							$query=mysqli_query($con,"select * from `order` natural join order_details natural join product where CAST(order_date as DATE) between '$start' and '$end' and user_id='$id'")or die(mysqli_error($con));
								$qty=0;$grand=0;$discount=0;
														while($row=mysqli_fetch_array($query)){
						                 				$total=$row['qty']*$row['price'];
														$grand=$grand+$total;
						?>
						            <tr>
												<td><?php echo date("M d, Y h:i a",strtotime($row['order_date']));?></td>
												<td><?php echo $row['qty'];;?></td>
						            <td><?php echo $row['prod_name'];?></td>
												<td><?php echo $row['price'];?></td>
						            <td style=""><?php echo number_format($row['total'],2);
														}?></td>
									
								
						                        
						                      </tr>
								
						                    </tbody>
						                    <tfoot>
											
						          <tr>
						            <th>Total</th>
												<th></th>
												<th></th>
												<th></th>
						            <th style=""><?php echo  number_format($grand,2);}?></th>
									    </tr>					  
						          <tr>
						                      <td colspan="3"></td>
						                      <td colspan="2"><br><br>
						        </td>
						                    </tr>       
						        </tfoot>
						       </table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
								<!-- END PORTLET -->
							</div>
							
						</div>
						
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<?php include('script.php');?>

<script type="text/javascript" src="autosum.js"></script>
<script>
	//Date range picker
    $('#reservation').daterangepicker();

jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features\
Profile.init(); // init page demo
});
</script>
<script>
	jQuery(document).ready(function() {       
        // initiate layout and plugins
    	Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
        ComponentsPickers.init();
    });   
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 	
<?php
if (isset($_POST['import'])) 
{
	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['image']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['image']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['image']['tmp_name'], "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		mysqli_query($con,"INSERT into category(category_code,category_title) values('$data[0]','$data[1]')");
		
		}

	fclose($handle);

	//print "Import done";
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='category.php'</script>";
	//view upload form
}

?>