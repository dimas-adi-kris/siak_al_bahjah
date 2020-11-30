<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Jadwal Ujian</h3>
    <button id="btn-tambah-jadwal-ujian" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-form-jadwal-ujian"><i class="fa fa-plus-square" aria-hidden="true"></i> Jadwal Ujian</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

  </div>
  <!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->
<div class="modal fade" id="modal-form-jadwal-ujian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Form -->
        <form id="Login-User">
          <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
          </div>

          <button id="do_login" type="submit" class="btn btn-success">Login</button>
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


  });
</script>