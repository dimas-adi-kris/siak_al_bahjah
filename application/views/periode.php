<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Periode</h3>
    <button id="btn-tambah-periode" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form_periode"><i class="fa fa-plus-square" aria-hidden="true"></i> Periode</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabel-list-periode" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Periode</th>
          <th>ID Program</th>
          <th>Tanggal Buka</th>
          <th>Tanggal Tutup</th>
          <th>Tahun Ajaran Masehi</th>
          <th>Tahun Ajaran Hijriyah</th>
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
<div class="modal fade" id="modal_form_periode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-periode">
          <div class="form-group">
            <label for="exampleFormControlInput1">Program</label>
            <input type="hidden" class="form-control" id="id_periode" name="id_periode" value="">
            <select class="form-control" id="id_program" name="id_program">
              <!-- Isi Option -->
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Buka</label>
            <input type="text" class="form-control" id="tanggal_buka" name="tanggal_buka" placeholder="XX Bulan XXXX">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Tutup</label>
            <input type="text" class="form-control" id="tanggal_tutup" name="tanggal_tutup" placeholder="XX Bulan XXXX">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Tahun Ajaran Masehi</label>
            <input type="text" class="form-control" id="tahun_ajaran_masehi" name="tahun_ajaran_masehi" placeholder="XXXX">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tahun Ajaran Hijrizah</label>
            <input type="text" class="form-control" id="tahun_ajaran_hijriyah" name="tahun_ajaran_hijriyah" placeholder="XXXX">
          </div>

          <button id="submit-tambah" type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- Penutup Form -->
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>

<div class="modal fade" id="modal_form_periode_ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-ubah" id="exampleModalLabelUbah">Ubah Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="form-tambah-periode-ubah">
          <div class="form-group">
            <label for="exampleFormControlInput1">Program</label>
            <input type="hidden" class="form-control" id="id_periode_ubah" name="id_periode_ubah" value="">
            <select class="form-control" id="id_program_ubah" name="id_program_ubah">
              <!-- Isi Option -->
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Buka</label>
            <input type="text" class="form-control" id="tanggal_buka_ubah" name="tanggal_buka_ubah" placeholder="XX Bulan XXXX">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Tutup</label>
            <input type="text" class="form-control" id="tanggal_tutup_ubah" name="tanggal_tutup_ubah" placeholder="XX Bulan XXXX">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Tahun Ajaran Masehi</label>
            <input type="text" class="form-control" id="tahun_ajaran_masehi_ubah" name="tahun_ajaran_masehi_ubah" placeholder="XXXX">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tahun Ajaran Hijrizah</label>
            <input type="text" class="form-control" id="tahun_ajaran_hijriyah_ubah" name="tahun_ajaran_hijriyah_ubah" placeholder="XXXX">
          </div>

          <button id="submit-tambah-ubah" type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- Penutup Form -->
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    var tabelListPeriode = $('#tabel-list-periode').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    renderTabelListPeriode();

    function renderTabelListPeriode() {
      tabelListPeriode.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/Periode/getPeriode",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_periode_ubah" id_periode=' + res[i]['id_periode'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_periode=' + res[i]['id_periode'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tabelListPeriode.row.add([
              i + 1,
              res[i]['id_periode'],
              res[i]['id_program'],
              res[i]['tanggal_buka'],
              res[i]['tanggal_tutup'],
              res[i]['tahun_ajaran_masehi'],
              res[i]['tahun_ajaran_hijriyah'],
              btn_ubah + btn_hapus,
            ]).draw(false);
          }
        });
    }

    function renderOptionProgram(currentValue) {
      // console.log(currentValue);
      $('#id_program')
        .empty()
        .append("<option selected='selected' value'0'>[pilih program]</option>");
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/Periode/getProgram",
          data: {}
        })
        .done(function(msg) {
          var jenisRuangan = JSON.parse(msg);

          $.each(jenisRuangan, function(key, value) {
            if (currentValue == value['id_program']) {
              $("#id_program")
                .append($("<option selected='selected'></option>")
                  .attr("value", value['id_program'])
                  .text(value['id_program'] + ":" + value['nama']));
            } else {
              $("#id_program")
                .append($("<option></option>")
                  .attr("value", value['id_program'])
                  .text(value['id_program'] + ":" + value['nama']));
            }

          });
        });
    }

    function renderOptionProgramUbah(currentValue) {
      // console.log(currentValue);
      $('#id_program_ubah')
        .empty()
        .append("<option selected='selected' value='0'>[pilih program]</option>");
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/Periode/getProgram",
          data: {}
        })
        .done(function(msg) {
          var jenisRuangan = JSON.parse(msg);

          $.each(jenisRuangan, function(key, value) {
            if (currentValue == value['id_program']) {
              $("#id_program_ubah")
                .append($("<option selected='selected'></option>")
                  .attr("value", value['id_program'])
                  .text(value['id_program'] + ":" + value['nama']));
            } else {
              $("#id_program_ubah")
                .append($("<option></option>")
                  .attr("value", value['id_program'])
                  .text(value['id_program'] + ":" + value['nama']));
            }

          });
        });
    }


    $("#btn-tambah-periode").click(function() {
      $('#submit-tambah').html('Tambah');
      $('#exampleModalLabel').html('Tambah Data Periode');
      $('#id_periode').val('');
      // $('#id_program').val('');
      renderOptionProgram(0);
      // renderOptionJenisRuangan(0);
      $('#tanggal_buka').val('');
      $('#tanggal_tutup').val('');
      $('#tahun_ajaran_masehi').val('');
      $('#tahun_ajaran_hijriyah').val('');


    });

    // Tambah Data
    $("#form-tambah-periode").submit(function() {
      // alert('True');
      event.preventDefault();
      var formData = $(this).serialize();
      console.log(formData);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/Periode/tambahPeriode",
          data: formData
        })
        .done(function(msg) {
          console.log(msg);
          var res = JSON.parse(msg);
          var data = res['data'];
          // console.log(res);

          if (res['status'] == 1 || res['status'] == "1") {
            alert("Data berhasil disimpan");
            $("#modal_form_periode").modal("hide");

            renderTabelListPeriode();
          } else if (res['status'] == 0 || res['status'] == "0") {
            alert("Data tidak berhasil disimpan");
            $("#modal_form_periode").modal("hide");
          } else {
            console.log(msg);
          }
        });
    });

    // Hapus Data
    $('#tabel-list-periode').on('click', '.class_hapus_data', function() {
      var id_periode = $(this).attr('id_periode');
      // console.log(id_periode);
      if (confirm('Anda Yakin Menghapus Data')) {
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>index.php/Periode/hapusPeriode",
            data: {
              id_periode: id_periode
            }
          })
          .done(function(msg) {
            renderTabelListPeriode();
          });
      } else {
        alert('Data tidak bisa dihapus', msg);
      }
    });

    // Edit Data
    $('#tabel-list-periode').on('click', '.class_ubah_data', function() {
      $('#submit-tambah').html('Ubah');
      $('#exampleModalLabelUbah').html('Ubah Data Periode');
      var id_periode = $(this).attr('id_periode');
      // console.log(id_periode);

      $.ajax({
          method: "POST",
          url: '<?= base_url() ?>index.php/Periode/getPeriodeById',
          data: {
            id_periode: id_periode
          }
        })
        .done(function(msg) {
          var data = JSON.parse(msg);
          console.log(data);
          var id_program = data['id_program'];
          console.log(id_program);
          // INPUT DATA
          $("#id_periode_ubah").val(data['id_periode']);
          // $("#id_program_ubah").val(data['id_program']);
          renderOptionProgramUbah(id_program);
          $("#tanggal_buka_ubah").val(data['tanggal_buka']);
          $("#tanggal_tutup_ubah").val(data['tanggal_tutup']);
          $("#tahun_ajaran_masehi_ubah").val(data['tahun_ajaran_masehi']);
          $("#tahun_ajaran_hijriyah_ubah").val(data['tahun_ajaran_hijriyah']);
          $("#form-tambah-periode-ubah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/Periode/updatePeriode",
                data: formData
              })
              .done(function(msg) {
                // console.log("TES::" + msg);
                var res = JSON.parse(msg);
                var data = res['data'];

                if (res['status'] == 1 || res['status'] == "1") {
                  alert("Data berhasil diubah");
                  $("#modal_form_periode_ubah").modal("hide");
                  renderTabelListPeriode();
                } else if (res['status'] == 0 || res['status'] == "0") {
                  alert("Data tidak berhasil disimpan");
                  $("#modal_form_periode_ubah").modal("hide");
                } else {
                  console.log(msg);
                }
              });
          });
        });
    });

  });
</script>