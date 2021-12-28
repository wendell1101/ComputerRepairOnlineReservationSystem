<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Update Service</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateService" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div id="product-img-placeholder" class="rounded-lg bg-light border h-100 d-flex justify-content-center align-items-center w-100">
                                        @if($img == $service->img)
                                        <img src="{{ asset('storage/service_images/' . $service->img)}} " class="border" style="width:100%" alt="product image" id="product-img">
                                        @else
                                            @if($img)
                                                <img src="{{ $isUploaded ? $img->temporaryUrl() : $img }}" class="border" style="width:100%" alt="product image" id="product-img">
                                            @else
                                            <p class="display-1" id="product-img-alt">
                                                <i class="fas fa-image"></i>
                                            </p>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product-name">Name</label>
                                                    <input type="text" name="name" id="product-name" wire:model="name" class="form-control
                                                        @error('name') is-invalid @enderror
                                                    ">
                                                    @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="product-price">Price</label>
                                                    <input type="number" name="price" wire:model="price" id="product-price" step=".01" class="form-control
                                                        @error('price') is-invalid @enderror
                                                    ">
                                                    @error('price')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="product-description">Description</label>

                                            <textarea name="description" id="product-description" wire:model="description" cols="30" rows="3" class="form-control
                                            @error('description') is-invalid @enderror
                                            "></textarea>

                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="is_available" class="custom-control-input" id="product-status" name="status"
                                                @if($is_available) checked @endif>
                                                <label class="custom-control-label" for="product-status">
                                                    @if($is_available) Available @else Unavailable  @endif
                                                </label>
                                            </div>
                                        </div>

                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="img" id="product-img-btn" wire:model="img" class="custom-file-input
                                                @error('img') is-invalid @enderror
                                                ">
                                                <label for="product-img-btn" class="custom-file-label">jpeg, jpg, png</label>
                                            </div>
                                            @error('img')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-outline-primary float-right" id="product-create-btn">Update Service</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
