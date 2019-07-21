	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Registrasi Member</title>
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
						Registrasi Member
						<small>oye member registration</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="box">
						<div class="box-header with-border">
						</div>
						<div class="box-body">
							<div class="col-sm-12">
								<h3 class="box-title">Data Diri</h3>
								<hr>
							</div>

							<form class="form-horizontal" id="insert_member" onsubmit="insertfunction(event)">
								<div class="form-group">
									<label class="col-sm-3 control-label">Replacement User</label>
									<div class="col-sm-9">
										<input class="form-control" id="replacement_user" type="text"
											name="replacement_user" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Username</label>
									<div class="col-sm-9">
										<input class="form-control" id="usernamebaru" type="text" name="username" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Password</label>
									<div class="col-sm-9">
										<input class="form-control" id="password" type="password" name="password" minlength="8" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Lengkap</label>
									<div class="col-sm-9">
										<input class="form-control" id="nama" type="text" name="nama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Email</label>
									<div class="col-sm-9">
										<input class="form-control" id="email" type="email" name="email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nomor Telepon</label>
									<div class="col-sm-9">
										<input class="form-control" id="no_telepon" type="text" name="no_telepon" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">KTP</label>
									<div class="col-sm-9">
										<input class="form-control" id="ktp" type="text" name="ktp" required>
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
										<input class="form-control" id="nama_bank" type="text" name="nama_bank" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nomor Rekening</label>
									<div class="col-sm-9">
										<input class="form-control" id="no_rekening" type="text" name="no_rekening" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Atas Nama Bank</label>
									<div class="col-sm-9">
										<input class="form-control" id="atas_nama_bank" type="text" name="atas_nama_bank" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<button type="submit" id="submitButton" class="btn btn-primary btn-md">
											<span id="submit">Submit</span></button>
									</div>
								</div>
								<form>
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
				var userCookie = getCookie("memberCookie");

				$("#registrasimember").addClass('active');
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
			})

			function setCookie(value) {
				var expires = "";
				var date = new Date();
				date.setTime(date.getTime() + (5 * 60 * 1000));
				expires = "; expires=" + date.toUTCString();
				document.cookie = "memberBaru =" + (value || "") + expires + "; path=/oye/index.php/registrasisukses";
			}

			function insertfunction(e) {
				e.preventDefault(); // will stop the form submission						
				urls = "insert_registrasimember";
				var value = $('#usernamebaru').val();

				var dataString = $("#insert_member").serialize();
				console.log(dataString);
				$("#submit").html("tunggu..");
				$("#submitButton").prop("disabled", true);
				$.ajax({
					url: "<?php echo base_url() ?>index.php/" + urls,
					type: 'POST',
					data: dataString,
					success: function (response) {
						console.log(value);
						if (response == "berhasil mengubah data") {
							setCookie(value);
							window.location = "<?php echo base_url() ?>index.php/registrasisukses";
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
			}

		</script>
	</body>

	</html>
