@extends('layouts.admin')
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Staff</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">


            <!-- PRIMARY DETAILS CONTENT -->
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Staff Details</h3>
                </div>
                <form id="addUserForm" method="POST" action="{{ route('Staff') }}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="InputFirstName">First Name</label>
                                    <input type="text" name="firstName" value="{{ old('firstName') }}"
                                        class="form-control @error('firstName') is-invalid @enderror" id="InputFirstName"
                                        placeholder="First Name">
                                    @error('firstName')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="InputLastName">Last Name</label>
                                    <input type="text" name="lastName" value="{{ old('lastName') }}"
                                        class="form-control @error('lastName') is-invalid @enderror" id="InputLastName"
                                        placeholder="Last Name">
                                    @error('lastName')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="InputStaffId">User ID</label>
                                    <input class="form-control @error('userID') is-invalid @enderror" name="userID"
                                        value="{{ old('userID') }}" type="number " placeholder="4223567" id="InputStaffId">
                                    @error('userID')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row pt-1 pb-1">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                                    <div class="col-12 col-sm-8 col-lg-6 form-check mt-1">
                                      <label class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="gender" value="Male"><span class="custom-control-label">Male</span>
                                      </label>
                                      <label class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="gender" value="Female"><span class="custom-control-label">Female</span>
                                      </label>
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <label >Department</label>
                                    <div class=>
                                      <select class="form-control" name="department">
                                        <option value="IT Department" selected>IT Department</option>
                                        <option value="Customer Care">Customer Care</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="InputPhoneNumber">Telephone</label>
                                    <input class="form-control @error('phoneNumber') is-invalid @enderror"
                                        name="phoneNumber" value="{{ old('phoneNumber') }}" type="tel"
                                        placeholder="+255654383729" id="InputPhoneNumber">
                                    @error('phoneNumber')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                               
                               
                                @can('isAdmin')
                                <div class="form-group" >
                                    <label for="exampleFormControlSelect2">Choose Role(s)</label>
                                    <select multiple class="form-control" id="exampleFormControlSelect2" name="roles[]" style=" center;height: 80px">
                                        @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                     
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                </div>
                 
                                @endcan
                     
                            </div>

                        </div>


                    </div>
                    <div class="card-footer" style="text-align: center">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
                <!-- /.card-body -->

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
