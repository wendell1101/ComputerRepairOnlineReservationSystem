@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('categories.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item text-bold active">{{ $category->name }}</li>
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
                <small class="mr-3">Category Name: </small><h2>{{ $category->name }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    @if($products->count() > 0)
                    <h5>Related Products</h5>
                    <table id="products-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Discount</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </thead>

                        <tbody>
                            @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/product_images/' . $product->img) }}"  alt="product_image" width="60" height="60" class="rounded-circle">
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}">
                                        {{ $product->name}}
                                    </a>
                                </td>
                                <td>&#8369;{{ format_price($product->price) }}</td>
                                <td>{{ $product->description ?? ''}}</td>
                                <td>{{ format_price($product->discount_percentage) }} %</td>
                            <td>&#8369;{{ format_price($product->get_discounted_price($product->price)) }} </td>
                                <td>{{ $product->checkIfIsAvailable($product) }}</td>
                            </tr>
                            @endforeach


                        </tbody>
                        {{ $products->links() }}
                    </table>
                    @else
                    <p>No Product Found </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection
