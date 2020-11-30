<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | HOME</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>plugins/summernote/summernote-bs4.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url()?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url(); ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url(); ?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url(); ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-header">DATA UMUM SEKOLAH</li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-profile">
                <i class="fas fa-circle nav-icon"></i>
                <p>PROFILE</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-calon-santri">
                <i class="fas fa-circle nav-icon"></i>
                <p>Santri</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="login">
                <i class="fas fa-circle nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  KURIKULUM
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link" id="menu-kurikulum-2020">
                    <i class="far fa-circle nav-icon"></i>
                    <p>2020</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" id="menu-kurikulum-2015">
                    <i class="far fa-circle nav-icon"></i>
                    <p>2015</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" id="menu-kurikulum-2010">
                    <i class="far fa-circle nav-icon"></i>
                    <p>2010</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-ruangan">
                <i class="fas fa-circle nav-icon"></i>
                <p>Ruangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-asatidz">
                <i class="fas fa-circle nav-icon"></i>
                <p>Asatidz</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="bendahara">
                <i class="fas fa-circle nav-icon"></i>
                <p>Bendahara</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="berkas_upload">
                <i class="fas fa-circle nav-icon"></i>
                <p>Berkas Upload</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="operator">
                <i class="fas fa-circle nav-icon"></i>
                <p>Operator</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="pembayaran">
                <i class="fas fa-circle nav-icon"></i>
                <p>Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="role">
                <i class="fas fa-circle nav-icon"></i>
                <p>Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="user">
                <i class="fas fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="wali-calon-santri">
                <i class="fas fa-circle nav-icon"></i>
                <p>Wali Santri</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-jadwal-ujian">
                <i class="fas fa-circle nav-icon"></i>
                <p>Jadwal Ujian</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-jadwal-ujian-calon-santri">
                <i class="fas fa-circle nav-icon"></i>
                <p>Jadwal Ujian Santri</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" id="menu-hasil-kelulusan">
                <i class="fas fa-circle nav-icon"></i>
                <p>Hasil Kelulusan</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark" id="title-page">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content" id="main-content">
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.4
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="<?= base_url(); ?>plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="<?= base_url(); ?>plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="<?= base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <!-- <script src="<?= base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script> -->
  <!-- daterangepicker -->
  <!-- <script src="<?= base_url(); ?>plugins/moment/moment.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- Summernote -->
  <!-- <script src="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <!-- <script src="<?= base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?= base_url(); ?>dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url(); ?>dist/js/demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>

</html>

<script>
  $(document).ready(function() {
    $("#main-content").load("<?= base_url() ?>index.php/Profil/getProfilPage");
    // Handler for .ready() called.
    $("#menu-profile").click(function() {
      $("#title-page").text("PROFILE");
      $("#main-content").load("<?= base_url() ?>index.php/Profil/getProfilPage");
    });
    $("#menu-kurikulum-2020").click(function() {
      $("#title-page").html("<br>Kurikulum 2020</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Santri/kurikulum");
      // alert('Selamt')
    });
    $("#menu-kurikulum-2015").click(function() {
      $("#title-page").html("<br>Kurikulum 2015</br>")
      // alert('Selamt')
    });
    $("#menu-kurikulum-2010").click(function() {
      $("#title-page").html("<br>Kurikulum 2010</br>")
      // alert('Selamt')
    });
    $("#menu-ruangan").click(function() {
      $("#title-page").html("<br>Menu Ruangan</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Ruangan/index");
      // alert('Selamt')
    });
        
    $("#menu-asatidz").click(function(){
      $("#title-page").html("<br>Asatidz</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Asatidz/index");
    });
    
    $("#bendahara").click(function(){
      $("#title-page").html("<br>Bendahara</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Bendahara/index");
    });
    
    $("#berkas_upload").click(function(){
      $("#title-page").html("<br>Berkas Upload</br>");
      $("#main-content").load("<?= base_url() ?>index.php/berkasupload/index");
    });
    
    $("#operator").click(function(){
      $("#title-page").html("<br>Operator</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Operator/index");
    });
    
    $("#pembayaran").click(function(){
      $("#title-page").html("<br>Pembayaran</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Pembayaran/index");
    });

    $("#role").click(function(){
      $("#title-page").html("<br>Role</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Role/index");
    });
    
    $("#user").click(function(){
      $("#title-page").html("<br>User</br>");
      $("#main-content").load("<?= base_url() ?>index.php/User/index");
    });
    
    $("#wali-calon-santri").click(function(){
      $("#title-page").html("<br>Wali Santri</br>");
      $("#main-content").load("<?= base_url() ?>index.php/WaliSantri/index");
    });
    $("#menu-calon-santri").click(function() {
      $("#title-page").text("CALON SANTRI");
      $("#main-content").load("<?= base_url() ?>index.php/Santri/index");
    });
    $("#menu-jadwal-ujian").click(function() {
      $("#title-page").html("<br>Jadwal Ujian</br>");
      $("#main-content").load("<?= base_url() ?>index.php/JadwalUjian/index");
    });
    $("#menu-jadwal-ujian-calon-santri").click(function() {
      $("#title-page").html("<br>Jadwal Ujian Santri</br>");
      $("#main-content").load("<?= base_url() ?>index.php/JadwalUjianSantri/index");
    });
    $("#menu-hasil-kelulusan").click(function() {
      $("#title-page").html("<br>Hasil Kelulusan</br>");
      $("#main-content").load("<?= base_url() ?>index.php/HasilKelulusan/index");
    });
    $("#login").click(function() {
      $("#title-page").html("<br>Login</br>");
      $("#main-content").load("<?= base_url() ?>index.php/Login/index");
    });
  });
</script>