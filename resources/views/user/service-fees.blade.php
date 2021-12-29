@extends('layouts.app')

@section('content')
<div class="--user-background-img">
    <div class="--user-dark-overlay"></div>
</div>

<div class="container">
    <div class="text-justify">
        <div class="row">
            {{-- MAIN SECTION --}}
            <div id="services-fees-main" class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1 offset-sm-0">
                {{-- REPAIR SECTION --}}
                @if($service_categories->count() > 0)
                @foreach($service_categories as $category)
                <section id="services-repair" class="">
                    <div class="row">
                        <h2 class="mb-3 --roboto-condensed --bold col-md-12"> {{ $category->name }}</h2>

                         @foreach($category->services as $service)

                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="my-0 --repair-icons" >
                                    {{-- <i class="fas fa-desktop"></i> --}}
                                    <img src="{{ asset('storage/service_images/' . $service->img) }}" width="130" class="--svg-img"
                                    />
                            </div>
                                <h4 class="--poppins --bold mt-0">{{ $service->name }}</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">&#8369;{{ format_price($service->price) }} <br> {{ \Str::limit(strip_tags($service->description), 100, '...') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>
                <hr>
                @endforeach
                @else
                    <h1>No service Found</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
