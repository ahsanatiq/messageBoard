@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <section class="sign-up-page sec-hq-pad">
        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">

            <div class="text-center mar-b-30">
                <h1 class="mar-b-20">Sign Up</h1>
                @include('partials.socials', ['extraClass' => 'btn-width mar-b-15'])
                <p><b>Or create a free account in seconds!</b></p>
            </div>
            {!! Form::open(['url'=>'/register', 'class'=>'form-horizontal form-login']) !!}
            @include('includes.errors')
                <div class="col-md-12 no-h-padding">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="firstName">
                                        First Name
                                    </label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::text('firstName', old('firstName'),[
                                    'class'=>'form-control def-input',
                                    'placeholder'=>'Your First Name',
                                    'required',
                                    'id'=>'firstName'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="lastName">Last Name</label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::text('lastName', old('lastName'),[
                                    'class'=>'form-control def-input',
                                    'placeholder'=>'Your Last Name',
                                    'required',
                                    'id'=>'lastName'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="email">Email Address</label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::email('email', old('email'),[
                                    'class'=>'form-control def-input',
                                    'placeholder'=>'Your Email Address',
                                    'required',
                                    'id'=>'email'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="password">Password</label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::password('password', [
                                    'class'=>'form-control def-input',
                                    'placeholder'=>'Your Password',
                                    'required',
                                    'id'=>'password'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="timezone">Timezone</label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::select('timezone', $timezoneList, 'UTC', [
                                'class'=>'def-input def-select form-control'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <b>
                                    <label for="captcha">reCaptcha</label>
                                </b>
                            </div>
                            <div class="col-md-12">
                                {!! Form::captcha([
                                    'style'=>'transform:scale(0.9); transform-origin:0 0;'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap text-center mar-t-20">
                    {!! Form::submit('Sign up', ['class'=>'def-btn btn-solid btn-width']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
