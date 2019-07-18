<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Edit Profile </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url("bower_components/bootstrap/dist/css/bootstrap.min.css");?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url("bower_components/font-awesome/css/font-awesome.min.css");?>">

	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">
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
					Edit Profile
					<small>oye edit profile</small>
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
							<h3 class="box-title">Ubah Password</h3>
							<hr>
							
								
								<div class="col-sm-9">
									<button class="btn btn-warning" onclick="changepassword()">Ubah Password</button>
								</div>
							
							
						</div>
						<div class="col-sm-12">
							<h3 class="box-title">Data Diri</h3>
							<hr>
						</div>
						<form class="form-horizontal" id="insert_member" onsubmit="insertfunction(event)">
							<div class="form-group">
								<label class="col-sm-3 control-label">Replacement User</label>
								<div class="col-sm-9">
									<input class="form-control" id="replacement_user" type="text" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-9">
									<input class="form-control" id="usernamebaru" type="text" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input class="form-control" id="password" type="password" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<input class="form-control" id="nama" type="text" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input class="form-control" id="email" type="email" name="email">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nomor Telepon</label>
								<div class="col-sm-9">
									<input class="form-control" id="no_telepon" type="text" name="no_telepon">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">KTP</label>
								<div class="col-sm-9">
									<input class="form-control" id="ktp" type="text" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9">
									<input class="form-control" id="alamat" type="text" name="alamat">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Bank</label>
								<div class="col-sm-9">
									<input class="form-control" id="nama_bank" type="text" name="nama_bank">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nomor Rekening</label>
								<div class="col-sm-9">
									<input class="form-control" id="no_rekening" type="text" name="no_rekening">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Atas Nama Bank</label>
								<div class="col-sm-9">
									<input class="form-control" id="atas_nama_bank" type="text" name="atas_nama_bank">
								</div>
							</div>
							<div class="col-sm-12">
								<h3 class="box-title">Security Code</h3>
								<hr>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><label style="color:red">*</label>Security Code</label>
								<div class="col-sm-9">
									<input class="form-control" id="security_code" type="password" name="security_code" placeholder="Masukkan security code anda">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12 text-center">
									<button type="submit" id="submitButton" class="btn btn-primary btn-md">
										<span id="submit">Edit Profil</span></button>
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
			var urls = "get_currentuser";
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
					url: "<?php echo base_url() ?>index.php/" + urls,
					type: 'get',
					dataType: "json",
					success: function (response) {
						console.log(response);
						$("#replacement_user").val(response.replacement_user);
						$("#sponsor").val(response.sponsor);
						$("#usernamebaru").val(response.username);
						$("#password").val(response.password);
						$("#nama").val(response.nama);
						$("#email").val(response.email);
						$("#no_telepon").val(response.no_telepon);
						$("#ktp").val(response.ktp);
						$("#alamat").val(response.alamat);
						$("#nama_bank").val(response.nama_bank);
						$("#no_rekening").val(response.no_rekening);
						$("#atas_nama_bank").val(response.atas_nama_bank);
						$("#security_code").val(response.security_code);
					}
				})
		})

		function insertfunction(e) {
			e.preventDefault(); // will stop the form submission						
			urls = "update_profilmember";

			var dataString = $("#insert_member").serialize();
			console.log(dataString);
			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);
			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response == "berhasil mengubah data") {
						alert(response);
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
		}

		function changepassword(){
			window.location = "<?php echo base_url() ?>index.php/changepasswordmember";
		}
	</script>
</body>

</html>
