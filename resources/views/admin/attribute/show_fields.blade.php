<!-- Image Path Field -->
<div class="form-group">
    {!! Form::label('image_path', 'Image Path:') !!}
    <p>{{ $bannerImages->image_path }}</p>
</div>

<!-- Preference Field -->
<div class="form-group">
    {!! Form::label('preference', 'Preference:') !!}
    <p>{{ $bannerImages->preference }}</p>
</div>

<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $bannerImages->url }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bannerImages->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bannerImages->updated_at }}</p>
</div>

