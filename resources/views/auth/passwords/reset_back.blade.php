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
                {!! Form::open(['url' => '/password/reset', 'class' => 'form-horizontal form-login'] ) !!}
                @include('includes.status')
                @include('includes.errors')
                {!! Form::hidden('token',$token) !!}
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email">
                            Email Address
                        </label>
                    </div>
                    <div class="col-md-12">
                        {!! Form::email('email', $email?$email:old('email'), [
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
        </div>
    </section>
@endsection
