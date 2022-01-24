@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>
<div class="container --overlap mb-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2">
            <div class="card shadow-lg border-0 --border-radius-30">
                <div class="card-body p-5">
                    <h3 class="--roboto-condensed --bold --lead text-center mb-5">
                        <i class="fas fa-unlock-alt"></i>
                        RESET PASSWORD
                    </h3>
                    <form method="POST" action="{{ route('password.update') }}" class="mb-2 --poppins">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
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
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                                        <i class="fas fa-lock"></i>
                                    </span>  
                                </div>  

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="repeat new password"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn --btn-outline-gray btn-block --border-radius-30">
                                Reset password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
