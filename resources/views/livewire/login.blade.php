

<div>
    <form  method="POST" action="{{ route('login') }}" class="mb-2 --poppins">
        @csrf
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend ">
                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>

                <input type="text" id="" wire:model="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') ?? ''}}"
                     placeholder="email"><br>
                    @error('email')
                    <span class="text-danger" role="alert"><strong> {{ $message }} </strong></span>
                    @enderror
            </div>

        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text --text-gray-50 --bg-gray-800">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>

                <input id="password" type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror"
                name="password" autocomplete="current-password" placeholder="password">

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

        <button type="submit" wire:click="test" class="btn btn-block --border-radius-30 --btn-outline-gray">
            {{ __('Login') }}
        </button>
    </form>


</div>
