<div class="form-group col-sm-6">
    {!! Form::label('brand_name', 'Brand Name:') !!}
    {!! Form::text('brand_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('brand_slug', 'Slug:') !!}
    {!! Form::text('brand_slug', null, ['class' => 'form-control','readonly']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Logo:') !!}
    {!! Form::file('image_path', null , ['class' => 'form-control']) !!}
</div>

@if( isset($brands->brand_image_path) && $brands->brand_image_path)
    <img id="original" src="{{ asset($brands->brand_image_path) }}" alt="" height="100" width="300">
    <input type="hidden" name="brand_image_path" class="form-control" placeholder="" value="{{ $brands->brand_image_path }}">
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
</div>


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#brand_name').keyup(function(e) {
        var txtVal = $(this).val();
        txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
        $('#brand_slug').val(txtVal);
    });
</script>
@endpush