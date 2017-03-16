@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div>
        <h1 class="pull-left">Manage Pages</h1>
        <div class="pull-right" style="padding-top: 20px; padding-bottom: 10px;">
            <a id="add-page-link" href="{{ route('pages.add') }}" class="btn btn-primary">Add Page</a>
        </div>
        <div class="clearfix"></div>
    </div>
    @include('includes.status')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Status</th>
                <th>Author</th>
                <th>Created</th>
                <th>Actions</th>
            </thead>
            <tbody>

            @forelse($pages as $page)
                <tr>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->status }}</td>
                    <td>{{ $page->user->name }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        <a id="edit-page-{{ $page->id }}" href="{{ route('pages.edit', ['id'=>$page->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        @if($page->id!='1')
                        | <a id="delete-user-{{ $page->id }}" href="#confirmDelete" onclick="setDeleteId({{ $page->id }})" data-toggle="modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Sorry, no pages found</td>
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
            {!! Form::open(['route' => 'pages.delete']) !!}
            {!! Form::hidden('id','',[
            'id'=>'js-delete-id'
            ]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected page?
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