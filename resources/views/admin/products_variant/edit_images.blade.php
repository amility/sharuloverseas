<div class="container-fluid">        
      <div class="panel panel-default">
        <div class="panel-body" style="text-align: center;">
            <input type="hidden" class="product_id" name="product_id" id="product_id" value="">
           <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea" style="margin: 1em 0 !important">
            <div class="fallback">
                <input name="file[]" type="file" multiple />
            </div>
               <span>Upload Images</span>
           </div>
           <!-- Notes -->
          <span style="color: red;">Only .png, .jpg, .gif, .bmp, and .jpeg files types are supported.</span>
           <div class="dropzone-previews"></div>   
        @if(count($product_images)>0)
        <!-- <div class="row" style="margin-top: 15px;">
          @foreach($product_images as $product_img) 
            <div class="col-md-2" style="margin-bottom:16px;" align="center">
              <img src="{{ asset($product_img->image) }}" class="img-thumbnail" width="175" height="175" style="height:175px;" />
              <button type="button" class="btn btn-link remove_image" onclick="removeProductImage({{$products->id}},{{$product_img->id}})">Remove</button>
            </div>
          @endforeach
        </div> -->
        <div id="uploaded_image"></div>
       @endif
      </div>
      </div>
</div>