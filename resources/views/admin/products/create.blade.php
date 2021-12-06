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
                                <div id="product-img-placeholder" class="rounded-lg bg-light h-100 d-flex justify-content-center align-items-center w-100">
                                    <p class="display-1" id="product-img-alt">
                                        <i class="fas fa-image"></i>
                                    </p>
                                    <img src="" alt="product image" id="product-img" style="display: none;">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-name">Name</label>
                                                <input type="text" name="name" id="product-name" class="form-control">
                                                @error('name')
                                                    <small class="text-danger">{{'message'}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-price">Price</label>
                                                <input type="number" name="price" id="product-price" class="form-control">
                                                @error('price')
                                                    <small class="text-danger">{{'message'}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product-description">Description</label>

                                        <textarea name="description" id="product-description" cols="30" rows="3" class="form-control"></textarea>

                                        @error('description')
                                            <small class="text-danger">{{'message'}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product-discount">Discount</label>

                                                <input type="number" name="discount" id="product-discount" class="form-control" value="0">
                                                @error('discount')
                                                    <small class="text-danger">{{'message'}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="img" id="product-img-btn" class="custom-file-input">
                                                    <label for="product-img-btn" class="custom-file-label">jpeg, jpg, png</label>
                                                </div>
                                                @error('img')
                                                    <small class="text-danger">{{'message'}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    @if($categories->count() > 0)
                                    <div class="form-group">
                                        <label for="product-category">Category</label>

                                        <select name="product_category_id" id="product-category" class="custom-select">

                                            <option value="" disabled selected>Select one</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('product_category_id')
                                            <small class="text-danger">{{'message'}}</small>
                                        @enderror
                                    </div>
                                    @endif

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
