	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Withdraw Member</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?=base_url("bower_components/bootstrap/dist/css/bootstrap.min.css");?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url("bower_components/font-awesome/css/font-awesome.min.css");?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?=base_url("bower_components/Ionicons/css/ionicons.min.css");?>">
		<!-- DataTables -->
		<link rel="stylesheet"
			href="<?=base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?=base_url("dist/css/AdminLTE.min.css");?>">
		<link rel="stylesheet" href="<?=base_url("dist/css/skins/skin-blue.min.css");?>">

		<!-- Google Font -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<?php $this->load->view("member/header");?>
			<?php $this->load->view("member/navbar_left");?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Withdraw 
						<small>it all starts here</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="col-sm-6">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Info Saldo BV </h3>
							</div>
							<div class="box-body">
								<div class="col-sm-6">
									<h4 class="text-center">BV Kiri</h1>
										<h1 class="text-center" id="bvkiri">...</h1>
								</div>
								<div class="col-sm-6">
									<h4 class="text-center">BV Kanan</h1>
										<h1 class="text-center" id="bvkanan">...</h1>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">

							</div>
						</div>

					</div>
					<!-- /.box -->
					<div class="col-sm-6">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Info i-cash</h3>
							</div>
							<div class="box-body">
								<h1 class="text-center" id="icash">...</h1>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">

							</div>
						</div>
					</div>
					<!-- /.box -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php $this->load->view("member/footer");?>
		</div>
		<!-- ./wrapper -->

		<!-- jQuery 3 -->
		<script src="<?=base_url("bower_components/jquery/dist/jquery.min.js");?>"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?=base_url("bower_components/bootstrap/dist/js/bootstrap.min.js");?>"></script>
		<!-- SlimScroll -->
		<script src="<?=base_url("bower_components/jquery-slimscroll/jquery.slimscroll.min.js");?>"></script>
		<!-- FastClick -->
		<script src="<?=base_url("bower_components/fastclick/lib/fastclick.js");?>"></script>
		<!-- DataTables -->
		<script src="<?=base_url("bower_components/datatables.net/js/jquery.dataTables.min.js");?>"></script>
		<script src="<?=base_url("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js");?>"></script>
		<!-- AdminLTE App -->
		<script src="<?=base_url("dist/js/adminlte.min.js");?>"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?=base_url("dist/js/demo.js");?>"></script>
		<script>
			$(document).ready(function () {
				userCookie = getCookie("memberCookie");
				urls = "get_specificuser/";
				
				$("#dashboard").addClass('active');
				$("#username").text(userCookie);

				function getCookie(cname) {
					var name = cname + "=";
					var decodedCookie = decodeURIComponent(document.cookie);
					var ca = decodedCookie.split(';');
					for (var i = 0; i < ca.length; i++) {
						var c = ca[i];
						while (c.charAt(0) == ' ') {
							c = c.substring(1);
						}
						if (c.indexOf(name) == 0) {
							return c.substring(name.length, c.length);
						}
					}
					return "";
				}

    			$.ajax({
    				url: "<?php echo base_url() ?>index.php/" + urls + userCookie,
    				type: 'get',
    				dataType: "json",
    				success: function (response) {
    					console.log(response.bv_kanan);
						$("#bvkiri").text(response.bv_kiri);
						$("#bvkanan").text(response.bv_kanan);
						$("#icash").text(response.icash);
    				}
    			})
			})
		</script>
	</body>

	</html>
