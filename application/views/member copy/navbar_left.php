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
                 <span>Dashboard</span>
            </a>
            </li>
            
            <li id="registrasimember">
            <a href="<?=base_url("/index.php/registrasimember");?>">
                 <span>Registrasi Member</span>
            </a>
            </li>

            <li class="treeview">
            <a href="#">
                <span>Reporting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?=base_url("/index.php/laporanbonussponsor");?>"><i class="fa fa-circle-o"></i> Laporan Bonus Sponsor</a></li>
                <li><a href="<?=base_url("/index.php/laporanbonuspair");?>"><i class="fa fa-circle-o"></i> Laporan Bonus Pairing</a></li>
                <li><a href="<?=base_url("/index.php/laporantree");?>"><i class="fa fa-circle-o"></i> Genealogy Tree</a></li>
            </ul>
            </li>

            <li id="withdrawmember">
            <a href="<?=base_url("/index.php/withdrawmember");?>">
                 <span>Withdraw</span>
            </a>
            </li>
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>