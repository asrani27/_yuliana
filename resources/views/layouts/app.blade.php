<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'APLIKASI' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    @stack('css')
    <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
    <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
    <style>
        .active2 {
            background-color: rgb(190, 251, 199);

        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-success"
            style="box-shadow: 0px 1px 10px silver;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <aside class="main-sidebar sidebar-light-success elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center bg-gradient-default">
                {{-- <img src="/logo/min.png" alt="AdminLTE Logo" style="opacity: .8" width="25%"><br /> --}}
                <span class="brand-text font-weight-light">

                    <b>{{Auth::user()->name}}</b>

                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="/superadmin" class="nav-link {{request()->is('superadmin') ? 'active2':''}}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/superadmin/user"
                                class="nav-link {{request()->is('superadmin/user*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/superadmin/tenagakerja"
                                class="nav-link {{request()->is('superadmin/tenagakerja*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Tenaga Kerja
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/superadmin/upah"
                                class="nav-link {{request()->is('superadmin/upah*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Upah
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/superadmin/biaya"
                                class="nav-link {{request()->is('superadmin/biaya*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Biaya Produksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/superadmin/jurnal"
                                class="nav-link {{request()->is('superadmin/jurnal*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Jurnal Umum
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/superadmin/bahan"
                                class="nav-link {{request()->is('superadmin/bahan*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Bahan Baku
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/superadmin/jenis"
                                class="nav-link {{request()->is('superadmin/jenis*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Jenis Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/superadmin/overhead"
                                class="nav-link {{request()->is('superadmin/overhead*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Data Biaya Overhead
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/superadmin/laporan"
                                class="nav-link {{request()->is('superadmin/laporan*') ? 'active2':''}}">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/logout" class="nav-link" onclick="return confirm('Yakin ingin keluar?');">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    KELUAR
                                </p>
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

            <br />

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>

    @stack('js')
    <script>
        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
    </script>
    <script type="text/javascript">
        @include('layouts.notif')
    </script>
</body>

</html>