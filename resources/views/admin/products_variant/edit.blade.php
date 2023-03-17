@extends('admin.app')
@push('styles')
 <style>
      .dropzoneDragArea {
        background-color: #fbfdff;
        border: 1px dashed #c0ccda;
        border-radius: 6px;
        padding: 60px;
        text-align: center;
        margin-bottom: 15px;
        cursor: pointer;
    }
    .dropzone{
      box-shadow: 0px 2px 20px 0px #f2f2f2;
      border-radius: 10px;
    }
    </style>
@endpush
@section('content')
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('products.index') !!}">Products</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol> -->
  <ol class="breadcrumb">
  <div class="tabs-wrapper">
    <ul class="nav classic-tabs tabs-cyan" role="tablist">
      <li class="nav-item ">
        <a class="nav-link waves-light active btn1" id="myDIV"  data-toggle="tab" href="#panel1" role="tab">Basic Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel2" role="tab">Specification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel3" role="tab">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel4" role="tab">Technical Bullets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel5" role="tab">PDF</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel6" role="tab">Images</a>
      </li>
   </ul>
 </div>
</ol>
{!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'patch','enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'demoform', 'name' => 'demoform']) !!}


<!-- Tab panels -->
 <div class="tab-content card">
 <!--Panel 1-->
 <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
    <div class="md-form ">
   <span class="success_messsage"></span>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit fa-lg"></i>
                        <strong>Edit Basic Details</strong>
                    </div>
                    <div class="card-body">
                        
   @include('admin.products.edit_fields')

                               
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
<div class="tab-pane fade" id="panel2" role="tabpanel">
    <div class="md-form">

      <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                    <span class="success_messsage"></span>

                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>specification</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.edit_specification')

                               
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
   </div>
</div>
<!--/.Panel 2-->

<!--Panel 3-->
<div class="tab-pane fade" id="panel3" role="tabpanel">
     <div class="md-form">
     <span class="success_messsage"></span>

      <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong> Description</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.edit_description')

                               
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
     <span class="success_messsage"></span>

      <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Technical Bullets</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.edit_technical')

                               
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
     <span class="success_messsage"></span>

      <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>PDF</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.edit_pdf')

                               
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
         <span class="success_messsage"></span>

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

                                   @include('admin.products.edit_images')

                               
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
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </div>
  </div>
</div>
 {!! Form::close() !!}
    
@endsection

@push('scripts')
<!-- Adding a script for dropzone -->
<script>
Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false; 
let token = $('meta[name="csrf-token"]').attr('content');
$(function() {
  load_images();
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
              // alert("hello");
              var su = "<div class='alert alert-success'>Product save successfully<div>";
              $('.success_messsage').html(su);
              $('.success_messsage').delay(2000);
              $('.success_messsage').fadeOut(2000);

              // setTimeout( function(){$('.success_message').hide();} , 4000);

              // fetch the useid 
              var product_id = result.product_id;
            $("#product_id").val(product_id); // inserting product_id into hidden input field
              //process the queue
              // alert(myDropzone.processQueue());
              if(myDropzone.processQueue() == "undefined"){
                window.location.replace('/admin/products?status=success');
                return false;
              }else{
                myDropzone.processQueue();
              }
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

function load_images()
{
  $.ajax({
    url:"{{ url('admin/dropzone/fetch_image/'.$products->id) }}",
    success:function(data)
    {
      $('#uploaded_image').html(data);
    }
  })
}
</script>
@endpush