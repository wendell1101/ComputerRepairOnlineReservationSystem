<div class="container-fluid row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card --border-radius-30 shadow-lg mb-5">
            <div class="card-header bg-light py-4" style="border-radius: 30px 30px 0 0;">
                <div class="row w-100">
                    <div class="col-md-6">
                        <a href="{{route('cart.index')}}" class="btn --btn-outline-gray m"><i class="fas fa-angle-double-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body px-5 pb-5 pt-3">
                <form wire:submit.prevent="store" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="expected_reservation_date_time">Expected Reservation Date and Time<span class="text-danger">*</span></label>
                            <input type="datetime-local" wire:model="expected_reservation_date_time" id="expected_reservation_date" class="form-control
                            @error('expected_reservation_date_time')
                            is-invalid
                           @enderror
                            ">
                            @error('expected_reservation_date_time')
                            <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reservation-case"> Notes (Optional)<span class="text-danger"></span></label>
                        <textarea name="case" id="reservation-case" wire:model="notes" cols="30" rows="3" class="form-control" placeholder="Briefly describe the error/malfunction of your device/gadget"></textarea>
                    </div>

                    {{-- TEMPORARY INPUT. FORGOT TO PUT DEFAULT IN MIGRATIONS --}}
                    <input type="hidden" name="status" value="0">

                    <button type="submit" class="btn btn-block --btn-outline-gray --border-radius-30">
                        Reserve
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card --border-radius-30 shadow-lg mb-5">
            <div class="card-header bg-light py-4" style="border-radius: 30px 30px 0 0;">
                <div class="row w-100">
                    <h4>Your Items</h4>
                </div>

            </div>
            <div class="card-body px-5 pb-5 pt-3">

                <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Qty</th>
                        <th scope="col">SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr class="align-items-center ">
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>
                                @if($item->options->type == 'product')
                                <img src="{{ asset('storage/product_images/' . $item->model->img) }}" alt="product_image" class="border" style="width:100%">
                            @elseif($item->options->type == 'service')
                                <img src="{{ asset('storage/service_images/' . $item->model->img) }}" class="border" style="width:100%">
                            @endif
                            </td>
                            <td>{{ $item->name}}</td>
                            <td>{{ strtoupper($item->options->type) }}</td>
                            <td>{{ $item->qty}}</td>
                            <td>&#8369; {{ $item->subTotal() }}</td>
                        </tr>
                      @endforeach

                    </tbody>
                    Final Total:&#8369; {{ $finalTotal}}
                  </table>
            </div>
        </div>
    </div>
</div>
