@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('reservations.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Reservations</li>
                    <li class="breadcrumb-item text-bold active">{{ $reservation->transaction_id }}</li>
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
                <small class="mr-3">Transaction ID </small><h2>{{ $reservation->transaction_id }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <h5>Reservation Items</h5>
                    <table id="products-table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </thead>

                        <tbody>
                            @foreach(json_decode($reservation->items) as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    @if($item->options->type == 'product')
                                    <img src="{{ asset('storage/product_images/' . $item->img) }}"  alt="product_image" width="60" height="60" class="rounded-circle">
                                    @elseif($item->options->type == 'service')
                                    <img src="{{ asset('storage/service_images/' . $item->img) }}"  alt="product_image" width="60" height="60" class="rounded-circle">
                                    @else
                                    @endif
                                </td>
                                <td>
                                    {{ $item->name}}
                                </td>
                                <td>
                                    {{ $item->qty}}
                                </td>
                                <td>&#8369; {{ format_price($item->price) }}</td>
                                <td>&#8369; {{ format_price($item->price * $item->qty) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <span class="font-weight-bold">
                            Total Amount: &#8369; {{ format_price($reservation->total_amount) }}
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h5>Customer Information</h5>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <span class="font-weight-bold">Name:</span>
                                    {{ ucwords($reservation->user->first_name . ' ' . $reservation->user->last_name) }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Email:</span> {{ $reservation->user->email }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Contact Number:</span> {{ $reservation->user->contact_number }}
                                </p>

                            </div>
                            <div class="col-md-6">
                                <p>
                                    <span class="font-weight-bold">Address:</span> {{ $reservation->user->address}}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Date and time of reservation:</span> {{ format_date_time($reservation->created_at) }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Expected date and time of reservation: </span> {{ format_date_time($reservation->expected_reservation_date_time) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection
