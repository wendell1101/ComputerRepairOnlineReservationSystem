<div class="container">
    <x-alert />
    <div class="text-justify">
        <div class="row">
            {{-- MAIN SECTION --}}
            <div id="services-fees-main" class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1 offset-sm-0">
                <div class="mb-3 --poppins  col-md-12 text-center">
                    <h1 class="--bold mb-0">Here are our basic services...</h1>
                    <p>
                        <a href="#more-info" class="--link-dark-green">
                            <i class="fas fa-info-circle"></i>
                            Check out more info below!
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </p>
                </div>

                {{-- REPAIR SECTION --}}
                @if($service_categories->count() > 0)
                @foreach($service_categories as $category)
                <section id="services-repair" class="">
                    <div class="row">
                        <h2 class="mb-3 --poppins --bold col-md-12"> {{ $category->name }}</h2>

                         @foreach($category->services as $service)

                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col" >
                            <div class="--repair-cards p-4">
                                <div class="my-0 --repair-icons" >
                                    {{-- <i class="fas fa-desktop"></i> --}}
                                    <img src="{{ asset('storage/service_images/' . $service->img) }}" width="130" class="--svg-img"
                                    />
                            </div>
                                <h4 class="--poppins --bold mt-0">{{ $service->name }}</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">&#8369;{{ format_price($service->price) }} <br> {{ \Str::limit(strip_tags($service->description), 40, '...') }}</p>

                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-block --btn-outline-gray-50" wire:click="setSelectServiceId({{$service->id}})" data-toggle="modal" data-target="#more-info-modal">
                                                <i class="fas fa-info-circle"></i>
                                                More Info
                                            </button>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-block --btn-outline-green" wire:click="addToCart({{$service->id}})">
                                                <i class="fas fa-cart-plus"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>

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
                <div class="col-md-12 col-sm-12">
                    <div id="more-info" class="row no-gutters shadow ">
                        <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center p-3">
                            <h1 class="text-center --text-green mb-0">
                                <i class="fas fa-info-circle"></i>
                            </h1>
                        </div>

                        <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                            <ul class="fa-ul --poppins --body-16">
                                <li>
                                    <i class="fa-li fas fa-cog"></i>
                                    Checkup/Diagnosis is <strong>FREE</strong>
                                </li>

                                <li>
                                    <i class="fa-li fas fa-cog"></i>
                                    The repair fee depends on the damage  on your device/unit, so we can only give you the specific price <strong>AFTER</strong> we checked it.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        {{-- More info modal --}}
    @if(!empty($selectedService))
        <div class="modal fade" id="more-info-modal" tabindex="-1" wire:ignore.self role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $selectedService->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 p-2" >
                            <div class="img-container p-2 border" style="max-height: 450px">
                                <img src="{{ asset('storage/service_images/' . $selectedService->img) }}" alt="product image" width="100%" style="max-height:400px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <small>Category: </small>
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold"> {{ $selectedService->product_category_id }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Status: </small>
                                </div>
                                <div class="col">
                                    @if($selectedService->is_available)
                                        <span class="text-success font-weight-bold">Available</span>
                                    @else
                                        <span class="text-danger font-weight-bold">Not Available</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Featured: </small>
                                </div>
                                <div class="col">
                                    @if($selectedService->is_featured)
                                        <span class="text-success font-weight-bold">True</span>
                                    @else
                                        <span class="text-danger font-weight-bold">False</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <small>Price: </small>
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold"> PHP {{ format_price($selectedService->price) }}</span>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <small>Description: </small><br>
                                <span> {{ $selectedService->description }}</span>
                            </div>

                            {{-- Discount Section --}}
                            @if(($selectedService->has_discount) && ($selectedService->discounted_price > 0) && ($selectedService->within_discount_date))
                            <hr>
                            <div>
                                <h4>Discount</h4>
                                <div class="row">
                                    <div class="col">
                                        <small>Discount Percentage:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_price($selectedService->discount_percentage) }} %</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discount Start Date:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_date($selectedService->discount_start_date) ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discount End Date:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">{{ format_date($selectedService->discount_end_date) ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <small>Discounted Price:</small>
                                    </div>
                                    <div class="col">
                                        <span class="font-weight-bold">PHP {{ format_price($selectedService->get_discounted_price($selectedService->price)) }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
            </div>
            </div>
        </div>
    @endif
</div>
