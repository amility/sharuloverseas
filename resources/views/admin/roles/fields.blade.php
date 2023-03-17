<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Guard Name Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('guard_name', 'Guard Name:') !!}--}}
{{--    {!! Form::text('guard_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<!-- Permission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Permissions', 'Add Permissions:') !!}
    <br>
    <input type="checkbox" id="checkAll"> Check All
    <hr>
    @foreach($permissions as $key => $permission)
        {!! Form::checkbox('permissions[]', $permission->name, isset($role) ? in_array($permission->id, $role->permissions->pluck('id')->toArray()) : false) !!}
        {!! Form::label($permission->name, ($permission->name)) !!} <br>
    @endforeach
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
