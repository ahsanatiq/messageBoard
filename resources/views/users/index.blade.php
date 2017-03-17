@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div>
        <h1 class="pull-left">Manage Users</h1>
        <div class="pull-right" style="padding-top: 20px; padding-bottom: 10px;">
            <a id="add-user-link" href="{{ route('users.add') }}" class="btn btn-primary">Add User</a>
        </div>
        <div class="clearfix"></div>
    </div>
    @include('includes.status')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a id="edit-user-{{ $user->id }}" href="{{ route('users.edit', ['id'=>$user->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        @if($user->id!='1')
                        | <a id="delete-user-{{ $user->id }}" href="#confirmDelete" onclick="setDeleteId({{ $user->id }})" data-toggle="modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Sorry, no users found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'users.delete']) !!}
            {!! Form::hidden('id','',[
            'id'=>'js-delete-id'
            ]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Confirm',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
<script language="javascript">
    function setDeleteId(id) {
        $('#js-delete-id').val(id);
    }
</script>
@endsection