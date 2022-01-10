@extends('layouts.app')

@section('content')
<div class="--user-background-img">
    <div class="--user-dark-overlay"></div>
</div>

<div class="container">
    <div class="col-10 offset-1">
        <div class="card --border-radius-30 shadow-lg mb-5">
            <div class="card-header bg-light py-4" style="border-radius: 30px 30px 0 0;">
                <div class="row w-100">
                    <div class="col-md-6">
                        <h3 class="--roboto-condensed --bold pl-4">YOUR RESERVATIONS</h3>
                    </div>
                    {{-- @if(there are reservations) --}}
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="#" class="btn --btn-outline-gray m"><i class="fas fa-plus"></i></a>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="card-body px-5 pb-5 pt-3">
                <div class="alert alert-info">
                    <p class="--poppins mb-0"><strong><i class="fas fa-info-circle"></i></strong> Welcome, {{Auth::user()->first_name}}! You can view the list of your reservations below.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="--roboto-condensed --body-18">
                            <th>#</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Reservation Date and Time</th>

                        </thead>

                        <tbody class="--poppins">
                            @forelse($reservations as $reservation)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <a href="{{ route('user.reservations.show', $reservation->transaction_id) }}">
                                        {{ strtoupper($reservation->transaction_id) }}
                                    </a>
                                </td>
                                <td>{{ get_reservation_status($reservation->status) }}</td>
                                <td>{{ format_date_time($reservation->created_at) }}</td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="text-center">You have no reservations yet. <strong><a href="#" class="--link-dark-green">Create one.</a></strong></p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
