@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div>
        {!! $page->detail !!}
    </div>
</div>
@endsection
