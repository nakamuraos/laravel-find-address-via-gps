@extends('admin.app')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-science icon-gradient bg-happy-itmeo"></i>
            </div>
            <div>User Manager
                <div class="page-title-subheading">Manage user on system: verify, update, delete or block.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
        </div>
    </div>
</div>            
<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav" id="filter">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" data-content="">
            <span>All user</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" data-content="active">
            <span>Active user</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" data-content="blocked">
            <span>Blocked user</span>
        </a>
    </li>
</ul>
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="text-success">
                        <tr>
                            <th>User name</th>
                            <th>Full name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($users as $key => $user)
                        <tr>
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
                                            class="pe-7s-pen"></i></button>
                                
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

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });

    $(document).ready(function(){
    $("#filter a").on("click", function() {
        var value = $(this).data('content').toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
@endpush
