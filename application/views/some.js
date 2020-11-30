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
				url: "<?= base_url() ?>index.php/Ruangan/getListRuangan",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				// $edit = '<button type="button" class="btn bg-gradient-success">Success</button>'
				// $hapus = '<button type="button" class="btn btn-hapus bg-gradient-danger">Danger</button>'
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_ruangan=' + res[i]['id_ruangan'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-ruangan"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_ruangan=' + res[i]['id_ruangan'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						i + 1,
						res[i]['kode_ruangan'],
						res[i]['nama_jenis_ruangan'],
						res[i]['kapasitas'],
						res[i]['lokasi'],
						$edit + $hapus,
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
				url: "<?= base_url() ?>index.php/Ruangan/getListJenisRuangan",
				data: {}
			})
			.done(function (msg) {
				var jenisRuangan = JSON.parse(msg);
				console.log(jenisRuangan);
				$.each(jenisRuangan, function (key, value) {
					// $("#id_jenis_ruangan")
					// 		.append($("<option selected='selected'></option>"))
					// 		.attr("value", value['id_jenis_ruangan'])
					//     .text(value['id_jenis_ruangan'] + ":" + value['nama']);
					if (currentValue == value['id_jenis_ruangan']) {
						$("#id_jenis_ruangan")
							.append($("<option selected='selected'></option>"))
							.attr("value", value['id_jenis_ruangan'])
							.text(value['id_jenis_ruangan'] + ":" + value['nama']);

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
		$("#kapasitas_ruang").val(0);
		$("#lokasi_ruang").val('');
	});

	// Insert Data
	$("#form-tambah-ruangan").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Ruangan/simpanData",
				data: formData
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				var data = res['data'];
				// console.log(data);

				if (res['status'] == 1 || res['status'] == "1") {
					alert("Data berhasil disimpan");
					$("#modal-form-tambah-ruangan").modal("hide");
					tabelListRuangan.row.add([
						0,
						data['kode_ruangan'],
						data['nama_jenis_ruangan'],
						data['kapasitas'],
						data['lokasi'],
						"edit hapus",
					]).draw(false);
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
					url: "<?=base_url()?>index.php/Ruangan/hapusData",
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
				url: "<?=base_url()?>index.php/Ruangan/getDataById",
				data: {
					id_ruangan: id_ruangan
				}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				var id_jenis_ruangan = res['id_jenis_ruangan'];
				var lokasi = res['lokasi'];
				console.log(id_jenis_ruangan);
				$("#id").val(res['id_ruangan']);
				$("#kode_ruangan").val(res['kode_ruangan']);
				renderOptionJenisRuangan(id_jenis_ruangan);
				$("#kapasitas_ruang").val(res['kapasitas']);
				$("#lokasi_ruang").val(lokasi);
			});

	});
});
