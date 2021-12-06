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
                    <livewire:login />

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
