<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <form action="{{ route('products.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark" @if(!$categories->count() >0 )disabled @endif>
                            <i class="fas fa-plus"></i>
                            <span>New Product</span>
                        </button><br>
                        @if(!$categories->count() >0 )
                        <small class="text-danger">*You must have a category to create a product</small>
                        @endif
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active text-bold">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-dark shadow-lg rounded p-3">
                        <div class="card-header">
                            <h3 class="text-bold">Products</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if($products->count() > 0)
                                <table id="products-table" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Discount</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th scope="col">Actions</th>
                                    </thead>

                                    <tbody>
                                        @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/product_images/' . $product->img) }}"  alt="product_image" width="60" height="60" class="rounded-circle">
                                            </td>
                                            <td>
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    {{ $product->name}}
                                                </a>
                                            </td>
                                            <td>&#8369;{{ format_price($product->price) }}</td>
                                            <td>{{ $product->description ?? ''}}</td>
                                            <td>{{ format_price($product->discount_percentage) }} %</td>
                                        <td>&#8369;{{ format_price($product->get_discounted_price($product->price)) }} </td>
                                            <td>{{ $product->checkIfIsAvailable($product) }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}" class="text-secondary">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="#" class="text-danger" wire:click="setProductIdDelete('{{$product->id}}')" data-toggle="modal" data-target="#deleteModal" >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                    {{ $products->links() }}
                                </table>
                                @else
                                <p>No Product Found </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    {{-- Delete modal --}}

        <!--Delete Modal -->
        <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product? </p>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button"  class="btn btn-danger" data-dissmiss="modal">Yes Delete</button> --}}
                    <button type="button" wire:click="destroy" class="btn btn-danger" data-dismiss="modal">Yes Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>


    {{-- Product Create Modal --}}

    <div class="modal fade" wire:ignore.self id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-outline card-dark shadow-lg rounded p-3">
                                        <div class="card-header">
                                            <h3 class="text-bold">Products</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- preview --}}
                                                <div class="col-12">
                                                    <div id="product-img-placeholder" class="rounded-lg bg-light h-100 d-flex justify-content-center align-items-center w-100">

                                                        @if($img)
                                                        {{-- {{dd($img)}} --}}
                                                        <img src="{{ $isUploaded ? $img->temporaryUrl() : $img }}" class="border" style="width:80%" alt="product image" id="product-img">
                                                        @else
                                                        <p class="display-1" id="product-img-alt">
                                                            <i class="fas fa-image"></i>
                                                        </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="product-name">Name</label>
                                                                    <input type="text" name="name" wire:model="name" value="{{ old($name) ?? ''}}" id="product-name" class="form-control">
                                                                    @error('name')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="product-price">Price</label>
                                                                    <input  name="price" wire:model="price" value="{{ old($price) ?? ''}}" id="product-price" class="form-control">
                                                                    @error('price')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="product-description">Description</label>

                                                            <textarea name="description" wire:model="description" id="product-description" cols="30" rows="3" class="form-control"></textarea>

                                                            @error('description')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="product-discount">Discount Percentage</label>

                                                                    <input name="discount_percentage" wire:model="discount_percentage" value="{{ old($discount_percentage) ?? ''}}" id="product-discount" class="form-control">
                                                                    @error('discount_percentage')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Image</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="img" wire:model="img" id="product-img-btn" class="custom-file-input">
                                                                        <label for="product-img-btn" class="custom-file-label">jpeg, jpg, png</label>
                                                                    </div>
                                                                    @error('img')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if($categories->count() > 0)
                                                        <div class="form-group">
                                                            <label for="product-category">Category</label>

                                                            <select name="product_category_id" id="product-category" wire:model.lazy="product_category_id" class="custom-select">

                                                                <option value="" selected>Select one</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('product_category_id')
                                                            <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                        @endif

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create Product</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('css')
<style>

</style>
@endsection
@section('js')
<script>
    window.addEventListener('close-modal', function() {
        $("[data-dismiss=modal]").trigger({
            type: "click"
        });
        $('#createProductModal').modal('hide');
    });

</script>
@endsection

