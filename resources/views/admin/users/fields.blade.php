<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}

    <input type="password" name="password" class="form-control" placeholder="Enter Your new password">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('c_password', 'Confirm Password:') !!}
    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Your confirm password">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Add Roles:') !!}
    <br>
    <input type="checkbox" id="checkAll"> Check All
    <hr>
    @foreach($roles as $key => $role)
        {!! Form::checkbox('roles[]', $role->name, isset($user) ? in_array($role->id, $user->roles->pluck('id')->toArray()) : false) !!}
        {!! Form::label($role->name, ($role->name)) !!} <br>
    @endforeach
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
