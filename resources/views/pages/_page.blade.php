@include('includes.errors')
@include('includes.status')
<div class="form-group required">
    <label for="name">
        Name
    </label>
    {!! Form::text('name', old('name'),[
        'class'=>'form-control',
        'placeholder'=>'Name',
        'id'=>'name'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="detail">
        Detail
    </label>
    {!! Form::textarea('detail', old('detail'),[
        'class'=>'form-control',
        'placeholder'=>'Address',
        'rows'=>'8',
        'id'=>'detail'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group required">
    <label for="menu_name">
        Menu Name
    </label>
    {!! Form::text('menu_name', old('menu_name'),[
        'class'=>'form-control',
        'placeholder'=>'Menu Name',
        'id'=>'menu_name'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="object_type">
        Status
    </label>
    {!! Form::select('status', $pageStatusList, old('status'), [
        'class'=>'form-control',
        'id'=>'status'
    ]) !!}
    <span class="help-block"></span>
</div>
{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
{!! Html::link(route('pages.index'),'Cancel', ['class'=>'btn btn-default']) !!}


@section('footer')
    <script language="javascript">
        $(function () {
            $('#js-form').submit(function () {
                functions.resetError('input[name=name]');
                if (functions.checkEmpty('input[name=name]')) {
                    functions.showError('input[name=name]', 'Please enter name/title')
                    console.log('hereee');
                    return false;
                }

                functions.resetError('textarea[name=detail]');
                if (functions.checkEmpty('textarea[name=detail]')) {
                    functions.showError('textarea[name=detail]', 'Please enter details')
                    console.log('hereee444');
                    return false;
                }

                functions.resetError('input[name=menu_name]');
                if (functions.checkEmpty('input[name=menu_name]')) {
                    functions.showError('input[name=menu_name]', 'Please enter menu name')
                    console.log('hereee555');
                    return false;
                }

                console.log('hereee666');
                return true;
            });
        })
    </script>
@endsection