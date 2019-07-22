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
    	<!-- Theme style -->
    	<link rel="stylesheet" href="<?=base_url("dist/css/AdminLTE.min.css");?>">
    	<link rel="stylesheet" href="<?=base_url("dist/css/skins/skin-blue.min.css");?>">
    	<link rel="stylesheet"
    		href="<?=base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">
    	<link rel="stylesheet"
    		href="<?=base_url("bower_components/datatables.net-bs/css/responsive.dataTables.min.css");?>">
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
    					Withdraw
    					<small>All member withdraw</small>
    				</h1>
    			</section>
    			<!-- Main content -->
    			<!-- Main content -->
    			<section class="content">
    				<div class="row">
    					<div class="col-xs-12">
    						<div class="box">
    							<div class="box-header">
    								<h3 class="box-title">Data Withdraw</h3>
    							</div>
    							<!-- /.box-header -->
    							<div class="box-body">
    								<table id="tablewithdraw" class="table table-bordered table-striped" width="100%">
    									<thead>
    										<tr>
    											<th>Username</th>
    											<th>Status</th>
    											<th>Tanggal</th>
    											<th>Nominal</th>
    											<th>Admin Fee</th>
    											<th>Total</th>
    											<th>Verifikasi</th>
    										</tr>
    									</thead>
    									<tbody id="datawithdraw">
    									</tbody>
    								</table>
    							</div>
    							<!-- /.box-body -->
    						</div>
    						<!-- /.box -->
    					</div>
    					<!-- /.col -->
    				</div>
    				<!-- /.row -->
    			</section>
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
    	<script src="<?=base_url("bower_components/datatables_button.min.js");?>"></script>

    	<script>
    		$(document).ready(function () {
    			$("#withdraw").addClass('active');
    			urls = "get_alluser_withdraw";

    			$.ajax({
    				url: "<?php echo base_url() ?>index.php/" + urls,
    				type: 'get',
    				dataType: "json",
    				success: function (response) {
    					console.log(response);
    					var tr_str;
    					for (var i = 0; i < response.length; i++) {
    						tr_str +=
    							'<tr class="text-center">' +
    							'<td>' + response[i].username + '</td>' +
    							'<td>' + response[i].status + '</td>' +
								'<td>' + response[i].tanggal + '</td>' +
    							'<td>' + response[i].nominal + '</td>' +
    							'<td>' + response[i].admin_fee + '</td>' +
    							'<td>' + response[i].total + '</td>';;
    						if (response[i].status != "Success") {
    							tr_str +=
    								'<td><button class="btn btn-sm btn-warning" onclick="verifikasiWithdraw(&quot;' +
    								response[i].username + '&quot;,&quot;' + response[i].tanggal
    								.toString() + '&quot;)">Verifikasi</button></td>';
    						} else {
    							tr_str +=
    								'<td><button class="btn btn-default" disabled>Verifikasi</button></td>';
    						}
    						tr_str += '</tr>';
    					}
    					$.extend($.fn.dataTable.defaults, {
    						responsive: true
    					});

    					$('#datawithdraw').append(tr_str);
    					$("#tablewithdraw").DataTable({
    						'pageLength': 25,
    					});
    				}
    			})
    		});

    		// function hapusWithdraw(username, tanggal) {
    		// 	urls = "delete_withdraw/";
    		// 	$.ajax({
    		// 		url: "<?php echo base_url() ?>index.php/" + urls + username,
    		// 		type: 'POST',
    		// 		data: {
    		// 			tanggal: tanggal
    		// 		},
    		// 		success: function (response) {
    		// 			$("#submit").html("tunggu..");
    		// 			if (response == "berhasil menghapus data") {
    		// 				alert("Berhasil Verifikasi");
    		// 				location.reload();
    		// 			} else {
    		// 				alert(response);
    		// 			}
    		// 		},
    		// 		error: function () {
    		// 			alert('Gagal Verifikasi');
    		// 		}
    		// 	});
    		// }

    		function verifikasiWithdraw(username, tanggal) {
    			if (confirm("Apakah anda yakin ?")) {
    				urls = "update_verifikasi_withdraw/";
    				$.ajax({
    					url: "<?php echo base_url() ?>index.php/" + urls + username,
    					type: 'POST',
    					data: {
    						tanggal: tanggal
    					},
    					success: function (response) {
    						$("#submit").html("tunggu..");
    						if (response == "verifikasi sukses") {
    							alert("Berhasil Verifikasi");
    							location.reload();
    						} else {
    							alert(response);
    						}
    					},
    					error: function () {
    						alert('Gagal');
    					}
    				});
    			} else {

    			}
    		}

    	</script>
    </body>

    </html>
