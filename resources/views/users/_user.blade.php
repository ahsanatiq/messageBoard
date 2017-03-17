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
<div class="form-group required">
    <label for="email">
        Email
    </label>
    @php
       $emailAttributes = [
            'class'=>'form-control',
            'placeholder'=>'Email',
            'id'=>'email'
        ];
        if(isset($action)&&($action=='edit'||$action=='update'))
        $emailAttributes['disabled'] = true;
    @endphp
    {!! Form::text('email', old('email'), $emailAttributes) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="phone">
        Phone
    </label>
    {!! Form::text('phone', old('phone'),[
        'class'=>'form-control',
        'placeholder'=>'Phone',
        'id'=>'phone'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="website">
        Website
    </label>
    {!! Form::text('website', old('website'),[
        'class'=>'form-control',
        'placeholder'=>'Website',
        'id'=>'website'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="country">
        Country
    </label>
    {!! Form::select('country', $countryList, old('country'),[
        'class'=>'form-control',
        'id'=>'country'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="region">
        Region
    </label>
    {!! Form::text('region', old('region'),[
        'class'=>'form-control',
        'placeholder'=>'Region',
        'id'=>'region'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="district">
        District
    </label>
    {!! Form::text('district', old('district'),[
        'class'=>'form-control',
        'placeholder'=>'District',
        'id'=>'district'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="city">
        City
    </label>
    {!! Form::text('city', old('city'),[
        'class'=>'form-control',
        'placeholder'=>'City',
        'id'=>'city'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="address">
        Address
    </label>
    {!! Form::textarea('address', old('address'),[
        'class'=>'form-control',
        'placeholder'=>'Address',
        'rows'=>'2',
        'id'=>'address'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="object_type">
        Object type
    </label>
    {!! Form::select('object_type', $objectTypeList, old('object_type'), [
        'class'=>'form-control',
        'id'=>'object_type'
    ]) !!}
    <span class="help-block"></span>
</div>

@if($action=='create' || $action=='edit')
<div class="form-group">
    <label for="role">
        Role
    </label>
    {!! Form::select('role_id', $rolesList, old('role_id'), [
        'class'=>'form-control',
        'id'=>'role'
    ]) !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    <label for="status">
        Status
    </label>
    {!! Form::select('status', $statusList, old('status'), [
        'class'=>'form-control',
        'id'=>'status'
    ]) !!}
    <span class="help-block"></span>
</div>
@endif

{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
@if($action!='update')
{!! Html::link(route('users.index'),'Cancel', ['class'=>'btn btn-default']) !!}
@endif

@section('footer')
    <script language="javascript">
        $(function () {
            $('#js-form').submit(function () {
                functions.resetError('input[name=name]');
                if (functions.checkEmpty('input[name=name]')) {
                    functions.showError('input[name=name]', 'Please enter name')
                    return false;
                }

                functions.resetError('input[name=email]');
                if (functions.checkEmpty('input[name=email]')) {
                    functions.showError('input[name=email]', 'Please enter email')
                    return false;
                }

                return true;
            });
        })
    </script>
@endsection