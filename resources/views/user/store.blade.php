@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container">
    <h2 class="--roboto-condensed text-center mb-5">PRODUCTS</h2>
    <div class="mb-5">
        <h4 class="--poppins --bold --lead text-center mb-4">Featured products</h4>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/ssd.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Solid State Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/hdd.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Hard Disk Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Gaming Earphones</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-5">
        <h4 class="--poppins --bold --lead text-center mb-4">All Products</h4>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/ssd.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Solid State Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/hdd.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Hard Disk Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img --border-radius-30" alt="...">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4)">
                        <h5 class="card-title --roboto-condensed --lead">Gaming Earphones</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection