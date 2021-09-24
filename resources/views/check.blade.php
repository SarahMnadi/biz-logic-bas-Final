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
    @stack('head')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            font-size: 18px;
        }
        th,td {
            display: inline;
        }

        .table {
            margin-left: 200px;
            margin-right: auto;
            width: 100%;
        }
        td:nth-of-type(2) {
   padding-right: 10px;
}

    </style>
</head>

<body>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Dashboard</a> --}}
                        </li>
                        <li class="breadcrumb-item active">Staff Time In and Out</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="wrapper" style="margin-right:200px">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <p style="margin-left:300px"> Welcome Staff at Biz-LogicSolution Company</p>
                    {{-- <a href="{{ route('home', Auth::user()->user_id) }}" class="nav-link">Home</a> --}}
                </li>

            </ul><!-- /.Left navbar links -->

        @section('content')
            <div class="content-header">
                <div class="container-fluid" style="margin-left:80px">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h4 style="margin-right:">Please Press Your Finger on Fingerprint Sensor by Pressing Capture </h4>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> 
            <!-- /.content-header -->
            <!--################FORM FOR USER SIGN IN FINGERPRINT ###############-->
       
                <div class="col-md-6">
                    <table class="table table-striped bordered projects">
                        <thead>
                            <tr>
                                <th style="width: 40%">
                                    User Name
                                </th>
                                <th style="width: 60%">
                                    Check Time in and Out
                                </th>

                        </thead>
                        @foreach ($staff as $staff)
                        <form name="myForm" method="GET" id="postId" action="{{ route('Match_Print') }}">
                           <?php
                           $a = 'txtIsoTemplate'.$staff->user_id;
                            ?>
                            <input type="hidden" name="user_id" id="{{$a}}" value="{{ $staff->fingerprint_device_token }}">            
                            <tr>
                                <td style="width:40%">
                                    {{ $staff->first_name . '  ' . $staff->last_name }}
                                </td>
                                <td>
                                    <input type="button" value="Capture" class=" capturebuttonpadding btn btn-primary btn-sm" style="margin-left:80px"
                                        onclick="return Match({{$staff->user_id}})" />
                                </td>

                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </table>
                </div>

                {{-- <input type="submit" value="Match" class=" capturebuttonpadding btn btn-primary btn-sm"
                    onclick="return Match()" /> --}}

                <div class="panel">
                    <table class="d-none" width="100%">
                        <tr class="hide">
                            <td>
                                <input type="text" value="" id="txtStatus" class="form-control hide" />
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                <input type="text" value="" id="user_id" class="form-control hide" />
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Quality:
                            </td>
                            <td>
                                <input type="text" value="" id="txtImageInfo" class="form-control" />
                            </td>
                        </tr>

                        <tr class="hide">
                            <td>
                                Base64Encoded ISO Template
                            </td>
                            <td>
                                <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;"
                                    value="" class="form-control"> </textarea> -->
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Base64Encoded ANSI Template
                            </td>
                            <td>
                                <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;"
                                    class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Base64Encoded ISO Image
                            </td>
                            <td>
                                <textarea id="txtIsoImage" style="width: 100%; height:50px;"
                                    class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Base64Encoded Raw Data
                            </td>
                            <td>
                                <textarea id="txtRawData" style="width: 100%; height:50px;"
                                    class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Base64Encoded Wsq Image Data
                            </td>
                            <td>
                                <textarea id="txtWsqData" style="width: 100%; height:50px;"
                                    class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Encrypted Base64Encoded Pid/Rbd
                            </td>
                            <td>
                                <textarea id="txtPid" style="width: 100%; height:50px;" class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Encrypted Base64Encoded Session Key
                            </td>
                            <td>
                                <textarea id="txtSessionKey" style="width: 100%; height:50px;"
                                    class="form-control"> </textarea>
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Encrypted Base64Encoded Hmac
                            </td>
                            <td>
                                <input type="text" value="" id="txtHmac" class="form-control" />

                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Ci
                            </td>
                            <td>
                                <input type="text" value="" id="txtCi" class="form-control" />
                            </td>
                        </tr>
                        <tr class="hide">
                            <td>
                                Pid/Rbd Ts
                            </td>
                            <td>
                                <input type="text" value="" id="txtPidTs" class="form-control" />
                            </td>
                        </tr>
                    </table>
                </div>
           
        </div>
        </section>
    @endsection
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="wrapper" style="margin-right:200px;margin-bottom:-600px">
        @yield('content')
    </div> <!-- /.content-wrapper -->

    {{-- <footer class="main-footer" style="">
            <strong>Copyright &copy; 2021.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>BIZ-LOGIC BAS</b> 
            </div>
        </footer> <!-- /.footer-->
    </div><!-- ./wrapper --> --}}
    {{-- <li class="nav-item" style="margin-left:850px">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p style="color: black">
                Logout
            </p>
        </a>
    </li> --}}

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


</body>

</html>
