<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agriculture | Dashboard</title>
  <!-- fullCalendar -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css')}}"> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="{{ asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ asset ('plugins/jqvmap/jqvmap.min.css') }}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset ('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @stack('css')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-footer-fixed"> 
  <div class="wrapper">

    <!-- Navbar --> 
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
       <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/agriculture/dashboard" class="nav-link text-white"><strong>Home</strong></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link badge" data-toggle="dropdown" role="button">
                    <h5 class="text-white p-2">{{ Auth::user()->name }} <i class="fas fa-user"></i></h5> 
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <aside class="main-sidebar sidebar-light-success sidebar-success elevation-4">
                <a href="" class="brand-link">
                    <img src="{{ asset('dist/img/DA.png.png') }}" class="img-circle elevation-3 ml-1" style="opacity: .8" height="60" width="60">
                    <span class="brand-text font-weight-dark ml-2">Agriculture</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div> -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('all.farmer') }}" class="nav-link {{ Request::is('all/farmer')? 'active': '' }}">
                                    <i class="nav-icon fas fa-tractor"></i>
                                    <p>Farmer</p>
                                </a>
                            </li>
                            @if (Auth::check() && Auth::user()->role === 'user')
                                <li class="nav-item">
                                    <a href=" {{ route('all.livestock') }}" class="nav-link {{ Request::is('all/livestock')? 'active': '' }}">
                                        <i class="nav-icon fas fa-hippo"></i>
                                        <p>Livestock</p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href=" {{ route('bulan.livestock') }}" class="nav-link {{ Request::is('bulan/livestock')? 'active': '' }}">
                                        <i class="nav-icon fas fa-hippo"></i>
                                        <p>Livestock</p>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth::user()->role === 'user')
                                <li class="nav-item">
                                    <a href="{{ route('all.crop') }}" class="nav-link {{ Request::is('all/crop')? 'active': '' }}">
                                        <i class="nav-icon fas fa-seedling"></i>
                                        <p>Crops</p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('bulan.crop') }}" class="nav-link {{ Request::is('bulan/crop')? 'active': '' }}">
                                        <i class="nav-icon fas fa-seedling"></i>
                                        <p>Crops</p>
                                    </a>
                                </li>
                            @endif
                            <!-- <li class="nav-item">
                                <a href=" {{ route('calendar') }}" class="nav-link {{ Request::is('/calendar')? 'active': '' }}">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>Calendar</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>Settings</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href=" {{ route('account') }}" class="nav-link ml-4 {{ Request::is('/account')? 'active': '' }}">
                                            <p>Accounts</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>Reports</p>
                                </a>
                            </li> -->
                            <br>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>Log out</p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        </div>
    </body>

    <!-- Content Wrapper. Contains page content Dashboard -->
    <div class="content-wrapper">
       @yield('content')
    </div>
    <!-- /.content-wrapper Dashboard -->

  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<!-- <script src="{{ asset ('plugins/jqvmap/jquery.vmap.min.js') }}"></script> -->
<!-- <script src="{{ asset ('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{ asset ('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset ('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset ('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script> -->
<!-- Datatables -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script> -->
<!-- <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> -->
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        toastr.options.progressBar = true;
        switch (type){
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;

        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;

        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;  
        }
    @endif
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stack('js')

</body>
</html>
