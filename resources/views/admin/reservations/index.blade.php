@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('printing.create')}}" class="btn btn-outline-dark">
                    <i class="fas fa-plus"></i>
                    <span>New Pricing</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Printing</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- ALERT FOR SUCCESSES AND ERRORS --}}
                <x-alert/>
                {{-- MAIN SECTION --}}
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Reservations</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="reservations-table" class="table table-hover table-striped">
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