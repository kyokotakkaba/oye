	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Dashboard Member</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?=base_url("bower_components/bootstrap/dist/css/bootstrap.min.css");?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url("bower_components/font-awesome/css/font-awesome.min.css");?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?=base_url("dist/css/AdminLTE.min.css");?>">
		<link rel="stylesheet" href="<?=base_url("dist/css/skins/skin-blue.min.css");?>">
		<link rel="stylesheet"
			href="<?=base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">

		<!-- Google Font -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<?php $this->load->view("admin/header");?>
			<?php $this->load->view("admin/navbar_left");?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Detail Member
						<small>it all starts here</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Edit & Verifikasi Member</h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
									<i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
									title="Remove">
									<i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<form class="form-horizontal" id="insert_member" onsubmit="insertfunction(event)">
								<div class="form-group">
									<label class="col-sm-3 control-label">Replacement User</label>
									<div class="col-sm-9">
										<input class="form-control" id="replacement_user" type="text"
											name="replacement_user">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Sponsor</label>
									<div class="col-sm-9">
										<input class="form-control" id="sponsor" type="text" name="sponsor">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Username</label>
									<div class="col-sm-9">
										<input class="form-control" id="username" type="text" name="username" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Password</label>
									<div class="col-sm-9">
										<input class="form-control" id="password" type="password" name="password">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Lengkap</label>
									<div class="col-sm-9">
										<input class="form-control" id="nama" type="text" name="nama" pattern="^[A-Za-z ,.'-]+$" name="nama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Email</label>
									<div class="col-sm-9">
										<input class="form-control" id="email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nomor Telepon</label>
									<div class="col-sm-9">
										<input class="form-control" id="no_telepon" type="text" name="no_telepon" placeholder="format: +6281333777999 / 081333777999" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">KTP</label>
									<div class="col-sm-9">
										<input class="form-control" id="ktp" type="text" name="ktp" pattern="^[0-9]+$" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<input class="form-control" id="alamat" type="text" name="alamat" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Bank</label>
									<div class="col-sm-9">
										<input class="form-control" id="nama_bank" type="text" name="nama_bank" pattern="^[A-Za-z ,.'-]+$" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nomor Rekening</label>
									<div class="col-sm-9">
										<input class="form-control" id="no_rekening" type="text" name="no_rekening" pattern="^[0-9]+$" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Atas Nama Bank</label>
									<div class="col-sm-9">
										<input class="form-control" id="atas_nama_bank" type="text" name="atas_nama_bank" pattern="^[A-Za-z ,.'-]+$" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3"></div>
									<div class="col-sm-6">
										<button type="submit" id="editButton" class="btn btn-success btn-md">
											<span id="edit">Update Data</span></button>
										<button id="verifikasiButton" class="btn btn-warning btn-md"
											onclick="verifikasi()">
											<span id="verifikasi">Verifikasi Member</span></button>
									</div>
								</div>
								<form>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							Edit & Verifikasi Member
						</div>
						<!-- /.box-footer-->
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
		<!-- AdminLTE App -->
		<script src="<?=base_url("dist/js/adminlte.min.js");?>"></script>
		<script>
			$(document).ready(function () {
				editMember = getCookie("editMember");
				urls = "get_specificuser/";

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
					url: "<?php echo base_url() ?>index.php/" + urls + editMember,
					type: 'get',
					dataType: "json",
					success: function (response) {
						// console.log(response);
						$("#replacement_user").val(response.replacement_user);
						$("#sponsor").val(response.sponsor);
						$("#username").val(response.username);
						$("#nama").val(response.nama);
						$("#email").val(response.email);
						$("#no_telepon").val(response.no_telepon);
						$("#ktp").val(response.ktp);
						$("#alamat").val(response.alamat);
						$("#nama_bank").val(response.nama_bank);
						$("#no_rekening").val(response.no_rekening);
						$("#atas_nama_bank").val(response.atas_nama_bank);

						if (response.status == "active") {
							$("#verifikasiButton").remove();
							$("#replacement_user").prop('disabled', true);
						}
					}
				})
			})

			function insertfunction(e) {
				if (confirm("Apakah anda yakin ?")) {
					e.preventDefault(); // will stop the form submission						
					urls = "update_profilmember_admin/";
					var value = $('#username').val();
					var dataString = $("#insert_member").serialize();
					$("#submitButton").prop("disabled", true);
					$.ajax({
						url: "<?php echo base_url() ?>index.php/" + urls + value,
						type: 'POST',
						data: dataString,
						success: function (response) {
							$("#submit").html("tunggu..");
							if (response == "berhasil mengubah data") {
								location.reload();
							} else {
								alert("Gagal");
								$("#submit").html("Submit");
								$("#submitButton").prop("disabled", false);
							}
						},
						error: function () {
							alert('Gagal');
							$("#submitButton").prop("disabled", false);
						}
					});
				} else {

				}
			}

			function verifikasi() {
				if (confirm("Apakah anda yakin ?")) {
					urls = "update_verifikasi_member/";
					var value = $('#username').val();
					$("#verifikasiButton").prop("disabled", true);
					$.ajax({
						url: "<?php echo base_url() ?>index.php/" + urls + value,
						type: 'POST',
						success: function (response) {
							console.log(response);
							$("#submit").html("tunggu..");
							if (response.startsWith("verifikasi sukses", 0)) {
								location.reload();
							} else {
								alert("Gagal");
								$("#verifikasi").html("Verifikasi Member");
								$("#verifikasiButton").prop("disabled", false);
							}
						},
						error: function () {
							alert('Gagal');
							$("#verifikasiButton").prop("disabled", false);
						}
					});
				} else {

				}
			}

		</script>
	</body>

	</html>
