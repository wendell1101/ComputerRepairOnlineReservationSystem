@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container --overlap mb-5">
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card shadow-lg border-0 --border-radius-30">

                <div class="card-body">
                    <h3 class="--roboto-condensed --bold --lead text-center mb-5">SIGN UP</h3>
                    <form method="POST" action="{{ route('register') }}" class="--poppins mb-2">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text --text-gray-50 --bg-gray-800">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="first name">
                                    </div>
        
                                    @error('first_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text --text-gray-50 --bg-gray-800">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="last name">
                                    </div>
        
                                    @error('last_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                <input type="email" id="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                            </div>

                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="new password">
                            </div>

                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block --border-radius-30 --btn-outline-gray">
                            {{ __('Register') }}
                        </button>
                    </form>

                    <p class="text-center --poppins">Already registered? <span><a href="{{ route('login') }}" class="--link-dark-green">Login</a></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection