<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-outline-dark"  data-toggle="modal" data-target="#createProductModal">
                        <i class="fas fa-plus"></i>
                        <span>New Product</span>
                    </button>
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
                                <table id="products-table" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th scope="col">id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Discount</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th scope="col"></th>
                                    </thead>

                                    <tbody>
                                        @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $product->name}}</td>
                                            <td>&#8369;{{ format_price($product->price) }}</td>
                                            <td>{{ $product->description ?? ''}}</td>
                                            <td>&#8369;{{ format_price($product->discount) }}</td>
                                            <td>{{ $product->product_category_name}}</td>
                                            <td>{{ get_product_status($product->status) }}</td>
                                            <td>{{ format_date_time($product->created_at) }}</td>
                                            <td>
                                                <a href="#" class="text-success">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="#" class="text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

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
                                            <p class="display-1" id="product-img-alt">
                                                <i class="fas fa-image"></i>
                                            </p>
                                            <img src="" alt="product image" id="product-img" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product-name">Name</label>
                                                        <input type="text" name="name" wire:model="name" id="product-name" class="form-control">
                                                        @error('name')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product-price">Price</label>
                                                        <input type="number" name="price" wire:model="price" id="product-price" class="form-control">
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
                                                        <label for="product-discount">Discount</label>

                                                        <input type="number" name="discount" wire:model="discount" id="product-discount" class="form-control" value="0">
                                                        @error('discount')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="img"  id="product-img-btn" class="custom-file-input">
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

                                                <select name="product_category_id" id="product-category" class="custom-select">

                                                    <option value="" disabled selected>Select one</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('product_category_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @endif
                                        </form>
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
        <button type="submit" class="btn btn-success">Send message</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
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
    window.addEventListener('close-modal', function(){
        $("[data-dismiss=modal]").trigger({ type: "click" });
        // $('#updateModal').modal('hide');
    });

</script>
@endsection
