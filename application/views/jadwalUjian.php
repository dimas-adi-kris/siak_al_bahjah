<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Jadwal Ujian</h3>
    <button id="btn-tambah-jadwal-ujian" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-form-jadwal-ujian"><i class="fa fa-plus-square" aria-hidden="true"></i> Jadwal Ujian</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabel-list-jadwal-ujian" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Jadwal Ujian</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Lokasi</th>
          <th>Keterangan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
        </tr> -->
      </tbody>
      <!-- <tfoot>
            
                </tfoot> -->
    </table>
  </div>
  <!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->
<div class="modal fade" id="modal-form-jadwal-ujian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-jadwal-ujian">
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Ujian</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Waktu</label>
            <input type="text" class="form-control" id="waktu" name="waktu" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="" placeholder="ABCXXX">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="" placeholder="ABCXXX">
          </div>
          <button id="submit-tambah-jadwal-ujian" type="submit" class="btn btn-success">Tambah</button>
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

<div class="modal fade" id="modal-form-jadwal-ujian-ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-ubah" id="exampleModalLabel-ubah">Ubah Jadwal Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-jadwal-ujian-ubah">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id-jadwal-ujian-ubah" name="id-jadwal-ujian-ubah" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Ujian</label>
            <input type="text" class="form-control" id="tanggal-ubah" name="tanggal-ubah" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Waktu</label>
            <input type="text" class="form-control" id="waktu-ubah" name="waktu-ubah" value="">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Lokasi</label>
            <input type="text" class="form-control" id="lokasi-ubah" name="lokasi-ubah" value="" placeholder="ABCXXX">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" class="form-control" id="keterangan-ubah" name="keterangan-ubah" value="" placeholder="ABCXXX">
          </div>
          <button id="submit-tambah-jadwal-ujian-ubah" type="submit" class="btn btn-success">Ubah</button>
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
    var tabelListJadwalUjian = $('#tabel-list-jadwal-ujian').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    renderTabelJadwalUjian();

    function renderTabelJadwalUjian() {
      tabelListJadwalUjian.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/JadwalUjian/getJadwalUjian",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          // console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" data-toggle="modal" data-target="#modal-form-jadwal-ujian-ubah" id_jadwal_ujian=' + res[i]['id_jadwal_ujian'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_jadwal_ujian=' + res[i]['id_jadwal_ujian'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tabelListJadwalUjian.row.add([
              i + 1,
              res[i]['id_jadwal_ujian'],
              res[i]['tanggal'],
              res[i]['waktu'],
              res[i]['lokasi'],
              res[i]['keterangan'],
              btn_ubah + btn_hapus,
            ]).draw(false);
          }
        });
    }

    // CREATE
    $('#btn-tambah-jadwal-ujian').click(function() {
      $('#submit-tambah-jadwal-ujian').html('Tambah');
      $('#exampleModalLabel').html('Tambah Data Jadwal Ujian');
      $('#tanggal').val('');
      $('#waktu').val('');
      $('#lokasi').val('');
      $('#keterangan').val('');
    })

    $("#form-tambah-jadwal-ujian").submit(function() {
      // alert('True');
      event.preventDefault();
      var formData = $(this).serialize();
      // console.log(formData);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/JadwalUjian/tambahJadwalUjian",
          data: formData
        })
        .done(function(msg) {
          // console.log(msg);
          var res = JSON.parse(msg);
          var data = res['data'];
          // console.log(res);

          if (res['status'] == 1 || res['status'] == "1") {
            alert("Data berhasil ditambahkan");
            $("#modal-form-jadwal-ujian").modal("hide");

            renderTabelJadwalUjian();
          } else if (res['status'] == 0 || res['status'] == "0") {
            alert("Data tidak berhasil ditambahkan");
            $("#modal-form-jadwal-ujian").modal("hide");
          } else {
            console.log(msg);
          }
        });
    });

    // DELETE
    $('#tabel-list-jadwal-ujian').on('click', '.class_hapus_data', function() {
      var id_jadwal_ujian = $(this).attr('id_jadwal_ujian');
      // console.log(id_program);
      if (confirm('Anda Yakin Menghapus Data')) {

        $.ajax({
            method: "POST",
            url: `<?= base_url() ?>index.php/JadwalUjian/hapusJadwalUjian`,
            data: {
              id_jadwal_ujian: id_jadwal_ujian
            }
          })
          .done(function(msg) {
            renderTabelJadwalUjian();
          });
      } else {
        alert('Data tidak bisa dihapus', msg);
      }
    });
    // END DELETE

    // EDIT
    $('#tabel-list-jadwal-ujian').on('click', '.class_ubah_data', function() {
      var id_jadwal_ujian = $(this).attr('id_jadwal_ujian');
      // console.log(id_jadwal_ujian);
      $('#submit-tambah-jadwal-ujian-ubah').html('Ubah');
      $('#exampleModalLabel-ubah').html('Ubah Jadwal Ujian');

      $.ajax({
          method: "POST",
          url: '<?= base_url() ?>index.php/JadwalUjian/getJadwalUjianById',
          data: {
            id_jadwal_ujian: id_jadwal_ujian
          }
        })
        .done(function(msg) {
          var data = JSON.parse(msg);
          console.log(data);
          // INPUT DATA
          $("#id-jadwal-ujian-ubah").val(data['id_jadwal_ujian']);
          $("#tanggal-ubah").val(data['tanggal']);
          $("#waktu-ubah").val(data['waktu']);
          $("#lokasi-ubah").val(data['lokasi']);
          $("#keterangan-ubah").val(data['keterangan']);
          $("#form-tambah-jadwal-ujian-ubah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/JadwalUjian/updateJadwalUjian",
                data: formData
              })
              .done(function(msg) {
                // console.log("TES::" + msg);
                var res = JSON.parse(msg);
                var data = res['data'];

                if (res['status'] == 1 || res['status'] == "1") {
                  alert("Data berhasil diubah");
                  $("#modal-form-jadwal-ujian-ubah").modal("hide");
                  renderTabelProgram();
                } else if (res['status'] == 0 || res['status'] == "0") {
                  alert("Data tidak berhasil disimpan");
                  $("#modal-form-jadwal-ujian-ubah").modal("hide");
                } else {
                  console.log(msg);
                }
              });
          });
        });
    });
    // END EDIt

  });
</script>