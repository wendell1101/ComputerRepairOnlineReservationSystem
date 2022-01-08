@extends('layouts.app')

@section('content')
<div>
    {{-- HERO SECTION --}}
    <section id="hero-section">
        {{-- USE BACKGROUND IMAGE FOR THIS SECTION --}}
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center py-5">
                <div class="--text-gray-50">
                    <h1 class="display-3 --roboto-condensed --bold mt-0">Tech2U</h1>
                    <p class="--roboto-condensed --lead-lg mb-0">Computer & Cellphone Gadget Repair Shop</p>
                    <p class="--roboto-condensed --body-20">Fixing your devices to make it run like brand new!</p>
                </div>

                <a href="{{route('user.create')}}" class="btn --border-radius-30 --btn-outline-green mt-2">Book appointment</a>
            </div>
        </div>
    </section>

    <div class="container mt-3">
        {{-- SERVICES SECTION --}}
        <section id="2nd-section" class="mb-5">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-3 mt-0">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="--poppins --bold">Repair</h3>
                    <p class="--roboto-condensed --body-20">Is your device corrupted by virus? Spilled with water? Did it fall on the ground? Bring it over and we'll fix it!</p>

                    {{-- <a href="{{route('servicefees')}}#services-repair" class="btn --border-radius-30 --btn-outline-gray mt-2">Learn more</a> --}}
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-3 mt-0">
                        <i class="fas fa-arrow-alt-circle-up"></i>
                    </div>
                    <h3 class="--poppins --bold">Upgrade</h3>
                    <p class="--roboto-condensed --body-20">Is your device too slow? Or is your screen cracked? Let us optimize your device performance.</p>

                    {{-- <a href="{{route('servicefees')}}#services-upgrade" class="btn --border-radius-30 --btn-outline-gray mt-2">Learn more</a> --}}
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-3 mt-0">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3 class="--poppins --bold">Print</h3>
                    <p class="--roboto-condensed --body-20">Documents? Photos? Temporary license plate? We got you! You can send it through our email or visit us personally.</p>

                    {{-- <a href="{{route('servicefees')}}#services-print" class="btn --border-radius-30 --btn-outline-gray mt-2">Learn more</a> --}}
                </div>
            </div>
        </section>
    </div>

    {{-- DESCRIPTION SECTION --}}
    <section id="desc-section" class="my-5 py-5 px-3">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <img src="{{asset('img/broken-phone.jpg')}}" alt="#" width="100%" class="shadow-lg">
                </div>
                <div class="col-md-6">
                    <h3 class="mt-0 --poppins --bold" style="font-size: 69px;">No fix,</h3>
                    <h2 class="mt-2 --poppins --bold" style="font-size: 103px;">NO FEE!</h2>
                    <p class="--lead --roboto-condensed text-justify">We only charge customers for repair and/or upgrades on your electronics. Diagnosis is free!</p>
                </div>
            </div>
        </div>

    </section>

    <div class="container mt-3">
        {{-- FEATURED SECTION --}}
        @if($featuredProducts->count() > 0)
        <section id="4th-section" class="my-5 py-5 px-3">
            <h2 class="text-center --poppins --bold mb-5" style="font-size: 40px">Featured Products</h2>

            <div class="row mt-3">
                @foreach($featuredProducts as $key => $product)
                    <div class="col-md-4 mb-5">
                    <div class="card bg-transparent text-white shadow-sm --border-radius-10" style="height: 302px;">
                        <img src="{{asset('storage/product_images/' . $product->img)}}" class="card-img --border-radius-10" alt="..." height="300px" style="object-fit: cover">

                        <div class="card-img-overlay --border-radius-10 --product-card-overlay">
                            <h5 class="card-title --roboto-condensed --lead --bold">{{ $product->name }}</h5>
                            <p class="card-text --poppins"> {{ \Str::limit(strip_tags($product->description), 25, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a href="{{ route('user.store') }}" class="float-right --link-dark-green">
                See More <i class="fas fa-angle-double-right"></i>
            </a>
        </section>
        @endif

        {{-- FAQs SECTION --}}
        <section id="frequently-asked-questions" class="my-5 py-5 px-3">
            <h2 class="text-center --poppins --bold" style="font-size: 40px">Frequently Asked Questions</h2>

            <div class="row my-5">
                {{-- ROW 1 --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row no-gutters shadow mb-5 --faqs-box">
                        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
                            <h1 class="text-center --text-green mb-0">
                                <i class="fas fa-question-circle"></i>
                            </h1>
                        </div>

                        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                            <h3 class="--roboto-condensed --body-20 text-left">How much for the checkup/diagnosis fee?</h3>
                            <p class="--body-16 --poppins">Zero! We only charge fees when we repaired or upgraded your device. Otherwise, it's free.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row no-gutters shadow mb-5 --faqs-box">
                        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
                            <h1 class="text-center --text-green mb-0">
                                <i class="fas fa-question-circle"></i>
                            </h1>
                        </div>

                        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                            <h3 class="--roboto-condensed --body-20 text-left">Do you have a fixed repair fee?</h3>
                            <p class="--body-16 --poppins">No, we don't. Our charge for repair depends on the damage we had to fix. We first inform our clients of their device's condition, recommend the best fix for it, then ask them if we shall proceed.</p>
                        </div>
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row no-gutters shadow mb-5 --faqs-box">
                        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
                            <h1 class="text-center --text-green mb-0">
                                <i class="fas fa-question-circle"></i>
                            </h1>
                        </div>

                        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                            <h3 class="--roboto-condensed --body-20 text-left">My device runs so slow. What could be the problem?</h3>
                            <p class="--body-16 --poppins">Most often, this can resolved by clearing the cache or cleaning the hardware components. However, there are times that it is caused by malware.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row no-gutters shadow mb-5 --faqs-box">
                        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
                            <h1 class="text-center --text-green mb-0">
                                <i class="fas fa-question-circle"></i>
                            </h1>
                        </div>

                        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                            <h3 class="--roboto-condensed --body-20 text-left">My device suddenly won't work. It was fine a while ago. Why is that?</h3>
                            <p class="--body-16 --poppins">There can be a variety of reasons this happened. To know what may have caused the malfunction, remember what did you last do and tell us what exactly happened.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
