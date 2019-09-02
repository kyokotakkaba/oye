<header class="main-header">
	<!-- Logo -->
	<a style="padding:0" href="#" class="logo">
	<img src="<?=base_url("dist/images/logo.png");?>" height=40px>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url("dist/images/user-icon.png");?>" class="user-image" alt="User Image">
						<span class="hidden-xs" id="username"></span>
					</a>
					<ul class="dropdown-menu">
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?=base_url("/index.php/editprofilemember");?>"
									class="btn btn-default btn-flat">Edit Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?=base_url("index.php/logoutmember");?>" class="btn btn-default btn-flat">Sign
									out</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
			</ul>
		</div>
	</nav>
</header>
