@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('home', Auth::user()->user_id) }}">Home</a></li> --}}
                        <li class="breadcrumb-item active">Staffs</li>
                        <li class="breadcrumb-item active">Staff Details</li>
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
                                        <td style="width: 70%">{{ $staff->first_name }} 
                                            {{ $staff->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b>Phone Number</b></td>
                                        <td style="width: 70%">{{ $staff->phone_number }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td style="width: 30%"><b>USer ID</b></td>
                                        <td style="width: 70%">{{ $staff->user_id }}</td>
                                    </tr>
                                </tbody>
                
                            </table>
                        </div>
                    <!-- another table2-->
                        <div class="col-lg-6 col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width: 30%"><b>Email</b></td>
                                        <td style="width: 70%">{{ $staff->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b>Gender</b></td>
                                        <td style="width: 70%">{{ $staff->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b>Department</b></td>
                                        <td style="width: 70%">{{ $staff->department }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td style="width: 30%"><b>Gender</b></td>
                                        <td style="width: 70%">Female</td>
                                    </tr> --}}
                                   
                                    <tr>
                                        {{-- <td style="width: 30%"><b>Role(s)</b></td> --}}
                                        {{-- <td style="width: 70%">
                                            @foreach ($staff->roles as $role)
                                                {{ $role->name }},
                                            @endforeach
                                        </td> --}}
                                    </tr>
                                </tbody>
                            </table>
                            @error('cardfound')
                                <div class="alert alert-danger p-2">
                                    <span class="">{{ $message }}</span>
                                </div>
                            @enderror

                        </div> 
                    </div>
                </div>
                <!-- /.card-body -->

                <!--FINGER ENROLL BUTTON-->
                 <div class="card-footer clearfix ">
                    <a href="{{ route('edit', $staff->id) }}"><button type="button" 
                        class="btn btn-outline-info mr-2">Edit</button>                   
                    <a href="{{ route('delete', $staff->id) }}"><button type="button"
                            class="btn btn-outline-danger mr-2">Delete</button></a> 
                     {{-- @if (!$user->status->enrollment_status && !$user->status->ready_to_enroll) --}}
                        <button type="button" class="btn btn-dark" data-toggle="collapse"
                            data-target="#fingerprintEnrollUser" aria-expanded="false"
                            aria-controls="fingerprintEnrollUser">Fingerprint Enroll User </button> 
                     {{-- @else
                        <a href="{{ route('userSpecificLogs', $user->user_id) }}"><button type="button"
                                class="btn btn-outline-dark mr-2">View Logs</button></a> --}}
                    {{-- @endif   --}}
                </div> 
            </div>

            {{-- COLLAPSE FOR FINGER ENROLLMENT --}}
             <div class="card collapse multi-collapse" id="fingerprintEnrollUser">
                <form action="{{ route('fingerprintEnroll') }}" method="POST">
                    <div class="card-body">
                        <div class="row">
                                        <div class="col-md-6" style="margin-left:400px">
                                            <div class="mb-1 p-1 imgFinger-wrapper">
                                                <img id="imgFinger" class="img img-thumbnail" Falt="Finger Image" style="width: 256px;
                                                height: 285px "/>
                                            </div>
                                            <input  type="hidden" name="user_id" value="{{ $staff->user_id }}">
                                            <input type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-primary btn-sm" onclick="return Capture()" />                
                                        </div>
                                    </div>   

                                    <div class="panel">
                                        <table class="d-none" width="100%">
                                            <tr class="hide">
                                                <td>
                                                    <input type="text" value="" id="txtStatus" class="form-control hide" />
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
                                                    <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;" value="" class="form-control"> </textarea>
                                                </td>
                                            </tr>
                                            <tr class="hide">
                                                <td>
                                                    Base64Encoded ANSI Template
                                                </td>
                                                <td>
                                                    <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                </td>
                                            </tr>
                                            <tr class="hide">
                                                <td>
                                                    Base64Encoded ISO Image
                                                </td>
                                                <td>
                                                    <textarea id="txtIsoImage" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                </td>
                                            </tr>
                                            <tr class="hide">
                                                <td>
                                                    Base64Encoded Raw Data
                                                </td>
                                                <td>
                                                    <textarea id="txtRawData" style="width: 100%; height:50px;" class="form-control"> </textarea>
                                                </td>
                                            </tr>
                                            <tr class="hide">
                                                <td>
                                                    Base64Encoded Wsq Image Data
                                                </td>
                                                <td>
                                                    <textarea id="txtWsqData" style="width: 100%; height:50px;" class="form-control"> </textarea>
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
                                                    <textarea id="txtSessionKey" style="width: 100%; height:50px;" class="form-control"> </textarea>
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
                
                                        <div class="row">
                                            <div class="form-group text-right col-md-6">
                                                <button type="submit" class="btn btn-dark btn-sm submit_buttom_padding" style="margin-top:20px;margin-right:60px" value="submit" onclick=" return validateform()" name="submit" id="sub">Submit</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                 
                    <script src="{{ url('js/mfs.js') }}"></script>
                    <script src="{{ url('js/mfs100Scripts.js') }}"></script>

                    <script>
                        var msg = '{{Session::get('alert')}}';
                        var exist = '{{Session::has('alert')}}';
                        if(exist){
                          alert(msg);
                        }
                      </script>   
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
@endsection
