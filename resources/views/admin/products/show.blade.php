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
                    <li class="breadcrumb-item text-bold active">{{ $product->name }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-space-around">
                <small class="mr-3">Product Name: </small><h2>{{ $product->name }}</h2>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-2" >
                            <div class="img-container p-2 border" style="max-height: 450px">
                                <img src="{{ asset('storage/product_images/' . $product->img) }}" alt="product image" width="100%" style="max-height:400px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <small>Category: </small>
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold"> {{ get_category_name($product->product_category_id) }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Status: </small>
                                </div>
                                <div class="col">
                                    @if($product->is_available)
                                        <span class="text-success font-weight-bold">Available</span>
                                    @else
                                        <span class="text-danger font-weight-bold">Not Available</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Featured: </small>
                                </div>
                                <div class="col">
                                    @if($product->is_featured)
                                        <span class="text-success font-weight-bold">True</span>
                                    @else
                                        <span class="text-danger font-weight-bold">False</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Price: </small>
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold"> PHP {{ format_price($product->price) }}</span>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <small>Description: </small><br>
                                <span> {{ $product->description }}</span>
                            </div>
                            <hr>
                            <div>
                                <h4>Discount</h4>
                                <div class="row">
                                    <div class="col">
                                        <small>Discount Percentage:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_price($product->discount_percentage) }} %</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discount Start Date:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_date($product->discount_start_date) ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discount End Date:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_date($product->discount_end_date) ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discounted Price:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">PHP {{ format_price($product->get_discounted_price($product->price)) }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection
