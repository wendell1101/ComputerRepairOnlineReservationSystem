@extends('layouts.app')

@section('content')
<div class="--user-background-img">
    <div class="--user-dark-overlay"></div>
</div>

<div class="container">
    <div class="text-justify">
        <x-alert />
        {{-- MAIN SECTION --}}
        <div id="contacts-main" class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1 offset-sm-0">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 pt-5">
                    <div>
                        <h2 class="--roboto-condensed ml-3 --bold">Contact Details</h2>
                        <ul class="fa-ul --poppins --text-gray-800 --body-18">
                            <li>
                                <i class="fas fa-mobile-alt fa-li"></i>
                                09287158971
                            </li>

                            <li>
                                <a href="" class="--link-dark-green">
                                    <i class="fab fa-facebook-f fa-li"></i>
                                    Facebook
                                </a>
                            </li>

                            <li>
                                <i class="fas fa-envelope fa-li"></i>
                                tech2uccgrs@gmail.com
                            </li>

                            <li>
                                <i class="fas fa-clock fa-li"></i>
                                7am to 6pm
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d65272017.25609229!2d159.8906109!3d-3.1243689!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd41f24c57f5b9%3A0xb025228e1c2d6d67!2sTech2U%20Computer%20%26%20Cellphone%20Gadget%20Repair%20Shop!5e0!3m2!1sen!2sph!4v1638014099921!5m2!1sen!2sph" width="600" height="450" style="border:2px solid var(--gray-800); border-radius:10px;" allowfullscreen="" loading="lazy" class="shadow"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
