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
						Dashboard Member
						<small>it all starts here</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="col-sm-2">
					</div>
					<div class="col-sm-8">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Ubah Password </h3>
							</div>
							<div class="box-body">
								<form class="form-horizontal" id="insert_password" onsubmit="insertfunction(event)">
									<div class="form-group">
										<label class="col-sm-3 control-label">Password Lama</label>
										<div class="col-sm-9">
											<input class="form-control" id="oldpassword" type="password" name="oldpassword"
												minlength="8" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Password Baru</label>
										<div class="col-sm-9">
											<input class="form-control" id="newpassword" type="password" name="newpassword"
												placeholder="Mnimal 6 karakter" minlength="6" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12 text-center">
											<button type="submit" id="submitButton" class="btn btn-primary btn-md">
												<span id="submit">Submit</span></button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">

							</div>
						</div>

					</div>
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
			function insertfunction(e) {
				if (confirm("Apakah anda yakin ?")) {
					e.preventDefault(); // will stop the form submission						
					urls = "update_passwordmember";
					var dataString = $("#insert_password").serialize();
					$("#submitButton").prop("disabled", true);
					$.ajax({
						url: "<?php echo base_url() ?>index.php/" + urls,
						type: 'POST',
						data: dataString,
						success: function (response) {
							$("#submit").html("tunggu..");
							if (response == "berhasil mengubah data") {
								alert("Sukses");
								window.location.href = "<?php echo base_url() ?>index.php/dashboardmember";
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

		</script>
	</body>

	</html>
