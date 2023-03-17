@extends('admin.app')

@section('content')
<!--app-content open-->
<div class="app-content">
   <div class="side-app">
      <!-- PAGE-HEADER -->
      <div class="page-header">
         <div>
            <h1 class="page-title">Change Password </h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
         </div>
      </div>
      <!-- PAGE-HEADER END -->
      <!-- ROW-1 OPEN -->
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="mb-0 card-title"> Change Password</h3>
               </div>
               <div class="container-fluid">
        <div class="col-md-6 offset-3 pt-4">
            <h3 class="text-center">Change Password</h3>
            @if($errors->any())
            {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
            @endif
            @if(Session::get('error') && Session::get('error') != null)
            <div style="color:red">{{ Session::get('error') }}</div>
            @php
            Session::put('error', null)
            @endphp
            @endif
            @if(Session::get('success') && Session::get('success') != null)
            <div style="color:green">{{ Session::get('success') }}</div>
            @php
            Session::put('success', null)
            @endphp
            @endif
            <form class="form" action="{{ route('postChangePassword') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary text-center">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

            </div>
         </div>
      </div>
   </div>
   <!-- ROW-1 CLOSED -->
</div>
</div>
@endsection
@push('scripts')
<script>
   CKEDITOR.replace( 'paragraph1' );
    CKEDITOR.replace( 'paragraph2' );
   CKEDITOR.replace( 'paragraph3' );
    CKEDITOR.replace( 'paragraph4' );
   CKEDITOR.replace( 'paragraph5' );
   CKEDITOR.replace( 'paragraph6' );
   CKEDITOR.replace( 'paragraph7' );
   CKEDITOR.replace( 'paragraph8' );
   CKEDITOR.replace( 'paragraph9' );
   CKEDITOR.replace( 'paragraph10' );
   CKEDITOR.replace( 'editor1' );
</script>
<script>
   $(document).ready(function(){
      
       $('#contentselect').on('change',function(){
           var content_type=this.value;
           $("#tagselect").html('');
          
         $.ajax({
           url:"{{url('/ajaxdatatag')}}",
           type:"post",
           data:{content_id:content_type,
           _token:'{{csrf_token()}}'},
          
           success:function(res){
   
           $('#tagselect').html('<option value="">Select Tag</option>');
           $.each(res,function(key,value){
               $("#tagselect").append('<option value="' + value.id + '">' + value.name + '</option>');
              
           });
           }
         });
           
           
       })
   });
</script>
<script>
   $(document).ready(function(){
       $('.select_tag').select2({
           placeholder:"Select Tag",
       });
   });
</script>