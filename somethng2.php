<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top" >
	<!-- BEGIN HEADER INNER -->
	
<div class="page-header -i navbar navbar-fixed-top" >

	<!-- BEGIN HEADER INNER -->

	<div class="page-header-inner" >
		<a href="http://www.delhimetrorail.com/" class="navbar-brand"><b>Delhi Metro Rail Corporation</b><a href="#" >
			</a>
       <img src="dmrc.png" style="float:left;"alt="logo" height="50" width="50" class="logo-default"/>
		<!-- BEGIN LOGO -->

		<div class="page-logo">
			


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

					<span class="stationid stationid-hide-on-mobile">

					<?php echo $_SESSION['stationid']; ?></span>

					<i class="fa fa-angle-down"></i>

					</a>

					<ul class="dropdown-menu dropdown-menu-default">

						<li>

							<a href="Profile.php">

							<i class="icon-user"></i> Change Password </a>

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

						<?php echo $_SESSION['stationid']; ?>
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

						<!--<span class="stationid stationid-hide-on-mobile">

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