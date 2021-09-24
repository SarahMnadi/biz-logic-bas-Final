@extends('layouts.admin')
@section('navitem')
    <nav class="mt-2 myNavtab">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item ">
                <a href="{{ route('home', Auth::user()->user_id) }}" class="nav-link active "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('addUser') }}" class="nav-link " onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Add User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('allUsers', Auth::user()->user_id) }}" class="nav-link  "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('fingerprintoverallLogs', Auth::user()->user_id) }}" class="nav-link"
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Fingerprint Logs
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rfidoverallLogs', Auth::user()->user_id) }}" class="nav-link"
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        RFID Logs
                    </p>
                </a>
            </li>
            @can('manageOrganization')
                <li class="nav-item">
                    <a href="{{ route('manageOrganization', Auth::user()->user_id) }}" class="nav-link "
                        onclick="toggle_active_class()">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Organizations
                        </p>
                    </a>
                </li>
            @endcan
            @can('manageBranch')
                <li class="nav-item">
                    <a href="{{ route('manageBranch', Auth::user()->user_id) }}" class="nav-link "
                        onclick="toggle_active_class()">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Branches
                        </p>
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('manageDepartment', Auth::user()->user_id) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-university"></i>
                    <p>
                        Departments
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('showRoomManage') }}" class="nav-link">
                    <i class="nav-icon fas fa-university"></i>
                    <p>
                        Rooms
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('deviceManage', Auth::user()->user_id) }}" class="nav-link "
                    onclick="toggle_active_class()">
                    <i class="nav-icon fas fa-microchip"></i>
                    <p>
                        Devices
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
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0"> {{ $user->first_name }}
                        {{ $user->middle_name }}
                        {{ $user->last_name }} Logs</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">User Details</li>
                        <li class="breadcrumb-item active">User Log</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">

                <!-- /.col -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#fingerprint"
                                        data-toggle="tab">Fingerprint Logs</a></li>

                                <li class="nav-item"><a class="nav-link" href="#rfid" data-toggle="tab">RFID Logs</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                {{-- TAB PANE ACTIVITY =============================XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx --}}
                                <div class="active tab-pane" id="fingerprint">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">

                                                <div class="card-header">
                                                    <h3 class="card-title">Fingerprint Logs</h3>

                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search"
                                                                class="form-control float-right" placeholder="Search">

                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" style="max-height: 80%;">
                                                    @if (count($logs) < 1)
                                                        <p class="p-4"> There is no data </p>
                                                    @else
                                                        <table class="table table-head-fixed">
                                                            {{-- <table class="table table-head-fixed text-nowrap"> --}}
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%">SN</th>
                                                                    <th style="width: 15%">Time-in</th>
                                                                    <th style="width: 15%">Time-out</th>
                                                                    <th style="width: 10%">Date</th>
                                                                    <th style="width: 10%">Device</th>
                                                                    <th style="width: 15%">Location</th>
                                                                    <th style="width: 15%">Security</th>
                                                                    <th style="width: 10%">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $sn = 0;
                                                                @endphp
                                                                @foreach ($logs as $log)

                                                                    @if ($log->log_type == 'fingerprint')
                                                                        @php
                                                                            $sn++;
                                                                        @endphp
                                                                        <tr>
                                                                            <td style="width: 10%">
                                                                                {{ $sn }}
                                                                            </td>

                                                                            <td style="width: 15%">
                                                                                {{ $log->time_in }}
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->time_out }}
                                                                            </td>
                                                                            <td style="width: 10%">{{ $log->date }}
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                {{ $log->device->device_name }}
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->device->room->room_name }}
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->device->room->room_security_level }}
                                                                            </td>
                                                                            @if ($log->time_in < $arrive_time)
                                                                                <td style="width: 10%"><span
                                                                                        class="badge bg-success">arrived-ontime</span>
                                                                                @else
                                                                                <td style="width: 10%"><span
                                                                                        class="badge bg-danger">arrived-late</span>
                                                                            @endif
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div> <!-- /.card-body -->
                                            </div> <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="rfid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">RFID Logs</h3>
                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search"
                                                                class="form-control float-right" placeholder="Search">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" style="max-height: 80%;">
                                                    @if (count($logs) < 1)
                                                        <p class="p-4"> There is no data </p>
                                                    @else
                                                        <table class="table table-head-fixed">
                                                            {{-- <table class="table table-head-fixed text-nowrap"> --}}
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%">SN</th>

                                                                    <th style="width: 15%">Time-in</th>
                                                                    <th style="width: 15%">Time-out</th>
                                                                    <th style="width: 10%">Date</th>
                                                                    <th style="width: 10%">Device</th>
                                                                    <th style="width: 15%">Room</th>
                                                                    <th style="width: 15%">Security</th>
                                                                    <th style="width: 10%">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $sn = 0;
                                                                @endphp
                                                                @foreach ($logs as $log)
                                                                    @if ($log->log_type == 'rfid')
                                                                        @php
                                                                            $sn++;
                                                                        @endphp
                                                                        <tr>
                                                                            <td style="width: 10%">
                                                                                {{ $sn }}</td>

                                                                            <td style="width: 15%">
                                                                                {{ $log->time_in }}</td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->time_out }}</td>
                                                                            <td style="width: 10%">{{ $log->date }}
                                                                            </td>
                                                                            <td style="width: 10%">
                                                                                {{ $log->device->device_name }}</td>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->device->room->room_name }}</td>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                {{ $log->device->room->room_security_level }}
                                                                            </td>
                                                                            </td>
                                                                            @php
                                                                                $auhorized = false;
                                                                            @endphp
                                                                            @foreach ($log->user->rooms as $room)
                                                                                @if ($room->room_name == $log->device->room->room_name)
                                                                                    @php
                                                                                        $auhorized = true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach
                                                                            @if ($auhorized)
                                                                                <td style="width: 10%"><span
                                                                                        class="badge bg-success">authorized</span>
                                                                                @else
                                                                                <td style="width: 10%"><span
                                                                                        class="badge bg-danger">not-authorized</span>
                                                                            @endif


                                                                            </td>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div> <!-- /.card-body -->
                                            </div> <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
