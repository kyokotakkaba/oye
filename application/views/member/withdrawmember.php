	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Withdraw</title>
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
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Withdraw</h3>
						</div>
						<div class="box-body">
							<!-- CONTENT -->
							<form class="form-horizontal" id="withdrawmember" onsubmit="insertfunction(event)">
								<div class="form-group">
									<label class="col-sm-3 control-label">Saldo i-cash</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">Rp</div>
											<input class="form-control" id="icash" readonly>
										</div>
									</div>
								</div>
							  	<div class="form-group">
									<label class="col-sm-3 control-label">Nominal Penarikan</label>
									<div class="col-sm-9">
									    <div class="input-group">
									        <label class="radio-inline">
                                                <input type="radio" id="optnominal1" name="optnominal" value="bawah" onclick="optionNominal1()" checked >Dibawah 2 Juta
                                            </label>
                                            <label class="radio-inline">
                                                 <input type="radio" id="optnominal2" name="optnominal" value="atas" onclick="optionNominal2()">Diatas 2 Juta
                                            </label>
										</div>
										</br>
										<div class="input-group" id="nominal1">
											<select class="form-control" id="nominal" type="text" name="nominal">
                                         </select>
										</div>
										</br>
										<div class="input-group" id="nominal2">
											<div class="input-group-addon">Rp</div>
											<input class="form-control" id="nominal" type="text" name="nominal"
												placeholder="Minimal Penarikan Rp 100.000 | Harus kelipatan 50.000" onchange="checknominal()" disabled>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label"><label style="color:red">*</label>Security
										Code</label>
									<div class="col-sm-9">
										<input class="form-control" id="security_code" type="password" name="security_code"
											placeholder="Masukkan security code anda">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<button type="submit" id="submitButton" class="btn btn-primary btn-md">
											<span id="submit">Submit</span></button>
									</div>
								</div>
							</form>
							<!-- /. CONTENT -->
						</div>
						<div class="box-footer">

						</div>
					</div>

					<section class="content">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">History Withdraw</h3>
							</div>
							<div class="box-body">
								<table id="tablewithdraw" class="table table-bordered table-striped" width="100%">
									<thead>
										<tr>
											<th>Username</th>
											<th>Tanggal</th>
											<th>Nominal</th>
											<th>Admin Fee</th>
											<th>Total</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody id="datawithdraw">
									</tbody>
								</table>
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
		<script src="<?=base_url("bower_components/datatables.net/js/dataTables.responsive.min.js");?>"></script>
		<!-- AdminLTE App -->
		<script src="<?=base_url("dist/js/adminlte.min.js");?>"></script>

		<script>
		    function optionNominal1(){
	    	    	$("#nominal2 #nominal").prop('disabled', true);
                    $("#nominal1 #nominal").removeAttr("disabled");
		    }
            function optionNominal2(){
                    $("#nominal1 #nominal").prop('disabled', true);
                    $("#nominal2 #nominal").removeAttr("disabled");
                }
			
			$(document).ready(function () {
			    
			    const formatUang = new Intl.NumberFormat('id-ID', {
					style: 'currency',
					currency: 'IDR',
					minimumFractionDigits: 2
				});
				
			    var nominalWithdraw = 50000;
	            for(var i= 0 ; i < 39; i++){
                    nominalWithdraw = nominalWithdraw + 50000; 
    	            $("#nominal").append(new Option(formatUang.format(nominalWithdraw), nominalWithdraw));
                }
                
				$.ajaxSetup({
                    headers: { "cache-control": "no-cache" }
                });
                
                
				
				userCookie = getCookie("memberCookie");
				urls = "get_specificuser/";
				urlwithdraw = "get_currentuser_withdraw";

				$("#withdrawmember").addClass('active');
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
					type: 'post',
					dataType: "json",
					success: function (response) {
						$("#icash").val(formatUang.format(response.icash));
					}
				})

				$.ajax({
					url: "<?php echo base_url() ?>index.php/" + urlwithdraw,
					type: 'post',
					dataType: "json",
					success: function (response) {
						console.log(response);
						var tr_str;
						for (var i = 0; i < response.length; i++) {
							tr_str +=
								'<tr class="text-center">' +
								'<td>' + response[i].username + '</td>' +
								'<td>' + response[i].tanggal + '</td>' +
								'<td>' + response[i].nominal + '</td>' +
								'<td>' + response[i].admin_fee + '</td>' +
								'<td>' + response[i].total + '</td>' +
								'<td>' + response[i].status + '</td>' +
								'</tr>';
						}
						$.extend($.fn.dataTable.defaults, {
							responsive: true
						});
						$('#datawithdraw').append(tr_str);
						$("#tablewithdraw").DataTable({
							'pageLength': 25,
						});
					}
				});
			})

			function insertfunction(e) {
				if (confirm("Apakah anda yakin ?")) {
					e.preventDefault(); // will stop the form submission						
					var nominal = $("#nominal").val();
					var intnominal = parseInt(nominal);
					if (intnominal > 0 && intnominal >= 100000) {
						var urlsSecuritycode = "ceksecuritycode";
						var security_code = $("#security_code").val();
						console.log("ins sec")
						$.ajax({
							url: "<?php echo base_url() ?>index.php/" + urlsSecuritycode,
							type: 'POST',
							data: {
								security_code: security_code
							},
							success: function (response) {
								$("#submit").html("tunggu..");
								if (response == "security code benar") {
									withdrawmember();
								} else {
									alert(response);
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
						alert('Nominal harus lebih dari Rp 100.000');
					}
				} else {

				}
			}

			function withdrawmember() {
				var urls = "insert_withdraw";
				
				if($('#nominal1 #nominal').prop("disabled")){
				    var nominal = $("#nominal2 #nominal").val();
				}else{
				    var nominal = $("#nominal1 #nominal").val();
				}

                if(nominal%50000==0){
                    $("#submitButton").prop("disabled", true);
				$.ajax({
					url: "<?php echo base_url() ?>index.php/" + urls,
					type: 'POST',
					data: {
						nominal: nominal
					},
					success: function (response) {
						$("#submit").html("tunggu..");
						if (response == "berhasil mengubah data") {
							alert("Berhasil");
							location.reload();
						} else {
							alert(response);
							$("#submit").html("Submit");
							$("#submitButton").prop("disabled", false);
						}
					},
					error: function () {
						alert('Gagal');
						$("#submit").html("Submit");
						$("#submitButton").prop("disabled", false);
					}
				});
                }else{
                    $("#submit").html("Submit");
                    alert("Nominal Harus Kelipatan Rp 50.000");
                }
				
			}

		</script>
	</body>

	</html>
