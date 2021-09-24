@extends('layouts/admin')
@push('scripts')
    <script>
        toggle_active_class()

    </script>

@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('showAllDepartments', Auth::user()->user_id) }}">List of Departments</a></li>
                        <li class="breadcrumb-item active">Department Manage</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @can('registerDepartment')
                    <div class="col-md-6" style="margin-left:100px">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Department</h3>
                            </div><!-- /.card-header -->

                            <form id="newDepartmentForm" method="POST" action="{{ route('storeDepartment') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Department Name:</label>
                                        <div class=>
                                            <select class="form-control" name="deptName">
                                              <option value="IT Department" selected>IT Department</option>
                                              <option value="Customer Care">Customer Care</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Department Head :</label>
                                        <input type="text" class="form-control" value="{{ old('deptHead') }}" placeholder="Enter Head of Department"
                                            name="deptHead">
                                    </div>
                                </div> <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div><!-- /.card-footer -->
                            </form><!-- /.form -->
                        </div><!-- /.card -->
                    </div> <!-- /.col -->
                @endcan
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
