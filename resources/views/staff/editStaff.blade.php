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
                    <h1>Edit Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Staff</li>
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
                <form action="/edit" method="POST">
                 {{-- action="{{ route('update',$staff->id) }}"> --}}
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$staff->id}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="InputFirstName">First Name</label>
                                    <input type="text" name="firstName" value="{{$staff['first_name']}}"
                                        class="form-control @error('firstName') is-invalid @enderror" id="InputFirstName"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="InputLastName">Last Name</label>
                                    <input type="text" name="lastName" value="{{ $staff->last_name}}"
                                        class="form-control @error('lastName') is-invalid @enderror" id="InputLastName"
                                        placeholder="Last Name">
                                    @error('lastName')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="InputStaffId">User ID</label>
                                    <input class="form-control @error('userID') is-invalid @enderror" name="userID"
                                        value="{{  $staff->user_id }}" type="number " placeholder="4223567" id="InputStaffId">
                                    @error('userID')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                               
                             
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Department</label>
                                    <div class=>
                                        <input type="text" name="department" value="{{$staff->department}}"
                                        class="form-control @error('firstName') is-invalid @enderror" id="InputFirstName"
                                       >
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{  $staff->email }}"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="InputPhoneNumber">Telephone</label>
                                    <input class="form-control @error('phoneNumber') is-invalid @enderror"
                                        name="phoneNumber" value="{{  $staff->phone_number }}" type="tel"
                                        placeholder="+255654383729" id="InputPhoneNumber">
                                    @error('phoneNumber')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                               
                               
                                @can('isAdmin')
                                {{-- <div class="form-group" >
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
                                </div> --}}
                 
                                @endcan
                     
                            </div>

                        </div>


                    </div>
                    <div class="card-footer" style="text-align: center">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
                </form>
                <!-- /.card-body -->
                <!-- /.card-body -->

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
