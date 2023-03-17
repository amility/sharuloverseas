<div class="form-group col-sm-6">
    {!! Form::label('caliber_name', 'Caliber Name:') !!}
    {!! Form::text('caliber_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('caliber_slug', 'Slug:') !!}
    {!! Form::text('caliber_slug', null, ['class' => 'form-control','readonly']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Logo:') !!}
    {!! Form::file('image_path', null , ['class' => 'form-control']) !!}
</div>

@if( isset($caliber->caliber_image_path) && $caliber->caliber_image_path)
    <img id="original" src="{{ asset($caliber->caliber_image_path) }}" alt="" height="100" width="300">
    <input type="hidden" name="caliber_image_path" class="form-control" placeholder="" value="{{ $caliber->caliber_image_path }}">
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('caliber.index') }}" class="btn btn-secondary">Cancel</a>
</div>


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#caliber_name').keyup(function(e) {
        var txtVal = $(this).val();
        txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
        $('#caliber_slug').val(txtVal);
    });
</script>
@endpush