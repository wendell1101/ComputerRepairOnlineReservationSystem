<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- ALERT FOR SUCCESSES AND ERRORS --}}
                <x-alert/>
                {{-- MAIN SECTION --}}
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Reservations</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="reservations-table" class="table table-hover table-striped">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th>TRANSACTION ID</th>
                                    <th>Full Name</th>
                                    <th>Order</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Reservation Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach($reservations as $key => $reservation)
                                        <tr>
                                            <td>{{ $loop->index+1}}</td>
                                            <td>{{ $reservation->transaction_id }}</td>
                                        <td>
                                                {{ $reservation->getFullName($reservation->user->first_name, $reservation->user->last_name) }}
                                            <td>
                                                {{ \Str::limit(strip_tags($reservation->items), 30, '...') }}
                                                </td>
                                            <td>{{ $reservation->qty }}</td>
                                            <td>&#8369; {{ format_price($reservation->total_amount) }}</td>
                                            <td>{{ format_date_time($reservation->expected_reservation_date_time)}}</td>
                                            <td>{{ get_reservation_status($reservation->status)}}</td>
                                            <td>
                                                <a href="{{ route('reservations.edit', $reservation->id)}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
