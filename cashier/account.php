<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Account</title>
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
<?php
	
	$id=$_SESSION['id'];
	$query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error($con));
		
		$row=mysqli_fetch_array($query);
			$pass=$row['password'];
			
?>						
					<div class="profile-content">
						<div class="row">
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">Change Password</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" action="account_update.php" method="post">
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input type="text" placeholder="First Name" class="form-control" name="first" value="<?php echo $row['first'];?>">
													</div>
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input type="text" placeholder="Last Name" class="form-control" name="last" value="<?php echo $row['last'];?>">
													</div>
													<div class="form-group">
														<label class="control-label">Username</label>
														<input type="text" placeholder="Email Address" class="form-control" name="username" value="<?php echo $row['username'];?>">
													</div>
													<div class="margiv-top-10">
														<button class="btn green-haze" type="submit">
														Save Changes </button>
														<button class="btn default" type="reset">
														Cancel </button>
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form action="pass_change.php" method="post">
													<div class="form-group">
													
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control" id="new1" required>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control" name="new" id="new2" oninput="check(this)" required>
													</div>
													<div class="margin-top-10">
														<button type="submit" class="btn green-haze">
														Change Password </button>
														<button type="reset" class="btn default">
														Cancel </button>
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											
										</div>
									</div>
								
								<!-- END PORTLET -->
							</div>
							
									</div>
								</div>
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
<script src="../../../assets/global/plugins/respond.min.js"></script>
<script src="../../../assets/global/plugins/excanvas.min.js"></script> 
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
<script type="text/javascript">

function check(input) {
    if (input.value != document.getElementById('new1').value) {
        input.setCustomValidity('The two passwords must match.');
    } 
		
		else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }
}

function check1(input) {
		if (input.value != document.getElementById('pass1').value) {
        input.setCustomValidity('Invalid Password!');
    }

		else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>