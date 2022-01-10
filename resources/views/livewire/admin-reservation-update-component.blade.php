<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Edit Reservation</h3>
                        <p><b>Transaction ID:</b>  {{ $reservation->transaction_id }}</p>
                    </div>
                    <div class="card-body">

                        <form wire:submit.prevent="updateReservation" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" wire:model="status" class="form-control">
                                    <option value="0" @if($reservation->status == 0) selected @endif>Pending</option>
                                    <option value="1" @if($reservation->status == 1) selected @endif>Active</option>
                                    <option value="2" @if($reservation->status == 2) selected @endif>Completed</option>
                                    <option value="3" @if($reservation->status == 3) selected @endif>Cancelled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="{{route('reservations.index')}}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                                <div wire:loading class="loading">
                                    Processing please wait...
                                </div>
                            </div>

                        </form>


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
        </div>
    </div>
</section>


@section('css')
<style>
    .loading{
        background: #fff;
        opacity: 0.7;
        width: 100%;
        height: 100%;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 1000;
        color: black;
        font-size: 1.4rem;
    }
</style>
@endsection
