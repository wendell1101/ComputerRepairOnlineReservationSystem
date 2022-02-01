<section class="content">
    <div class="container-fluid">
        <div class="row">`
            <div class="col-sm-12">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Update User</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateUser" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div id="product-img-placeholder" class="rounded-lg bg-light border h-100 d-flex justify-content-center align-items-center w-100">

                                        @if( !is_null($img) && $img == $user->img)
                                        <img src="{{ asset('storage/user_images/' . $user->img)}} " class="border" style="width:100%" alt="product image" id="product-img">
                                        @else
                                            @if(!is_null($img))
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" name="first_name" id="first_name" wire:model="first_name" readonly class="form-control
                                                        @error('first_name') is-invalid @enderror
                                                    ">
                                                    @error('first_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name" wire:model="last_name" readonly class="form-control
                                                        @error('last_name') is-invalid @enderror
                                                    ">
                                                    @error('last_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" wire:model="email" id="email" class="form-control
                                                        @error('email') is-invalid @enderror
                                                    " readonly>
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="is_admin" class="custom-control-input" id="product-status" name="status"
                                                @if($is_admin) checked @endif>
                                                <label class="custom-control-label" for="product-status">
                                                    @if($is_admin) Admin @else Client  @endif
                                                </label>
                                            </div>
                                            {{-- <div class="custom-control custom-switch">
                                                <input type="checkbox" wire:model="is_active" class="custom-control-input" id="product-status2" name="status"
                                                @if($is_active) checked @endif>
                                                <label class="custom-control-label" for="product-status2">
                                                    @if($is_active) Active @else Inactive  @endif
                                                </label>
                                            </div> --}}
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
                                            <button type="submit" class="btn btn-outline-primary float-right" id="product-create-btn">Update User</button>
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
