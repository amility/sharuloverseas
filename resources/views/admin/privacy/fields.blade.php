<div class="form-group col-sm-12">
    {!! Form::label('title', ' Title:') !!}
   {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('privacy', ' Privacy & Policy:') !!}
   {!! Form::textarea('privacy', null, ['class' => 'form-control']) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('privacy.index') }}" class="btn btn-secondary">Cancel</a>
</div>
@push('scripts')

<script type="text/javascript">
     ClassicEditor
        .create(document.querySelector('#privacy'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
