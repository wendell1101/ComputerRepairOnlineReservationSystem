@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('products.create')}}" class="btn btn-outline-dark">
                    <i class="fas fa-plus"></i>
                    <span>New Product</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Products</li>
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
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="products-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th scope="col">id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Discount</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th scope="col"></th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>HDD Enclosure</td>
                                        <td>&#8369;800</td>
                                        <td>Lorem ipsum dolor sit amet</td>
                                        <td>&#8369;0.00</td>
                                        <td>Case/Enclosure</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>SSD</td>
                                        <td>&#8369;2500</td>
                                        <td>Lorem ipsum dolor sit amet</td>
                                        <td>&#8369;0.00</td>
                                        <td>Storage</td>
                                        <td>Avalaible</td>
                                        <td>Feb 01, 2021</td>
                                        <td>Feb 01, 2021</td>
                                        <td>
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