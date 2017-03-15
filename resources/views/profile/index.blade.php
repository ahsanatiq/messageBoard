@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <div class="container">
        <h1>Update Profile</h1>
        {!! Form::model($user, ['route'=>'profile.update', 'id'=>'js-form']) !!}
        @include('users._user', ['action'=>'update'])
        {!! Form::close() !!}
    </div>
@endsection