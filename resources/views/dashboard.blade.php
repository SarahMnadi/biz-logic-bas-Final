<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    @extends('layouts.admin')

    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('staffDetails', Auth::user()->user_id) }}">Staff
                                    Details</a></li>
                            <li class="breadcrumb-item active"> BIZ-LOGIC BAS Dashboard</li>
                        </ol>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container" style="margin-left:150px">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-info">
                            <div class="inner">
                                <h3> {{ $registered }}</h3>
                                <p> Total Staffs Available</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> {{ $staffs_present }} </h3>
                                <p> Staffs Present Today </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-check" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red">
                            <div class="inner">
                                <h3> {{ $staffs_not_present }} </h3>
                                <p> Absentees </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-times" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </head>

    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body" float="left">
                    <div id="pie_chart" style="width:50%; height:450px">
                    </div>
                </div>
                <div class="panel-body">
                    <div id="pie_chart2" style="width:50%; height:450px;float:right;margin-top:-450px">
                    </div>
                </div>
            </div>

        </div>

    </body>

    <script type="text/javascript">
        var analytics = <?php echo $gender; ?>

        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title: 'Percentage of Male and Female Employee'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        var department = <?php echo $department; ?>

        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(department);
            var options = {
                title: 'Percentage of Staff on Departments'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart2'));
            chart.draw(data, options);
        }
    </script>

    </html>
@endsection
