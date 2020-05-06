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
<title><?php include('title.php');?> | Products</title>
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
<body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo">
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
								<i class="fa fa-edit"></i>Products
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="example">
							<thead>
							<tr>
								<th>Picture</th>								
                        		<th>Product Name</th>
                        		<th>Description</th>
                        		<th>Category</th>
						        <th>Supplier</th>
                        		<th>Qty</th>
						        <th>Price</th>
						        <th>Reorder</th>
                        		<th>Edit</th>
                        		
							</tr>
							</thead>
							<tbody>
<?php
	include('../includes/dbcon.php');
	$query=mysqli_query($con,"select * from product natural join supplier natural join category order by prod_name")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have no expense yet!
			</div>";
			while($row=mysqli_fetch_array($query))
			{
			
?>								
							<tr>
								<td><img style="width: 50px;height: 50px" src="../images/<?php echo $row['prod_pic'];?>"></td>
                        		<td><?php echo $row['prod_name'];?></td>
                        		<td><?php echo $row['prod_desc'];?></td>
                        		<td><?php echo $row['cat_name'];?></td>
						        <td><?php echo $row['supplier_name'];?></td>
                        		<td><?php echo $row['prod_qty'];?></td>
            					<td><?php echo $row['prod_price'];?></td>
            					<td><?php echo $row['reorder'];?></td>
								<td>
									<a class="btn default" data-toggle="modal" href="#edit<?php echo $row['prod_id'];?>">
									<i class="icon-note font-blue"></i> </a>
								</td>
								
							</tr>
							<!-- /.edit -->
							<div class="modal fade bs-modal-sm" id="edit<?php echo $row['prod_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Product Details</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="product_update.php" enctype='multipart/form-data'>
													<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row['prod_id'];?>" required>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="text" class="form-control" id="form_control_1" name="name" value="<?php echo $row['prod_name'];?>" required>
														<label for="form_control_1">Product Name</label>
														<span class="help-block">Product Name</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<textarea class="form-control" rows="2" name="desc"><?php echo $row['prod_desc'];?>
														</textarea>
														<label for="form_control_1">Description</label>
														<span class="help-block">Description</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label-info">
															<select class="form-control" id="form_control_1" name="category">	
																	<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
																<?php
																 
																	$query2=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error());
																	  while($row2=mysqli_fetch_array($query2)){
															      ?>
																	    <option value="<?php echo $row2['cat_id'];?>"><?php echo $row2['cat_name'];?></option>
															      <?php }?>
															</select>
															<label for="form_control_1">Category</label>
														</div>
													
													<div class="form-group form-md-line-input form-md-floating-label-info">
															<select class="form-control" id="form_control_1" name="supplier">	
																	<option value="<?php echo $row['supplier_id'];?>"><?php echo $row['supplier_name'];?></option>
																<?php
																 
																	$query2=mysqli_query($con,"select * from supplier order by supplier_name")or die(mysqli_error());
																	  while($row2=mysqli_fetch_array($query2)){
															      ?>
																	    <option value="<?php echo $row2['supplier_id'];?>"><?php echo $row2['supplier_name'];?></option>
															      <?php }?>
															</select>
															<label for="form_control_1">Supplier</label>
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
							<div class="modal fade bs-modal-sm" id="delete<?php echo $row['prod_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
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
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row['prod_id'];?>" required>
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
											<div class="portlet-title">
												<div class="caption font-red-sunglo">
													<i class=" icon-notebook font-red-sunglo"></i>
													<span class="caption-category bold uppercase"> Add Product</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="product_save.php" enctype="multipart/form-data">
													<div class="form-group form-md-line-input form-md-floating-label has-info">
														<input type="text" class="form-control" id="form_control_1" name="name" required>
														<label for="form_control_1">Product Name</label>
														<span class="help-block">Product Name</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<textarea class="form-control" rows="3" name="desc"></textarea>
														<label for="form_control_1">Description</label>
														<span class="help-block">Description</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label has-info">
															<select class="form-control" id="form_control_1" name="category">	
																	<option></option>
																<?php
																 
																	$query2=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error());
																	  while($row2=mysqli_fetch_array($query2)){
															      ?>
																	    <option value="<?php echo $row2['cat_id'];?>"><?php echo $row2['cat_name'];?></option>
															      <?php }?>
															</select>
															<label for="form_control_1">Category</label>
														</div>
													
													<div class="form-group form-md-line-input form-md-floating-label has-info">
															<select class="form-control" id="form_control_1" name="supplier">	
																	<option></option>
																<?php
																 
																	$query2=mysqli_query($con,"select * from supplier order by supplier_name")or die(mysqli_error());
																	  while($row2=mysqli_fetch_array($query2)){
															      ?>
																	    <option value="<?php echo $row2['supplier_id'];?>"><?php echo $row2['supplier_name'];?></option>
															      <?php }?>
															</select>
															<label for="form_control_1">Supplier</label>
														</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="price" required>
														<label for="form_control_1">Price</label>
														<span class="help-block">Price</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="reorder" required>
														<label for="form_control_1">Reorder Point</label>
														<span class="help-block">Reorder Point</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label-info">
														<input type="file" class="form-control" id="form_control_1" name="image" required>
														<label for="form_control_1">Product Image</label>
														<span class="help-block">Product Image</span>
													</div>
													<div class="form-actions noborder">
														<button type="submit" class="btn blue">Save</button>
														<button type="reset" class="btn default">Cancel</button>
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