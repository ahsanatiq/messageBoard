@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <div class="container">
        <h1>Create Page</h1>
        {!! Form::open(['route'=>'pages.create', 'id'=>'js-form']) !!}
        @include('pages._page')
        {!! Form::close() !!}
    </div>
@endsection

