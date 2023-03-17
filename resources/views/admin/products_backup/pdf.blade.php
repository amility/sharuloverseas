<div class="form-row">

    <div class="form-group col-sm-6">
        {!! Form::label('prod_pdf', 'Product Pdf:') !!}
        {!! Form::file('prod_pdf', null , ['class' => 'form-control']) !!}
    </div>
<div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>







