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
      <!--<li class="nav-item">-->
       <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#panel2" role="tab">Specification</a>
      <!--</li>-->
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
   </ul>
 </div>
</ol>
<!--{!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'patch','enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'demoform', 'name' => 'demoform' ]) !!}-->
{!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'patch','enctype' => 'multipart/form-data',  'id' => 'demoform_s']) !!}


<!-- Tab panels -->
 <div class="tab-content card">
 <!--Panel 1-->
 <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
    <div class="md-form ">
   <span class="success_messsage{{request()->segment(3)}}"></span>
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
   <span class="success_messsage{{request()->segment(3)}}"></span>

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
   <span class="success_messsage{{request()->segment(3)}}"></span>

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
   <span class="success_messsage{{request()->segment(3)}}"></span>

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
   <span class="success_messsage{{request()->segment(3)}}"></span>

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
   <span class="success_messsage{{request()->segment(3)}}"></span>

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


// ajax code
        $('#demoform_s').on('submit', function(event){
            event.preventDefault();
            
           
            URL = $("#demoform_s").attr('action');
            
           
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
                  if(data.status == "success"){
                     
                      window.location.replace('/c~AiN:2)Y42,&*/products?status=success');
                    }
                  },
                  error: function (error) {
                    $('#demoform_s')[0].submit();
                      console.log(error)
                  }
            })
        });

  //
  load_images();
  load_images_custom();

function load_images()
{
  $.ajax({
    url:"{{ url('c~AiN:2)Y42,&*/dropzone/fetch_image/'.$products->id) }}",
    success:function(data)
    {
      $('#uploaded_image').html(data);
    }
  })
}
</script>
@endpush