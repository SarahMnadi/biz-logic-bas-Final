

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
@extends('layouts.admin')
@push('scripts')
@endpush

@section('content')
<button type="button" id="btnAdd" class="btn" style="float: right;margin-top:40px;margin-bottom:20px;margin-right:80px;background-color:#3869ae;color:white;width:80px;height:40px">
  <a href="{{ route('addUser') }}" class="nav-link " onclick="toggle_active_class()">
    <p class="text-light" style="font-size: 18px;margin-left:-13px;margin-top:-10px">Create</p>
  </a>
</button>  
<button type="button" id="btnAdd" class="btn" style="float: right;margin-top:40px;margin-bottom:20px;margin-right:80px;background-color:#3869ae;color:white;width:80px;height:40px">
    <a href="{{ route('addUser') }}" class="nav-link " onclick="toggle_active_class()">
      <p class="text-light" style="font-size: 18px;margin-left:-13px;margin-top:-10px">Create</p>
    </a>
  </button> 
  <button type="button" id="btnAdd" class="btn" style="float: right;margin-top:40px;margin-bottom:20px;margin-right:80px;background-color:#3869ae;color:white;width:80px;height:40px">
    <a href="{{ route('addUser') }}" class="nav-link " onclick="toggle_active_class()">
      <p class="text-light" style="font-size: 18px;margin-left:-13px;margin-top:-10px">Create</p>
    </a>
  </button>     
<div class="container ">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Working Hours</th>
                <th>Working Days</th>
                <th>Overtime Working </th>
                <th>Weekends Working </th>
                <th>Holidays Working </th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  

  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('Details') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'firstName' },
            {data: 'last_name', name: 'lastName'},
            {data: 'hours', name: 'hours'},
            {data: 'days', name: 'days'},
            {data: 'overtime', name: 'overtime'},
            {data: 'weekends', name: 'weekends'},
            {data: 'holidays', name: 'holidays'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        
    });
    
  });
</script>
</html>