@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container --sample mb-5">
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card shadow-lg border-0 --btn-rounded">
                <div class="card-body">
                    <h3 class="--roboto-condensed --bold --lead text-center mb-5">SIGN IN</h3>
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block --btn-rounded --btn-outline-gray">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <p class="text-center">
                            <a class="--link-dark-green" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection