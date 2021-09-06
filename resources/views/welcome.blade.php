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

                <a href="#" class="btn --border-radius-30 --btn-outline-green mt-2">Book appointment</a>
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
                    <p class="--roboto-condensed --body-20">We accept desktops, laptops, smartphones, tablets, and even smart TVs; and make 'em run like its brand new!</p>

                    <a href="{{route('servicefees')}}#repair-section" class="btn --border-radius-30 --btn-outline-gray mt-2">View</a>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-3 mt-0">
                        <i class="fas fa-arrow-alt-circle-up"></i>
                    </div>
                    <h3 class="--poppins --bold">Upgrade</h3>
                    <p class="--roboto-condensed --body-20">Is your device too slow? Or is your screen cracked? Let us optimize your device performance.</p>

                    <a href="{{route('servicefees')}}#upgrade-section" class="btn --border-radius-30 --btn-outline-gray mt-2">View</a>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-3 mt-0">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3 class="--poppins --bold">Print</h3>
                    <p class="--roboto-condensed --body-20">Documents? Photos? Temporary license plate? We got you! You can send it through our email or visit us personally.</p>

                    <a href="{{route('servicefees')}}#print-section" class="btn --border-radius-30 --btn-outline-gray mt-2">View</a>
                </div>
            </div>
        </section>

        {{-- DESCRIPTION SECTION --}}
        <section id="3rd-section" class="my-5 py-5 px-3">
            <div class="row mt-5">
                <div class="col-md-6 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <img src="{{asset('img/broken-phone.jpg')}}" alt="#" width="100%" class="rounded shadow-lg">
                </div>
                <div class="col-md-6">
                    <h3 class="mt-0 --poppins --bold" style="font-size: 69px;">No fix,</h3>
                    <h2 class="mt-2 --poppins --bold" style="font-size: 103px;">NO FEE!</h2>
                    <p class="--lead --roboto-condensed text-justify">We only charge customers for repair and/or upgrades on your electronics. Diagnosis is free!</p>
                </div>
            </div>
        </section>

        {{-- FEATURED SECTION --}}
        <section id="4th-section" class="my-5 py-5 px-3">
            <h2 class="text-center --poppins --bold" style="font-size: 40px">Featured Products</h2>

            <div class="row mt-3">               
                <div class="col-md-4 mb-5">
                    <div class="card bg-dark text-white shadow-lg">
                        <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img" alt="...">
                        <div class="card-img-overlay text-center" style="background: rgba(0, 0, 0, 0.4)">
                            <h5 class="card-title --roboto-condensed --lead">Card title</h5>
                            <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card bg-dark text-white shadow-lg">
                        <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img" alt="...">
                        <div class="card-img-overlay text-center" style="background: rgba(0, 0, 0, 0.4)">
                            <h5 class="card-title --roboto-condensed --lead">Card title</h5>
                            <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card bg-dark text-white shadow-lg">
                        <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img" alt="...">
                        <div class="card-img-overlay text-center" style="background: rgba(0, 0, 0, 0.4)">
                            <h5 class="card-title --lead">Card title</h5>
                            <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQs SECTION --}}
        <section id="5th-section" class="my-5 py-5 px-3">
            <h2 class="text-center --poppins --bold" style="font-size: 40px">Frequently Asked Questions</h2>

            <div id="faqs-collapse" class="accordion mt-3">
                <div class="card">
                    <div class="card-header --bg-gray-50">
                        <button class="btn btn-block btn-link " type="button" data-target="#faqs-1" data-toggle="collapse">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="--roboto-condensed --body-20 text-left">How much for the checkup/diagnosis fee?</h3>
                                </div>

                                <div class="col-2 --body-20 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div id="faqs-1" class="collapse" data-parent="#faqs-collapse">
                        <div class="card-body">
                            <p class="--body-16">Zero! We only charge fees when we repaired or upgraded your device. Otherwise, it's free.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header --bg-gray-50">
                        <button class="btn btn-block btn-link " type="button" data-target="#faqs-2" data-toggle="collapse">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="--roboto-condensed --body-20 text-left">Do you have a fixed repair fee?</h3>
                                </div>

                                <div class="col-2 --body-20 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div id="faqs-2" class="collapse" data-parent="#faqs-collapse">
                        <div class="card-body">
                            <p class="--body-16">Zero! We only charge fees when we repaired or upgraded your device. Otherwise, it's free.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header --bg-gray-50">
                        <button class="btn btn-block btn-link " type="button" data-target="#faqs-3" data-toggle="collapse">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="--roboto-condensed --body-20 text-left">My device runs so slow. What could be the problem?</h3>
                                </div>

                                <div class="col-2 --body-20 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div id="faqs-3" class="collapse" data-parent="#faqs-collapse">
                        <div class="card-body">
                            <p class="--body-16">Zero! We only charge fees when we repaired or upgraded your device. Otherwise, it's free.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header --bg-gray-50">
                        <button class="btn btn-block btn-link " type="button" data-target="#faqs-4" data-toggle="collapse">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="--roboto-condensed --body-20 text-left">My device suddenly won't work. It was fine a while ago. Why is that?</h3>
                                </div>

                                <div class="col-2 --body-20 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div id="faqs-4" class="collapse" data-parent="#faqs-collapse">
                        <div class="card-body">
                            <p class="--body-16">Zero! We only charge fees when we repaired or upgraded your device. Otherwise, it's free.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection