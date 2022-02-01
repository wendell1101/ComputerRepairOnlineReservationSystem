<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <form action="{{ route('services.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark" @if(!$categories->count() >0 )disabled @endif>
                            <i class="fas fa-plus"></i>
                            <span>New Service</span>
                        </button><br>
                        @if(!$categories->count() >0 )
                        <small class="text-danger">*You must have a service category to create a product</small>
                        @endif
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active text-bold">Services</li>
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
                            <h3 class="text-bold">Services</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if($services->count() > 0)
                                <table id="products-table" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th scope="col">Actions</th>
                                    </thead>

                                    <tbody>
                                        @foreach($services as $key => $service)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/service_images/' . $service->img) }}"  alt="service_image" width="60" height="60" class="rounded-circle">
                                            </td>
                                            <td>
                                                <a href="{{ route('services.show', $service->id) }}">
                                                    {{ strtoupper($service->name) }}
                                                </a>
                                            </td>
                                            <td>PHP{{ format_price($service->price) }}</td>
                                            <td>
                                                {{ \Str::limit(strip_tags($service->description), 20, '...') }} </td>
                                            <td>{{ $service->checkIfIsAvailable($service) }}</td>
                                            <td>
                                                <a href="{{ route('services.edit', $service->id) }}" class="text-secondary">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="#" class="text-danger" wire:click="setServiceIdDelete('{{$service->id}}')" data-toggle="modal" data-target="#deleteModal" >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        {{ $services->links()}}

                                    </tbody>
                                </table>
                                @else
                                <p>No Service Found </p>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this service? </p>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button"  class="btn btn-danger" data-dissmiss="modal">Yes Delete</button> --}}
                    <button type="button" wire:click="destroy" class="btn btn-danger" data-dismiss="modal">Yes Delete</button>
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
    window.addEventListener('close-modal', function() {
        $("[data-dismiss=modal]").trigger({
            type: "click"
        });
        $('#createProductModal').modal('hide');
    });

</script>
@endsection

