<!-- Image Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Image Path:') !!}
    {!! Form::file('image_path', null , ['class' => 'form-control']) !!}
</div>

@if( isset($bannerImages->image_path) && $bannerImages->image_path)
    <img id="original" src="{{ asset($bannerImages->image_path) }}" alt="" height="100" width="300">
    <input type="hidden" name="image_path" class="form-control" placeholder="" value="{{ $bannerImages->image_path }}">
@endif

<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('alt_name', 'Alt Name:') !!}
    {!! Form::text('alt_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Preference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preference', 'Preference:') !!}
    {!! Form::number('preference', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::url('url', null, ['class' => 'form-control', 'placeholder' => 'Ex: '.url("/").'/product_category/{id}?category={category name}']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bannerImages.index') }}" class="btn btn-secondary">Cancel</a>
</div>
