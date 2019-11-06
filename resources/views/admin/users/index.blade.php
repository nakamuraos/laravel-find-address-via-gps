@extends('admin.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-user">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Quản lý người dùng
                    </h4>
                    <!-- <p class="card-category">New employees on 15th September, 2016</p> -->

                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-success">
                            <tr>
                                <th>ID</th>
                                <th>User name</th>
                                <th>Full name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>
                                    {{ (($users->currentPage() - 1 ) * $users->perPage()) + ($key+1) }}
                                </td>
                                <td>
                                    {{ $user->user_name }}
                                </td>
                                <td>
                                    {{ $user->full_name }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @if( $user->status == 1)
                                    Active
                                    @else
                                    Blocked
                                    @endif
                                </td>
                                <td>
                                    {{ $user->role->name }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                            data-href="/admin/user/{{ $user->id }}"><i
                                                class="material-icons">edit</i></button>
                                       
                                    </div>  
                                </td>
                            </tr>
                            @endforeach
                            {{$users->links()}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update User</h5>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-user">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group mt-4">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="0">Active</option>
                                                    <option value="1">Blocked</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group mt-4">
                                                <label for="exampleInputEmail1">Type</label>
                                                <select name="role_id" class="form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Address Manager</option>
                                                    <option value="3">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        // Fill default value
        var row = $(this).parent().parent().parent();
        var col = row.find('td');
        console.log(row);
        console.log(col);
        // $('#editForm input[name="name"]').val(col[1].innerText.trim());
        // $('#editForm input[name="email"]').val(col[2].innerText);

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });

</script>
@endpush
