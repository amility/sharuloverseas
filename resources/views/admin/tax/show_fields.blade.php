<!-- Brand Name Field -->
<div class="form-group">
    {!! Form::label('tax_name', 'Tax Name:') !!}
    <p>{{ $data->tax_name }}</p>
</div>

<!-- Brand Slug Field -->
<div class="form-group">
    {!! Form::label('tax_rate', 'Tax Rate:') !!}
    <p>{{ $data->tax_rate }}</p>
</div>





<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $data->is_active }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $data->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $data->updated_at }}</p>
</div>

