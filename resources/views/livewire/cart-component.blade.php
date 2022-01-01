<div class="card container">
    <div class="card-header">
        <h1>Cart Items</h1>
    </div>

    <div class="card-body">
        <x-alert />
        @if($cartItems->count() > 0)
        <div class="table-responsive">
            <table id="products-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th scope="col">Actions</th>
                </thead>
                <tbody>
                    @foreach($cartItems as $key => $item)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>
                            @if($item->options->type == 'product')
                            <img src="{{ asset('storage/product_images/' . $item->model->img) }}" alt="product_image" width="60" height="60" class="rounded-circle border">
                            @elseif($item->options->type == 'service')
                            <img src="{{ asset('storage/service_images/' . $item->model->img) }}" alt="service_image" width="60" height="60" class="rounded-circle border">
                            @endif
                        </td>
                        <td>
                            <a href="#">
                                {{ $item->name}}
                            </a>
                        </td>
                        <td>{{ $item->options->type }}</td>
                        <td>&#8369; {{ format_price($item->price) }}</td>
                        <td>{{ \Str::limit(strip_tags($item->model->description), 30, '...') }}</td>
                        <td class="qty" data-title="Qty">
                            <div class="d-flex">

                                <input type="number" id="quant[{{$item->rowId}}]" name="quant[{{$item->rowId}}]"
                                    data-field="quant[{{$item->rowId}}]"
                                    wire:change="updateCartProduct('{{$item->rowId}}', document.getElementById('quant[{{$item->rowId}}]').value )"
                                    class="input-number mx-2" data-min="1" data-max="1000000000000" min="1" value="{{$item->qty}}"
                                    style="width: 50px;"/>
                            </div>
                        </td>
                        <td>&#8369; {{ $item->subTotal()}}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" wire:click="remove('{{$item->rowId}}')">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="float-right">
            <h5>Total: &#8369; {{ $finalTotal }}</h5>
            <button class="btn btn-success btn-block"> CHECKOUT</button>
        </div>
        @else
        <p>No Item Found</p>
        @endif
    </div>

</div>
