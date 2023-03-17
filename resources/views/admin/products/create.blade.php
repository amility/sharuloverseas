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
        cursor: pointer;Basi
    }
    .dropzone{
      box-shadow: 0px 2px 20px 0px #f2f2f2;
      border-radius: 10px;
    }
    </style>
@endpush
@section('content')
<!--<div class="row m-4">-->
<!--  <div class="col-md-3">-->
<!--  <select name="create_product" id="" getParent='parent_id' class=" input-lg dynamic create_product form-control" data-dependent="sub_category_id">-->
<!--            <option value="1" selected>Simple Product</option>-->
<!--            <option value="2">Variant Product</option>-->

<!--        </select>-->

<!--  </div>-->
<!--</div>-->


    
  <!-- Nav tabs -->
  <div class="simple_product">
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
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel4" role="tab">Technical Bullets</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel5" role="tab">PDF</a>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel6" role="tab">Images</a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel7" role="tab">Customization Images</a>-->
          <!--</li>-->
         
      </ul>
      </div>
    </ol>
   <!--{!! Form::open(['route' => 'products.store','enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'upload_form', 'name' => 'upload_form']) !!} -->
<!--<form method="post" id="upload_form" enctype="multipart/form-data">-->
    
{!! Form::open(['route' => 'products.store', 'enctype' => 'multipart/form-data',  'id' => 'upload_form']) !!}


   @csrf
 <!-- Tab panels -->
 <div class="tab-content card">
    <span id="message"></span>
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
                              

                                   @include('admin.products.fields')

                               
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
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create specification</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.specification')

                               
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

                                   @include('admin.products.description')

                               
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
                                <strong>Create Technical Bullets</strong>
                            </div>
                            <div class="card-body">

                                   @include('admin.products.technical')

                               
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

                                   @include('admin.products.pdf')

                               
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

                                   @include('admin.products.images')

                               
                            </div>

                        </div>
                        
                    </div>
                </div>
           </div>
    </div>
   </div>
</div>

<div class="tab-pane fade" id="panel7" role="tabpanel">
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

                                   @include('admin.products.customize_image')

                               
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
@endsection

@push('scripts')
<!-- Adding a script for dropzone -->
<script>


          $('#upload_form').on('submit', function(event){
            event.preventDefault();
         URL = $("#upload_form").attr('action');
         
       
            $.ajax({
               url:URL,
               method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
               success:function(data)
               {
                 
                  if(data.status == 'success')
                  {
                     window.location.replace('/c~AiN:2)Y42,&*/products?status=success');
                  }
               }
            })
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
</script>
@endpush
