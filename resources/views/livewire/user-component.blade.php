<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <form action="{{ route('users.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fas fa-plus"></i>
                            <span>New User</span>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active text-bold">Users</li>
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
                            <h3 class="text-bold">Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if($users->count() > 0)
                                <table id="users-table" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th scope="col">id</th>
                                        <th>Profile Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>
                                                @if($user->img)
                                                        <img src="{{ asset('storage/user_images/' . $user->img) }}" alt="user_profile"  width="60" height="60" class="rounded-circle">
                                                    @else
                                                    <img src="https://ui-avatars.com/api/?name={{ $user->first_name . ' ' . $user->last_name }}" alt="user_profile"  width="60" height="60" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td>{{ $user->getFullName()}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>
                                                    {{ $user->checkIfIsActive($user) }}
                                                </td>
                                                <td>
                                                    {{ $user->checkIfIsAdmin($user) }}
                                                </td>
                                                <td>{{ format_date_time($user->created_at)}}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="text-secondary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="text-danger" wire:click="setUserIdDelete('{{$user->id}}')" data-toggle="modal" data-target="#deleteModal" >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @else
                                <p>No User Found </p>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user? </p>
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

