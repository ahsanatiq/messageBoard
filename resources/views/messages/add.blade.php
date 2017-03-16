@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <div class="container">
        <h1>Create Message</h1>
        {!! Form::open(['route'=>'messages.create', 'id'=>'js-form','files'=>true]) !!}
        @include('includes.errors')
        @include('includes.status')
        <div class="form-group required">
            <label for="name">
                Title
            </label>
            {!! Form::text('name', old('name'),[
                'class'=>'form-control',
                'placeholder'=>'Title',
                'id'=>'name'
            ]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group required">
            <label for="detail">
                Detail
            </label>
            {!! Form::textarea('detail', old('detail'),[
                'class'=>'form-control',
                'placeholder'=>'Detail',
                'rows'=>'8',
                'id'=>'detail'
            ]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="image">
                Image
            </label>
            {!! Form::file('image',['id'=>'image']) !!}
            <span class="help-block"></span>
        </div>
        <label>
            Message Type
        </label>
        <div class="form-group">
            <label class="radio-inline">
                {!! Form::radio('type', 'public', (old('type')=='public'?true:false), ['class'=>'form_control']) !!} Public
            </label>
            <label class="radio-inline">
                {!! Form::radio('type', 'private', (old('type')=='private'?true:false), ['class'=>'form_control']) !!} Private
            </label>
        </div>
        <div class="form-group required">
            <label for="private_email">
                Private Email
            </label>
            {!! Form::text('private_email', old('private_email'),[
                'class'=>'form-control',
                'placeholder'=>'Title',
                'id'=>'private_email'
            ]) !!}
            <span class="help-block"></span>
        </div>
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    <script language="javascript">
        $(function () {
            $('#js-form').submit(function () {
                functions.resetError('input[name=name]');
                if (functions.checkEmpty('input[name=name]')) {
                    functions.showError('input[name=name]', 'Please enter name')
                    return false;
                }

                functions.resetError('textarea[name=detail]');
                if (functions.checkEmpty('textarea[name=detail]')) {
                    functions.showError('textarea[name=detail]', 'Please enter detail')
                    return false;
                }

                if($('#js-form input[name=type]:checked').val()=='private') {
                    functions.resetError('input[name=private_email]');
                    if (functions.checkEmpty('input[name=private_email]')) {
                        functions.showError('input[name=private_email]', 'Please enter private email')
                        return false;
                    }
                }

                $('#js-form input[type=submit]').attr('disabled','true');
                return true;
            });

            $('#js-form input[name=type]').click(function() {
                if($('#js-form input[name=type]:checked').val()=='private') {
                    $('#js-form input[name=private_email]').parent().slideDown();
                } else {
                    $('#js-form input[name=private_email]').parent().slideUp();
                }
            });
            if($('#js-form input[name=type]:checked').length) {
                $('#js-form input[name=type]:checked').click();
            } else {
                $('#js-form input[name=type]:first').click();
            }
        })
    </script>
@endsection