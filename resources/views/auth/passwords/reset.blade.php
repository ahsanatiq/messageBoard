@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <section class="login-page sec-hq-pad">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <div class="text-center">
                <h1 class="mar-b-20">Reset Your Password</h1>
            </div>
            {!! Form::open(['url' => '/password/reset', 'class' => 'form-horizontal form-login'] ) !!}
            @include('includes.status')
            @include('includes.errors')
            {!! Form::hidden('token',$token) !!}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                <div class="col-md-12">
                    <label for="email">
                        <b>Email Address</b>
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
            <div class="form-group">
                <div class="col-md-12">
                    <label for="password">New Password</label>
                </div>
                <div class="col-md-12">
                    {!! Form::password('password', [
                    'class'=>'form-control def-input',
                    'placeholder'=>'New password',
                    'required',
                    'id'=>'password'
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="password-confirm">Confirm New Password</label>
                </div>
                <div class="col-md-12">
                    {!! Form::password('password_confirmation', [
                    'class'=>'form-control def-input',
                    'placeholder'=>'Confirm New password',
                    'required',
                    'id'=>'password-confirm'
                    ]) !!}
                </div>
            </div>
            <div class="text-center">
                {!! Form::submit('Reset Password',['class'=>'def-btn btn-solid']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
