<!-- Brand Name Field -->
<div class="form-group">
    {!! Form::label('brand_name', 'Brand Name:') !!}
    <p>{{ $brands->brand_name }}</p>
</div>

<!-- Brand Slug Field -->
<div class="form-group">
    {!! Form::label('brand_slug', 'Brand Slug:') !!}
    <p>{{ $brands->brand_slug }}</p>
</div>

<!-- Brand Image Name Field -->
<div class="form-group">
    {!! Form::label('brand_image_name', 'Brand Image :') !!}
    <p>
        <img src='{{ asset("$brands->brand_image_path")}}' alt="{{ $brands->brand_name }}" width="200" height="100">
    </p>
</div>

<!-- Brand Image Path Field -->
<!-- <div class="form-group">
    {!! Form::label('brand_image_path', 'Brand Image Path:') !!}
    <p>{{ $brands->brand_image_path }}</p>
</div> -->

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $brands->is_active }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $brands->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $brands->updated_at }}</p>
</div>

