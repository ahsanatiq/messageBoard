@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <div class="container">
        <h1>Create Page</h1>
        {!! Form::open(['route'=>'pages.create', 'id'=>'js-form']) !!}
        @include('pages._page')
        {!! Form::close() !!}
    </div>
@endsection

