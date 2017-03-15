@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <div class="container">
        <h1>Update Page</h1>
        {!! Form::model($page, ['route'=>['pages.update',$page->id], 'id'=>'js-form']) !!}
        @include('pages._page', ['action'=>'edit'])
        {!! Form::close() !!}
    </div>
@endsection