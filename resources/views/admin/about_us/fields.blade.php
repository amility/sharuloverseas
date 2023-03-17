<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('about_us', 'About Us:') !!}
   {!! Form::textarea('about_us', null, ['class' => 'form-control']) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('aboutus.index') }}" class="btn btn-secondary">Cancel</a>
</div>
@push('scripts')

<script type="text/javascript">
     ClassicEditor
        .create(document.querySelector('#about_us'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
