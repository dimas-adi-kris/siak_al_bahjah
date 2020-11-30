<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">

            <!-- Profile Image -->

            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">INFO UMUM</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Nama Lengkap Sekolah</strong>

                    <p class="text-muted" id="label_nama_lengkap_sekolah">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Singkatan</strong>

                    <p class="text-muted" id="label_nama_singkatan">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Alamat</strong>

                    <p class="text-muted" id="label_alamat">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore possimus dolore voluptatem consectetur vel libero architecto voluptatibus sit ad quis?
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i>Telepon</strong>

                    <p class="text-muted" id="label_telepon">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i>Email</strong>

                    <p class="text-muted" id="label_email">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

                    <hr>
                    <button type="button" id="btn_ubah" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_info_sekolah">Edit</button>
                </div>

                <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
        <div class="col-md-7">

            <!-- Profile Image -->

            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kompetensi Umum</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Bahasa Pemrograman</strong>

                    <p class="text-muted">
                        <li><span class="tag tag-danger">UI Design</span></li>
                        <li><span class="tag tag-success">Coding</span></li>
                        <li><span class="tag tag-info">Javascript</span></li>
                        <li><span class="tag tag-warning">PHP</span></li>
                        <li><span class="tag tag-primary">Node.js</span></li>
                    </p>

                    <hr>


                    <strong><i class="fas fa-pencil-alt mr-1"></i> Sertifikasi</strong>

                    <p class="text-muted">
                        <li><span class="tag tag-danger">CCNA</span></li>
                        <li><span class="tag tag-success">CEH</span></li>
                        <li><span class="tag tag-info">Management Trainie</span></li>
                        <li><span class="tag tag-warning">Statistik</span></li>
                        <li><span class="tag tag-primary">Data Science</span></li>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
<!-- </section> -->
<!-- /.content -->
<div class="modal fade" id="modal_form_info_sekolah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_info_sekolah">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Sekolah</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="SMA" required>
                    </div>
                    <div class="form-group">
                        <label for="singkatan">Singkatan</label>
                        <input type="hidden" id="id" name="id" class="form-control">
                        <input type="text" id="singkatan" name="singkatan" class="form-control" placeholder="SMAIQ">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input type="text" id="telepon" name="telepon" class="form-control" placeholder="081XXXXXXXXXX">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-outline-light">SIMPAN PERUBAHAN</button>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">TUTUP</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function() {
        $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/Profil/getDataProfil/1",
                data: {}
            })
            .done(function(msg) {
                var sekolah = JSON.parse(msg);
                // alert(msg);
                // console.log(sekolah);
                // console.log(msg);
                // Menampilkan data pada Dashboard dan Profile
                $("#label_nama_lengkap_sekolah").html(sekolah['nama_lengkap']);
                $("#label_nama_singkatan").html(sekolah['singkatan']);
                $("#label_alamat").html(sekolah['alamat']);
                $("#label_telepon").html(sekolah['telepon']);
                $("#label_email").html(sekolah['email']),
                    // Menampilkan data pada form
                    // val digunakan untuk input
                    $("#id").val(sekolah['id']);
                $("#nama_lengkap").val(sekolah['nama_lengkap']);
                $("#singkatan").val(sekolah['singkatan']);
                $("#alamat").text(sekolah['alamat']);
                $("#telepon").val(sekolah['telepon']);
                $("#email").val(sekolah['email'])
            });

        $("#form_info_sekolah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>index.php/Profil/simpanDataProfil",
                    data: formData
                })
                .done(function(msg) {
                    console.log(msg);
                    var res = JSON.parse(msg);
                    var sekolah = res['sekolah'];

                    if (res['status'] == 1 || res['status'] == "1") {
                        alert("Data berhasil disimpan");
                        $("#modal_form_info_sekolah").modal("hide");
                        $("#label_nama_lengkap_sekolah").html(sekolah['nama_lengkap']);
                        $("#label_nama_singkatan").html(sekolah['singkatan']);
                        $("#label_alamat").html(sekolah['alamat']);
                        $("#label_telepon").html(sekolah['telepon']);
                        $("#label_email").html(sekolah['email'])
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form_info_sekolah").modal("hide");
                    } else {
                        console.log(msg);
                    }
                });

        });

        $("#btn_ubah").click(function() {
            var id = $("#id").val();
            console.log(id);
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>index.php/Profil/simpanIDSekolahSession",
                    data: {
                        id: id
                    }
                })
                .done(function(msg) {
                    console.log(msg);
                });
        });


    });
</script>