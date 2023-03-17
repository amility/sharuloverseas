<div class="form-group">
    {!! Form::label('category', 'Category Name:') !!}
    @if(isset($promo_product) && $promo_product != null)
    <p>{{ $promo_product[0]['category']['name'] }}</p>
    @else
    <p>Not available</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('subcategory', 'Subcategory Name:') !!}
    @if(!empty($promo_product[0]['subcategory']))
    <p>{{ $promo_product[0]['subcategory']['name'] }}</p>
    @else
    <p>Not available</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('product_name', 'Products Name:') !!}
    @if(!empty($promo_product))
        @php $var = ''; @endphp
        @foreach($promo_product as $products)
           @php $var .= $products['products']['prod_name'].', '; @endphp
        @endforeach
    @else
    @php $var = 'Not available'; @endphp
    @endif
    <p>{{ rtrim($var,', ') }}</p>
</div>
<!-- Promo Name Field -->
<div class="form-group">
    {!! Form::label('promo_name', 'Promo Name:') !!}
    <p>{{ $promo->promo_name }}</p>
</div>
<div class="form-group">
    {!! Form::label('promo_code', 'Promo Code:') !!}
    <p>{{ $promo->promo_code }}</p>
</div>
<div class="form-group">
    {!! Form::label('promo_price', 'Promo Price:') !!}
    <p>{{ $promo->promo_type=='price'?CurrencySymbol().$promo->promo_price:$promo->promo_price.'%' }}</p>
</div>
<div class="form-group">
    {!! Form::label('promo_type', 'Promo Type:') !!}
    <p>{{ $promo->promo_type }}</p>
</div>
<div class="form-group">
    {!! Form::label('max_user', 'Max User:') !!}
    <p>{{ $promo->max_user }}</p>
</div>
<div class="form-group">
    {!! Form::label('min_amount', 'Min Amount:') !!}
    <p>{{ $promo->min_amount }}</p>
</div>
<div class="form-group">
    {!! Form::label('upto_amount', 'Upto Amount:') !!}
    <p>{{ $promo->upto_amount }}</p>
</div>

<!-- Promo Image Name Field -->
<div class="form-group">
    {!! Form::label('promo', 'Image :') !!}
    <p>@if($promo->image_path)
        <img src='{{ asset($promo->image_path)}}' alt="{{ $promo->promo_name }}" width="200" height="100">
        @else
        Not available
        @endif
    </p>
</div>



<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $promo->status=='1'?'Active':'Inactive' }}</p>
</div>

<!-- Created At Field -->
<!-- <div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $promo->created_at }}</p>
</div> -->

<!-- Updated At Field -->
<!-- <div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $promo->updated_at }}</p>
</div> -->

