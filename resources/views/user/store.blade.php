@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container">
    {{-- <h2 class="--roboto-condensed text-center mb-5">PRODUCTS</h2> --}}
    <div class="mb-5">
        <div class="row no-gutters mx-0 px-1 pb-0 mb-4 w-100" style="border-bottom: 2px solid var(--gray-800)">
            <div class="col-md-6 col-sm-12 pb-0">
                <h5 class="--roboto-condensed --bold --body-20">{{'Featured'}}</h5>
            </div>
            <div class="col-lg-1 offset-lg-5 col-md-2 offset-md-4 col-sm-12 offset-sm-0 pb-0 w-100">
                <a id="category-dropdown" class="dropdown-toggle --poppins --body-16 --link-dark-green" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Category
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item --text-gray-800">All</a>

                    <a href="" class="dropdown-item --text-gray-800">Featured</a>

                    <a href="" class="dropdown-item --text-gray-800">Category 1</a>

                    <a href="" class="dropdown-item --text-gray-800">Category 2</a>
                </div>
            </div>
        </div>
        
        {{-- ROW OF PRODUCTS --}}
        <div class="row">
            {{-- ITEM 1 --}}
            <div class="col-md-4 mb-5">
                <figure>
                    <div class="card bg-transparent --text-gray-50 shadow-sm --border-radius-10 --product-card" style="height: 302px;">
                        {{-- IMAGE OF PRODUCT --}}
                        <img src="{{asset('storage/products/ssd.jpg')}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">
                        
                        <div class="card-img-overlay --border-radius-10 --product-card-overlay" >
                            {{-- NAME OF PRODUCT --}}
                            <h5 class="card-title --roboto-condensed --lead --bold">{{'Solid State Drive'}}</h5>
                            {{-- DESCRIPTION OF PRODUCT --}}
                            <p class="card-text --poppins">{{'Brief description of product here'}}</p>
                            {{-- LINK TO RESERVE --}}
                            <div class="d-flex justify-content-center align-items-center w-100">
                                <a href="" class="--link-btn-outline-green ">Reserve</a>
                            </div>
                        </div>
                    </div>
                    <figcaption class="mt-3 mb-4 text-center">
                        {{-- NAME OF PRODUCT --}}
                        <h4 class="--roboto-condensed mb-0 ">{{'Solid State Drive'}}</h4>
                        {{-- PRICE OF PRODUCT --}}
                        <p class="--poppins --body-16">
                            &#8369; {{'0.00'}}
                        </p>
                    </figcaption>
                </figure>
            </div>

            {{-- ITEM 2 --}}
            <div class="col-md-4 mb-5">
                <figure>
                    <div class="card bg-transparent --text-gray-50 shadow-sm --border-radius-10 --product-card" style="height: 302px;">
                        {{-- IMAGE OF PRODUCT --}}
                        <img src="{{asset('storage/products/hdd.jpg')}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">
                        
                        <div class="card-img-overlay --border-radius-10 --product-card-overlay" >
                            {{-- NAME OF PRODUCT --}}
                            <h5 class="card-title --roboto-condensed --lead --bold">{{'Hard Disk Drive'}}</h5>
                            {{-- DESCRIPTION OF PRODUCT --}}
                            <p class="card-text --poppins">{{'Brief description of product here'}}</p>
                            {{-- LINK TO RESERVE --}}
                            <div class="d-flex justify-content-center align-items-center w-100">
                                <a href="" class="--link-btn-outline-green ">Reserve</a>
                            </div>
                        </div>
                    </div>
                    <figcaption class="mt-3 mb-4 text-center">
                        {{-- NAME OF PRODUCT --}}
                        <h4 class="--roboto-condensed mb-0 ">{{'Hard Disk Drive'}}</h4>
                        {{-- PRICE OF PRODUCT --}}
                        <p class="--poppins --body-16">
                            &#8369; {{'0.00'}}
                        </p>
                    </figcaption>
                </figure>
            </div>

            {{-- ITEM 3 --}}
            <div class="col-md-4 mb-5">
                <figure>
                    <div class="card bg-transparent --text-gray-50 shadow-sm --border-radius-10 --product-card" style="height: 302px;">
                        {{-- IMAGE OF PRODUCT --}}
                        <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">
                        
                        <div class="card-img-overlay --border-radius-10 --product-card-overlay" >
                            {{-- NAME OF PRODUCT --}}
                            <h5 class="card-title --roboto-condensed --lead --bold">{{'Gaming earphones'}}</h5>
                            {{-- DESCRIPTION OF PRODUCT --}}
                            <p class="card-text --poppins">{{'Description of product here'}}</p>
                            {{-- LINK TO RESERVE --}}
                            <div class="d-flex justify-content-center align-items-center w-100">
                                <a href="" class="--link-btn-outline-green ">Reserve</a>
                            </div>
                        </div>
                    </div>
                    <figcaption class="mt-3 mb-4 text-center">
                        {{-- NAME OF PRODUCT --}}
                        <h4 class="--roboto-condensed mb-0 ">{{'Gaming earphones'}}</h4>
                        {{-- PRICE OF PRODUCT --}}
                        <p class="--poppins --body-16">
                            &#8369; {{'0.00'}}
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>

        {{-- TEMPORARY PAGINATION --}}
        <div class="mb-5">
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
        </div>

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
@endsection