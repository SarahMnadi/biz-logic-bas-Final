@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                     
                        <li class="breadcrumb-item active"><a href="{{ route('fingerprintoverallLogs', Auth::user()->user_id) }}">finger print overall logs</a></li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                       
                        <li class="breadcrumb-item active"><a href="{{ route('fingerprintoverallLogs', Auth::user()->user_id) }}">finger print overall logs</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Fingerprint Logs</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
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
                                    <th style="width: 25%">Username</th>
                                    <th style="width: 15%">Time-in</th>
                                    <th style="width: 15%">Time-out</th>
                                    <th style="width: 10%">Date</th>
                                    <th style="width: 10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 0;
                                @endphp
                                @foreach ($logs as $log)
                                    @php
                                        $sn++;
                                    @endphp
                                    <tr>
                                        <td style="width: 10%">
                                            {{ $sn }}
                                        </td>
                                        <td style="width: 25%">
                                            {{ $log->user->first_name }}
                                            {{ $log->user->last_name }}
                                        </td>
                                        <td style="width: 15%">
                                            {{ $log->time_in }}
                                        </td>
                                        <td style="width: 15%">
                                            {{ $log->time_out }}
                                        </td>
                                        <td style="width: 10%">{{ $log->date }}
                                        </td>
                                        @if ($log->time_in < $arrive_time)
                                        <td style="width: 10%"><span class="badge bg-success">arrived-ontime</span>
                                        @else
                                        <td style="width: 10%"><span class="badge bg-danger">arrived-late</span>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('exportAllLogs') }}"> <button type="button"
                                class="btn btn-success">Export</button></a>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
