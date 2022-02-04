<div class="container">
    {{-- <h2 class="--roboto-condensed text-center mb-5">PRODUCTS</h2> --}}
    <div class="mb-5">
        <div class="row no-gutters mx-0 px-1 pb-0 mb-4 w-100" style="border-bottom: 2px solid var(--gray-800)">
            <div class="col-md-6 col-sm-12 pb-0">
                <h5 class="--roboto-condensed --bold --body-20">Available products </h5>
            </div>

            <div class="col-lg-1 offset-lg-5 col-md-2 offset-md-4 col-sm-12 offset-sm-0 pb-0 w-100">
                <form>
                    {{-- <label for="category_id">Category</label> --}}
                    <select class="" wire:change="filterByCategory" wire:model="filter_by_category_id" name="category_id" id="category_id">
                        <option class="--text-gray-800" value="">All</option>
                        <option class="--text-gray-800" value="featured">Featured</option>
                        @foreach($categories as $category)
                        <option class="--text-gray-800" value="{{ $category->id}}">{{ $category->name}}</option>
                        @endforeach
                    </select>

                </form>
                {{-- <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item --text-gray-800 active" >All</a>

                    <a href="" class="dropdown-item --text-gray-800">Featured</a>
                    @foreach($categories as $category)

                    <a href="" class="dropdown-item --text-gray-800">{{ $category->name }}</a>
                @endforeach

            </div> --}}
        </div>
    </div>

    {{-- ROW OF PRODUCTS --}}
    <x-alert />
    <div class="row">

        {{-- ITEM 1 --}}
        @foreach($products as $key => $product)
        <div class="col-md-4 mb-5">
            <figure>
                <div class="card bg-transparent --text-gray-50 shadow-sm --border-radius-10 --product-card" style="height: 302px;">
                    {{-- IMAGE OF PRODUCT --}}
                    <img src="{{asset('storage/product_images/' . $product->img)}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">

                    <div class="card-img-overlay --border-radius-10 --product-card-overlay">
                        {{-- NAME OF PRODUCT --}}
                        <h5 class="card-title --roboto-condensed --lead --bold">{{$product->name}}</h5>
                        {{-- DESCRIPTION OF PRODUCT --}}
                        <p class="card-text --poppins">{{ \Str::limit(strip_tags($product->description), 25, '...') }}</p>
                        {{-- PRODUCT DISCOUNT DESCRIPTION--}}
                        @if(($product->has_discount) && ($product->discounted_price > 0) && ($product->within_discount_date))
                            <p class="card-text --poppins">
                                <small>
                                    {{ $product->discount_percentage }}&percnt; off from {{ $product->discount_start_date}} to {{$product->discount_end_date}} only
                                </small> <br>
                            </p>
                        @endif
                       {{-- LINK FOR MORE INFO --}}
                       <div class="d-flex justify-content-center align-items-center w-100" wire:click="setSelectProductId({{$product->id}})" data-toggle="modal" data-target="#more-info-modal">
                        <button type="button" class="--link-btn-outline-green " >More Info</button>
                        </div>
                    </div>
                </div>
                <figcaption class="mt-3 mb-4 text-center">
                    {{-- NAME OF PRODUCT --}}
                    <h4 class="--roboto-condensed mb-0 ">{{$product->name}}
                    </h4>
                    {{-- PRICE OF PRODUCT --}}
                    <p class="--poppins --body-16">
                        @if(($product->has_discount) && ($product->discounted_price > 0) && ($product->within_discount_date))
                            <span class="badge badge-pill --bg-green --text-gray-800">{{ $product->discount_percentage }} % </span>
                            <del>&#8369; {{ format_price($product->price) }}</del>
                            <span style="font-size: 12px"><i class="fas fa-arrow-right"></i></span> &#8369; {{ format_price($product->discounted_price)}}
                        @else
                            &#8369; {{ format_price($product->price) }}
                        @endif

                    </p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-block --btn-outline-green">
                            <i class="fas fa-cart-plus"></i>
                            Add to cart
                        </button>
                    </form>

                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>

    {{-- {{ $products->links() }} --}}

    {{-- TEMPORARY PAGINATION --}}
    {{-- <div class="mb-5">
            <div class="d-flex justify-content-center">
                <nav aria-label="..." class="">
                    <ul class="pagination --pagination-custom">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>

                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="">2</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">3</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> --}}

    <div class="row no-gutters shadow mb-5">
        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
            <h1 class="text-center --text-green mb-0">
                <i class="fas fa-info-circle"></i>
            </h1>
        </div>

        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
            <ul class="fa-ul --poppins --body-16">
                <li>
                    <i class="fa-li fas fa-cog"></i>
                    For better service, please specify the model and/or the serial number of your unit that needs the upgrade.
                </li>

                <li>
                    <i class="fa-li fas fa-cog"></i>
                    If you want more storage or memory for your computer, we recommend ordering an SSD. Not only does it add space, but it also boots computer faster.
                </li>
            </ul>
        </div>
    </div>
</div>
{{-- More info modal --}}
@if(!empty($selectedProduct))
<div class="modal fade" id="more-info-modal" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg --roboto-condensed" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $selectedProduct->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="img-container p-2 border" style="max-height: 450px">
                            <img src="{{ asset('storage/product_images/' . $selectedProduct->img) }}" alt="product image" width="100%" style="max-height:400px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col">
                                <small>Category: </small>
                            </div>
                            <div class="col">
                                <span class="font-weight-bold"> {{ get_category_name($selectedProduct->product_category_id) }}</span>
                            </div>
                        </div>
                       
                        {{-- <div class="row">
                            <div class="col">
                                <small>Featured: </small>
                            </div>
                            <div class="col">
                                @if($selectedProduct->is_featured)
                                <span class="text-success font-weight-bold">True</span>
                                @else
                                <span class="text-danger font-weight-bold">False</span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col">
                                <small>Price: </small>
                            </div>
                            <div class="col">
                                @if(($selectedProduct->has_discount) && ($selectedProduct->discounted_price > 0) && ($selectedProduct->within_discount_date))
                                    <ul class="list-unstyled">
                                        <li class="font-weight-bold"><del class="text-muted">PHP {{ format_price($selectedProduct->price) }} </del> PHP {{ format_price($selectedProduct->get_discounted_price($selectedProduct->price)) }}</li>
                                        <li class="">{{ format_price($selectedProduct->discount_percentage) }}% off from {{ format_date($selectedProduct->discount_start_date) ?? 'N/A' }} to {{ format_date($selectedProduct->discount_end_date) ?? 'N/A' }}</li>
                                    </ul>
                                @else 
                                    <span class="font-weight-bold"> PHP {{ format_price($selectedProduct->price) }}</span>
                                @endif
                            </div>
                        </div>
                        <hr class="my-2">
                        <div>
                            @if($selectedProduct->is_featured)
                            <span class="badge --bg-green --text-gray-800">Featured</span>
                            @endif
                            <p class="--body-18"> {{ $selectedProduct->description }}</p>
                        </div>

                        {{-- Discount Section --}}
                        {{-- @if(($selectedProduct->has_discount) && ($selectedProduct->discounted_price > 0) && ($selectedProduct->within_discount_date))
                        <hr>
                        <div>
                            <p>{{ format_price($selectedProduct->discount_percentage) }}% off from {{ format_date($selectedProduct->discount_start_date) ?? 'N/A' }} to {{ format_date($selectedProduct->discount_end_date) ?? 'N/A' }}</p>
                        </div>
                        @endif --}}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn --btn-outline-green" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

</div>


@section('js')
<script>
    //
</script>
@endsection

