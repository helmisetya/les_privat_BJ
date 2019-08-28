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
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_lte/bower_components/select2/dist/css/select2.min.css' ?>">
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
      <li >
          <a href="<?php echo base_url('index.php/beranda/pengajar'); ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>

          </a>
        </li>
        <li class="active">
          <a href="<?php echo base_url('index.php/data_diri/profil_pgjr'); ?>">
            <i class="fa fa-user"></i> <span>Data Diri</span>

          </a>
        </li>
        <li>
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
          <a href="<?php echo base_url('index.php/pertemuan/laporan_pertemuan_pgjr'); ?>">
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
        Data Diri

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
             <?php
                     if ($pesan=$this->session->flashdata('gagal')){
                     echo "<div class='alert alert-danger alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                     <h4><i class='icon fa fa-close'></i>Maaf</h4>".$pesan."</div>";
                 }
                  ?>
        <div class="row">
           <div class="col-md-3">

             <!-- Profile Image -->
             <div class="box box-primary">
               <div class="box-body box-profile">
                 <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/admin_lte/user_blue.png') ?>" alt="User profile picture">

                 <h3 class="profile-username text-center"><?php foreach ($bio as $b) {
                 } echo $b->nama ?></h3>

                 <p class="text-muted text-center">Pengajar</p>

                 <ul class="list-group list-group-unbordered">
                   <li class="list-group-item">
                     <b>Jumlah Les Aktif</b> <a class="pull-right"><?php foreach ($les_aktif as $b) {
                     } echo $b->jmlh ?></a>
                   </li>
                   <li class="list-group-item">
                     <b>Jumlah Les Tidak Aktif</b> <a class="pull-right"><?php foreach ($les_tidak_aktif as $b) {
                     } echo $b->jmlh ?></a>
                   </li>

               </div>
             </div>
           </div>
           <div class="col-md-9">
            <div class="box-body">
               <div class="box-group" id="accordion">
                 <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                 <div class="panel box box-danger">
                   <div class="box-header with-border">
                     <h4 class="box-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                         Keahlian
                       </a>
                     </h4>
                   </div>
                   <div id="collapseTwo" class="panel-collapse collapse in">
                     <div class="box-body">
                       <table id="keahlian" class="table table-bordered table-striped">
                         <thead>
                         <tr>
                           <th>Id Keahlian</th>
                           <th>Keahlian</th>
                           <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php
                             $a=1;
                             foreach ($ahli as $b ) { ?>
                              <tr>
                               <td><?php echo $b->id_keahlian;  ?></td>
                               <td><?php echo $b->materi; ?></td>
                               <td><?php echo '<a class="btn btn-warning" href="'.base_url().'index.php/data_diri/form_ganti_keahlian/'.$b->id_keahlian.'">Ganti</a>'?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus">Hapus</a>
                             </tr>
                           <?php  } ?>

                          </tbody>
                       </table>

                       <a class="btn btn-info" href="<?php echo base_url('index.php/data_diri/form_tambah_keahlian')?>">Tambah Keahlian</a>
                     </div>
                   </div>
                 </div>



               </div>
             </div>
           </div>


        </div>


        <div class="modal modal-danger fade" id="modal-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Keahlian</h4>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <?php echo '<a class="btn btn-outline" href="'.base_url().'index.php/data_diri/hapus_keahlian/'.$b->id_keahlian.'">Ya, Hapus</a>'?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
<script src="<?php echo base_url().'assets/admin_lte/bower_components/select2/dist/js/select2.full.min.js' ?>"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>


</body>
</html>
