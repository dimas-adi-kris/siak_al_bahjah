<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Ruangan</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-form-tambah-user"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah User</button>
		<button id="btn-tes-exist" type="button" class="btn btn-success float-right"><i class="fa fa-plus-square" aria-hidden="true"></i>TESEXIST</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>id_user</th>
					<th>id_role</th>
					<th>password</th>
					<th>email</th>
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
					<!-- <input type="hidden" id="id_user" name="id_user" value=""> -->
					<div class="form-group">
						<label for="exampleFormControlSelect1">id_user</label>
						<input type="text" class="form-control" id="id_user" name="id_user" >
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Role</label>
						<select class="form-control" id="id_role" name="id_role">
							<!-- Isi Option -->
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="1">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="AAABBB">
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
				"targets": 4
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
				url: "<?=base_url()?>index.php/User/getListTabelJoin",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_user=' + res[i]['id_user'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-user"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_user=' + res[i]['id_user'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						res[i]['id_user'],
						res[i]['id_role'],
						res[i]['password'],
						res[i]['email'],
						$edit + $hapus
					]).draw(false);
				}
			});
	}


	function renderOptionJenisRuangan(currentValue) {
		$("#id_role")
			.empty()
			.append("<option selected='selected' value'0'>[pilih jenis ruangan]</option>");

		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/User/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var jenisRuangan = JSON.parse(msg);
				console.log(jenisRuangan);
				$.each(jenisRuangan, function (key, value) {

					if (currentValue == value['id_role']) {
						$("#id_role")
							.append($("<option selected='selected'></option>")
							.attr("value", value['id_role'])
							.text(value['id_role'] + ":" + value['nama']));

					} else {
						$("#id_role")
							.append($("<option></option>")
								.attr("value", value['id_role'])
								.text(value['id_role'] + ":" + value['nama']));

					}
				});
			});
	}
	$("#btn-tambah-ruang").click(function () {
        $("#ModalLabel").text('Tambah User');
        $("#summit-tambah").text('Tambah');
		$("#id_user").val('');
		$("#password").val('');
		renderOptionJenisRuangan(0);
		$("#email").val('');
	});
	$("#btn-tes-exist").click(function () {
		$.ajax({
			method: "POST",
			url: "<?=base_url()?>index.php/User/tesExist",
			data: {}
		})
		.done(function (msg) {
			console.log(msg);
			var res = JSON.parse(msg);
			console.log(res);
		});
	});

	// Insert Data
	$("#form-tambah-ruangan").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$('#summit-tambah').each(function () {
			if ($(this).text() == 'Tambah') {
				// $("#summit-tambah").text('Ubah234');
				$.ajax({
						method: "POST",
						url: "<?=base_url()?>index.php/User/simpanData",
						data: formData
					})
					.done(function (msg) {
						console.log(msg);
						var res = JSON.parse(msg);
						var data = res['data'];
						console.log(data);

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

			}else if($(this).text() == 'Ubah') {
				// $("#summit-tambah").text('Ubah234');
				$.ajax({
						method: "POST",
						url: "<?=base_url()?>index.php/User/updateData",
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
			}else{
				alert("samting wong");
			}
		});
	});

	$('#tabel-list-ruangan').on('click', '.btn-hapus', function () {
		var id_user = $(this).attr('id_user');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/User/hapusData",
					data: {
						id_user: id_user
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
		var id_user = $(this).attr('id_user');
		console.log(id_user);
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/User/getDataById",
				data: {
					id_user: id_user
				}
			})
			.done(function (msg) {
                // console.log("check1");
				// console.log(msg);
                // console.log("check1");
                var res = JSON.parse(msg);
				var id_role = res['id_role'];
				// console.log(id_role);
				$("#id_user").val(res['id_user']);
				renderOptionJenisRuangan(id_role);
				$("#password").val(res['password']);
				$("#email").val(res['email']);

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Ruangan');
			});

	});
});

</script>
