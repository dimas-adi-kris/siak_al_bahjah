<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Ruangan</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-ruangan"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Ruang</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
		</table>
	</div>
	<!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->
<div class="modal fade" id="modal-form-tambah-ruangan" tabindex="-1" aria-labelledby="ModalLabel"
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
					<input type="text" id="id_ruangan" name="id_ruangan" hidden>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kode Ruang</label>
						<input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Jenis Ruangan</label>
						<select class="form-control" id="id_jenis_ruangan" name="id_jenis_ruangan">
							<!-- Isi Option -->
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kapasitas</label>
						<input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="1">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Lokasi</label>
						<select class="form-control" id="lokasi" name="lokasi">
							<option value="BUKIT">Bukit</option>
							<option value="INDRALAYA">Indralaya</option>
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
				"targets": 1
			},
			{
				"width": "30px",
				"targets": 0
			},
		]
	});

	renderTabelListRuangan();

	function renderTabelListRuangan() {
		tabelListRuangan.clear();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Role/getListRole",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				for (i = 0; i < res.length; i++) {
					tabelListRuangan.row.add([
						i + 1,
						res[i]['nama']
					]).draw(false);
				}
			});
	}


	function renderOptionJenisRuangan(currentValue) {
		$("#id_jenis_ruangan")
			.empty()
			.append("<option selected='selected' value'0'>[pilih jenis ruangan]</option>");

		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Role/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var jenisRuangan = JSON.parse(msg);
				// console.log(jenisRuangan);
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
	$("#btn-tambah-ruang").click(function () {
		$("#id").val('');
		$("#kode_ruangan").val('');
		renderOptionJenisRuangan(0);
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
				url: "<?= base_url() ?>index.php/Role/simpanData",
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
		var id_ruangan = $(this).attr('id_ruangan');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Role/hapusData",
					data: {
						id_ruangan: id_ruangan
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
		var id_ruangan = $(this).attr('id_ruangan');
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/Role/getDataById",
				data: {
					id_ruangan: id_ruangan
				}
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
				var id_jenis_ruangan = res['id_jenis_ruangan'];
				var lokasi = res['lokasi'];
				console.log(id_jenis_ruangan);
				$("#id_ruangan").val(res['id_ruangan']);
				$("#kode_ruangan").val(res['kode_ruangan']);
				renderOptionJenisRuangan(id_jenis_ruangan);
				$("#kapasitas").val(res['kapasitas']);
				$("#lokasi").val(lokasi);

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Ruangan');
			});

	});
});

</script>
