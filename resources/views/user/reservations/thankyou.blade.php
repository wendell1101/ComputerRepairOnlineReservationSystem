@extends('layouts.app')
@section('content')
<div class="--user-background-img">
    <div class="--user-dark-overlay"></div>
</div>

<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column">
        <h1 class="--bold --roboto-condensed my-5" style="font-size: 5vw">Thank you for trusting our service!</h1>
        <a href="{{route('user.reservations')}}" class="btn --link-btn-green text-center"><i class="fas fa-angle-double-left"></i> Go back to reservations</a>
        
    </div>
</div>
@endsection