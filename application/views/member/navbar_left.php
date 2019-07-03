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
            <li class="treeview">
            <a href="<?=base_url("/index.php/dashboardadmin");?>">
                 <span>Dashboard</span>
            </a>
            </li>
            
            <li class="treeview">
            <a href="<?=base_url("/index.php/registrasimember");?>">
                 <span>Registrasi Member</span>
            </a>
            </li>

            <li class="treeview">
            <a href="#">
                <span>Laporan</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?=base_url("/index.php/laporansponsor");?>"><i class="fa fa-circle-o"></i> Laporan Bonus Sponsor</a></li>
                <li><a href="<?=base_url("laporanpairing");?>"><i class="fa fa-circle-o"></i> Laporan Bonus Pairing</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="<?=base_url("/index.php/withdrawmember");?>">
                 <span>Withdraw</span>
            </a>
            </li>
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>