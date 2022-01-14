@extends('admin.base')

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
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $servicesCount}} </h3>

                        <p>Available Services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('services.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>{{ $reservationsCount }}<sup style="font-size: 20px">%</sup></h3>

                        <p>Reservations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars text-light"></i>
                    </div>
                    <a href="{{ route('reservations.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $usersCount }}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $productsCount }}</h3>

                        <p>Available Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="row">
                <div class="col-md-6">
                    <canvas id="reservationDates" style="position: relative; height:40vh; width:80vw"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="myChart" style="height:400px; width:80vw"></canvas>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- /.content -->
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
       // BAR GRAPH
    var ctx = document.getElementById('myChart').getContext('2d');
    var usersCount = "<?php echo $usersCount ?>";
    var productsCount = "<?php echo $productsCount ?>";
    var servicesCount = "<?php echo $servicesCount ?>";
    var reservationsCount = "<?php echo $reservationsCount ?>";
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Services', 'Products', 'Users', 'Reservations'],
            datasets: [{
                label: 'Total Result',
                data: [servicesCount, productsCount, usersCount, reservationsCount],
                backgroundColor: [
                    '#17a2b8',
                    '#dc3545',
                    '#ffc107',
                    '#343a40',
                ],
                borderColor: [
                    '#333',
                    '#333',
                    '#333',
                    '#333',
                ],
                borderWidth:.5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>

    var jan = "<?php echo $reservations['jan'] ?>";
    var feb = "<?php echo $reservations['feb'] ?>";
    var mar = "<?php echo $reservations['mar'] ?>";
    var april = "<?php echo $reservations['april'] ?>";
    var may = "<?php echo $reservations['may'] ?>";
    var june = "<?php echo $reservations['june'] ?>";
    var july = "<?php echo $reservations['july'] ?>";
    var aug = "<?php echo $reservations['aug'] ?>";
    var sept = "<?php echo $reservations['sept'] ?>";
    var oct = "<?php echo $reservations['oct'] ?>";
    var nov = "<?php echo $reservations['nov'] ?>";
    var dec = "<?php echo $reservations['dec'] ?>";
    var currentYear =  "<?php echo $reservations['year'] ?>";


    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];
    const data = {
    labels: labels,
    datasets: [{
        label: `Reservations -  Year (${currentYear})`,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [jan, feb, mar, april, may, june, july, aug, sept, oct, nov, dec]
    }]
    };
    const config = {
    type: 'line',
    data: data,
    options: {}
    };

    var myChart = new Chart(
        document.getElementById('reservationDates'),
        config
    );
</script>
@endsection
