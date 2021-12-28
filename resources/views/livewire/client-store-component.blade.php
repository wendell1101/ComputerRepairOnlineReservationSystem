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
                    <select class="" wire:change="filterByCategory" wire:model="filter_by_category_id"name="category_id" id="category_id">
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
        <div class="row">
            {{-- ITEM 1 --}}
            @foreach($products as $key => $product)
            <div class="col-md-4 mb-5">
                <figure>
                    <div class="card bg-transparent --text-gray-50 shadow-sm --border-radius-10 --product-card" style="height: 302px;">
                        {{-- IMAGE OF PRODUCT --}}
                        <img src="{{asset('storage/product_images/' . $product->img)}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">

                        <div class="card-img-overlay --border-radius-10 --product-card-overlay" >
                            {{-- NAME OF PRODUCT --}}
                            <h5 class="card-title --roboto-condensed --lead --bold">{{$product->name}}</h5>
                            {{-- DESCRIPTION OF PRODUCT --}}
                            <p class="card-text --poppins">{{ \Str::limit(strip_tags($product->description), 20, '...') }}</p>
                            {{-- LINK TO RESERVE --}}
                            <div class="d-flex justify-content-center align-items-center w-100">
                                <a href="" class="--link-btn-outline-green ">Reserve</a>
                            </div>
                        </div>
                    </div>
                    <figcaption class="mt-3 mb-4 text-center">
                        {{-- NAME OF PRODUCT --}}
                        <h4 class="--roboto-condensed mb-0 ">{{$product->name}}
                            @if(($product->has_discount) && ($product->discounted_price > 0) && ($product->within_discount_date))
                            <span class="badge badge-pill badge-success">{{ $product->discount_percentage }} % </span><small> Off</small>
                            @endif
                        </h4>
                        {{-- PRICE OF PRODUCT --}}
                        <p class="--poppins --body-16">
                            @if(($product->has_discount) && ($product->discounted_price > 0) && ($product->within_discount_date))
                                <small>Discount valid from {{ $product->discount_start_date}} to  {{$product->discount_end_date}} only</small> <br>
                                <del>&#8369; {{ format_price($product->price) }}</del> - &#8369; {{ format_price($product->discounted_price)}}
                            @else
                                &#8369; {{ format_price($product->price) }}
                            @endif

                        </p>
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
                <p class="--body-16 --poppins">For better service, please specify the model and/or the serial number of your unit that needs the upgrade.</p>
            </div>
        </div>
    </div>
</div>
