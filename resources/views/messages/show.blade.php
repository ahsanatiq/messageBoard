@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <h1>
        @if (Route::is('messages.showPrivate'))
            Private
        @else
            Public
        @endif
        Messages
    </h1>
    <br>
    <div class="row">
        @forelse($messages as $message)
            @if($loop->index%3==0)
                <div class="clearfix visible-md-block visible-lg-block"></div>
            @endif
            @if($loop->index%2==0)
                <div class="clearfix visible-sm-block"></div>
            @endif
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $message->name }}</h3>
                </div>
                <div class="panel-body">
                    @if($message->image)
                    <img src="{{ asset('/storage/'.$message->image) }}" class="img-responsive">
                    @endif
                    <p>{{ $message->detail }}</p>
                    @php
                    $docs = [];
                    if($message->docs)
                       $docs = json_decode($message->docs, true);

                    @endphp
                    @foreach($docs as $doc)
                        <p>
                            <a href="{{ route('messages.download',['id'=>$message->id,'file'=>$doc['file']]) }}">{{ $doc['name'] }}</a>
                        </p>
                    @endforeach
                    <div>
                        <small class="text-muted">Posted by: {{ $message->user->name }}</small>
                    </div>
                </div>
            </div>
        </div>

        @empty
            <div class="alert alert-info" role="alert">Sorry, no messages found</div>
        @endforelse
    </div>
</div>
@endsection