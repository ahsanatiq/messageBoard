@extends('layouts.app')

@section('content')
    <section class="login-page">
        <div class="wrap">
            <div class="content">
                <div class="text-center">
                    <h3 class="mar-b-30">
                        {{ config('app.name', 'Laravel') }}
                    </h3>
                </div>
                <p>Enter your email address and we'll send you password reset instructions</p>
                {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal form-login'] ) !!}
                @include('includes.status')
                @include('includes.errors')
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email">
                            Email Address
                        </label>
                    </div>
                    <div class="col-md-12">
                        {!! Form::email('email', old('email'), [
                        'class'=>'form-control def-input',
                        'placeholder'=>'Your Email',
                        'required',
                        'id'=>'email'
                        ]) !!}
                    </div>
                </div>
                <div class="text-center">
                    {!! Form::submit('Send Password Reset Link',['class'=>'def-btn btn-solid']) !!}
                </div>
                <div class="mar-t-25 text-center">
                    <a href="{{ route('login') }}">Back to Login Page</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
