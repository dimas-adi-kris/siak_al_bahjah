<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Santri</h3>
		<button id="btn-tambah-calon-santri" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal_form_calon_santri"><i class="fa fa-plus-square" aria-hidden="true"></i> Santri</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-program" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
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
<div class="modal fade" id="modal_form_calon_santri" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
				<form id="form-tambah-calon-santri">
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
						<select class="form-control" id="status_verifikasi_registrasi_ulang" name="status_verifikasi_registrasi_ulang">
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

</div>

<script>
	$(document).ready(function () {
		var tableListSantri = $('#tabel-list-program').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"responsive": true,
		});

		renderTableListSantri();

		function renderTableListSantri() {
			tableListSantri.clear();
			$.ajax({
					method: "POST",
					url: "<?= base_url() ?>index.php/Santri/getSantri",
					data: {}
				})
				.done(function (msg) {
					var res = JSON.parse(msg);
					console.log(res);
					for (i = 0; i < res.length; i++) {
            $edit = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal_form_calon_santri"><i class="far fa-edit"></i>Edit</button>'
					  $hapus = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
						tableListSantri.row.add([
							i + 1,
							res[i]['id_santri'],
							res[i]['id_calon_santri'],
							res[i]['nis'],
							res[i]['tanggal_registrasi'],
							res[i]['status_verifikasi_registrasi_ulang'],
							$edit  + $hapus,
						]).draw(false);
					}
				});
		}

		function renderTableListProgram() {
			tableListSantri.clear();
			$.ajax({
					method: "POST",
					url: "<?= base_url() ?>index.php/Santri/getProgram",
					data: {}
				})
				.done(function (msg) {
					var res = JSON.parse(msg);
					console.log(res);
					for (i = 0; i < res.length; i++) {
						var btn_ubah =
							'<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_calon_santri_ubah" id_calon_santri=' +
							res[i]['id_calon_santri'] +
							'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
						var btn_hapus =
							'<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_calon_santri=' +
							res[i]['id_calon_santri'] +
							'><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
						tableListSantri.row.add([
							i + 1,
							res[i]['id_calon_santri'],
							btn_ubah + btn_hapus,
						]).draw(false);
					}
				});
		}

		function renderOptionJenisRuangan(currentValue) {
			// console.log(currentValue);
			$('#id_jenis_ruangan')
				.empty()
				.append("<option selected='selected' value'0'>[pilih jenis ruangan]</option>");
			$.ajax({
					method: "POST",
					url: "<?= base_url() ?>index.php/Ruangan/getListJenisRuangan",
					data: {}
				})
				.done(function (msg) {
					var jenisRuangan = JSON.parse(msg);

					$.each(jenisRuangan, function (key, value) {
						if (currentValue == value['id_jenis_ruangan']) {
							$("#id_jenis_ruangan")
								.append($("<option selected='selected'></option>")
									.attr("value", value['id_jenis_ruangan'])
									.text(value['id_jenis_ruangan'] + ":" + value['nama']));
						} else {
							$("#id_jenis_ruangan")
								.append($("<option></option>")
									.attr("value", value['id_jenis_ruangan'])
									.text(value['id_jenis_ruangan'] + ":" + value['nama']));
						}

					});
				});
		}

		$("#btn-tambah-calon-santri").click(function () {
			$('#submit-tambah').html('Tambah');
			$('#exampleModalLabel').html('Tambah Santri');
			$('#id_program').val('');

		});

		// Insert Data
		$("#form-tambah-calon-santri").submit(function () {
			// alert('True');
			event.preventDefault();
			var formData = $(this).serialize();
			console.log(formData);
			$.ajax({
					method: "POST",
					url: "<?= base_url() ?>index.php/Santri/tambahSantri",
					data: formData
				})
				.done(function (msg) {
					console.log(msg);
					var res = JSON.parse(msg);
					var data = res['data'];
					console.log(res);

					if (res['status'] == 1 || res['status'] == "1") {
						alert("Data berhasil disimpan");
						$("#modal_form_calon_santri").modal("hide");

						renderTableListSantri();
					} else if (res['status'] == 0 || res['status'] == "0") {
						alert("Data tidak berhasil disimpan");
						$("#modal_form_calon_santri").modal("hide");
					} else {
						console.log(msg);
					}
				});
		});

		// Hapus Data
		$('#tabel-list-calon-santri').on('click', '.class_hapus_data', function () {
			var id_calon_santri = $(this).attr('id_calon_santri');
			// console.log(id_ruangan);
			// alert('Test');
			if (confirm('Anda Yakin Menghapus Data')) {
				// alert('Iya');
				$.ajax({
						method: "POST",
						url: "<?= base_url() ?>index.php/Santri/hapusSantri",
						data: {
							id_calon_santri: id_calon_santri
						}
					})
					.done(function (msg) {
						renderTableListSantri();
					});
			} else {
				alert('Data tidak bisa dihapus', msg);
			}
		});

		// Edit Data
		$('#tabel-list-calon-santri').on('click', '.class_ubah_data', function () {
			$('#submit-tambah-ubah').html('Ubah');
			$('#exampleModalLabel').html('Ubah Data Ruangan');
			var id_calon_santri = $(this).attr('id_calon_santri');
			// console.log(id_jadwal_ujian_calon_santri);
			$.ajax({
					method: "POST",
					url: "<?= base_url() ?>index.php/Santri/getSantriById",
					data: {
						id_calon_santri: id_calon_santri
					}
				})
				.done(function (msg) {
					var data = JSON.parse(msg);
					console.log(data);
					var id_calon_santri = data['id_calon_santri'];
					console.log(id_calon_santri);
					// INPUT DATA
					$("#id_santri").val(data['id_santri']);
					$("#id_calon_santri").val(data['id_calon_santri']);
					$("#nis").val(data['nis']);
					$("#tanggal_registrasi").val(data['tanggal_registrasi']);
					$("#status_verifikasi_registrasi_ulang").val(data['status_verifikasi_registrasi_ulang']);
					$("#form-tambah-calon-santri-ubah").submit(function () {
						event.preventDefault();
						var formData = $(this).serialize();
						console.log(formData);
						$.ajax({
								method: "POST",
								url: "<?= base_url() ?>index.php/Santri/updateSantri",
								data: formData
							})
							.done(function (msg) {
								// console.log("TES::" + msg);
								var res = JSON.parse(msg);
								var data = res['data'];

								if (res['status'] == 1 || res['status'] == "1") {
									alert("Data berhasil diubah");
									$("#modal_form_calon_santri_ubah").modal("hide");
									renderTableListProgram();
								} else if (res['status'] == 0 || res['status'] == "0") {
									alert("Data tidak berhasil disimpan");
									$("#modal_form_calon_santri_ubah").modal("hide");
								} else {
									console.log(msg);
								}
							});
					});
				});
		});

	});

</script>
