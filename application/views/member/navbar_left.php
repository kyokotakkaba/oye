<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			</div>
			<div class="pull-left info">
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li id="dashboard">
				<a href="<?=base_url("/index.php/dashboardmember");?>">
					<i class="fa fa-dashboard"></i><span>Dashboard</span>
				</a>
			</li>

			<li id="registrasimember">
				<a href="<?=base_url("/index.php/registrasimember");?>">
					<i class="fa fa-user-plus"></i> <span>Registrasi Member</span>
				</a>
			</li>

			<li id="reporting" class="treeview">
				<a href="#">
					<i class="fa fa-archive"></i>
					<span>Reporting</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id="laporanbonussponsor"><a href="<?=base_url("/index.php/laporanbonussponsor");?>"><i
								class="fa fa-circle-o"></i>Bonus Sponsor</a></li>
					<li id="laporanbonuspair"><a href="<?=base_url("/index.php/laporanbonuspair");?>"><i
								class="fa fa-circle-o"></i>Bonus Pairing</a></li>
					<li id="genealogytree"><a href="<?=base_url("/index.php/genealogytree");?>"><i
								class="fa fa-circle-o"></i> Genealogy Tree</a></li>
				</ul>
			</li>

			<li id="withdrawmember">
				<a href="<?=base_url("/index.php/withdrawmember");?>">
					<i class="fa fa-money"></i><span>Withdraw</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>