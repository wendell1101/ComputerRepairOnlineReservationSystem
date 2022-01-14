<div class="container justify-content-center">
    <div class="row">
        <div class="col-md-8">
            <div class="card --border-radius-30 shadow-lg mb-5">
                <div class="card-header --bg-gray-50 py-4" style="border-radius: 30px 30px 0 0;">
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
                                <input type="datetime-local" wire:model="expected_reservation_date_time"  id="expected_reservation_date_time" class="form-control
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
        <div class="col-md-4">
            <div class="card --border-radius-30 shadow-lg mb-5 ">
                <div class="card-header --bg-gray-50 py-3" style="border-radius: 30px 30px 0 0;">
                    <h3 class="text-center --roboto-condensed --bold mb-0 --text-gray-800">Your Items</h3>
                    <small class="d-block --text-green text-center --bold --poppins mb-0" style="font-size: 14px">Total:&#8369; {{ $finalTotal}}</small>
                </div>
                <div class="card-body px-5 pb-5 pt-3">
                    @foreach($cart as $item)
                    <div class="row no-gutters w-100 ">
                        {{-- ITEM IMAGE --}}
                        <div class="col-md-5 col-sm-12 d-flex justify-content-center align-items-center">
                            @if($item)
                                @if($item->options->type == 'product')
                                    <img src="{{ asset('storage/product_images/' . $item->model->img) }}" alt="product_image" style="object-fit:scale-down" class="" height="auto" width="100%">
                                @elseif($item->options->type == 'service')
                                    <img src="{{ asset('storage/service_images/' . $item->model->img) }}" alt="service_image" style="object-fit:scale-down" height="auto" width="100%">
                                @endif
                            @endif
                        </div>

                        {{-- ITEM INFO --}}
                        <div class="col-md-7 col-sm-12 p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <dl>
                                    <dt>
                                        <p class="--roboto-condensed --lead --body-16 --text-gray-800 mb-0">{{ $item->name}}</p>
                                    </dt>
                                    <dd>
                                        <ul class="list-unstyled --poppins --text-gray-800" style="font-size: 14px">
                                            <li>
                                                {{ strtoupper($item->options->type) }}
                                            </li>
                                            <li>
                                                Qty: {{ $item->qty}}
                                            </li>
                                            <li>
                                                <strong>
                                                    &#8369; {{ $item->subTotal() }}
                                                </strong>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        // Use Javascript
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
    var yyyy = today.getFullYear();
    var hour = today.getHours();
    var min = today.getMinutes();
    if(dd<10){
    dd='0'+dd
    }
    if(mm<10){
    mm='0'+mm
    }

    // 2017-06-01T08:30
    today = yyyy+'-'+mm+'-'+dd+'T'+hour+':'+min ;
    document.getElementById("expected_reservation_date_time").setAttribute("min", today);

    console.log(document.getElementById("expected_reservation_date_time"));
    </script>
@endsection
