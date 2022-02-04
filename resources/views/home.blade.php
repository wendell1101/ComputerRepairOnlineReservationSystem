@extends('layouts.app')

@section('content')
<div class="--user-background-img">
    <div class="--user-dark-overlay"></div>
</div>

<div class="container">
    <div class="col-10 offset-1">
        <div class="card --border-radius-30 shadow-lg mb-5">
            <div class="card-header bg-light py-4" style="border-radius: 30px 30px 0 0;">
                <div class="row w-100">
                    <div class="col-md-6">
                        <h3 class="--roboto-condensed --bold pl-4">YOUR RESERVATIONS</h3>
                    </div>
                    {{-- @if(there are reservations) --}}
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('user.create')}}" class="btn --btn-outline-gray m"><i class="fas fa-plus"></i></a>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="card-body px-5 pb-5 pt-3">
                <div class="alert alert-info">
                    <p class="--poppins"><strong><i class="fas fa-info-circle"></i></strong> Welcome, {{Auth::user()->first_name}}! You can view the list of your reservations below.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="--roboto-condensed --body-18">
                            <th scope="col">Date</th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody class="--poppins">
                            {{-- @forelse($reservations as $reservation) --}}
                            <tr>
                                <td>Jan 11, 2022</td>
                                <td>---</td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>Not yet done</td>
                                <td>
                                    <a href="{{route('user.edit')}}" role="button" data-placement="top" title="Edit" class="btn --btn-outline-gray" style="font-weight: 400; text-transform: none;">
                                        <i class="far fa-edit"></i> Edit
                                    </a>
    
                                    <a href="" role="button" data-placement="top" title="Delete" class="btn btn-outline-danger">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                            </tr>
    
                            <tr>
                                <td>Feb 01, 2022</td>
                                <td>SSD</td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>Not yet done</td>
                                <td>
                                    <a href="{{route('user.edit')}}" role="button" data-placement="top" title="Edit" class="btn --btn-outline-gray" style="font-weight: 400; text-transform: none;">
                                        <i class="far fa-edit"></i> Edit
                                    </a>
    
                                    <a href="" role="button" data-placement="top" title="Delete" class="btn btn-outline-danger">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            {{-- @empty --}}
                                <tr>
                                    <td colspan="5">
                                        <p class="text-center">You have no reservations yet. <strong><a href="{{route('user.create')}}" class="--link-dark-green">Create one.</a></strong></p>
                                    </td>
                                </tr>
                            {{-- @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
