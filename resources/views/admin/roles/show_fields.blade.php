<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $role->guard_name }}</p>
</div>

<div class="form-group">
    {!! Form::label('permission', 'Permissions:') !!}
    @foreach($role->permissions as $key => $permission)
        <p>{{ $permission->name }}</p>
    @endforeach
</div>

