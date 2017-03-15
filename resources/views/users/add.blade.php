@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        {!! Form::open(['route'=>'users.create', 'id'=>'js-form']) !!}
        @include('users._user')
        {!! Form::close() !!}
    </div>
@endsection
