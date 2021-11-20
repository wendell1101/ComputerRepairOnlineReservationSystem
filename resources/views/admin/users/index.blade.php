@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 w-100">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Users</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Users</li>
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
            <div class="col-md-10 col-sm-10 offset-md-1 offset-sm-1">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Registered Clients</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th scope="col">id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>johndoe@mailinator.com</td>
                                        <td>Active</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="#" class="text-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Jane</td>
                                        <td>Doe</td>
                                        <td>janedoe@mailinator.com</td>
                                        <td>Active</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="#" class="text-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Jack</td>
                                        <td>Smith</td>
                                        <td>jacksmith@mailinator.com</td>
                                        <td>Inactive</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="#" class="text-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit"></i>
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