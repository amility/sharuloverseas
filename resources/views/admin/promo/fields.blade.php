<div class="form-group row col-sm-12">
<div class="form-group col-sm-3">
    {!! Form::label('all', 'All Products:', ['style' => 'position: absolute; margin: -1px 22px 0px 20px;']) !!}
    {!! Form::radio('all', 'all_product', isset($promo_category) && $promo_category!=null?false:true, ['id' => 'all']) !!}
</div>
<div class="form-group col-sm-3">
    {!! Form::label('selected_product', 'Selected Products:', ['style' => 'position: absolute; margin: -1px 22px 0px 20px;']) !!}
    {!! Form::radio('all', 'selected_product', isset($promo_category) && $promo_category!=null?true:false, ['id' => 'selected_product']) !!}
</div>
</div>
<div class="form-group col-sm-6 category" style="display: none;">
    {!! Form::label('category_id', 'Select Category:') !!}
    {!! Form::select('category_id', isset($category)?$category:[], isset($promo_category['category_id'])?$promo_category['category_id']:null, ['class' => 'form-control form-control-select2 category_trig', 'onchange' => 'getSubCategory(this.value)']) !!}
</div>
<div class="form-group col-sm-6 sub_category" style="display: none;">
    {!! Form::label('sub_category_id', 'Select Sub Category:') !!}
    <select class="form-control form-control-select2" name="sub_category_id" id="sub_category" onchange="getProducts(this.value,'sub_category_id')">
        <option value="">Select Subcategory</option>
    @if(isset($sub_category))
    @foreach($sub_category as $subcategory)
        <option value="{{$subcategory['id']}}" @if($promo_category['sub_category_id'] == $subcategory['id']) selected @endif>{{$subcategory['name']}}</option>
    @endforeach
    @endif
    </select>
</div>
<div class="form-group col-sm-6 product" style="display: none;">
    {!! Form::label('product_id', 'Select Products:') !!}
   <!--  {!! Form::select('product_id[]', isset($products)?$products:[], isset($promo_product)?$promo_product:null, ['class' => 'form-control form-control-select2 product_id', 'multiple' => 'multiple']) !!} -->
   @php $promoProd = isset($promo_product)?$promo_product:[] @endphp
    <select class="form-control form-control-select2 product_id" name="product_id[]" id="product_id" multiple>
        <option value="">Select Products</option>
    @if(isset($products))
    @foreach($products as $product)
        <option value="{{$product['id']}}" @if(in_array($product['id'], $promoProd)) selected @endif>{{$product['prod_name']}}</option>
    @endforeach
    @endif
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('promo_name', 'Promo Name:') !!}
    {!! Form::text('promo_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Name']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('promo_code', 'Promo Code:') !!}
    {!! Form::text('promo_code', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Code', 'style' => 'text-transform:uppercase']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('promo_type', 'Promo Type:') !!}
    {!! Form::select('promo_type', ['percentage'=>'Percentage', 'price'=>'Price'], null, ['class' => 'form-control']) !!}
    <!-- {!! Form::text('promo_type', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Type']) !!} -->
</div>
<div class="form-group col-sm-6">
    {!! Form::label('promo_price', 'Promo Price:') !!}
    {!! Form::text('promo_price', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Price']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('max_user', 'User Count :') !!}
    {!! Form::text('max_user', null, ['class' => 'form-control', 'placeholder' => 'Enter User Count']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('min_amount', 'Min Amount :') !!}
    {!! Form::text('min_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter Min Amount']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('upto_amount', 'Upto Amount :') !!}
    {!! Form::text('upto_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter upto Amount']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image :') !!}
    {!! Form::file('image', null , ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1'=>'Active', '0'=>'Inactive'], '1', ['class' => 'form-control']) !!}
    <!-- {!! Form::text('promo_type', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Type']) !!} -->
</div>
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description :') !!}

    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Promo Description']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('promo.index') }}" class="btn btn-secondary">Cancel</a>
</div>  

  
@push('scripts')
@if(isset($promo_category))
<script>
    if($('#selected_product').prop("checked") == true){
        $('.category, .sub_category, .product').show();
    }
</script>
@else
<script>
    if($('#selected_product').prop("checked") == true){
        $('.category, .sub_category, .product').show();
        $('.category_trig').trigger('change');
    }
</script>
@endif
<script>
    $('#selected_product').click(function(){
        $('.category, .sub_category, .product').show();
        $('.category_trig').trigger('change');
    });
    $('#all').click(function(){
        $('.category, .sub_category, .product').hide();
    });

    function getSubCategory(id)
    {
        $.ajax({
            type: 'GET',
            url:"{{ url('admin/get-subcategory') }}",
            data: {
                'id': id
            },
            success:function(data)
            {                
                $('#sub_category').html(data.html);                
                getProducts(id, 'category_id');
            }
        })
    }

    function getProducts(id, type)
    {
        $.ajax({
            type: 'GET',
            url:"{{ url('admin/get-products') }}",
            data: {
                'id': id,
                'type': type,
            },
            success:function(data)
            {
                $('#product_id').html(data.html);
            }
        })
    }
</script>
@endpush