@extends('admin.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('reservations.index')}}" class="btn btn-outline-dark">
                    <i class="fas fa-angle-double-left"></i>
                    <span>Go back</span>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Reservations</li>
                    <li class="breadcrumb-item text-bold active">Update</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
@livewire('admin-reservation-update-component', ['reservation_id' => $id])
<!-- /.content -->
@endsection
