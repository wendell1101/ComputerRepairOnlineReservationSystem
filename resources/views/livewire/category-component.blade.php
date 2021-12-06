<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-dark shadow-lg rounded p-3">
                    <div class="card-header">
                        <h3 class="text-bold">Products</h3>
                    </div>
                        <div class="mb-4" wire:ignore>
                            <form  wire:submit.prevent="store">
                                @csrf
                                <div class="form-group row">
                                    <label for="category-name" class="col-sm-2 col-form-label">Category Name</label>

                                    <div class="col-sm-8">
                                        <input type="text" name="name" wire:model="name" id="category-name"
                                         class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-2">
                                        <input type="submit" value="CREATE" class="btn btn-outline-dark btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <hr class="p-2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <x-alert />
                            <table id="categories-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th scope="col">id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                    {{-- <th scope="col"></th> --}}
                                </thead>

                                <tbody>
                                    @forelse($categories as $key => $category)
                                        <tr wire:key="{{$loop->index}}">
                                        <td>{{ $loop->index+1 }}</td>
                                        <td><a href="#">{{ strtoupper($category->name) }} </a></td>
                                        <td>{{ format_date_time($category->created_at) }}</td>
                                        <td>{{ format_date_time($category->updated_at) }}</td>

                                        <td class="justify-content-center">
                                            <a href="#" data-toggle="modal" wire:click="setCategoryIdUpdate('{{$category->id}}')" data-target="#updateModal" class="text-success mr-2">
                                                <i class="far fa-edit"></i>
                                            </a>
                                             <a href="#" class="text-danger" wire:click="setCategoryIdDelete('{{$category->id}}')" data-toggle="modal" data-target="#deleteModal" >
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @empty
                                    <p>No Category Found </p>
                                    @endforelse


                                </tbody>
                                {{-- {{ $categories2->links() }} --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Delete Modal -->
    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category? </p>
            </div>
            <div class="modal-footer">
                {{-- <button type="button"  class="btn btn-danger" data-dissmiss="modal">Yes Delete</button> --}}
                <button type="button" wire:click="destroy" class="btn btn-danger" data-dismiss="modal">Yes Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!--Update Modal -->
    <div class="modal fade" wire:ignore.self id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            Update Category Name

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="updateCategory" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text"  wire:model.lazy="updateName" value="{{ $updateName ?? ''}}" id="name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button"  class="btn btn-danger" data-dissmiss="modal">Yes Delete</button> --}}
                    {{-- <button type="submit" class="btn btn-success" data-dismiss="modal">Update</button> --}}
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>

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
