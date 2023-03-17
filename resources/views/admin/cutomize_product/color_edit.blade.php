@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Edit Color</li>
</ol>
<div class="container-fluid">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <!-- Nav tabs -->
              
               <div class="tab-content card">
                  <!--Panel 1-->
                  <div class="tab-pane fade in show active" id="pane20" role="tabpanel">
                    <div id="message1"></div>
                    <form id="color_save" >
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="name">Color Name</label>
                           <input class="form-control" name="name" value="{{$data->name}}" type="text" id="name" placeholder="Color name">
                           <div class="" id="name_error"></div>
                           <input class="form-control" name="color_id" value="{{$data->color_id}}" type="hidden" id="name" placeholder="Color name">


                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Color Code</label>
                           <input class="form-control" name="code" value="{{$data->code}}" type="text" id="name" placeholder="Code name">
                           <div class="" id="code_error"></div>

                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Color Price</label>
                           <input class="form-control" name="price" value="{{$data->price}}" type="text" id="name" placeholder="Price">
                           <div class="" id="price_error"></div>

                        </div>
                        <div class="col-sm-3 mt-4">
                           <input class="btn btn-primary" type="submit" value="Edit">
                           <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                     </div>
                    </form>
                    
                  </div>
                  <!--/.Panel 1-->
                  <!--Panel 2-->
                 
                  <!--/.Panel 2-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
   $(document).ready(function(){
    $('#color_save').on('submit', function(event){
            event.preventDefault();
            $.ajax({
               url:"{{route('color.update')}}",
               method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
               success:function(data)
               {
                    var errors = data.message;
                    $.each(errors, function (key, val) {
                      $("#" + key + "_error").text(val);
                      $("#" + key + "_error").attr('style',data.style);

                    });
                  if(data.status == 'success')
                  {
                    //  document.getElementById("color_save").reset();
                  // inserting product_id into hidden input field
                     $('#message1').html(data.message1);
                     $("#code_error").hide();
                     $("#name_error").hide();
                     $("#price_error").hide();
                  }
               }
            })
         });
   });
</script>
@endpush