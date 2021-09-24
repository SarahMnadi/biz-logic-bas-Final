@extends('layouts/admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Department</li>
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
                <div class="col-lg-12">
                    <form id="editDepartmentForm" method="POST" action="{{ route('updateDepartment') }}">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" id="organizationNameetoEdit" style="font-weight: bold">EDIT
                                    {{ $department->department_name }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <input value="{{ $department->id }}" name="registrationNumber"
                                                type="hidden">
                                            <label>Name of Department</label>
                                            <input value="{{ $department->department_name }}" name="deptName"
                                                type="text"
                                                class="form-control @error('registrationName') in-valid @enderror">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Department Head</label>
                                            <input value="{{ $department->department_head}}" name="deptHead"
                                                type="text" class="form-control @error('phoneNumber') in-valid @enderror">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">Update</button>

                            </div><!-- /.card-footer -->
                        </div><!-- /.card -->
                    </form>
                </div><!-- /.col -->

            </div> <!-- /.row -->
        </div><!-- /.edit organization form content fluid-->

    </section>
    <!-- /.content -->
@endsection
