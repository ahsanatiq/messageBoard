@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <section class="login-page sec-hq-pad">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <div class="text-center">
                <h1 class="mar-b-20">Log In</h1>
            </div>
            {!! Form::open(['route' => 'login', 'class' => 'form-horizontal form-login'] ) !!}
            <div class="form-group">
                @include('includes.status')
                @include('includes.errors')
                <div class="col-md-12">
                    <b>Email Address</b>
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
                    <b>Password</b>
                </div>
                <div class="col-md-12">
                    {!! Form::password('password', [
                    'class'=>'form-control def-input',
                    'placeholder'=>'Your Password',
                    'required',
                    'id'=>'inputPassword'
                    ]) !!}
                    <div class="mar-t-10">
                        {!! Form::checkbox('remember', 1, null, ['id' => 'inputRemember']) !!}
                        <label for="inputRemember">Remember me</label>
                    </div>
                </div>

            </div>
            <div class="text-center">
                {!! Form::submit('Log In', ['id'=>'login-button','class'=>'def-btn btn-solid']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

