<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 3 - Generate PDF from view using dompdf library with example</title>
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/summernote/summernote-bs4.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>


<h1>Codeigniter 3 - Generate PDF from view using dompdf library with example</h1>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Pembayaran</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-ruangan"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Transaksi</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Pembayaran</th>
					<th>Bukti Pembayaran</th>
					<th>Tanggal Lahir</th>
					<th>Status Verifikasi</th>
					<th>ID Bendahara</th>
					<th>OTP Pembayaran</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            <?= print_r($bukti_pembayaran);?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>

<pre>
    
</pre>
<script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="<?= base_url(); ?>plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="<?= base_url(); ?>plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="<?= base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <!-- <script src="<?= base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script> -->
  <!-- daterangepicker -->
  <!-- <script src="<?= base_url(); ?>plugins/moment/moment.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- Summernote -->
  <!-- <script src="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <!-- <script src="<?= base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?= base_url(); ?>dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url(); ?>dist/js/demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
	var tabelListRuangan = $('#tabel-list-ruangan').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"columnDefs": [{
				"width": "130px",
				"targets": 5
			},
			{
				"width": "30px",
				"targets": 0
			},
			{
				"className": "text-center",
				"targets": [0, 3, 5]
			},
		]
	});

	renderTabelListRuangan();

	function renderTabelListRuangan() {
		tabelListRuangan.clear();
		$.ajax({
				method: "POST",
				url: "",
				data: {}
			})
			.done(function (msg) {
				var res = <?= $listJenisRuangan?>;
				console.log(res);
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-ruangan"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						res[i]['id_pembayaran'],
						res[i]['tanggal_pembayaran'],
						res[i]['bukti_pembayaran'],
						res[i]['tanggal_lahir'],
						res[i]['status_verifikasi'],
						res[i]['id_bendahara'],
						res[i]['otp_pembayaran'],
						$edit + $hapus
					]).draw(false);
				}
			});
	}

});

</script>


  </body>
</html>