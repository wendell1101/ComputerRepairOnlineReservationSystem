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
                        <a href="{{route('home')}}" class="btn --btn-outline-gray m"><i class="fas fa-angle-double-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body px-5 pb-5 pt-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="reservation-product">Product</label>
                        <select name="product_id" id="reservation-product" class="custom-select">
                            <option value="" selected disabled>Select a product</option>
                            <option value="{{'id here'}}">SSD</option>
                            <option value="{{'id here'}}">Hard disk drive</option>
                        </select>
                    </div>
                
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="reservation-date">Date <span class="text-danger">*</span></label>
                            <input type="date" name="" id="reservation-date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="reservation-time">Time <span class="text-danger">*</span></label>
                            <input type="time" name="" id="reservation-time" class="form-control">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="reservation-case">Fault Description <span class="text-danger">*</span></label>
                        <textarea name="case" id="reservation-case" cols="30" rows="3" class="form-control" placeholder="Briefly describe the error/malfunction of your device/gadget"></textarea>
                    </div>
                
                    {{-- TEMPORARY INPUT. FORGOT TO PUT DEFAULT IN MIGRATIONS --}}
                    <input type="hidden" name="status" value="0">
                
                    <input type="submit" value="UPDATE" class="btn btn-block --btn-outline-gray --border-radius-30">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

