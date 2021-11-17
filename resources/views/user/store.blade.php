@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container">
    <h2 class="--roboto-condensed text-center mb-5">PRODUCTS</h2>
    <div class="mb-5">
        <h5 class="--poppins --bold pb-2 mb-4 w-100" style="border-bottom: 2px solid var(--gray-800)">Featured</h5>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30" style="height: 302px;">
                    <img src="{{asset('storage/products/ssd.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;">
                        <h5 class="card-title --roboto-condensed --lead">Solid State Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30" style="height: 302px;">
                    <img src="{{asset('storage/products/hdd.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;">
                        <h5 class="card-title --roboto-condensed --lead">Hard Disk Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30" style="height: 302px;">
                    <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;" >
                        <h5 class="card-title --roboto-condensed --lead">Gaming Earphones</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-5">
        <h4 class="--poppins --bold pb-2 mb-4 w-100" style="border-bottom: 2px solid var(--gray-800)">All</h4>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30" style="height: 302px;">
                    <img src="{{asset('storage/products/ssd.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;">
                        <h5 class="card-title --roboto-condensed --lead">Solid State Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30" style="height: 302px;">
                    <img src="{{asset('storage/products/hdd.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;">
                        <h5 class="card-title --roboto-condensed --lead">Hard Disk Drive</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <div class="card bg-dark text-white shadow-lg --border-radius-30">
                    <img src="{{asset('storage/products/earphones.jpg')}}" class="card-img --border-radius-30" alt="..." height="300px" style="object-fit: cover">
                    <div class="card-img-overlay text-center --border-radius-30" style="background: rgba(0, 0, 0, 0.4); height: 300px;">
                        <h5 class="card-title --roboto-condensed --lead">Gaming Earphones</h5>
                        <p class="card-text --poppins">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- TEMPORARY PAGINATION --}}
        <div class="d-flex justify-content-center">
            <nav aria-label="..." class="">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active " aria-current="page">
                    <a class="page-link --bg-green-50 --text-gray-800" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection