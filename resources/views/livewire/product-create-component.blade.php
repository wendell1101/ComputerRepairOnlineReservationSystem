<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Products</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div id="product-img-placeholder" class="rounded-lg bg-light border h-100 d-flex justify-content-center align-items-center w-100">

                                        @if($img)
                                        {{-- {{dd($img)}} --}}
                                        <img src="{{ $isUploaded ? $img->temporaryUrl() : $img }}" class="border" style="width:100%" alt="product image" id="product-img">
                                        @else
                                        <p class="display-1" id="product-img-alt">
                                            <i class="fas fa-image"></i>
                                        </p>
                                        @endif
                                    </div>
                                </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
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

                                            <div class="col-md-6">
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

                                        @if($categories->count() > 0)
                                        <div class="form-group">
                                            <label for="product-category">Category</label>

                                            <select name="product_category_id" id="product-category" wire:model="product_category_id" class="custom-select
                                            @error('product_category_id') is-invalid @enderror
                                            ">

                                                <option value="" selected>Select one</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('product_category_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="is_available" class="custom-control-input" id="product-status" name="status"
                                                @if($is_available) checked @endif>
                                                <label class="custom-control-label" for="product-status">
                                                    @if($is_available) Available @else Unavailable  @endif
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="is_featured" class="custom-control-input" id="product-status2" name="status"
                                                @if($is_featured) checked @endif>
                                                <label class="custom-control-label" for="product-status2">
                                                    @if($is_featured) Featured @else Not Featured  @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="has_discount" class="custom-control-input" id="product-status3" name="status"
                                                @if($has_discount) checked @endif>
                                                <label class="custom-control-label" for="product-status3">
                                                    @if($has_discount) Discount @else No Discount  @endif
                                                </label>
                                            </div>
                                        </div>
                                </div>


                                <div class="col-md-12 mt-2 border-top">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6 mt-4 mt-md-0">
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
                                        </div>

                                        @if($has_discount)
                                             {{-- Discount percentage --}}
                                        <div class="col-lg-6 mt-4 mt-md-0">
                                            <label>
                                                Discount Percentage:
                                            </label>
                                            <div class="m-input-icon m-input-icon--left">
                                                <input type="number" class="form-control @error('discount_percentage') border-danger @enderror" wire:model="discount_percentage">
                                            </div>
                                        </div>

                                        {{-- Discount start date --}}
                                        <div class="col-lg-6 mt-4 mt-md-0">
                                            <label>
                                                Discount Start Date:
                                            </label>
                                            <div wire:ignore>
                                                <input type="date" id="discount_start_date" value="{{$discount_start_date}}" min="{{ date('Y-m-d' )}}"
                                                wire:model="discount_start_date" class="form-control m-input" placeholder="Please pick a date">
                                            </div>
                                            @error('discount_start_date')
                                            <small class="text-danger mt-2">
                                            {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        {{-- Discount end date --}}
                                        <div class="col-lg-6 mt-4 mt-md-0">
                                            <label>
                                                Discount End Date:
                                            </label>
                                            <div wire:ignore>
                                                <input type="date" id="discount_end_date" value="{{$discount_end_date}}" min="{{date("Y-m-d")}}"
                                                wire:model="discount_end_date" class="form-control m-input" placeholder="Please pick a date">
                                            </div>
                                            @error('discount_end_date')
                                            <small class="text-danger mt-2">
                                            {{ $message }}
                                            </small>
                                            @enderror


                                        </div>
                                        @endif

                                        <div class="col-lg-12 mt-4 mt-md-0">
                                                <button type="submit" class="btn btn-outline-primary float-right mt-2" id="product-create-btn">Create Product</button>
                                        <div>

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
