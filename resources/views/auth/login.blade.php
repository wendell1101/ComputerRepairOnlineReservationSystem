@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container --overlap mb-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2">
            <div class="card shadow-lg border-0 --border-radius-30">
                <div class="card-body">
                    <h3 class="--roboto-condensed --bold --lead text-center mb-5">SIGN IN</h3>
                    <form method="POST" action="{{ route('login') }}" class="mb-2 --poppins">
                        @csrf
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

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                            </div>

                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-lg-8 col-md-10 col-sm-12 d-flex pl-1">
                                <input class="--checkbox mr-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block --border-radius-30 --btn-outline-gray">
                            {{ __('Login') }}
                        </button>
                    </form>

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session()->get('error')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Route::has('password.request'))
                        <p class="text-center mb-0 --poppins">
                            <a class="--link-dark-green" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </p>
                    @endif

                    <p class="text-center --poppins">Not a member? <span><a href="{{ route('register') }}" class="--link-dark-green">Register now</a></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection