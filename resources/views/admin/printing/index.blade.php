@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('printing.create')}}" class="btn btn-outline-dark">
                    <i class="fas fa-plus"></i>
                    <span>New Pricing</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active text-bold">Printing</li>
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
                {{-- ALERT FOR SUCCESSES AND ERRORS --}}
                <x-alert/>
                {{-- MAIN SECTION --}}
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Printing</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="printing-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Image Size</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th scope="col">Action</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Black and white</td>
                                        <td>---(text only)---</td>
                                        <td>&#8369; 2.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Black and white</td>
                                        <td>Any size</td>
                                        <td>&#8369; 2.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Colored</td>
                                        <td>---(text only)---</td>
                                        <td>&#8369; 3.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Colored</td>
                                        <td>less than or equal to &frac14; of paper</td>
                                        <td>&#8369; 6.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Colored</td>
                                        <td>greater than &frac14; - less than or equal to  &frac12; of paper</td>
                                        <td>&#8369; 8.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0</td>
                                        <td>Letter Size/Short (8.5 in by 11 in)</td>
                                        <td>Colored</td>
                                        <td>greater than &frac12; of paper</td>
                                        <td>&#8369; 10.00</td>
                                        <td>Available</td>
                                        <td>Jan 11, 2021</td>
                                        <td>Jan 11, 2021</td>
                                        <td>
                                            <a href="{{route('printing.edit')}}" class="text-success">
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