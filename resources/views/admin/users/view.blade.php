@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 w-100">
            <div class="col-sm-6">
                <a href="{{route('users.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active text-bold">Preview & Edit</li>
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
            <div class="col-md-6 col-sm-6 offset-md-3 offset-sm-3">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">{{'John Doe'}}</h3>
                        <span>{{'johndoe@mailinator'}}</span>    
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <dl>
                                    <dt>
                                        <strong>Contact Number</strong>
                                    </dt>

                                    <dd>
                                        {{'09999999999'}}
                                    </dd>
                                </dl>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <dl>
                                    <dt>
                                        <strong>Social Media</strong>
                                    </dt>
                                    <dd>
                                        <a href="#">{{'facebook.com/john-doe-589'}}</a>
                                    </dd>
                                </dl>
                            </div>

                            <div class="col-12">
                                <dl>
                                    <dt>
                                        <strong>Address</strong>
                                    </dt>

                                    <dd>
                                        {{'Poblacion II' . ', ' . 'Sto. Tomas City' . ', ' . 'Batangas'}}
                                    </dd>
                                </dl>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <dl>
                                    <dt>
                                        <strong>Account Created At</strong>
                                    </dt>

                                    <dd>
                                        Jan 11, 2021
                                    </dd>
                                </dl>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <dl>
                                    <dt>
                                        <strong>Account Updated At</strong>
                                    </dt>

                                    <dd>
                                        Jan 11, 2021
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection