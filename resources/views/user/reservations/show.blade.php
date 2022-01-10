@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px; margin-bottom:100px">
    <article class="card shadow">
        <div class="card-body">
            <h6>Transaction Id: {{ $reservation->transaction_id}}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Reservation Date and Time:</strong> <br>{{ format_date_time($reservation->expected_reservation_date_time)}}</div>
                    <div class="col"> <strong>Service By:</strong> <br> Tech2u, | <i class="fa fa-phone"></i> +639959768531 </div>
                    <div class="col text-uppercase"> <strong>Status:</strong> <br> {{ get_reservation_status($reservation->status) }}</div>
                    <div class="col"> <strong>Transaction Id #:</strong> <br> {{ $reservation->transaction_id}}</div>
                </div>
            </article>
            <div class="track">
               @if($reservation->status === 0)
                <div class="step active"> <span class="icon"> <i class="far fa-clock"></i> </span> <span class="text">Pending</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-clipboard-check"></i> </span> <span class="text"> Active</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Completed</span> </div>
               @elseif($reservation->status === 1)
               <div class="step active"> <span class="icon"> <i class="far fa-clock"></i> </span> <span class="text">Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-clipboard-check"></i> </span> <span class="text">Active</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Completed</span> </div>
                @elseif($reservation->status === 2)
                <div class="step active"> <span class="icon"> <i class="far fa-clock"></i> </span> <span class="text">Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-clipboard-check"></i> </span> <span class="text"> Active</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Completed</span> </div>
                @elseif($reservation->status === 3)
                <div class="step active"> <span class="icon"> <i class="far fa-clock"></i> </span> <span class="text">Pending/span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-clipboard-check"></i> </span> <span class="text"> Active</span> </div>
                <div class="step active" > <span class="icon"> <i class="far fa-window-close"></i> </span> <span class="text">Cancelled</span> </div>
                @endif
            </div>
            <hr>

            <ul class="row">
                {{-- {{$reservation->items}} --}}

                @foreach(json_decode($reservation->items) as $key => $item)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside">
                            @if($item->options->type == 'service')
                                <img src="{{ asset('storage/service_images/' .  $item->img ) }}" alt="image"  class="img-sm border">
                            @elseif($item->options->type == 'product')
                                <img src="{{ asset('storage/product_images/' .  $item->img ) }}" alt="image"  class="img-sm border">
                            @else
                            {{-- Todo:: Add default image --}}
                            @endif
                        </div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{ $item->name }} ({{ $item->qty }})<br></p>
                            <span class="text-muted">
                                Type: {{strtoupper($item->options->type)}}
                            </span><br>
                            <span class="text-muted">
                                    PHP {{ format_price($item->price) }}
                            </span><br>
                        </figcaption>
                    </figure>
                </li>
                @endforeach

            </ul>
            <span>Grand Total: PHP {{ format_price($reservation->total_amount)}}</span>

            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Personal Information</h5>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <span class="font-weight-bold">Name:</span>
                                {{ strtoupper($reservation->user->first_name . ' ' . $reservation->user->last_name) }}
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
            <a href="{{ route('user.reservations') }}" class="btn btn-success" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to reservations</a>
        </div>
    </article>
</div>
@endsection

@section('css')
<style>

 @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #3cd458
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #3cd458;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}

</style>

    {{-- <link rel="stylesheet" href="{{asset('css/order_progress.css')}}"> --}}

@endsection
