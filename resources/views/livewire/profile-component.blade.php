<div class="my-5">
    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        {{-- CONTACT INFORMATION --}}
        <div class="card shadow-lg --border-radius-30 mb-5">
            <x-alert />
            <div class="card-body p-5">
                <h3 class="--roboto-condensed text-center --bold mb-4"><i class="fas fa-user"></i> PERSONAL INFORMATION</h3>

                <form wire:submit.prevent="updateProfile" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="--poppins">FIRST NAME<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first-name" wire:model="first_name"
                                class="form-control  @error('first_name') is-invalid @enderror" placeholder="John" value="{{auth()->user()->first_name}}">

                                @error('first_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last-name" class="--poppins">LAST NAME<span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name"  wire:model="last_name" class="form-control  @error('last_name') is-invalid @enderror" placeholder="Doe" value="{{auth()->user()->last_name}}">

                                @error('last_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="--poppins">EMAIL<span class="text-danger">*</span></label>
                        <input type="email" name="" id="email" wire:model="email"
                        class="form-control  @error('email') is-invalid @enderror" placeholder="johndoe@mailinator.com" value="{{auth()->user()->email}}">

                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <h3 class="--roboto-condensed text-center --bold mb-4"><i class="far fa-address-card"></i> CONTACT INFORMATION</h3>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="contact_number" class="--poppins">CONTACT NUMBER<span class="text-danger">*</span></label>

                            <input type="text" name="contact_number" id="contact_number" wire:model="contact_number"
                            class="form-control @error('contact_number') is-invalid @enderror" placeholder="09XXXXXXXXX">

                            @error('contact_number')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="fb_link" class="--poppins">SOCIAL MEDIA<span class="text-danger">*</span></label>

                            <input type="text" name="fb_link" id="fb_link" wire:model="fb_link"
                            class="form-control @error('fb_link') is-invalid @enderror" placeholder="https://www.facebook.com/john-doe-01">

                            @error('fb_link')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="house_number" class="--poppins">House Number<span class="text-danger">*</span></label>
                            <input type="text" name="house_number" id="house_number" wire:model="house_number"
                            class="form-control @error('house_number') is-invalid @enderror">

                            @error('house_number')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="street" class="--poppins">Street<span class="text-danger">*</span></label>
                            <input type="text" name="street" id="street" wire:model="street"
                            class="form-control @error('street') is-invalid @enderror">

                            @error('street')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="barangay" class="--poppins">Barangay<span class="text-danger">*</span></label>
                            <input type="text" name="barangay" id="barangay" wire:model="barangay"
                            class="form-control @error('barangay') is-invalid @enderror">

                            @error('barangay')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="province" class="--poppins">Province<span class="text-danger">*</span></label>
                            <input type="text" name="province" id="province" wire:model="province"
                            class="form-control @error('province') is-invalid @enderror">

                            @error('province')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="city" class="--poppins">CITY<span class="text-danger">*</span></label>
                            <input type="text" name="city" id="city" wire:model="city"
                            class="form-control @error('city') is-invalid @enderror">

                            @error('city')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row col-md-6">
                            <div class="form-group col-md-12">
                                <label for="zip_code" class="--poppins">Zip Code<span class="text-danger">*</span></label>
                                <input type="text" name="zip_code" id="zip_code" wire:model="zip_code"
                                class="form-control @error('zip_code') is-invalid @enderror">

                                @error('zip_code')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="--poppins">Country<span class="text-danger">*</span></label>
                        <input type="text" name="country" id="country" wire:model="country"
                        class="form-control @error('country') is-invalid @enderror">

                        @error('country')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <button type="submit" class="btn btn-block --btn-outline-gray --border-radius-30"
                    @if(!$errors->isEmpty()) disabled @endif >
                        UPDATE INFORMATION
                    </button> --}}

                    <button type="submit" class="btn btn-block --btn-outline-gray --border-radius-30">
                        UPDATE INFORMATION
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
