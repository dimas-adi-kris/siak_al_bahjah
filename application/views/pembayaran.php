<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Pembayaran</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-user"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Transaksi</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>id_pembayaran</th>
					<th>tanggal_entry</th>
					<th>id_bendahara</th>
					<th>id_santri</th>
					<th>tanggal_pembayaran</th>
					<th>jenis_pembayaran</th>
					<th>bukti_berkas</th>
					<th>status_verifikasi</th>
					<th>tanggal_verifikasi</th>
					<th>bulan</th>
					<th>keterangan</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->
<div class="modal fade" id="modal-form-tambah-user" tabindex="-1" aria-labelledby="ModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel">Tambah Ruangan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Isi Form -->
				<form id="form-tambah-ruangan">
					<input type="text" name="id_pembayaran" id="id_pembayaran" hidden>
					<div class="form-group">
						<label>tanggal_entry</label>
                        <input type="datetime-local" class="form-control" name="tanggal_entry" id="tanggal_entry">
					</div>
					<div class="form-group">
						<label>id_bendahara</label>
                        <input type="text" class="form-control" name="id_bendahara" id="id_bendahara">
					</div>
					<div class="form-group">
						<label>id_santri</label>
                        <input type="text" class="form-control" name="id_santri" id="id_santri">
					</div>
					<div class="form-group">
						<label>tanggal_pembayaran</label>
                        <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran">
					</div>
					<div class="form-group">
						<label>jenis_pembayaran</label>
                        <select class="form-control" id="jenis_pembayaran" name="jenis_pembayaran">
							<option value="REGISTRASI ULANG">REGISTRASI ULANG</option>
							<option value="SPP">SPP</option>
						</select>
					</div>
					<div class="form-group">
						<label>bukti_berkas</label>
                        <input type="datetime-local" class="form-control" name="bukti_berkas" id="bukti_berkas">
					</div>
					<div class="form-group">
						<label>Status Verifikasi</label>
                        <select class="form-control" id="status_verifikasi" name="status_verifikasi">
							<option value="BELUM">BELUM</option>
							<option value="TERVERIFIKASI">TERVERIFIKASI</option>
						</select>
					</div>
					<div class="form-group">
						<label>tanggal_verifikasi</label>
                        <input type="datetime-local" class="form-control" name="tanggal_verifikasi" id="tanggal_verifikasi">
					</div>
					<div class="form-group">
						<label>bulan</label>
                        <input type="text" class="form-control" name="bulan" id="bulan">
					</div>
					<div class="form-group">
						<label>keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan">
					</div>
					<button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

          
          		</form>
			</div>
			<!-- Penutup Form -->
		</div>
		<div class="modal-footer">
			<!-- <button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button> -->
		</div>
	</div>
</div>
</div>

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
				url: "<?= base_url() ?>index.php/Pembayaran/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-user"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						res[i]['id_pembayaran'],
						res[i]['tanggal_entry'],
						res[i]['id_bendahara'],
						res[i]['id_santri'],
						res[i]['tanggal_pembayaran'],
						res[i]['jenis_pembayaran'],
						res[i]['bukti_berkas'],
						res[i]['status_verifikasi'],
						res[i]['tanggal_verifikasi'],
						res[i]['bulan'],
						res[i]['keterangan'],
						$edit + $hapus
					]).draw(false);
				}
			});
	}


	$("#btn-tambah-ruang").click(function () {
        $("#ModalLabel").text('Tambah User');
        $("#summit-tambah").text('Tambah');
		$("#id_pembayaran").val('');
	});

	// Insert Data
	$("#form-tambah-ruangan").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Pembayaran/simpanData",
				data: formData
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				var data = res['data'];
				// console.log(data);

				if (res['status'] == 1 || res['status'] == "1") {
					alert("Data berhasil disimpan");
					$("#modal-form-tambah-user").modal("hide");
					renderTabelListRuangan();
				} else if (res['status'] == 0 || res['status'] == "0") {
					alert("Data tidak berhasil disimpan");
					$("#modal-form-tambah-user").modal("hide");
				} else {
					console.log(msg);
				}
			});
	});

	$('#tabel-list-ruangan').on('click', '.btn-hapus', function () {
		var id_pembayaran = $(this).attr('id_pembayaran');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Pembayaran/hapusData",
					data: {
						id_pembayaran: id_pembayaran
					}
				})
				.done(function (msg) {
					if (msg == 'true' || msg) {
						alert('data telah dihapus');
						renderTabelListRuangan();
					} else {
						alert('data gagal dihapus, err', msg);
					}
				});
		}
	});

	$('#tabel-list-ruangan').on('click', '.btn-ubah', function () {
		var id_pembayaran = $(this).attr('id_pembayaran');
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/Pembayaran/getDataById",
				data: {
					id_pembayaran: id_pembayaran
				}
			})
			.done(function (msg) {
                console.log("check1");
				console.log(msg);
                console.log("check1");
                var res = JSON.parse(msg);
				$("#id_pembayaran").val(res['id_pembayaran']);
				$("#tanggal_entry").val(res['tanggal_entry']);
				$("#id_bendahara").val(res['id_bendahara']);
				$("#id_santri").val(res['id_santri']);
				$("#tanggal_pembayaran").val(res['tanggal_pembayaran']);
				$("#jenis_pembayaran").val(res['jenis_pembayaran']);
				$("#bukti_berkas").val(res['bukti_berkas']);
				$("#status_verifikasi").val(res['status_verifikasi']);
				$("#tanggal_verifikasi").val(res['tanggal_verifikasi']);
				$("#bulan").val(res['bulan']);
				$("#keterangan").val(res['keterangan']);

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Ruangan');
			});

	});
});

</script>
