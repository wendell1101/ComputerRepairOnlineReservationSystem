@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

{{-- <div style="width: 100px; height:35vh; position:relative; z-index:100; top:50%;" class="overflow-x-hidden"></div> --}}

@livewire('profile-component')
@endsection
