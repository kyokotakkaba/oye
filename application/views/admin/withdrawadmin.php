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
    	<!-- Ionicons -->
    	<link rel="stylesheet" href="<?=base_url("bower_components/Ionicons/css/ionicons.min.css");?>">
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
    								<table id="tablwithdraw" class="table table-bordered table-striped">
    									<thead>
    										<tr>
												<th>Option</th>
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
       <script src="<?=base_url("bower_components/datatables_button.min.js");?>"></script>
    	<!-- AdminLTE App -->
    	<script src="<?=base_url("dist/js/adminlte.min.js");?>"></script>
    	<!-- AdminLTE for demo purposes -->
    	<script src="<?=base_url("dist/js/demo.js");?>"></script>
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
    							'<tr class="text-center" >' +
    							'<td><button class="btn btn-sm btn-primary">Detail</button></td>' +
    							'<td>' + response[i].username + '</td>' +
    							'<td>' + response[i].tanggal + '</td>' +
    							'<td>' + response[i].nominal + '</td>' +
    							'<td>' + response[i].admin_fee + '</td>' +
								'<td>' + response[i].total + '</td>' +
								'<td>' + response[i].status + '</td>' +
    							'</tr>';
    					}
    					$('#datawithdraw').append(tr_str);
    					$("#tablemember").DataTable({
                     		'pageLength': 25,
    						'scrollX': true,
                      		dom: 'Bfrtip',
    						buttons: [{
                        		className: 'btn btn-success',
    							text: 'New Member',
    							action: function (e, dt, node, config) {

    							}
    						}]
    					});
    				}
    			})
    		});
    	</script>
    </body>

    </html>