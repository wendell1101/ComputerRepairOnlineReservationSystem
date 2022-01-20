@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <div class="row no-gutters shadow">
                <div class="col-md-3 col-sm-12 --bg-gray-800 --text-green d-flex justify-content-center align-items-center p-3">
                    <h1 class="mb-0">
                        <i class="fas fa-envelope"></i>
                    </h1>
                </div>
                <div class="col-md-9 col-sm-12 --text-gray-800 --bg-gray-50 p-4">
                    <h3 class="--poppins --bold">{{ __('Verify Your Email Address') }}</h3>
                    <p class="--roboto-condensed --body-18">
                        Before proceeding, please check your email for verification link. If you did not receive the email, click the button below to request another.
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn --btn-outline-green">Click here to request another</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
