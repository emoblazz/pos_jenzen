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
<title><?php include('title.php');?> | Subject</title>
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
							<div class="row">
								<div class="col-md-12">
									<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											<div class="portlet-title">
												<div class="caption font-red-sunglo">
													<i class=" icon-notebook font-red-sunglo"></i>
													<span class="caption-subject bold uppercase"> Generate Reports</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="">
													<div class="col-md-5">
														<div class="form-group">
															<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
																<input type="text" class="form-control" name="start">
																<span class="input-group-addon">
																to </span>
																<input type="text" class="form-control" name="end">
															</div>
															<!-- /input-group -->
															<span class="help-block">
															Select date range </span>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<div class="input-group">
																<select class="form-control select2" id="form_control_1" name="sy">	
																
																<?php
																			
																		$query1=mysqli_query($con,"select * from sy")or die(mysqli_error());
																  			while ($row1=mysqli_fetch_array($query1)){
																?>															
																			<option value="<?php echo $row1['sy_id'];?>"><?php echo $row1['sy'];?></option>
																<?php }?>		
															</select>
															</div>
															<!-- /input-group -->
															<span class="help-block">
															Select School Year </span>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<div class="input-group">
																<select class="form-control select2" id="form_control_1" name="status">	
																	<option>Dropped Out</option>
																	<option>Transfer Out</option>
																</select>
															</div>
															<!-- /input-group -->
															<span class="help-block">
															Select School Year </span>
														</div>
													</div>
												<!-- /input-group -->
												<div class="col-md-3">	
													<div class="form-group">
														
															<button type="submit" class="btn blue" name="generate">Generate</button>
															<button type="reset" class="btn default">Cancel</button>
														
													</div>
												</div>
												</form><br><hr>
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
									
								</div>
									
								</div><!--end row-->	
							
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Reports
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="">
							<thead>
							<tr>								
								<th>
									 Last Name
								</th>
								<th>
									 First Name
								</th>
								<th>
									 Middle Name
								</th>
								<th>
									 Class
								</th>
								<th>
									 Status
								</th>
								<th>
									 Date
								</th>
								<th>
									 Reason
								</th>
							</tr>
							</thead>
							<tbody>
<?php
	include('../includes/dbcon.php');
	$sy=$_POST['sy'];
	$status=$_POST['status'];
	$start=date("Y-m-d",strtotime($_POST['start']));
	$end=date("Y-m-d",strtotime($_POST['end']));
	$query1=mysqli_query($con,"select * from enrol natural join member natural join class  natural join sy where class.sy_id='$sy' and enrol_status='$status' and CAST(enrol_date AS DATE) between '$start' and '$end'")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have no subject yet!
			</div>";
			while($row2=mysqli_fetch_array($query1))
			{
			
?>								
							<tr>
								
								<td>
									 <?php echo $row2['member_last'];?>
								</td>
								<td>
									 <?php echo $row2['member_first'];?>
								</td>
								<td>
									 <?php echo $row2['member_mi'];?>
								</td>
								<td>
									 <?php echo $row2['class'];?>
								</td>
								<td>
									 <?php echo $row2['enrol_status'];?>
								</td>
								<td>
									 <?php echo $row2['enrol_date'];?>
								</td>
								<td>
									 <?php echo $row2['enrol_reason'];?>
								</td>
							</tr>
														
<?php }?>							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
								<!-- END PORTLET -->
							
						
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
		mysqli_query($con,"INSERT into subject(subject_code,subject_title) values('$data[0]','$data[1]')");
		
		}

	fclose($handle);

	//print "Import done";
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='subject.php'</script>";
	//view upload form
}

?>