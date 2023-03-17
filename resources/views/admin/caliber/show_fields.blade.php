<!-- Caliber Name Field -->
<div class="form-group">
    {!! Form::label('caliber_name', 'Caliber Name:') !!}
    <p>{{ $caliber->caliber_name }}</p>
</div>

<!-- caliber Slug Field -->
<div class="form-group">
    {!! Form::label('caliber_slug', 'Caliber Slug:') !!}
    <p>{{ $caliber->caliber_slug }}</p>
</div>

<!-- caliber Image Name Field -->
<div class="form-group">
    {!! Form::label('caliber_image_name', 'Caliber Image :') !!}
    <p>
        <img src='{{ asset("$caliber->caliber_image_path")}}' alt="{{ $caliber->caliber_name }}" width="200" height="100">
    </p>
</div>

<!-- caliber Image Path Field -->
<!-- <div class="form-group">
    {!! Form::label('caliber_image_path', 'Caliber Image Path:') !!}
    <p>{{ $caliber->caliber_image_path }}</p>
</div> -->

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $caliber->is_active }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $caliber->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $caliber->updated_at }}</p>
</div>

