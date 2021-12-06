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
                    <li class="breadcrumb-item">Printing</li>
                    <li class="breadcrumb-item text-bold active">Edit</li>
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
                {{-- ALERT FOR SUCCESSES AND ERRORS --}}
                <x-alert/>
                {{-- MAIN SECTION --}}
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Printing</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="text" name="size" id="size" class="form-control" value="{{'size here'}}">
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" class="form-control" value="{{'color here'}}">
                            </div>

                            <div class="form-group">
                                <label for="image-size">Image Size</label>
                                <input type="text" name="image-size" id="image-size" class="form-control" value="{{'image size here'}}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{'0'}}">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="UPDATE" class="btn btn-block btn-outline-dark">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection