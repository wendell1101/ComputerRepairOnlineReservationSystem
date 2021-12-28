@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('xcategory_services.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Service Category</li>
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
                 @if($services->count() > 0)
                    <h5>Related Services</h5>
                    <table id="products-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Status</th>
                        </thead>

                        <tbody>
                            @foreach($services as $key => $service)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/service_images/' . $service->img) }}"  alt="product_image" width="60" height="60" class="rounded-circle">
                                </td>
                                <td>
                                    <a href="{{ route('services.show', $service->id) }}">
                                        {{ $service->name}}
                                    </a>
                                </td>
                                <td>&#8369;{{ format_price($service->price) }}</td>
                                <td>{{ \Str::limit(strip_tags($service->description), 50, '...') }}</td>
                                <td>{{ $service->checkIfIsAvailable($service) }}</td>
                            </tr>
                            @endforeach


                        </tbody>
                        {{ $services->links() }}
                    </table>
                    @else
                    <p>No Service Found </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection
