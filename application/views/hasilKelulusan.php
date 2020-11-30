<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Hasil Kelulusan</h3>
    <button id="btn-tambah-hasil-kelulusan" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form_hasil_kelulusan"><i class="fa fa-plus-square" aria-hidden="true"></i> Kelulusan</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabel-list-hasil-kelulusan" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Hasil Kelulusan</th>
          <th>ID calon Santri</th>
          <th>Tanggal Kelulusan</th>
          <th>Status Lulus</th>
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
<div class="modal fade" id="modal_form_hasil_kelulusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Hasil Kelulusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-hasil-kelulusan">
          <div class="form-group">
            <label for="exampleFormControlInput1">ID Santri</label>
            <input type="hidden" class="form-control" id="id_hasil_kelulusan" name="id_hasil_kelulusan" value="">
            <input type="number" class="form-control" id="id_calon_santri" name="id_calon_santri">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Kelulusan</label>
            <input type="text" class="form-control" id="tanggal_kelulusan" name="tanggal_kelulusan">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Status Lulus</label>
            <select class="form-control" id="status_lulus" name="status_lulus">
              <option value="DITERIMA">DITERIMA</option>
              <option value="BELUM DITERIMA">BELUM DITERIMA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
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

<div class="modal fade" id="modal_form_hasil_kelulusan_ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Hasil Kelulusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-hasil-kelulusan-ubah">
          <div class="form-group">
            <label for="exampleFormControlInput1">ID Santri</label>
            <input type="hidden" class="form-control" id="id_hasil_kelulusan_ubah" name="id_hasil_kelulusan_ubah" value="">
            <input type="number" class="form-control" id="id_calon_santri_ubah" name="id_calon_santri_ubah">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Kelulusan</label>
            <input type="text" class="form-control" id="tanggal_kelulusan_ubah" name="tanggal_kelulusan_ubah">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Status Lulus</label>
            <select class="form-control" id="status_lulus_ubah" name="status_lulus_ubah">
              <option value="DITERIMA">DITERIMA</option>
              <option value="BELUM DITERIMA">BELUM DITERIMA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" class="form-control" id="keterangan_ubah" name="keterangan_ubah">
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
    var tabelListHasilKelulusan = $('#tabel-list-hasil-kelulusan').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    renderTabelListHasilKelulusan();

    function renderTabelListHasilKelulusan() {
      tabelListHasilKelulusan.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/HasilKelulusan/getHasilKelulusan",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          // console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_hasil_kelulusan_ubah" id_hasil_kelulusan_ubah=' + res[i]['id_hasil_kelulusan'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_hasil_kelulusan=' + res[i]['id_hasil_kelulusan'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tabelListHasilKelulusan.row.add([
              i + 1,
              res[i]['id_hasil_kelulusan'],
              res[i]['id_calon_santri'],
              res[i]['tanggal_kelulusan'],
              res[i]['status_lulus'],
              res[i]['keterangan'],
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
        .done(function(msg) {
          var jenisRuangan = JSON.parse(msg);

          $.each(jenisRuangan, function(key, value) {
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

    $("#btn-tambah-hasil-kelulusan").click(function() {
      $('#submit-tambah').html('Tambah');
      $('#exampleModalLabel').html('Tambah Data Hasil Kelulusan');


      $('#id_calon_santri').val('');
      $('#tanggal_kelulusan').val('');
      $('#status_lulus').val('');
      $('#keterangan').val('');


    });

    // Insert Data
    $("#form-tambah-hasil-kelulusan").submit(function() {
      // alert('True');
      event.preventDefault();
      var formData = $(this).serialize();
      console.log(formData);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/HasilKelulusan/tambahHasilKelulusan",
          data: formData
        })
        .done(function(msg) {
          console.log(msg);
          var res = JSON.parse(msg);
          var data = res['data'];
          // console.log(res);

          if (res['status'] == 1 || res['status'] == "1") {
            alert("Data berhasil disimpan");
            $("#modal_form_hasil_kelulusan").modal("hide");

            renderTabelListHasilKelulusan();
          } else if (res['status'] == 0 || res['status'] == "0") {
            alert("Data tidak berhasil disimpan");
            $("#modal_form_hasil_kelulusan").modal("hide");
          } else {
            console.log(msg);
          }
        });
    });

    // Hapus Data
    $('#tabel-list-hasil-kelulusan').on('click', '.class_hapus_data', function() {
      var id_hasil_kelulusan = $(this).attr('id_hasil_kelulusan');
      // console.log(id_hasil_kelulusan);
      // alert('Test');
      if (confirm('Anda Yakin Menghapus Data')) {
        // alert('Iya');
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>index.php/HasilKelulusan/hapusHasilKelulusan",
            data: {
              id_hasil_kelulusan: id_hasil_kelulusan
            }
          })
          .done(function(msg) {
            renderTabelListHasilKelulusan();
          });
      } else {
        alert('Data tidak bisa dihapus', msg);
      }
    });

    // Edit Data
    $('#tabel-list-hasil-kelulusan').on('click', '.class_ubah_data', function() {
      $('#submit-tambah-ubah').html('Ubah');
      $('#exampleModalLabel').html('Ubah Data Hasil Kelulusan');
      var id_hasil_kelulusan = $(this).attr('id_hasil_kelulusan_ubah');
      console.log(id_hasil_kelulusan);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/HasilKelulusan/getHasilKelulusanById",
          data: {
            id_hasil_kelulusan: id_hasil_kelulusan
          }
        })
        .done(function(msg) {
          var data = JSON.parse(msg);
          console.log(data);

          // INPUT DATA
          $("#id_calon_santri_ubah").val(data['id_calon_santri']);
          $("#id_hasil_kelulusan_ubah").val(data['id_hasil_kelulusan']);
          // renderOptionProgramUbah(id_program);
          $("#tanggal_kelulusan_ubah").val(data['tanggal_kelulusan']);
          $("#status_lulus_ubah").val(data['status_lulus']);
          $("#keterangan_ubah").val(data['keterangan']);
          $("#form-tambah-hasil-kelulusan-ubah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/HasilKelulusan/updateHasilKelulusan",
                data: formData
              })
              .done(function(msg) {
                // console.log("TES::" + msg);
                var res = JSON.parse(msg);
                var data = res['data'];

                if (res['status'] == 1 || res['status'] == "1") {
                  alert("Data berhasil diubah");
                  $("#modal_form_hasil_kelulusan_ubah").modal("hide");
                  renderTabelListHasilKelulusan();
                } else if (res['status'] == 0 || res['status'] == "0") {
                  alert("Data tidak berhasil disimpan");
                  $("#modal_form_hasil_kelulusan_ubah").modal("hide");
                } else {
                  console.log(msg);
                }
              });

          });
        });
    });

  });
</script>