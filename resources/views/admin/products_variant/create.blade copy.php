@extends('admin.app')
@push('styles')
<style>
   .variation
   {
   display:none;
   }
   
    .remove_variations {
    background: red;
    padding: 8px;
    color: #fff;
    font-weight: 500;
    font-family: sans-serif;
    border-radius: 4px;
    cursor: pointer;
   }
   .vari_label{
      font-size: 14px;
    font-family: ui-sans-serif;
    font-weight: 500;
    position: relative;
    top: 8px;
   }
   .dropzoneDragArea {
   background-color: #fbfdff;
   border: 1px dashed #c0ccda;
   border-radius: 6px;
   padding: 60px;
   text-align: center;
   margin-bottom: 15px;
   cursor: pointer;
   }
   .variation_sp{
    margin: 0px 20px 0px 0px;
   }
   .dropzone{
   box-shadow: 0px 2px 20px 0px #f2f2f2;
   border-radius: 10px;
   }
</style>
@endpush
@section('content')
<div class="row m-4">
   <div class="col-md-3">
      <select name="create_product" id="" getParent='parent_id' class=" input-lg dynamic create_product form-control" data-dependent="sub_category_id">
         <option value="1">Simple Product</option>
         <option value="2" selected>Variant Product</option>
      </select>
   </div>
</div>
<ol class="breadcrumb">
   <li class="breadcrumb-item">
      <a href="#" onclick="gerenal();">Gerenal</a>
   </li>
   <li class="breadcrumb-item">
      <a href="#" onclick="variation();">Variations</a>
   </li>
</ol>
<!-- Nav tabs -->
<div class="gerenal">
   <ol class="breadcrumb">
      <div class="tabs-wrapper">
         <ul class="nav classic-tabs tabs-cyan" role="tablist">
            <li class="nav-item ">
               <a class="nav-link waves-light active btn1" id="myDIV"  data-toggle="tab" href="#panel1" role="tab">Basic Details</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel2" role="tab">Specification</a>
               </li> -->
            <!-- <li class="nav-item">
               <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel3" role="tab">Description</a>
               </li> -->
            <li class="nav-item">
               <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel4" role="tab">Bullets</a>
            </li>
            <li class="nav-item">
               <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel5" role="tab">PDF</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel6" role="tab">Images</a>
               </li> -->
         </ul>
      </div>
   </ol>
   {!! Form::open(['route' => 'products.store','enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'demoform', 'name' => 'demoform']) !!}
   <!-- Tab panels -->
   <div class="tab-content card">
      <!--Panel 1-->
      <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <span class="success_messsage"></span>
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Create Basic Details</strong>
                           </div>
                           <div class="card-body">
                              
                              @include('admin.products_variant.fields')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/.Panel 1-->
      <!--Panel 2-->
      <!-- <div class="tab-pane fade" id="panel2" role="tabpanel">
         <div class="md-form">
           <div class="container-fluid">
               <div class="animated fadeIn">
                     @include('coreui-templates::common.errors')
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="card">
                                 <div class="card-header">
                                     <i class="fa fa-plus-square-o fa-lg"></i>
                                     <strong>Create specification</strong>
                                 </div>
                                 <div class="card-body">
         
                                        @include('admin.products_variant.specification')
         
                                    
                                 </div>
                             </div>
                         </div>
                     </div>
                </div>
         </div>
         </div>
         </div> -->
      <!--/.Panel 2-->
      <!--Panel 3-->
      <div class="tab-pane fade" id="panel3" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Create Description</strong>
                           </div>
                           <div class="card-body">
                              @include('admin.products_variant.description')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/.Panel 3-->
      <!--Panel 4-->
      <div class="tab-pane fade" id="panel4" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Create Bullets</strong>
                           </div>
                           <div class="card-body">
                              @include('admin.products_variant.technical')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/.Panel 4-->
      <!--  -->
      <div class="tab-pane fade" id="panel5" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Create PDF</strong>
                           </div>
                           <div class="card-body">
                              @include('admin.products_variant.pdf')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="panel6" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Images</strong>
                           </div>
                           <div class="card-body">
                              @include('admin.products_variant.images')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="tab-content card">
      <div class="tab-pane fade in show active" role="tabpanel">
         <div class="container-fluid">
            <div class="card" style="margin-bottom: 1px !important;">
               <div class="card-header">
                  <button type="submit" class="btn btn-md btn-primary">Save</button>
                  <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   {!! Form::close() !!}
</div>
<!-- Variations -->
<div class="variation">
 
   {!! Form::open(['route' => 'products.variantStore','enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'demoform1', 'name' => 'demoform1']) !!}
   <ol class="breadcrumb">
      <div class="tabs-wrapper">
         <input type="hidden" name="product_id" value="" id="product_idss">
         <ul class="nav classic-tabs tabs-cyan" role="tablist">
          @foreach($attribute as $data)
            <li class="nav-item variation_sp">
              <label for="" class="vari_label"> 
                {{$data->name}}
                <input type="hidden" name="attribute_id[]" value="{{$data->id}}">
              </label>
              <select name="attribute_variat_id[]" id="variation_value_get{{$data->id}}" class="form-control" onchange="variation_click({{$data->id}})">
                <option value="">Select {{$data->name}}</option>
                @foreach(attribute_value($data->id) as $attribute)

                     <option value="{{$attribute->id}}">{{$attribute->value}}</option>
                @endforeach

              </select>
            </li> 
            <br>
          @endforeach
          <!-- <li>
            <label for="">&nbsp;</label>
            <button class="btn form-control btn-success" onclick="">Submit</button>
          </li> -->
         </ul>
      </div>
   </ol>
   <!-- Tab panels -->
   <div class="tab-content card">
      <!--Panel 1-->
      <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
         <div class="md-form">
            <div class="container-fluid">
               <span class="success_messsage1"></span>
               <div class="animated fadeIn">
                  @include('coreui-templates::common.errors')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <i class="fa fa-plus-square-o fa-lg"></i>
                              <strong>Create Variations Details</strong>
                           </div>
                           
                           <div class="card-body variation_card">
                             
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="">
                                      SKU
                                    </label>
                                    <input type="text" class="form-control" placeholder="Enter SKU" name="sku">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">
                                    Regular Price
                                    </label>
                                    <input type="text" class="form-control" placeholder="Enter Regular Price" name="regular_price">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">
                                    Sale Price
                                    </label>
                                    <input type="text" class="form-control" placeholder="Enter Sale Price" name="sale_price">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">
                                    Qty
                                    </label>
                                    <input type="text" class="form-control" placeholder="Enter Qty" name="qty">
                                  </div>
                                  <div class="col-md-12">
                                    <label for="">
                                    Description
                                    </label>
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                  </div>
                                  <div class="col-md-12">
                                    <label for="">
                                    Images
                                    </label>
                                          <div class="panel panel-default">
                                            <div class="panel-body" style="text-align: center;">
                                              <div id="" class="dz-default dz-message dropzoneDragArea" style="margin: 1em 0 !important">
                                                <div class="fallback">
                                                    <input name="file[]" type="file" multiple />
                                                </div>
                                              </div>
                                              <!-- Notes -->
                                              <span style="color: red;">Only .png, .jpg, .gif, .bmp, and .jpeg files types are supported.</span>
                                              <div class="dropzone-previews"></div>   
                                            </div>
                                          </div>
                                  </div>
                                </div>
                           </div>


                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/.Panel 1-->
   </div>
   <div class="tab-content card">
      <div class="tab-pane fade in show active" role="tabpanel">
         <div class="container-fluid">
            <div class="card" style="margin-bottom: 1px !important;">
               <div class="card-header">
                  <button type="submit" class="btn btn-md btn-primary">Save</button>
                  <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<!-- Adding a script for dropzone -->
<script>
   Dropzone.autoDiscover = false;
   // Dropzone.options.demoform = false; 
   let token = $('meta[name="csrf-token"]').attr('content');
   $(function() {
   var myDropzone = new Dropzone("div#dropzoneDragArea", { 
     acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
     paramName: "file",
     url: "{{ url('admin/dropzone/upload_image') }}",
     previewsContainer: 'div.dropzone-previews',
     addRemoveLinks: true,
     autoProcessQueue: false,
     uploadMultiple: true,
     parallelUploads: 20,
     maxFiles: 20,
     // maxFilesize: 2,
     params: {
           _token: token
       },
      // The setting up of the dropzone
     init: function() {
         var myDropzone = this;
         //form submission code goes here
         $("form[name='demoform']").submit(function(event) {
           //Make sure that the form isn't actully being sent.
           event.preventDefault();
           URL = $("#demoform").attr('action');
           formData = $('#demoform').serialize();
           $.ajax({
             type: 'POST',
             url: URL,
             data: formData,
             success: function(result){
               if(result.status == "success"){
                 // fetch the useid 
                 document.getElementById("demoform").reset();

                 var su = "<div class='alert alert-success'>Product save successfully<div>";
                 $('.success_messsage').html(su);
                 $('.success_messsage').delay(2000);
                 $('.success_messsage').fadeOut(2000);
   
                 var product_id = result.product_id;
               $("#product_idss").val(product_id); // inserting product_id into hidden input field
                 //process the queue
                 myDropzone.processQueue();
               }else{
                 $('#demoform')[0].submit();
                 console.log("error");
               }
             },
             error: function (error) {
               $('#demoform')[0].submit();
                 console.log(error)
             }
           });
         });

         // variant
         $("form[name='demoform6']").submit(function(event) {
           //Make sure that the form isn't actully being sent.
           event.preventDefault();
           URL = $("#demoform1").attr('action');
           formData = $('#demoform1').serialize();
           $.ajax({
             type: 'POST',
             url: URL,
             data: formData,
             success: function(result){
               if(result.status == "success"){
                  document.getElementById("demoform1").reset();
                  $("#product_idss").val(result.product_id); // inserting product_id into hidden input field
                  var su = "<div class='alert alert-success'>Product variations save successfully<div>";
                 $('.success_messsage1').html(su);
                 $('.success_messsage1').delay(2000);
                 $('.success_messsage1').fadeOut(2000);
               }
             },
             error: function (error) {
               $('#demoform')[0].submit();
                 console.log(error)
             }
           });
         });
         //end variant
         //Gets triggered when we submit the image.
         this.on('sendingmultiple', function(files, xhr, formData){
         //fetch the product_id  from hidden input field and send that product_id with our image
           let product_id = document.getElementById('product_id').value;
          formData.append('product_id', product_id);
       });
       
         this.on("successmultiple", function (files, response) {
               //reset the form
               $('#demoform')[0].reset();
               //reset dropzone
               $('.dropzone-previews').empty();
               window.location.replace('/admin/products?status=success');
           });
           this.on("queuecomplete", function () {
       
           });
       
         this.on("errormultiple", function(files, response) {
           // Gets triggered when there was an error sending the files.
           // Maybe show form again, and notify user of error
         });
     }
     });
   });


           $('.create_product').change(function(){
               var product = $(this).val();
               if(product == 1)
               {
                   window.location.href="{{ route('products.create') }}";
   
               }
               else if(product == 2)
               {
                   window.location.href="{{ route('products.variants') }}"; 
               }
           })
           function gerenal(){
             $('.variation').hide();
             $('.gerenal').show();        
           }
   
           function variation(){
             $('.variation').show();
             $('.gerenal').hide();
           }

           function variation_click($id)
           {
            var a = $('#variation_value_get'+$id).val();
            $(".variation_print"+$id).html(a);
           }
         
</script>
@endpush