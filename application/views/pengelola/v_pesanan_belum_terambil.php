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
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ?>">
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
      <li >
          <a href="<?php echo base_url('index.php/beranda/pengelola'); ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>

          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Permintaan Les</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/penugasan/pesanan_terambil'); ?>"><i class="fa fa-circle-o"></i>Sudah Terambil</a></li>
            <li><a href="<?php echo base_url('index.php/Penugasan/pesanan_belum_terambil'); ?>"><i class="fa fa-circle-o"></i>Belum Terambil</a></li>

          </ul>
        </li>

        <li>
          <a href="<?php echo base_url('index.php/ganti_jadwal/daftar_minta_ganti_les'); ?>">
            <i class="fa fa-calendar"></i> <span>Pergantian Jadwal Les</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/ganti_jadwal/daftar_minta_ganti_ngajar'); ?>">
            <i class="fa fa-tasks"></i> <span>Pergantian Jadwal Mengajar</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/master/daftar_pgjr'); ?>"><i class="fa fa-circle-o"></i>Pengajar</a></li>
            <li><a href="<?php echo base_url('index.php/Master/daftar_kons'); ?>"><i class="fa fa-circle-o"></i>Konsumen</a></li>
            <li><a href="<?php echo base_url('index.php/Master/daftar_penugasan'); ?>"><i class="fa fa-circle-o"></i>Penugasan</a></li>

          </ul>
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
        Permintaan Les

      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

        <?php
                if ($pesan=$this->session->flashdata('pesan')){
                echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Selamat</h4>".$pesan."</div>";
            }
             ?>
        </div>
        <div class="box-body">
          <h3>Daftar Pesanan Belum Terambil</h3>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Id Pesanan</th>
                  <th>Nama</th>
                  <th>Materi</th>
                  <th>Hari</th>
                  <th>Waktu</th>
                  <th>Tempat pertemuan</th>
                  <th>Tanggal Pesan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $a=1;
                  foreach ($pesanan_belum as $b ) { ?>
                  <tr>
                      <td><?php echo $a; ?></td>
                      <td><?php echo $b->id_pesan; ?></td>
                      <td><?php echo $b->nama; ?></td>
                      <td><?php echo $b->materi;  ?></td>
                      <td><?php echo $b->hari;  ?></td>
                      <td><?php echo $b->jam; ?></td>
                      <td><?php echo $b->tempat_pertemuan; ?></td>
                      <td><?php echo $b->tgl_pesan; ?></td>
                      <td><?php echo $b->status;  ?></td>
                      <td><?php echo '<a class="btn btn-info" href="'.base_url().'index.php/penugasan/entri_penugasan/'.$b->id_pesan.'">Detail</a>'?></td>
                    </tr>
                  <?php $a++; ?>
                <?php  } ?>
                 </tbody>
              </table>
          </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
<script src="<?php echo base_url().'assets/admin_lte/bower_components/datatables.net/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/admin_lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js' ?>"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
</body>
</html>
