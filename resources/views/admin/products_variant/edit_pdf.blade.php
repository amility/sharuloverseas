<div class="form-row">

    <div class="form-group col-sm-6">
        {!! Form::label('prod_pdf', 'Product Pdf:') !!}
        {!! Form::file('prod_pdf', null , ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-6">
        @if( isset($products->prod_pdf) && $products->prod_pdf)
    <a href="{{ asset($products->prod_pdf) }}" target="blank">View PDF</a>
   
@endif
</div>

</div>







