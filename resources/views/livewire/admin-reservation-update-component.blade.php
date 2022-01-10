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
                                    <option value="0">Pending</option>
                                    <option value="1">Active</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Cancelled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="{{route('reservations.index')}}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
