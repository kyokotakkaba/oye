	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Registrasi Sukses</title>
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
						Registrasi Sukses
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="box">
						<div class="col-sm-12">
							<h3 class="box-title">Data Member Baru</h3>
							<hr>
						</div>
						<div class="box-body">
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Replacement User</label>
								<div class="col-sm-8">
									<span id="replacement_user" name="replacement_user"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-8">
									<span id="usernameBaru" name="usernameBaru"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-8">
									<span id="nama" name="nama"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<span id="email" name="email"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Nomor Telepon</label>
								<div class="col-sm-8">
									<span id="no_telepon" name="no_telepon"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">KTP</label>
								<div class="col-sm-8">
									<span id="ktp" name="ktp"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-8">
									<span id="alamat" name="alamat"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Nama Bank</label>
								<div class="col-sm-8">
									<span id="nama_bank" name="nama_bank"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Nomor Rekening</label>
								<div class="col-sm-8">
									<span id="no_rekening" name="no_rekening"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<label class="col-sm-3 control-label">Atas Nama Bank</label>
								<div class="col-sm-8">
									<span id="atas_nama_bank" name="atas_nama_bank"></span>
								</div>
							</div>

							<div class="col-sm-12">
								<h3 class="box-title">Informasi Pembayaran</h3>
								<hr>
								<table class="table table-striped">
									<tbody>
										<tr>
											<td>
												<span>Pembayaran Member Baru</span>
											</td>
										</tr>
										<tr>
											<td>
												<span>Rekening : <b id="bank_admin"> </b></span>
											</td>
										</tr>
										<tr>
											<td>
												<span>Biaya<b id="nominal">Rp 100.000</b></span>
											</td>
										</tr>
										<tr>
											<td>
												<span>====================================</span>
											</td>
										</tr>
										<tr>
											<td>
												<span><b>*Nominal Transfer harus sesuai dengan yang tertera</b></span>
											</td>
										</tr>
										<tr>
											<td>
												<span><b>*Catat info pembayaran di atas, halaman ini tidak bisa di akses kembali</b></span>
											</td>
										</tr>
									</tbody>
								</table>
								<button class="btn btn-primary" onclick="tutup()">Tutup</button>
							</div>

						</div>
						<!-- /.box-body -->
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

				getCookie("memberBaru", getMemberData);
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
					

					$("#registrasimember").addClass('active');
					$("#username").text(userCookie);					
				}

				function getMemberData(response){
					memberBaru = response;
					urls = "get_specificuser/";
					$.ajax({
						url: "<?php echo base_url() ?>index.php/" + urls + memberBaru,
						type: 'post',
						dataType: "json",
						success: function (response) {
						// console.log(response);
						$("#replacement_user").text(": " + response.replacement_user);
						$("#usernameBaru").text(": " + response.username);
						$("#nama").text(": " + response.nama);
						$("#email").text(": " + response.email);
						$("#no_telepon").text(": " + response.no_telepon);
						$("#alamat").text(": " + response.alamat);
						$("#ktp").text(": " + response.ktp);
						$("#nama_bank").text(": " + response.nama_bank);
						$("#no_rekening").text(": " + response.no_rekening);
						$("#atas_nama_bank").text(": " + response.atas_nama_bank);
						$("#nominal").text(": " + formatUang.format(response.nominal_pembayaran));
					}
				})
				}

				$.ajax({
					url: "<?php echo base_url() ?>index.php/get_parameter",
					type: 'post',
					dataType: "json",
					success: function (response) {
						$("#bank_admin").text(" "+response.nama_bank+" "+response.no_rekening+" a/n "+response.atas_nama);
					}
				})
			})
			
			function tutup(){
					window.location = "<?php echo base_url() ?>index.php/registrasimember";
				}
		</script>
	</body>

	</html>
