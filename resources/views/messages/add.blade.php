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
            {!! Form::file('image') !!}
            <span id="js-image-help-block" class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="docs">
                File
            </label>
            {!! Form::file('docs[]',['id'=>'docs','multiple'=>'']) !!}
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
            <label for="private_group">
                User Group
            </label>
            {!! Form::select('private_group', $objectTypeList, old('private_group'), [
                'class'=>'form-control',
                'id'=>'private_group'
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
            $('#js-form input[name=image]').fileinput({
                'showPreview': false,
                'showUpload': false,
                'browseLabel': 'Select Image',
                'browseClass': 'btn btn-success',
                'allowedFileExtensions': ['jpg','jpeg','gif','png'],
                'elErrorContainer': $('#js-form input[name=image]').parent().find('span.help-block'),
//                'msgErrorClass':null,
            });
            $('#js-form input[name="docs[]"]').fileinput({
                'showPreview': false,
                'showUpload': false,
                'browseLabel': 'Select File(s)',
                'browseClass': 'btn btn-success',
                'allowedFileExtensions': ['doc','docx','pdf','txt'],
                'elErrorContainer': $('#js-form input[name="docs[]"').parent().find('span.help-block'),
            });

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
                    functions.resetError('select[name=private_group]');
                    if (functions.checkEmpty('select[name=private_group]')) {
                        functions.showError('select[name=private_group]', 'Please select user group')
                        return false;
                    }
                }

                $('#js-form input[type=submit]').attr('disabled','true');
                return true;
            });

            $('#js-form input[name=type]').click(function() {
                if($('#js-form input[name=type]:checked').val()=='private') {
                    $('#js-form select[name=private_group]').parent().slideDown();
                } else {
                    $('#js-form select[name=private_group]').parent().slideUp();
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