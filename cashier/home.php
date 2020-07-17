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
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-shopping-cart"></i>Sales Transaction
										</div>
									</div>
									<div class="portlet-body">
									<form method="post" action="transaction_save.php">
										<div class="col-md-7">
									  		<div class="form-group">
												<label for="date">Product Name</label>
										 
													<select class="form-control select2" name="prod_name" tabindex="1" autofocus required>
													<?php
				                  
													  include('../dist/includes/dbcon.php');
														 $query2=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error());
														    while($row=mysqli_fetch_array($query2)){
													?>
															<option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name']." Available(".$row['prod_qty'].")";?></option>
													  <?php }?>
													</select>
									    			<input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>   
									  		</div><!-- /.form group -->
										</div>
										<div class=" col-md-3">
											<div class="form-group">
												<label for="date">Quantity</label>
												<div class="input-group">
												  <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1"  required>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
										 </div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="date"></label>
												<div class="input-group">
													<button class="btn btn-lg btn-primary" type="submit" tabindex="3" name="addtocart">+</button>
												</div>
											</div>	
										</div>
									</form>	

							<table class="table table-striped table-hover table-bordered" id="">
							<thead>
							<tr>
								<th>Qty</th>
                        		<th>Product Name</th>
						        <th>Price</th>
						        <th>Total</th>
                        		<th>Action</th>
                        		
							</tr>
							</thead>
							<tbody>
<?php
	//include('../includes/dbcon.php');
	$query=mysqli_query($con,"select * from temp_trans natural join product")or die(mysqli_error());
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
			
?>								
							<tr>
								<td><?php echo $row['qty'];?></td>
		                        <td class="record"><?php echo $row['prod_name'];?></td>
								<td><?php echo $row['price'];?></td>
								<td style="text-align:right"><?php echo number_format($total,2);?></td>
								<td>
									
									<a class="btn default" data-toggle="modal" href="#delete<?php echo $id;?>">
									<i class="icon-trash font-red"></i> </a>
								</td>
								
							</tr>
							<!-- /.edit -->
							<div class="modal fade bs-modal-sm" id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Transaction Details</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="product_update.php" enctype='multipart/form-data'>
													<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row['prod_id'];?>" required>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="text" class="form-control" id="form_control_1" name="name" value="<?php echo $row['prod_name'];?>" readonly>
														<label for="form_control_1">Product Name</label>
														<span class="help-block">Product Name</span>
													</div>
													
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="text" class="form-control" id="form_control_1" name="price" value="<?php echo $row['prod_price'];?>" required>
														<label for="form_control_1">Price</label>
														<span class="help-block">Price</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="number" class="form-control" id="form_control_1" name="reorder" value="<?php echo $row['reorder'];?>" required>
														<label for="form_control_1">Reorder Point</label>
														<span class="help-block">Reorder Point</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="hidden" class="form-control" id="image" name="image1" value="<?php echo $row['prod_pic'];?>"> 
														<input type="file" class="form-control" id="form_control_1" name="image" required>
														<label for="form_control_1">Product Image</label>
														<span class="help-block">Product Image</span>
													</div>
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Save changes</button>
										</div>
									</div></form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->	
							<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Delete Product</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="product_del.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $id;?>" required>
														Are you sure you want to delete <?php echo $row['prod_name'];?>?
													</div>
													
													
												
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Delete</button>
										</div>
									</div></form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->							
<?php }?>							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
								<!-- END PORTLET -->
							</div>
							<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="sales_add.php" name="autoSumForm" >
													<div class="form-group form-md-line-input form-md-floating-label has-info">
														<input type="text" class="form-control" id="total" name="total" value="<?php echo $grand;?>" onFocus="startCalc();" onBlur="stopCalc();"  tabindex="5" readonly>
														<label for="form_control_1">Total</label>
														<span class="help-block">Total</span>
													</div>
													
													<div class="form-group form-md-line-input">

														<input type="text" class="form-control" id="discount" placeholder="Discount (Php)" onFocus="startCalc();" onBlur="stopCalc();" value="0" required>
														<label for="form_control_1">Discount</label>
														<span class="help-block">Discount</span>
													</div>
													<div class="form-group form-md-line-input">
														<input type="text" class="form-control" id="amount_due" name="amount_due" readonly>
														<label for="form_control_1">Amount Due</label>
														<span class="help-block">Amount Due</span>
													</div>
													<div class="form-group form-md-line-input">
														<input type="text" class="form-control" id="tendered" onFocus="startCalc();" onBlur="stopCalc();" name="tendered" required>
														<label for="form_control_1">Cash Tendered</label>
														<span class="help-block">Cash  Tendered </span>
													</div>
													<div class="form-group form-md-line-input">
														<input type="text" class="form-control" id="changed" name="change" required>
														<label for="form_control_1">Change</label>
														<span class="help-block">Change</span>
													</div>
													<div class="form-actions noborder">
														<button type="submit" class="btn blue">Complete Transaction</button>
														<button type="reset" class="btn red">Cancel </button>
													</div>
												</form>
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
									
								</div>
									
								</div><!--end row-->	
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