@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="--overlap mb-5">
    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        {{-- LOGIN CREDENTIALS --}}
        <div class="card --border-radius-30 shadow-lg mb-5">
            <div class="card-body p-5 ">
                <h3 class="--roboto-condensed text-center --bold mb-4"><i class="fas fa-sign-in-alt"></i> LOGIN CREDENTIALS</h3>

                <form action="" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="--poppins">FIRST NAME<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first-name" class="form-control  @error('first_name') is-invalid @enderror" placeholder="John" value="{{auth()->user()->first_name}}">
                                
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
                                <input type="text" name="last_name" id="last-name" class="form-control  @error('last_name') is-invalid @enderror" placeholder="Doe" value="{{auth()->user()->last_name}}">

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
                        <input type="email" name="" id="" class="form-control  @error('email') is-invalid @enderror" placeholder="johndoe@mailinator.com" value="{{auth()->user()->email}}">

                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="submit" value="UPDATE CREDENTIALS" class="btn btn-block --border-radius-30 --btn-outline-gray">
                </form>
            </div>
        </div>
    </div>
</div>

<div style="width: 100px; height:35vh; position:relative; z-index:100; top:50%;" class="overflow-x-hidden"></div>

<div class="my-5">
    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        {{-- CONTACT INFORMATION --}}
        <div class="card shadow-lg --border-radius-30 mb-5">
            <div class="card-body p-5">
                <h3 class="--roboto-condensed text-center --bold mb-4"><i class="far fa-address-card"></i> CONTACT INFORMATION</h3>

                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="mobile-number" class="--poppins">MOBILE NUMBER<span class="text-danger">*</span></label>
                        
                        <input type="text" name="mobile_number" id="mobile-number" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="09XXXXXXXXX">

                        @error('mobile_number')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="house-no" class="--poppins">HOUSE NO.</label>
                                <input type="text" name="house_no" id="house-no" class="form-control @error('house_no') is-invalid @enderror" placeholder="Apartment 19D">
                                @error('house_no')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="street" class="--poppins">STREET</label>
                                <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" placeholder="Carnation Street">

                                @error('street')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="barangay" class="--poppins">BARANGAY/SITIO<span class="text-danger">*</span></label>
                                <input type="text" name="barangay" id="barangay" class="form-control @error('barangay') is-invalid @enderror">

                                @error('barangay')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip" class="--poppins">ZIP<span class="text-danger">*</span></label>
                                <input type="text" name="zip" id="zip" class="form-control @error('zip') is-invalid @enderror" placeholder="0000">

                                @error('zip')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="town" class="--poppins">TOWN/CITY<span class="text-danger">*</span></label>
                        <input type="text" name="town" id="town" class="form-control @error('town') is-invalid @enderror">

                        @error('town')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="province" class="--poppins">PROVINCE<span class="text-danger">*</span></label>
                        <input type="text" name="province" id="province" class="form-control @error('province') is-invalid @enderror">

                        @error('province')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="submit" value="UPDATE INFORMATION" class="btn btn-block --btn-outline-gray --border-radius-30">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection