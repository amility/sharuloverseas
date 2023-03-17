<div class="form-row">

    <div class="form-group col-sm-6">
    {!! Form::label('category', 'Category Name:') !!}
    <p>{{ $products['category']->name}}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('sub_category', 'Sub Category Name:') !!}
    <p>{{ $products['sub_category']->name}}</p>
</div>
<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_name', 'Brand:') !!}
    <p>{{ $products['brands']->brand_name }}</p>
</div>


<!-- Prod Sku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_sku', 'Prod Sku:') !!}
    <p>{{ $products->prod_sku }}</p>
</div>

<!-- Prod Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_name', 'Prod Name:') !!}
    <p>{{ $products->prod_name }}</p>
</div>

<!-- Prod Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_slug', 'Prod Slug:') !!}
    <p>{{ $products->prod_slug }}</p>
</div>

<!-- Prod Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_price', 'Prod Price:') !!}
    <p>{{ $products->prod_price }}</p>
</div>

<!-- Total Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_stock', 'Total Stock:') !!}
    <p>{{ $products->total_stock }}</p>
</div>

<!-- Prod Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_description', 'Prod Description:') !!}
    <p>{{ $products->prod_description }}</p>
</div>

<!-- Prod Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_details', 'Prod Details:') !!}
    <p>{{ $products->prod_details }}</p>
</div>

<!-- Prod Specification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_specification', 'Prod Specification:') !!}
    <p>{{ $products->prod_specification }}</p>
</div>
<!-- <div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
   @if( isset($products->image) && $products->image)
    <img id="original" src="{{ asset($products->image) }}" alt="" height="100" width="100">

@endif

</div> -->
<div class="form-group col-sm-6">
    {!! Form::label('product image', 'product Images:') !!}
<div class="row">
  @foreach($products['product_images'] as $product_img)   
   <div class="col-sm-3" style="margin-bottom:16px;" align="center">
    <form action="{{ route('products.delete') }}" method="post">
        @csrf
       
        <input type="hidden" name="id" value="{{$product_img->id}}">
        <img id="original" src="{{ asset($product_img->image) }}" alt="" height="100" width="100">
        <input type="hidden" name="pro_id" value="{{$products->id}}">
        <input type="hidden" name="edit" value="show">
        <button type="submit" class="btn btn-link remove_image">Remove</button>
    </form>
   </div>
@endforeach
</div>

</div>
<!-- Prod Video Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_video_url', 'Prod Video Url:') !!}
    <div class="row">
    <div class="col-sm-3" style="margin-bottom:16px;" align="center">
        @if($products->prod_video_url)
        <form action="{{ route('products.removeVideo') }}" method="post">
        @csrf
            <input type="hidden" name="id" value="{{$products->id}}">
            <iframe width="200" height="150" src="{{ $products->prod_video_url }}">
            </iframe> <br>   
            <button type="submit" class="btn btn-link remove_image">Remove</button>
        </form>
        @else
            Not Available
        @endif
    </div>
    </div>   
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $products->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $products->updated_at }}</p>
</div>
</div>



