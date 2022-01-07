<div class="container">
    <x-alert />
    <h1 class="--roboto-condensed --lead-30 --bold">Cart Items</h1>

    @if($cartItems->count() > 0)
        @foreach($cartItems as $key => $item)
            <div class="row no-gutters shadow w-100 --bg-gray-50 mb-5">
                {{-- IMAGE --}}
                <div class="col-md-3 col-sm-12 d-flex --bg-gray-800">
                    <div class="justify-content-center align-items-center p-3 w-100">
                        @if($item->options->type == 'product')
                            <img src="{{ asset('storage/product_images/' . $item->model->img) }}" alt="product_image" style="object-fit:scale-down" class="" height="auto" width="100%">
                        @elseif($item->options->type == 'service')
                            <img src="{{ asset('storage/service_images/' . $item->model->img) }}" alt="service_image" style="object-fit:scale-down" height="auto" width="100%">
                        @endif
                    </div>
                </div>

                {{-- ORDER INFO --}}
                <div class="col-md-9 col-sm-12 p-3">
                    {{-- REMOVE BUTTON --}}
                    <div class="d-flex align-items-center justify-content-md-end">
                        <button class="btn btn-danger btn-sm my-3" wire:click="remove('{{$item->rowId}}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    {{-- INFO --}}
                    <div class="d-flex align-items-center justify-content-between">
                        <dl>
                            <dt>
                                {{-- ITEM NAME --}}
                                <a href="#" class="--roboto-condensed --lead --link-dark-green">
                                    {{ $item->name}}
                                </a>
                            </dt>

                            <dd>
                                <ul class="list-unstyled --poppins --body-18 --text-gray-800">
                                    {{-- ITEM TYPE --}}
                                    <li>{{ $item->options->type }}</li>
                                    {{-- ITEM PRICE --}}
                                    <li class="--bold">&#8369; {{ format_price($item->price) }}</li>
                                    {{-- ITEM DESCRIPTION --}}
                                    <li>{{ \Str::limit(strip_tags($item->model->description), 30, '...') }}</li>
                                </ul>
                            </dd>
                        </dl>

                        <div class="form-group">
                            {{-- ITEM QUANTITY --}}
                            <label for="quant[{{$item->rowId}}]" class="d-block text-center">Qty</label>

                            <div class="row no-gutters">
                                {{-- NUMBER FIELD --}}
                                <div class="col-8 --order-qty-box">
                                    <input type="number" id="quant[{{$item->rowId}}]" name="quant[{{$item->rowId}}]"
                                        data-field="quant[{{$item->rowId}}]"
                                        wire:change="updateCartProduct('{{$item->rowId}}', document.getElementById('quant[{{$item->rowId}}]').value )"
                                        class="--input-number mx-2" data-min="1" data-max="10" min="1" value="{{$item->qty}}"
                                        style="width: 50px;"/>
                                </div>
                                {{-- NUMBER FIELD CONTROL BUTTONS --}}
                                <div class="col-4">
                                    {{-- PLUS --}}
                                    <div class="--qty-up-btn">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    {{-- MINUS --}}
                                    <div class="--qty-down-btn">
                                        <i class="fas fa-minus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- SUBTOTAL --}}
                    <div class="d-flex justify-content-end align-items-center px-3 py-1">
                        <p class="--roboto-condensed --text-gray-800 --body-18">
                            subtotal:
                            <span class="--bold --body-20">&#8369; {{ $item->subTotal()}}</span>
                        </p>
                    </div>
                </div>
            </div>


        @endforeach

        @if(is_null(auth()->user()->address))
            <span class="text-danger">Note: You must complete your contact information first to continue, Edit your profile
                <a href="{{ route('user.profile') }}">here</a>
            </span>
        @endif
        {{-- FINAL TOTAL --}}
        <div class="float-right my-4">
            <h5>Total: &#8369; {{ $finalTotal }}</h5>
            <form action="{{ route('reserve.checkout') }}" method="GET" >
                <button class="btn btn-success btn-block" type="submit" @if(is_null(auth()->user()->address)) disabled @endif> RESERVE</button>
            </form>

        </div>
    @else
        <div class="col-8 offset-2">
            <p>No Item Found</p>
        </div>
    @endif
</div>
