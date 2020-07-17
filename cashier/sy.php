<?php 
include('session.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | School Year</title>
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
								<i class="fa fa-edit"></i>School Year
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 School Year
								</th>
								<th>Status</th>
								<th>
									 Edit
								</th>
								
							</tr>
							</thead>
							<tbody>
<?php
	$query1=mysqli_query($con,"select * from `sy`")or die(mysqli_error($con));
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have no School Year yet!
			</div>";
			while($row2=mysqli_fetch_array($query1))
			{
				if ($row2['sy_status']=="Active")
				{
					$label="bg-green";
				}
				else
				{
					$label="bg-yellow";
				}
			
?>								
							<tr>
								<td>
									 <?php echo $row2['sy'];?>
								</td>
								<td>
									 <span class="<?php echo $label;?>"><?php echo $row2['sy_status'];?></span>
								</td>
								
								<td>
									<a class="btn default" data-toggle="modal" href="#edit<?php echo $row2['sy_id'];?>">
									<i class="icon-note font-blue"></i> </a>
								</td>
								
							</tr>
							<!-- /.edit -->
							<div class="modal fade bs-modal-sm" id="edit<?php echo $row2['sy_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update School Year Details</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="ys_update.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row2['sy_id'];?>" required>
														<input type="text" class="form-control" id="form_control_1" name="sy" value="<?php echo $row2['sy'];?>" required>
														<span class="help-block">School Year</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<select class="form-control" name="status">
															<option><?php echo $row2['sy_status'];?></option>
															<option>Active</option>
															<option>Inactive</option>
														</select>
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
													<span class="caption-subject bold uppercase"> Add School Year</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="ys_save.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="sy" required>
														<label for="form_control_1">School Year & Section</label>
														<span class="help-block">School Year</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<select class="form-control" name="status">
															<option>Active</option>
															<option>Inactive</option>
														</select>
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
		mysqli_query($con,"INSERT into cys(cys) values('$data[0]')");
		
		}

	fclose($handle);

	//print "Import done";
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='cys.php'</script>";
	//view upload form
}

?>