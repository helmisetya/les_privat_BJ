<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Les Privat Baitul Jannah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte//bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/bower_components/Ionicons/css/ionicons.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/dist/css/skins/_all-skins.min.css' ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>ES</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Les Privat Baitul Jannah</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/admin_lte/user_blue.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata("username"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/admin_lte/user_blue.png') ?>" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/login/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin_lte/user_blue.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("username"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <br>
      <ul class="sidebar-menu" data-widget="tree">
      <li>
          <a href="<?php echo base_url('index.php/beranda/pengajar'); ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>

          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/data_diri/profil_pgjr'); ?>">
            <i class="fa fa-user"></i> <span>Data Diri</span>

          </a>
        </li>
        <li  class="active">
          <a href="<?php echo base_url('index.php/pesan/permintaan_les'); ?>">
            <i class="fa fa-hand-paper-o"></i> <span>Permintaan Les</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/jadwal/jadwal_ngajar'); ?>">
            <i class="fa fa-calendar"></i> <span>Jadwal Mengajar</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/pertemuan/daftar_pertemuan'); ?>">
            <i class="fa fa-tasks"></i> <span>Isi Pertemuan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/Pertemuan/laporan_pertemuan_pgjr'); ?>">
            <i class="fa fa-tasks"></i> <span>Laporan Pertemuan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/ganti_jadwal/jadwal_ngajar'); ?>">
            <i class="fa fa-exchange"></i> <span>Ganti Jadwal Mengajar</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pesanan

      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Ambil Pesanan</h3>
        <?php
                if ($pesan=$this->session->flashdata('pesan')){
                echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Selamat</h4>".$pesan."</div>";
            }
          ?>
        </div>
        <?php echo form_open('pesan/simpan_ambil_pesanan','class="form-horizontal"');?>
        <div class="box-body">
        <input type="hidden" class="form-control" name="id_pengajar"  value="<?php echo $data_pengajar->id_pengajar; ?>">

        <input type="hidden"  class="form-control" name="nama_pengajar"  value="<?php echo $data_pengajar->nama; ?>">

        <input type="hidden"  class="form-control" name="id_pesan" value="<?php echo $data_pemesan->id_pesan; ?>">

        <input type="hidden" class="form-control" name="id_konsumen" value="<?php echo $data_pemesan->id_konsumen; ?>">


          <div class="form-group">
            <label for="Nama" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="nama" placeholder="Masukkan Nama anda" value="<?php echo $data_pemesan->nama; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Nama" class="col-sm-2 control-label">Materi</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="materi" placeholder="Masukkan Nama anda" value="<?php echo $data_pemesan->materi; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Nama" class="col-sm-2 control-label">Hari</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="hari" placeholder="Masukkan Nama anda" value="<?php echo $data_pemesan->hari; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Nama" class="col-sm-2 control-label">Jam</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="waktu" placeholder="Masukkan Nama anda" value="<?php echo $data_pemesan->jam; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Nama" class="col-sm-2 control-label">Tempat</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="tempat" placeholder="Masukkan Nama anda" value="<?php echo $data_pemesan->tempat_pertemuan; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <input type="checkbox" name="status" aria-describedby="emailHelp" value="Sudah terambil" > Saya bersedia mengambil les ini
                <?php echo form_error('status'); ?>
              </div>
            </div>

        <div class="form-group">

          <label class="col-sm-2 control-label">Tanggal Ambil</label>
          <div class="col-sm-10">
          <input type="date" readonly class="form-control" value="<?php echo tanggal(); ?>" name="tgl_ambil"  >
        </div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <div class="box-footer">

          <button type="submit" class="btn btn-info pull-right">Ambil</button>
      </div>
      <?php echo form_close(); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Helmi Setya</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/admin_lte/bower_components/jquery/dist/jquery.min.js' ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/admin_lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/admin_lte/bower_components/fastclick/lib/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/admin_lte/dist/js/adminlte.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/admin_lte/ist/js/demo.js' ?>"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
