@extends('layouts.app')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fab fa-twitter"></i>
                    Data Table Tweets</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">HashTag #</th>
                                    <th style="text-align: center">Count</th>
                                    <th style="text-align: center">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <!-- <td>#EmergenciaCali</td> -->
                                    <td>#Colombia</td>
                                    <td style="text-align: center">5</td>
                                    <td>2019/04/11 11:40</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>#Venezuela</td>
                                    <!-- <td>#InundaciónCali</td> -->
                                    <td style="text-align: center">6</td>
                                    <td>2019/04/11 11:40</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated  10 minutes ago</div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Chart Tweets</div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated 10 minutes ago</div>
            </div>
        </div>
   </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>

@endsection
