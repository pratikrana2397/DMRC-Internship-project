<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>DMRC APPLICATION PORTAL</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="../res/dmrclogo.jpg"/>
<style type="text/css">

.page-header.navbar {

height: 60px;

min-height: 60px;

}
</style>
</head>
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
<body class="page-header-fixed page-quick-sidebar-over-content " >
	
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top" >
	<!-- BEGIN HEADER INNER -->
	
<div class="page-header -i navbar navbar-fixed-top" >

	<!-- BEGIN HEADER INNER -->

	<div class="page-header-inner" >

		<!-- BEGIN LOGO -->

		<div class="page-logo">

			<a href="index.html">

			<img src="../res/delhi-metro-2.jpg" alt="logo" height="40" width="125" class="logo-default"/>

			</a>

			<div class="menu-toggler sidebar-toggler hide">

				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->

			</div>

		</div>

		<!-- END LOGO -->

		<!-- BEGIN RESPONSIVE MENU TOGGLER -->

		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">

		</a>

		<!-- END RESPONSIVE MENU TOGGLER -->

		<!-- BEGIN TOP NAVIGATION MENU -->

		<div class="top-menu">

			<ul class="nav navbar-nav pull-right">

				

				<li class="dropdown dropdown-user">

					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

					<img alt="" class="img-circle" src="student.jpg"/>

					<span class="username username-hide-on-mobile">

					<?php echo $_SESSION['username']; ?></span>

					<i class="fa fa-angle-down"></i>

					</a>

					<ul class="dropdown-menu dropdown-menu-default">

						<li>

							<a href="MyProfile.php">

							<i class="icon-user"></i> My Profile </a>

						</li>

						
						<li>

							<a href="dashboard.php?logout='1'">

							<i class="icon-key"></i> Log Out </a>

						</li>

					</ul>

				</li>

				<!-- END USER LOGIN DROPDOWN -->

				<!-- BEGIN QUICK SIDEBAR TOGGLER -->

				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

				

					<!-- BEGIN QUICK SIDEBAR -->

	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>

	<div class="page-quick-sidebar-wrapper">

		<div class="page-quick-sidebar">

			<div class="nav-justified">

				<ul class="nav nav-tabs nav-justified">

					<li class="active">

						<a href="#quick_sidebar_tab_1" data-toggle="tab">

						<?php echo $_SESSION['username']; ?>
						</a>

					</li>					

					</ul>

				<div class="tab-content">

					<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">

						<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">

								<ul class="media-list list-items">

								
							</ul>				

							

						</div>

						

					</div>				

					

				</div>

			</div>

		</div>

	</div>

	<!-- END QUICK SIDEBAR -->

				<li class="dropdown dropdown-user dropdown-dark">

						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

						<!--<span class="username username-hide-on-mobile">

						Select Application</span>-->

						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->

						</a>

						<form  class="dropdown-menu" name="frmApp" id="frmApp" method="post" action="../Header/SubmitfrmApp.php">

									       <input type="hidden" name="isHeaderSubmit" id="isHeaderSubmit" value="yes">

									       <input type="hidden" name="txtSelectedAppName" id="txtSelectedAppName" value="">

										   <input type="hidden" name="txtLoggedInUser" id="txtLoggedInUser" value="">

										   <input type ="hidden" name ="cboApp" id="cboApp" value ="">

					       

							</select>

							</form>

					</li>

				<!-- END QUICK SIDEBAR TOGGLER -->

			</ul>

		</div>

		<!-- END TOP NAVIGATION MENU -->

	</div>

	<!-- END HEADER INNER -->

</div>	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.php" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a href="dashboard.php">
					<i class="icon-envelope-open"></i>
					<span class="title">Home</span>
					
					</a>
                                                       </li>
				
				
				
			
					                                 
				<li>
					<a href="index.php">
					<i class="icon-envelope-open"></i>
					<span class="title">See all vehicles</span>
					
					</a>
                                                       </li>
				
		</div>
	</div>
	
	
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			
			
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<div class="tiles" >
				
				
				<a href="parking_table/index.php">
				<div class="tile double bg-yellow-saffron" >
					
					<div class="tile-body">
						<i class="fa fa-automobile"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 See All Vehicles
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>

				<a href="parking_add.php">
				<div class="tile double bg-purple-studio">
					<div class="tile-body">
						<i class="fa fa-plus-circle"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 ADD NEW VEHICLE</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>
               
				<br>
				<br>
				<br>
				<br>
				<br>
				<a href="parking_search.php">
				<div class="tile double bg-green-meadow">
					<div class="tile-body">
						<i class="	fa fa-search"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Search
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>
				
				
				<a href="parking_spl.php">
				<div class="tile double bg-red-sunglo">

					<div class="tile-body">
						<i class="fa fa-star"></i>
					</div>
					

					<div class="tile-object">
						<div class="name">
							 Special vehicle list
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>
				
				
					

			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN FOOTER -->

<div class="page-footer">
	<div class="page-footer-inner">
		 2018 &copy; DMRC INTERNSHIP project
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>