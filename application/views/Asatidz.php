<!-- Tampilkan Data Table Guru -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Guru</h3>
		<button id="btn-tambah-guru" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-guru"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Ruang</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-guru" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Lengkap</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<!-- <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>X</td>
          <td>Edit Hapus</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>Win 95+</td>
          <td>5</td>
          <td>C</td>
          <td>Edit Hapus</td>
        </tr> -->
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
<div class="modal fade" id="modal-form-tambah-guru" tabindex="-1" aria-labelledby="ModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel">Tambah Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Isi Form -->
				<form id="form-tambah-guru">
					<input type="text" id="id_guru" name="id_guru" hidden>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Jenis Kelamin</label>
						<select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin">
							<!-- Isi Option -->
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Telepon</label>
						<input type="text" class="form-control" id="telepon" name="telepon" placeholder="08XXXXXXX">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
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
	var tabelListGuru = $('#tabel-list-guru').DataTable({
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

	renderTabelListGuru();

	function renderTabelListGuru() {
		tabelListGuru.clear();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Asatidz/getListAsatidz",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				// $edit = '<button type="button" class="btn bg-gradient-success">Success</button>'
				// $hapus = '<button type="button" class="btn btn-hapus bg-gradient-danger">Danger</button>'
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_guru=' + res[i]['id_guru'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-guru"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_guru=' + res[i]['id_guru'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListGuru.row.add([
						i + 1,
						res[i]['nama_lengkap'],
						res[i]['nama_jenis_kelamin'],
						res[i]['telepon'],
						res[i]['alamat'],
						$edit + $hapus,
					]).draw(false);
				}
			});
	}


	function renderOptionJenisGuru(currentValue) {
		$("#id_jenis_kelamin")
			.empty()
			.append("<option selected='selected' value'0'>[pilih Jenis Kelamin]</option>");

		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Asatidz/getListJenisAsatidz",
				data: {}
			})
			.done(function (msg) {
				var jenisGuru = JSON.parse(msg);
				// console.log(jenisGuru);
				$.each(jenisGuru, function (key, value) {

					if (currentValue == value['id_jenis_kelamin']) {
						$("#id_jenis_kelamin")
							.append($("<option selected='selected'></option>")
							.attr("value", value['id_jenis_kelamin'])
							.text(value['id_jenis_kelamin'] + ":" + value['jenis_kelamin']));

					} else {
						$("#id_jenis_kelamin")
							.append($("<option></option>")
								.attr("value", value['id_jenis_kelamin'])
								.text(value['id_jenis_kelamin'] + ":" + value['jenis_kelamin']));

					}
				});
			});
	}
	$("#btn-tambah-guru").click(function () {
		$("#id").val('');
		$("#nama_lengkap").val('');
		renderOptionJenisGuru(0);
		$("#telepon").val(0);
		$("#alamat").val('');
	});

	// Insert Data
	$("#form-tambah-guru").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Asatidz/simpanData",
				data: formData
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
				var data = res['data'];
				// console.log(data);

				if (res['status'] == 1 || res['status'] == "1") {
					alert("Data berhasil disimpan");
					$("#modal-form-tambah-guru").modal("hide");
					renderTabelListGuru();
					// tabelListGuru.row.add([
					// 	0,
					// 	data['nama_lengkap'],
					// 	data['nama_jenis_kelamin'],
					// 	data['telepon'],
					// 	data['alamat'],
					// 	"edit hapus",
					// ]).draw(false);
				} else if (res['status'] == 0 || res['status'] == "0") {
					alert("Data tidak berhasil disimpan");
					$("#modal-form-tambah-guru").modal("hide");
				} else {
					console.log(msg);
				}
			});
	});

	$('#tabel-list-guru').on('click', '.btn-hapus', function () {
		var id_guru = $(this).attr('id_guru');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Asatidz/hapusData",
					data: {
						id_guru: id_guru
					}
				})
				.done(function (msg) {
					if (msg == 'true' || msg) {
						alert('data telah dihapus');
						renderTabelListGuru();
					} else {
						alert('data gagal dihapus, err', msg);
					}
				});
		}
	});

	$('#tabel-list-guru').on('click', '.btn-ubah', function () {
		var id_guru = $(this).attr('id_guru');
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/Asatidz/getDataById",
				data: {
					id_guru: id_guru
				}
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
				var id_jenis_kelamin = res['id_jenis_kelamin'];
				var alamat = res['alamat'];
				console.log(id_jenis_kelamin);
				$("#id_guru").val(res['id_guru']);
				$("#nama_lengkap").val(res['nama_lengkap']);
				renderOptionJenisGuru(id_jenis_kelamin);
				$("#telepon").val(res['telepon']);
				$("#alamat").val(alamat);

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Guru');
			});

	});
});

</script>
