<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Ruangan</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-user"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah User</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>id_wali_calon_santri</th>
					<th>id_calon_santri</th>
					<th>nama</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Negara</th>
					<th>Telepon</th>
					<th>Pekerjaan</th>
					<th>No KTP</th>
					<th>Gender</th>
					<th>Hubungan</th>
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
				<h5 class="modal-title" id="ModalLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Isi Form -->
				<form id="form-tambah-ruangan">
					<input type="hidden" id="id_wali_calon_santri" name="id_wali_calon_santri" value="">
					<div class="form-group">
						<label for="exampleFormControlInput1">ID Santri</label>
                        <input type="text" class="form-control" id="id_calon_santri" name="id_calon_santri" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kota</label>
						<input type="text" class="form-control" id="kota" name="kota" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">negara</label>
						<input type="text" class="form-control" id="negara" name="negara" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">telepon</label>
						<input type="text" class="form-control" id="telepon" name="telepon" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">pekerjaan</label>
						<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">no_ktp</label>
						<input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">gender</label>
                        <select class="form-control" id="gender" name="gender">
							<option value="LAKI-LAKI">LAKI-LAKI</option>
							<option value="PEREMPUAN">PEREMPUAN</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">hubungan</label>
                        <select class="form-control" id="hubungan" name="hubungan">
							<option value="ORANG TUA KANDUNG">ORANG TUA KANDUNG</option>
							<option value="SAUDARA ORANG TUA">SAUDARA ORANG TUA</option>
							<option value="KAKEK/NENEK">KAKEK/NENEK</option>
							<option value="LAINNYA">LAINNYA</option>
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
				url: "<?= base_url() ?>index.php/WaliSantri/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_wali_calon_santri=' + res[i]['id_wali_calon_santri'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-user"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_wali_calon_santri=' + res[i]['id_wali_calon_santri'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						res[i]['id_wali_calon_santri'],
						res[i]['id_calon_santri'],
						res[i]['nama'],
						res[i]['alamat'],
						res[i]['kota'],
						res[i]['negara'],
						res[i]['telepon'],
						res[i]['pekerjaan'],
						res[i]['no_ktp'],
						res[i]['gender'],
						res[i]['hubungan'],
						$edit + $hapus,
					]).draw(false);
				}
			});
	}


	function renderOptionJenisRuangan(currentValue) {
		$("#id_calon_santri")
			.empty()
			.append("<option selected='selected' value'0'>[pilih jenis ruangan]</option>");

		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/WaliSantri/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var jenisRuangan = JSON.parse(msg);
				console.log(jenisRuangan);
				$.each(jenisRuangan, function (key, value) {

					if (currentValue == value['id_calon_santri']) {
						$("#id_calon_santri")
							.append($("<option selected='selected'></option>")
							.attr("value", value['id_calon_santri'])
							.text(value['id_calon_santri'] + ":" + value['nama']));

					} else {
						$("#id_calon_santri")
							.append($("<option></option>")
								.attr("value", value['id_calon_santri'])
								.text(value['id_calon_santri'] + ":" + value['nama']));

					}
				});
			});
	}
	$("#btn-tambah-ruang").click(function () {
        $("#ModalLabel").text('Tambah User');
        $("#summit-tambah").text('Tambah');
		$("#id_wali_calon_santri").val('');
		$("#alamat").val('');
		// renderOptionJenisRuangan(0);
		$("#nama").val('');
		$("#email").val('');
	});

	// Insert Data
	$("#form-tambah-ruangan").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/WaliSantri/simpanData",
				data: formData
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
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
		var id_wali_calon_santri = $(this).attr('id_wali_calon_santri');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/WaliSantri/hapusData",
					data: {
						id_wali_calon_santri: id_wali_calon_santri
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
		var id_wali_calon_santri = $(this).attr('id_wali_calon_santri');
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/WaliSantri/getDataById",
				data: {
					id_wali_calon_santri: id_wali_calon_santri
				}
			})
			.done(function (msg) {
                // console.log("check1");
				console.log(msg);
                // console.log("check1");   
                var res = JSON.parse(msg);
				var id_calon_santri = res['id_calon_santri'];
				console.log(id_calon_santri);
				$("#id_wali_calon_santri").val(res['id_wali_calon_santri']);
				$("#id_calon_santri").val(id_calon_santri);
                $("#nama").val(res['nama']);
				// renderOptionJenisRuangan(id_calon_santri);
				$("#alamat").val(res['alamat']);
                $("#email").val(res['email']);
                $("#alamat").val(res['alamat']);
                $("#kota").val(res['kota']);
                $("#negara").val(res['negara']);
                $("#telepon").val(res['telepon']);
                $("#pekerjaan").val(res['pekerjaan']);
                $("#no_ktp").val(res['no_ktp']);
                $("#gender").val(res['gender']);
                $("#hubungan").val(res['hubungan'])

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Ruangan');
			});

	});
});

</script>
