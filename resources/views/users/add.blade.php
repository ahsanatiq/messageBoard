@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <h1>Create User</h1>
        {!! Form::open(['route'=>'users.create', 'id'=>'js-form']) !!}
        @include('users._user',['action'=>'create'])
        {!! Form::close() !!}
    </div>
@endsection
