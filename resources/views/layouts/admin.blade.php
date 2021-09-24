<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIZ-LOGIC BAS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css') }}"/>
    
    
    @stack('head')
    <!-- Styles for dashboard cards-->
    <style>
        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px 40px;
            margin: 20px 0px;
        }
        .card-box:hover {
            text-decoration: none;
            color: #f1f1f1;
        }
        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
        }
        .card-box .inner {
            padding: 5px 10px 0 10px;
        }
        .card-box h3 {
            font-size: 27px;
            font-weight: bold;
            margin: 0 0 8px 0;
            white-space: nowrap;
            padding: 0;
            text-align: left;
        }
        .card-box p {
            font-size: 20px;
        }
        .card-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 72px;
            color: rgba(0, 0, 0, 0.15);
        }
        .card-box .card-box-footer {
            position: absolute;
            left: 0px;
            bottom: 0px;
            text-align: center;
            padding: 3px 0;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.1);
            width: 100%;
            text-decoration: none;
        }
        .card-box:hover .card-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }
        .bg-blue {
            background-color: #00c0ef !important;
        }
        .bg-green {
            background-color: #00a65a !important;
        }
        .bg-orange {
            background-color: #f39c12 !important;
        }
        .bg-red {
            background-color: #d9534f !important;
        }
        </style>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand " style="background-color: rgb(218, 213, 213)">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block" style="font-size: 20px;font-family:Fjalla One, sans-serif;margin-top:-2px;font-weight:bold">
                    <a href="{{ route('home', Auth::user()->user_id) }}" class="nav-link dark" style="color:#041f5c ">BIOMETRIC ATTENDANCE SYSTEM</a>
                </li>
               
            </ul><!-- /.Left navbar links -->

            <div class="navbar-nav ml-auto" style="margin-right: 20px">
                <img src="{{ asset('img/user.png') }}" alt="Bas Logo" class="brand-image img-circle elevation-6">
                <li class="breadcrumb-item" style="margin-top: 10px"><b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </b></li>
                <li class="breadcrumb-item active" style="margin-top: 10px;text-transform: uppercase;font-size:20px">
                    @foreach (Auth::user()->roles as $role)
                        {{ $role->name }} 
                    @endforeach
                </li>
            </div>
            <div class="logout-btn d-none d-sm-flex">
                <button class="btn" type="button" tabindex="0">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  <i class="nav-icon fas fa-sign-out-alt " style="font-size: 20px;color:black"></i>
                  </a>
             </button>
            </div>  
        </nav>
        <!-- /.navbar -->

     @section('navitem')
    <nav class="mt-2 myNavtab">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item ">
                <a href="{{ route('home', Auth::user()->user_id) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('staffs', Auth::user()->user_id) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Staffs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manageDepartment', Auth::user()->user_id) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Department</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('fingerprintoverallLogs', Auth::user()->user_id) }}" class="nav-link" onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Fingerprint Logs
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('showUserProfile', [Auth::user()->user_id]) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        View Profile
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-edit"></i>
                    <p>
                        Edit Profile
                    </p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('showChangePassword') }}" class="nav-link " onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Change Password
                    </p>
                </a>
            </li>
            
        </ul>
    </nav>

@endsection


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" >
                <img src="{{ asset('img/logo.png') }}" alt="Bas Logo" style="height: 100px">
            </a>
    
            <!-- Sidebar -->
            <div class="sidebar"> 
                <!-- Sidebar Menu -->
                @yield('navitem')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="wrapper">
            @yield('content')
        </div> <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>BIZ-LOGIC BAS</b> 
            </div>
        </footer> <!-- /.footer-->
    </div><!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script>
    {{-- cdn for swal tost --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- EXTERNAL CUSTOM Js --}}
    <script src="{{ url('js/custom/user.js') }}"></script>
    <script src="{{ url('js/custom/organization.js') }}"></script>
    <script src="{{ url('js/custom/branch.js') }}"></script>
    <script src="{{ url('js/custom/department.js') }}"></script>
    <script src="{{ url('js/custom/device.js') }}"></script>
    <script src="{{ url('js/custom/dashboard.js') }}"></script>
    <script src="{{ url('js/mfs.js') }}"></script>
    <script src="{{ url('js/mfs100Scripts.js') }}"></script>
    <script src="{{ url('js/chart.2.8.0.js') }}"></script>
    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js')}}"></script>  
<script src="{{ url ('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js')}}"></script>
<script src="{{ url('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js')}}"></script>
<script src="{{ url('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(
            function toggle_active_class() {
                // var url = window.location;
                // $('ul.nav a[href="' + url + '"]').parent().addClass('active');
                // $('ul.nav a').filter(function() {
                //     return this.href == url;
                // }).parent().addClass('active');
                // $(document).ready(function() {
                //     $('.myNavtab li a').click(function(e) {

                //         $('.myNavtab li.active').removeClass('active');

                //         var $parent = $(this).parent();
                //         $parent.addClass('active');
                //         // e.preventDefault();
                //     });
                // });
                var navtab = document.querySelector('.myNavtab').querySelectorAll('a')
                navtab.forEach(element => {
                    element.addEventListener("click", function(e) {
                        navtab.forEach(nav => nav.classList.remove("active"))
                        this.classList.add("active");
                        // e.preventDefault();
                    })
                });
            }
        )

    </script>

    @stack('scripts')

    <!-- Scripts -->
    

</body>

</html>
