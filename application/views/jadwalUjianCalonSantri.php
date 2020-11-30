<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Jadwal Ujian Santri</h3>
    <button id="btn-tambah-jadwal-ujian-calon-santri" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form_jadwal_ujian_calon_santri"><i class="fa fa-plus-square" aria-hidden="true"></i> Jadwal Ujian Santri</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabel-list-jadwal-ujian-calon-santri" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Jadwal Ujian Santri</th>
          <th>ID Santri</th>
          <th>ID Jadwal Ujian</th>
          <th>Status Persetujuan</th>
          <th>Tanggal Setuju</th>
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
<div class="modal fade" id="modal_form_jadwal_ujian_calon_santri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Ujian Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-jadwal-ujian-calon-santri">
          <div class="form-group">
            <label for="exampleFormControlInput1">ID Santri</label>
            <input type="text" class="form-control" id="id_calon_santri" name="id_calon_santri" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">ID Jadwal Ujian</label>
            <input type="text" class="form-control" id="id_jadwal_ujian" name="id_jadwal_ujian" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Status Persetujuan</label>
            <select class="form-control" id="status_persetujuan" name="status_persetujuan">
              <option value="SETUJU">SETUJU</option>
              <option value="BELUM SETUJU">BELUM SETUJU</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Persetujuan</label>
            <input type="text" class="form-control" id="tanggal_persetujuan" name="tanggal_persetujuan" value="">
          </div>

          <button id="submit-tambah" type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- Penutup Form -->
    </div>
    <div class="modal-footer">
      <!-- <button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button> -->
    </div>
  </div>
</div>

<div class="modal fade" id="modal_form_jadwal_ujian_calon_santri_ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Jadwal Ujian Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-jadwal-ujian-calon-santri-ubah">
          <div class="form-group">
            <label for="exampleFormControlInput1">ID Santri</label>
            <input type="hidden" class="form-control" id="id_jadwal_ujian_calon_santri_ubah" name="id_jadwal_ujian_calon_santri_ubah" value="">
            <input type="text" class="form-control" id="id_calon_santri_ubah" name="id_calon_santri_ubah" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">ID Jadwal Ujian</label>
            <input type="text" class="form-control" id="id_jadwal_ujian_ubah" name="id_jadwal_ujian_ubah" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Status Persetujuan</label>
            <select class="form-control" id="status_persetujuan_ubah" name="status_persetujuan_ubah">
              <option value="SETUJU">SETUJU</option>
              <option value="BELUM SETUJU">BELUM SETUJU</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Persetujuan</label>
            <input type="text" class="form-control" id="tanggal_persetujuan_ubah" name="tanggal_persetujuan_ubah" value="">
          </div>

          <button id="submit-tambah-ubah" type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- Penutup Form -->
    </div>
    <div class="modal-footer">
      <!-- <button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button> -->
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    var tableJadwalUjianSantri = $('#tabel-list-jadwal-ujian-calon-santri').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    renderTableListJadwalUjianSantri();

    function renderTableListJadwalUjianSantri() {
      tableJadwalUjianSantri.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/JadwalUjianSantri/getJadwalUjianSantri",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          // console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_jadwal_ujian_calon_santri_ubah" id_jadwal_ujian_calon_santri=' + res[i]['id_jadwal_ujian_calon_santri'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_jadwal_ujian_calon_santri=' + res[i]['id_jadwal_ujian_calon_santri'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tableJadwalUjianSantri.row.add([
              i + 1,
              res[i]['id_jadwal_ujian_calon_santri'],
              res[i]['id_calon_santri'],
              res[i]['id_jadwal_ujian'],
              res[i]['status_persetujuan'],
              res[i]['tanggal_setuju'],
              btn_ubah + btn_hapus,
            ]).draw(false);
          }
        });
    }

    $("#btn-tambah-jadwal-ujian-calon-santri").click(function() {
      $('#submit-tambah').html('Tambah');
      $('#exampleModalLabel').html('Tambah Jadwal Ujian Santri');
      $('#id_calon_santri').val('');
      $('#id_jadwal_ujian').val('');
      $('#status_persetujuan').val('');
      $('#tanggal_persetujuan').val('');


    });

    // Insert Data
    $("#form-tambah-jadwal-ujian-calon-santri").submit(function() {
      // alert('True');
      event.preventDefault();
      var formData = $(this).serialize();
      console.log(formData);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/JadwalUjianSantri/tambahJadwalUjianSantri",
          data: formData
        })
        .done(function(msg) {
          console.log(msg);
          var res = JSON.parse(msg);
          var data = res['data'];
          console.log(res);

          if (res['status'] == 1 || res['status'] == "1") {
            alert("Data berhasil disimpan");
            $("#modal_form_jadwal_ujian_calon_santri").modal("hide");

            renderTableListJadwalUjianSantri();
          } else if (res['status'] == 0 || res['status'] == "0") {
            alert("Data tidak berhasil disimpan");
            $("#modal_form_jadwal_ujian_calon_santri").modal("hide");
          } else {
            console.log(msg);
          }
        });
    });

    // Hapus Data
    $('#tabel-list-jadwal-ujian-calon-santri').on('click', '.class_hapus_data', function() {
      var id_jadwal_ujian_calon_santri = $(this).attr('id_jadwal_ujian_calon_santri');
      // console.log(id_ruangan);
      // alert('Test');
      if (confirm('Anda Yakin Menghapus Data')) {
        // alert('Iya');
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>index.php/JadwalUjianSantri/hapusJadwalUjianSantri",
            data: {
              id_jadwal_ujian_calon_santri: id_jadwal_ujian_calon_santri
            }
          })
          .done(function(msg) {
            renderTableListJadwalUjianSantri();
          });
      } else {
        alert('Data tidak bisa dihapus', msg);
      }
    });

    // Edit Data
    $('#tabel-list-jadwal-ujian-calon-santri').on('click', '.class_ubah_data', function() {
      $('#submit-tambah-ubah').html('Ubah');
      $('#exampleModalLabel').html('Ubah Data Ruangan');
      var id_jadwal_ujian_calon_santri = $(this).attr('id_jadwal_ujian_calon_santri');
      // console.log(id_jadwal_ujian_calon_santri);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/JadwalUjianSantri/getJadwalUjianSantriById",
          data: {
            id_jadwal_ujian_calon_santri: id_jadwal_ujian_calon_santri
          }
        })
        .done(function(msg) {
          var data = JSON.parse(msg);
          console.log(data);
          var id_jadwal_ujian_calon_santri = data['id_jadwal_ujian_calon_santri'];
          console.log(id_jadwal_ujian_calon_santri);
          // INPUT DATA
          $("#id_jadwal_ujian_calon_santri_ubah").val(data['id_jadwal_ujian_calon_santri']);
          // $("#id_program_ubah").val(data['id_program']);
          // renderOptionProgramUbah(id_program);
          $("#id_calon_santri_ubah").val(data['id_calon_santri']);
          $("#id_jadwal_ujian_ubah").val(data['id_jadwal_ujian']);
          $("#status_persetujuan_ubah").val(data['status_persetujuan']);
          $("#tanggal_persetujuan_ubah").val(data['tanggal_setuju']);
          $("#form-tambah-jadwal-ujian-calon-santri-ubah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/JadwalUjianSantri/updateJadwalUjianSantri",
                data: formData
              })
              .done(function(msg) {
                // console.log("TES::" + msg);
                var res = JSON.parse(msg);
                var data = res['data'];

                if (res['status'] == 1 || res['status'] == "1") {
                  alert("Data berhasil diubah");
                  $("#modal_form_jadwal_ujian_calon_santri_ubah").modal("hide");
                  renderTableListJadwalUjianSantri();
                } else if (res['status'] == 0 || res['status'] == "0") {
                  alert("Data tidak berhasil disimpan");
                  $("#modal_form_jadwal_ujian_calon_santri_ubah").modal("hide");
                } else {
                  console.log(msg);
                }
              });
          });
        });
    });

  });
</script>