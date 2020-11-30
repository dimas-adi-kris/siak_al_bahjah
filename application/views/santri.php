<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Santri</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-user"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah
			Transaksi</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>id_santri</th>
					<th>id_calon_santri</th>
					<th>nis</th>
					<th>tanggal_registrasi</th>
					<th>status_verifikasi_registrasi_ulang</th>
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
<div class="modal fade" id="modal-form-tambah-user" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
					<input type="text" name="id_santri" id="id_santri" hidden>
					<div class="form-group">
						<label>id_calon_santri</label>
						<input type="text" class="form-control" name="id_calon_santri" id="id_calon_santri">
					</div>
					<div class="form-group">
						<label>nis</label>
						<input type="text" class="form-control" name="nis" id="nis">
					</div>
					<div class="form-group">
						<label>tanggal_registrasi</label>
						<input type="date" class="form-control" name="tanggal_registrasi" id="tanggal_registrasi">
					</div>
					<div class="form-group">
						<label>status_verifikasi_registrasi_ulang</label>
						<select class="form-control" id="status_verifikasi_registrasi_ulang"
							name="status_verifikasi_registrasi_ulang">
							<option value="TERVERIFIKASI">TERVERIFIKASI</option>
							<option value="BELUM">BELUM</option>
						</select>
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

<!-- Modal Rincian -->
<div class="modal fade" id="modal-form-rinci" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
				<form id="form-rinci">
					<input type="text" name="api_id_santri" id="api_id_santri" hidden>
					<div class="form-group">
						<label>api_id_program</label>
						<input type="text" class="form-control" name="api_id_program" id="api_id_program">
					</div>
					<div class="form-group">
						<label>api_nama</label>
						<input type="text" class="form-control" name="api_nama" id="api_nama">
					</div>
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
<!-- Modal Rincian -->
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
					url: "<?=base_url()?>index.php/Santri/getListTabel",
					data: {}
				})
				.done(function (msg) {
					var res = JSON.parse(msg);
					for (i = 0; i < res.length; i++) {
						$rinci = '<button type="button" id_santri=' + res[i]['id_santri'] +
							' class="btn bg-gradient-success btn-rinci" data-toggle="modal" data-target="#modal-form-rinci"><i class="far fa-edit"></i>Edit</button>'
						$edit = '<button type="button" id_santri=' + res[i]['id_santri'] +
							' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-user"><i class="far fa-edit"></i>Edit</button>'
						$hapus = '<button type="button" id_santri=' + res[i]['id_santri'] +
							' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
						tabelListRuangan.row.add([
							res[i]['id_santri'],
							res[i]['id_calon_santri'],
							res[i]['nis'],
							res[i]['tanggal_registrasi'],
							res[i]['status_verifikasi_registrasi_ulang'],
							$rinci + $edit + $hapus
						]).draw(false);
					}
				});
		}


		$("#btn-tambah-ruang").click(function () {
			$("#ModalLabel").text('Tambah User');
			$("#summit-tambah").text('Tambah');

			$("#id_calon_santri").val('');
			$("#nis").val('');
			$("#tanggal_registrasi").val('');
			$("#status_verifikasi_registrasi_ulang").val('');
		});

		// Insert Data
		$("#form-tambah-ruangan").submit(function () {
			// alert('True');
			event.preventDefault();
			var formData = $(this).serialize();
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Santri/simpanData",
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
			var id_santri = $(this).attr('id_santri');
			if (confirm("Apakah data ini akan dihapus?")) {
				$.ajax({
						method: "POST",
						url: "<?=base_url()?>index.php/Santri/hapusData",
						data: {
							id_santri: id_santri
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
			var id_santri = $(this).attr('id_santri');
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Santri/getDataById",
					data: {
						id_santri: id_santri
					}
				})
				.done(function (msg) {
					console.log("check1");
					console.log(msg);
					console.log("check1");
					var res = JSON.parse(msg);
					$("#id_santri").val(res['id_santri']);
					$("#id_calon_santri").val(res['id_calon_santri']);
					$("#nis").val(res['nis']);
					$("#tanggal_registrasi").val(res['tanggal_registrasi']);
					$("#status_verifikasi_registrasi_ulang").val(res[
						'status_verifikasi_registrasi_ulang']);

					$("#summit-tambah").text('Ubah');
					$("#ModalLabel").text('Ubah Ruangan');
				});
		});
		$('#tabel-list-ruangan').on('click', '.btn-rinci', function () {
			var id_santri = $(this).attr('id_santri');
			console.log("<?=base_url()?>index.php/Santri/getInfoDasarCalonSantri/"+ id_santri);
			$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/Santri/getInfoDasarCalonSantri/" + id_santri,
				data: {}
			})
			.done(function (msg) {

				var res = JSON.parse(msg);
				console.log(res);
				console.log(msg);
				// console.log("check1");
				// var res = JSON.parse(msg);
				$("#api_id_santri").val(res['id_santri']);
				$("#api_id_program").val(res['id_program']);
				$("#api_nama").val(res['nama']);

				$("#ModalLabel").text('Ubah Ruangan');
			});
		});

	});

</script>
