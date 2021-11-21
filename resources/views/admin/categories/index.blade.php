@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Categories</li>
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
            <div class="col-md-8 col-sm-10 offset-md-2 offset-sm-1">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Product Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="category-name" class="col-sm-2 col-form-label">Category Name</label>

                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="category-name" class="form-control">

                                        @error('name')
                                            <small class="text-danger">{{'message'}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-2">
                                        <input type="submit" value="CREATE" class="btn btn-outline-dark btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <hr class="p-2">

                        <div class="table-responsive">
                            <table id="categories-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th scope="col">id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th scope="col"></th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>Memory</td>
                                        <td>Not Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>asas</td>
                                        <td>
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Storage</td>
                                        <td>Available</td>
                                        <td>Feb 01, 2021</td>
                                        <td>asas</td>
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