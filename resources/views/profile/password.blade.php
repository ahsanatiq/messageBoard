@extends('layouts.app') 

@section('content')
@include('layouts.nav')
<section class="setting sec-hq-pad">
    <div class="container">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <div class="change-password">
                <div class="text-center">
                    <h1 class="sec-q-pad-b">Change Password</h1>
                </div>
                @include('includes.status')
                @include('includes.errors')
                <div class="form-password text-center">
                    {!! Form::open(['route'=>'profile.updatePassword','class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            <p class="mar-b-5 mar-t-20 text-left"><b>Current Password</b></p>
                            {!! Form::password('current_password',['class'=>'form-control def-input']) !!}
                        </div>
                        <div class="form-group">
                            <p class="mar-b-5 mar-t-20 text-left"><b>New Password</b></p>
                            {!! Form::password('new_password',['class'=>'form-control def-input']) !!}
                        </div>
                        <div class="form-group">
                            <p class="mar-b-5 mar-t-20 text-left"><b>Confirm Password</b></p>
                            {!! Form::password('new_password_confirmation',['class'=>'form-control def-input']) !!}
                        </div>
                        @if(!auth()->user()->first_login)
                        <div class="form-group">
                            {!! Form::checkbox('agree', 1, null, ['id' => 'agree']) !!}
                            <label for="agree">Agree to the <a href="#terms_service" data-toggle="modal">Terms of Service</a> & <a href="#privacy_policy" data-toggle="modal">Privacy Policy</a></label>
                        </div>
                        @endif
                        <div class="text-center mar-t-40">
                            {!! Form::submit('Update',['class'=>'def-btn btn-solid']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms_Service Modal -->
<div class="modal fade" id="terms_service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus animi consequatur possimus qui, quos rem rerum sapiente, sed sequi suscipit ullam. Atque excepturi iste labore nam pariatur recusandae sapiente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Privacy_Policy Modal -->
<div class="modal fade" id="privacy_policy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Privacy Policy</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus animi consequatur possimus qui, quos rem rerum sapiente, sed sequi suscipit ullam. Atque excepturi iste labore nam pariatur recusandae sapiente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
