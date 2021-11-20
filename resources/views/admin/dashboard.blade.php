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
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Reservations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars text-light"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Available Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-md-4">
                <div class="card">
                    <img src="..." alt="Image of Best Seller Here" class="card-img-top">
                    
                    <div class="card-body">
                        <h2 class="card-title">Best Selling Product</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, molestias illum quae ipsam maiores quod, laudantium iure ut culpa velit qui voluptas distinctio voluptatem modi eaque tenetur? Cumque, obcaecati voluptates!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Reservations</h3>                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="reservations-table" class="table table-hover">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th>Username</th>
                                    <th>Order</th>
                                    <th>Case (Fault Description)</th>
                                    <th>Reservation Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>SSD</td>
                                        <td>Upgrade laptop</td>
                                        <td>November 19, 2022</td>
                                        <td>Done</td>
                                        <td>
                                            <a href="">
                                                <i class="fas fa-check-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Jane Doe</td>
                                        <td>Enclosure</td>
                                        <td></td>
                                        <td>November 19, 2022</td>
                                        <td>Done</td>
                                        <td>
                                            <a href="">
                                                <i class="far fa-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Jack Smith</td>
                                        <td>Enclosure</td>
                                        <td></td>
                                        <td>November 19, 2022</td>
                                        <td>Done</td>
                                        <td>
                                            <a href="">
                                                <i class="far fa-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /.content -->
@endsection