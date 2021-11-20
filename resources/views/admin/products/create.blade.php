@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('products.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item text-bold active">Create</li>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="rounded-lg bg-light h-100 d-flex justify-content-center align-items-center">
                                {{-- IF IMAGE IS NOT AVAILABLE --}}
                                    <p class="display-1">
                                        <i class="fas fa-image"></i>
                                    </p>
                                    
                                {{-- ELSE --}}
                                    {{-- <img src="" alt="#" id="product-img"> --}}
                                </div>
                                
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-name">Name</label>
                                                <input type="text" name="name" id="product-name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-price">Price</label>
                                                <input type="number" name="price" id="product-price" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product-description">Description</label>

                                        <textarea name="description" id="product-description" cols="30" rows="3" class="form-control"></textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-discount">Discount</label>

                                                <input type="number" name="discount" id="product-discount" class="form-control" value="0">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="img" id="product-img-btn" class="custom-file-input">
                                                    <label for="product-img-btn" class="custom-file-label">jpeg, jpg, png</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product-category">Category</label>

                                        <select name="product_category_id" id="product-category" class="custom-select">
                                            <option value="" disabled selected>Select one</option>

                                            <option value="1">Lorem</option>
                                            <option value="2">Ipsum</option>
                                            <option value="3">Dolor</option>
                                            <option value="4">Sit</option>
                                            <option value="5">Amet</option>
                                        </select>
                                    </div>
        
                                    <div class="form-group">
                                        <input type="submit" value="CREATE" class="btn btn-outline-primary btn-block" id="product-create-btn">
                                    </div>
                                    
                                </form>
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