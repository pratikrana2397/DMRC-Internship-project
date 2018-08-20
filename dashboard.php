<?php 
$page_title = 'User Dashboard';
  require_once('includes/load.php');
  $user = current_user();

  if (!$session->isUserLoggedIn(true)) {
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['stationid']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

<style type="text/css">

body{
	background-color: #2789A8;
	font-size: 20px;
}

.page-header.navbar {

height: 0px;

background-color: white;
margin-bottom: 1px;

}

.page-logo{
	padding-left: 5px;
	padding-right: 5px;margin-bottom: 1px;
}


.page-sidebar{
	background-color: #2789A8  ;
	font-size: 15px;
	color: black;
}


.title{
	font-size: 17px;

}

.br-on-mobile {
  display: none;
}

@media screen and (max-width:400px) {
  .br-on-mobile {
    display: inherit;
  }
  
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
<body class=" page-quick-sidebar-over-content " >

	
   	
    <nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid">

    <div class="navbar-header" style="height:50px;margin-bottom: 10px;">
      <a href="profile.php" class="navbar-brand"> <b> Delhi Metro Rail Corporation </b></a> <a href="#" > <img src="dmrc.png" height="60" width="60"></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="profile.php"><?php echo remove_junk(ucfirst($user['name'])); ?></a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>

      </div>
  
</nav>
  
  <br><br>
<br class="br-on-mobile"><br class="br-on-mobile"><br class="br-on-mobile">

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
				
				<li>
					<a href="dashboard.php">
					<i class="fa fa-home"></i>
					<span class="title">Home</span>
					
					</a>
                                                       </li>
				
				
				
			
					                                 
				<li>
					<a href="parktable.php">
					<i class="fa fa-cab"></i>
					<span class="title">Parking</span>
					
					</a>
                                                       </li>
                <li>
					<a href="http://www.delhimetrorail.com/">
					<i class="	fa fa-desktop"></i>
					<span class="title">Website</span>
					
					</a>
                                                       </li>
                <li>
					<a href="http://www.delhimetrorail.com/contact_us.aspx">
					<i class="	fa fa-phone"></i>
					<span class="title">Contact Us</span>
					
					</a>
                                                       </li>        
                                                       <li>
					<a href="parking dashboard.php">
					<i class="fa fa-user"></i>
					<span class="title">Missing Portal</span>
					
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
				
				
				<a href="parktable.php">
				<div class="tile double bg-yellow-saffron" >
					
					<div class="tile-body">
						<i class="fa fa-automobile"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 PARKING
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>

               <div class="tiles" >
				
				
				<a href="http://www.delhimetrorail.com/lost_found.aspx">
				<div class="tile double bg-blue" >
					
					<div class="tile-body">
						<i class="fa fa-user" style="font-size:50px"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 MISSING PORTAL
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>



          <a href="http://www.delhimetrorail.com/">
				<div class="tile double bg-purple-studio">
					<div class="tile-body">
						<i class="fa fa-dribbble"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 WEBSITE</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>


                
				<br>
				<br>
				<br>
				<br>
				<br>
				<a href="http://www.delhimetrorail.com/contact_us.aspx">
				<div class="tile double bg-green-meadow">
					<div class="tile-body">
						<i class="fa fa-comment-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 CONTACT US
						</div>
						<div class="number">
							 
						</div>
					</div>
				</div></a>
				
				
				<a href="http://www.delhimetrorail.com/media.aspx">
				<div class="tile double bg-red-sunglo">

					<div class="tile-body ">
						<i class="fa fa-bullhorn"></i>
					</div>
					

					<div class="tile-object">
						<div class="name">
							 NEWS
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