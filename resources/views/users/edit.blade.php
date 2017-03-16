@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <div class="container">
        <h1>Update User</h1>
        {!! Form::model($user, ['route'=>['users.update',$user->id], 'id'=>'js-form']) !!}
        @include('users._user', ['action'=>'edit'])
        {!! Form::close() !!}
    </div>
@endsection