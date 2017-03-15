@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <section class="login-page sec-hq-pad">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <div class="text-center">
                <h1 class="mar-b-20">Forgot Your Password</h1>
            </div>
            {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal form-login'] ) !!}
            @include('includes.status')
            @include('includes.errors')
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="form-group">
                    <div class="text-center mar-t-10">
                        <p>Enter your email address and we'll send you password reset instructions</p>
                    </div>
                    <div class="mar-t-20">
                        <div class="col-md-12">
                            <label for="email">
                                <b>Email Address</b>
                            </label>
                        </div>
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
    </section>
@endsection
