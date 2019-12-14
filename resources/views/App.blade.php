
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Notaku</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{mix('/css/app.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">Nama Toko</span>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-sign-out-alt"></i>
          <span> Sign out</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Notaku</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item">
            <router-link to="/" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            
            </router-link>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <router-link to="/penjualan" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Penjualan
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/penjualan" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Penjualan (Pending)
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
          <router-link to="/pembelian" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Pembelian
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
          <router-link to="/pembelian" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Pembelian (Pending)
              </p>
            
            </router-link>
          </li>
          
          <li class="nav-header">ARSIP</li>
          <li class="nav-item">
            <router-link to="/penjualan" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
              Retur Penjualan
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
          <router-link to="/pembelian" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
              Retur Pembelian
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>Hutang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>Piutang</p>
            </a>
          </li>

          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <router-link to="/penjualan" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Master barang
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
          <router-link to="/pembelian" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
              Master supplier
              </p>
            
            </router-link>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>Master customer</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fab fa-vimeo-v"></i>
              <p>Master Promo</p>
            </a>
          </li>

          <li class="nav-header">Laporan</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Pembelian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Retur Penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Retur Pembelian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Hutang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Piutang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Laba - Rugi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Neraca Pembayaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Buku Besar</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <router-view></router-view>
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 Notaku.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{mix('/js/app.js')}}"></script>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
</body>
</html>
