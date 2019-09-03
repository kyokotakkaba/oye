	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Laporan Bonus Sponsor</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?=base_url("bower_components/bootstrap/dist/css/bootstrap.min.css");?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url("bower_components/font-awesome/css/font-awesome.min.css");?>">

		<!-- DataTables -->
		<link rel="stylesheet"
		href="<?=base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">
		<link rel="stylesheet"
		href="<?=base_url("bower_components/datatables.net-bs/css/responsive.dataTables.min.css");?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?=base_url("dist/css/AdminLTE.min.css");?>">
		<link rel="stylesheet" href="<?=base_url("dist/css/skins/skin-blue.min.css");?>">

		<!-- jQuery 3 -->
		<script src="<?=base_url("bower_components/jquery/dist/jquery.min.js");?>"></script>
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
						Laporan Bonus Sponsor
						<small>all sponsor bonus here</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Laporan Bonus Sponsor </h3>
						</div>
						<div class="box-body">
							<!-- CONTENT HERE -->
							<table id="tablebonussponsor" class="table table-bordered table-striped" width="100%">
								<thead>
									<tr>
										<th>Sponsor</th>
										<th>Username Member</th>
										<th>Nominal</th>
										<th>Poin</th>
									</tr>
								</thead>
								<tbody id="databonussponsor">
								</tbody>
							</table>
							<!-- /.CONTENT HERE -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
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

		<!-- Bootstrap 3.3.7 -->
		<script src="<?=base_url("bower_components/bootstrap/dist/js/bootstrap.min.js");?>"></script>
		<!-- SlimScroll -->
		<script src="<?=base_url("bower_components/jquery-slimscroll/jquery.slimscroll.min.js");?>"></script>
		<!-- FastClick -->
		<script src="<?=base_url("bower_components/fastclick/lib/fastclick.js");?>"></script>
		<!-- DataTables -->
		<script src="<?=base_url("bower_components/datatables.net/js/jquery.dataTables.min.js");?>"></script>
		<script src="<?=base_url("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js");?>"></script>
		<script src="<?=base_url("bower_components/datatables.net/js/dataTables.responsive.min.js");?>"></script>
		<!-- AdminLTE App -->
		<script src="<?=base_url("dist/js/adminlte.min.js");?>"></script>

		<script>
			$(document).ready(function () {
				$.ajaxSetup({
                    headers: { "cache-control": "no-cache" }
                });
                
				const formatUang = new Intl.NumberFormat('id-ID', {
					style: 'currency',
					currency: 'IDR',
					minimumFractionDigits: 2
				});


				getCookie("memberCookie", getDashboardData);
				function getCookie(cname, callBack){
					$.ajax({
						url: "<?php echo base_url() ?>index.php/get_cookie/" + cname,
						type: 'post',
						success: function (response) {
							callBack(response);
						}
					})
				}

				function getDashboardData(response){
					userCookie = response;
					urls = "get_currentuser_bonussponsor/";

					$("#reporting").addClass('active');
					$("#laporanbonussponsor").addClass('active');
					$("#username").text(userCookie);

					$.ajax({
						url: "<?php echo base_url() ?>index.php/" + urls,
						type: 'post',
						dataType: "json",
						success: function (response) {
							console.log(response);
							var tr_str;
							for (var i = 0; i < response.length; i++) {
								tr_str +=
								'<tr class="text-center" >' +
								'<td>' + response[i].sponsor + '</td>' +
								'<td>' + response[i].username_member + '</td>' +
								'<td>' + formatUang.format(response[i].nominal) + '</td>' +
								'<td>' + formatUang.format(response[i].poin) + '</td>' +
								'</tr>';
							}
							$.extend($.fn.dataTable.defaults, {
								responsive: true
							});
							$('#databonussponsor').append(tr_str);
							$("#tablebonussponsor").DataTable({});
						}
					})
				}
			})

		</script>
	</body>

	</html>
