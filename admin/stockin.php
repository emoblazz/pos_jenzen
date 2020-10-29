<?php 
include('session.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Stockin</title>
<?php include('head.php');?>

</head>
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
								<i class="fa fa-edit"></i>Stockin
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="example">
							<thead>
							<tr>
								<th>
									 Stockin Date
								</th>
								<th>
									 Product Name
								</th>
								<th>
									 Qty
								</th>
								
								<th>
									 Delete
								</th>
								
							</tr>
							</thead>
							<tbody>
<?php
	$query2=mysqli_query($con,"select * from product natural join stockin order by stockin_date desc")or die(mysqli_error($con));
		
		$countassign=mysqli_num_rows($query2);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have no stockin yet!
			</div>";
			while($row2=mysqli_fetch_array($query2))
			{
			
?>								
							<tr>
								<td>
									 <?php echo $row2['stockin_date'];?>
								</td>
								<td>
									 <?php echo $row2['prod_name'];?>
								</td>
								<td>
									 <?php echo $row2['stockin_qty'];?>
								</td>
								
								<td>
									<a class="btn default" data-toggle="modal" href="#delete<?php echo $row2['stockin_id'];?>">
									<i class="icon-trash font-red"></i> </a>
								</td>
								
							</tr>
							<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="delete<?php echo $row2['stockin_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Delete Stockin</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="stockin_del.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row2['stockin_id'];?>" required>
														Are you sure you want to delete stockin of <?php echo $row2['prod_name']." with qty ".$row2['stockin_qty'];?>?
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
													<span class="caption-subject bold uppercase"> Stockin</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="stockin_save.php">
													
													<div class="form-body">
														
														<div class="form-group form-md-line-input form-md-floating-label-info">
															<select class="form-control select2" id="form_control_1" name="name">	
																<?php
																			
																		$query4=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error());
																  			while ($row4=mysqli_fetch_array($query4)){
																?>															
																			<option value="<?php echo $row4['prod_id'];?>"><?php echo $row4['prod_name'];?></option>
																<?php }?>		
															</select>
															<label for="form_control_1">Product</label>
														</div>
														<div class="form-group form-md-line-input form-md-floating-label-info">
															<input type="text" class="form-control" id="form_control_1" name="qty" required>
															<label for="form_control_1">Quantity</label>
															<span class="help-block">Quantity</span>
														</div>
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

    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
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
		mysqli_query($con,"INSERT into cys(cys) values('$data[0]')");
		
		}

	fclose($handle);

	//print "Import done";
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='cys.php'</script>";
	//view upload form
}

?>