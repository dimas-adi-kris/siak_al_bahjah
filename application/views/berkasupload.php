<div class="row">
	<div class="col-lg-8">

		<?=form_open_multipart('user/edit');?>
		<div class="form-group row">
			<label for="Email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="email" name="email" value="<?=$user['email']?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Full Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" value="<?=$user['name']?>">
				<?=form_error('name', '<small class="text-danger pl-3">', '</small>');?>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-2">Picture</div>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-3">
						<img src="<?=base_url('assets/img/profile/') . $user['image']?>" class="img-thumbnail">
					</div>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image">
							<label class="custom-file-label" for="image">Choose file</label>
						</div>
					</div>
				</div>
				<div class="form-group row justify-content-end">
					<div class="col -sm 10">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>

			</div>



			</form>
		</div>
	</div>
</div>

<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Ruangan</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-ruangan"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah
			Ruang</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID Berkas Upload</th>
					<th>ID Santri</th>
					<th>Tanggal Upload</th>
					<th>Nama Berkas</th>
					<th>Lokasi Upload</th>
					<th>Keterangan</th>
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
<div class="modal fade" id="modal-form-tambah-ruangan" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
					<input type="text" id="id_berkas_upload" name="id_berkas_upload" hidden>
					<div class="form-group">
						<label for="exampleFormControlInput1">ID Santri</label>
						<input type="text" class="form-control" id="id_calon_santri" name="id_calon_santri">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Tanggal Upload</label>
						<input type="datetime-local" class="form-control" id="tanggal_upload" name="tanggal_upload">
					</div>
					<div class="form-group">
						<label>Nama Berkas</label>
						<select class="form-control" id="nama_berkas" name="nama_berkas">
							<option value="FOTO">FOTO</option>
							<option value="KTP">KTP</option>
							<option value="KK">KK</option>
							<option value="AKTE KELAHIRAN">AKTE KELAHIRAN</option>
							<option value="RAPOT">RAPOT</option>
							<option value="IJAZAH">IJAZAH</option>
							<option value="BUKTI PEMBAYARAN">BUKTI PEMBAYARAN</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Lokasi Upload</label>
						<input type="file" class="form-control" id="lokasi_upload" name="lokasi_upload">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" name="keterangan">
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

		var fullPath = document.getElementById('#lokasi_upload').value;
		if (fullPath) {
			var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf(
			'/'));
			var filename = fullPath.substring(startIndex);
			if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
				filename = filename.substring(1);
			}
			alert(filename);
		}
		renderTabelListRuangan();

		function renderTabelListRuangan() {
			tabelListRuangan.clear();
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/BerkasUpload/getListTabel",
					data: {}
				})
				.done(function (msg) {
					var res = JSON.parse(msg);
					console.log(res);
					for (i = 0; i < res.length; i++) {
						$upload = '<button type="button" id_berkas_upload=' + res[i]['id_berkas_upload'] +
							' class="btn bg-gradient-success btn-upload" data-toggle="modal" data-target="#modal-form-tambah-ruangan"><i class="far fa-edit"></i>Edit</button>'
						$edit = '<button type="button" id_berkas_upload=' + res[i]['id_berkas_upload'] +
							' class="btn bg-gradient-success btn-upload" data-toggle="modal" data-target="#modal-form-tambah-ruangan"><i class="far fa-edit"></i>Edit</button>'
						$hapus = '<button type="button" id_berkas_upload=' + res[i]['id_berkas_upload'] +
							' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
						tabelListRuangan.row.add([
							res[i]['id_berkas_upload'],
							res[i]['id_calon_santri'],
							res[i]['tanggal_upload'],
							res[i]['nama_berkas'],
							res[i]['lokasi_upload'],
							res[i]['keterangan'],
							$edit + $hapus,
						]).draw(false);
					}
				});
		}


		$("#btn-tambah-ruang").click(function () {
			$("#id").val('');
			$("#kode_ruangan").val('');
			$("#kapasitas").val(0);
			$("#lokasi").val('');
		});

		// Insert Data
		$("#form-tambah-ruangan").submit(function () {
			// alert('True');
			event.preventDefault();
			var formData = $(this).serialize();
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/BerkasUpload/simpanData",
					data: formData
				})
				.done(function (msg) {
					// console.log(msg);
					var res = JSON.parse(msg);
					var data = res['data'];
					// console.log(data);

					if (res['status'] == 1 || res['status'] == "1") {
						alert("Data berhasil disimpan");
						$("#modal-form-tambah-ruangan").modal("hide");
						renderTabelListRuangan();
					} else if (res['status'] == 0 || res['status'] == "0") {
						alert("Data tidak berhasil disimpan");
						$("#modal-form-tambah-ruangan").modal("hide");
					} else {
						console.log(msg);
					}
				});
		});

		$('#tabel-list-ruangan').on('click', '.btn-hapus', function () {
			var id_berkas_upload = $(this).attr('id_berkas_upload');
			if (confirm("Apakah data ini akan dihapus?")) {
				$.ajax({
						method: "POST",
						url: "<?=base_url()?>index.php/BerkasUpload/hapusData",
						data: {
							id_berkas_upload: id_berkas_upload
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
			var id_berkas_upload = $(this).attr('id_berkas_upload');
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/BerkasUpload/getDataById",
					data: {
						id_berkas_upload: id_berkas_upload
					}
				})
				.done(function (msg) {
					// console.log(msg);
					var res = JSON.parse(msg);
					$("#id_berkas_upload").val(res['id_berkas_upload']);
					$("#id_calon_santri").val(res['id_calon_santri']);
					$("#tanggal_upload").val(res['tanggal_upload']);
					$("#nama_berkas").val(res['nama_berkas']);
					$("#lokasi_upload").val(res['lokasi_upload']);
					$("#keterangan").val(res['keterangan']);

					$("#summit-tambah").text('Ubah');
					$("#ModalLabel").text('Ubah Ruangan');
				});

		});
	});

</script>
