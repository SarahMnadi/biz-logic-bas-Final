@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home' , Auth::user()->user_id) }}">Home</a></li>
                        <li class="breadcrumb-item active">view profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">STAFF INFORMATIONS</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td style="width: 30%"><b>Full Name</b></td>
                                    <td style="width: 70%">{{ $user->first_name }} {{ $user->middle_name }}
                                        {{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Department</b></td>
                                    <td style="width: 70%">{{ $user->department->department_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Phone </b></td>
                                    <td style="width: 70%">{{ $user->phone_number }}</td>
                                </tr>
                            </tbody>
                        </table>
                   
                    </div>
                    <div class="col-lg-6 col-12">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 30%"><b>Email</b></td>
                                    <td style="width: 70%">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Gender</b></td>
                                    <td style="width: 70%">Female</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Role(s)</b></td>
                                    <td style="width: 70%">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }},
                                        @endforeach
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix ">
                <button type="button" class="btn btn-outline-info mr-2">Edit</button>
            </div>
        </div>


    </div>
</section>
@endsection
