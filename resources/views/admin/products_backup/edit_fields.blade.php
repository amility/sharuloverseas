<div class="form-row">

    <div class="form-group col-sm-6">
        {!! Form::label('prod_name', 'Name:') !!}
        {!! Form::text('prod_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('prod_slug', 'Slug:') !!}
        {!! Form::text('prod_slug', null, ['class' => 'form-control','readonly']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('category_id', 'Category:') !!}
        <select name="category_id" id="category_id" getParent='parent_id' class="form-control input-lg dynamic" data-dependent="sub_category_id">
            <option value="">Select Category</option>
            @foreach($categories as $strIndexId => $categorieName )
            <?php if($strIndexId == $products['category_id']){
                $selected = "selected = 'selected'";
            }else{
                $selected="";
            } ?>
            <option value="{{ $strIndexId}}" {{$selected}}>{{ $categorieName }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('sub_category_id', 'Sub Category:') !!}
        <select name="sub_category_id" id="sub_category_id" class="form-control input-lg dynamic">

            <option value="">Select Sub Category</option>
            <option value="{{ $sub_category->id}}" selected="selected">{{$sub_category->name}}</option>
        </select>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('brand_id', 'Brand:') !!}
        <select name="brand_id" id="brand_id" class="form-control input-lg">
            <option value="">Select Brand</option>
            @foreach($brands as $strIndexId => $brandName )
            <?php if($strIndexId == $products['brand_id']){
                $selected = "selected = 'selected'";
            }else{
                $selected="";
            } ?>
            <option value="{{ $strIndexId}}" {{$selected}}>{{ $brandName }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group col-sm-6">
        {!! Form::label('prod_sku', 'Product Sku:') !!}
        {!! Form::text('prod_sku', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('prod_price', 'Product Price:') !!}
        {!! Form::text('prod_price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('total_stock', 'Total Stock:') !!}
        {!! Form::text('total_stock', null, ['class' => 'form-control']) !!}
    </div>
   <div class="form-group col-sm-6">

        {!! Form::label('new_arrival', 'New Arrival:') !!}
        <?php if($products['new_arrival'] != "0"){
            $checked= "checked='checked'";
        }else{
            $checked= "";
        } ?>
        <!-- {!! Form::checkbox('new_arrival' , true, null,null) !!} -->
         <input name="new_arrival" type="checkbox" value="1" {{$checked}}>
         {!! Form::label('best_seller', 'Best Seller:') !!}
         <?php if($products['best_seller'] != "0"){
            $checked= "checked='checked'";
        }else{
            $checked= "";
        } ?>
       <!--  {!! Form::checkbox('best_seller',  true, null,null) !!} -->
         <input name="best_seller" type="checkbox" value="1" {{$checked}}>
        {!! Form::label('featured', 'Featured:') !!}
         
         <?php if($products['featured'] != "0"){
            $checked= "checked='checked'";
        }else{
            $checked= "";
        } ?>
       <!--  {!! Form::checkbox('featured',  true, null,null) !!} -->

        <input name="featured" type="checkbox" value="1" {{$checked}}>
    </div>
    <div class="form-group col-sm-6">
       
        {!! Form::label('prod_video_url', 'Video Url:') !!}
        {!! Form::text('prod_video_url', null, ['class' => 'form-control']) !!}
    </div>
    

    
    <div class="form-group col-sm-12">
        <label for="image" class="col-sm-2 col-form-label">
            Image
        </label>
        <div class="col-sm-8">
            <div class="input-group">
                <input type="file" id="image" name="image" value="" class="form-control input-sm image">
            </div>
            <div id="preview_image" class="img_holder" style="margin-top:15px"> </div>
  
            <button type="button" id="add_sub_image" class="btn btn-flat btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add more images
            </button>
        </div>
        @if( isset($products->image) && $products->image)
    <img id="original" src="{{ asset($products->image) }}" alt="" height="100" width="100">
   
@endif

    </div>

    
</div>



@push('styles')
<style>
    .img_holder { margin-top: 15px; }
</style>
@endpush

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('#category_id').select2({
        // 'multiple':true,
        'width': '100%',

    });
    $('#sub_category_id').select2({
        // 'multiple':true,
        'width': '100%',
    });
    $('#brand_id').select2({
        'width': '100%',
        // placeholder: "Select a brand",
        // allowClear: true
    });

    ClassicEditor
        .create(document.querySelector('#prod_description'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#prod_details'))
        .catch(error => {
            console.error(error);
        });
        // ck editor added
        ClassicEditor
        .create(document.querySelector('#technical_bullets1'))
        .catch(error => {
            console.error(error);
        });
         ClassicEditor
        .create(document.querySelector('#technical_bullets2'))
        .catch(error => {
            console.error(error);
        });
         ClassicEditor
        .create(document.querySelector('#technical_bullets3'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets4'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets5'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets6'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets7'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets8'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets9'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets10'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets11'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets12'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets13'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets14'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#technical_bullets15'))
        .catch(error => {
            console.error(error);
        });
        //added end



    ClassicEditor
        .create(document.querySelector('#prod_specification'))
        .catch(error => {
            console.error(error);
        });


    $('#prod_name').keyup(function(e) {
        var txtVal = $(this).val();
        txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
        $('#prod_slug').val(txtVal);
    });

    $('#category_id').change(function() {
        $('#sub_category_id').val('');
        if ($(this).val() != '') {
            var select = $(this).attr("getParent");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('products.getSubCategory') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    $('#' + dependent).html(result);
                }

            })
        }
    });

    var id_sub_image = 0;
    $('#add_sub_image').click(function(event) {
        id_sub_image += 1;
        $(this).before(
            '<div class="group-image">' +
            '<div class="input-group">' +
            '  <input type="file" id="sub_image_' + id_sub_image + '" name="sub_image[]" value="" class="form-control input-sm sub_image" placeholder=""  />' +
            '<span title="Remove" class="btn btn-flat btn-danger removeImage"><i class="fa fa-times"></i></span>' +
            '</div>' +
            '<div id="preview_sub_image_' + id_sub_image + '" class="img_holder" style="margin-top:15px"></div>' +
            '</div>');
        $('.removeImage').click(function(event) {
            $(this).closest('div').remove();
        });
    });

    $('.removeImage').click(function(event) {
        $(this).closest('.group-image').remove();
    });
</script>
@endpush