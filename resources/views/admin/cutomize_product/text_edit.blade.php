@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Edit Text</li>
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
                    <form action="{{route('text.edit',['text_id'=>$data->text_id])}}" enctype="multipart/form-data" method="post">
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="font_id">Font Family</label>
                          <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Font Family">
                          @if($errors->has('name'))
                          <span class="span">{{$errors->first('name')}}</span>
                          @endif
                        </div>
                        <!-- <div class="form-group col-sm-3">
                           <label for="font_id">Font Link</label>
                          <input type="text" class="form-control" value="{{$data->link}}" name="link" id="link" placeholder="Font Link">
                          @if($errors->has('link'))
                          <span class="span">{{$errors->first('link')}}</span>
                          @endif
                        </div> -->
                        <div class="form-group col-sm-3">
                           <label for="name">Font Document:</label>
                           <input class="form-control" name="doc" type="file" id="doc" placeholder="Font Doc">
                           @if($errors->has('doc'))
                          <span class="span">{{$errors->first('doc')}}</span>
                          @endif
                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Font Price:</label>
                           <input class="form-control" name="price" value="{{$data->price}}" type="text" id="price" placeholder="Price">
                           @if($errors->has('price'))
                          <span class="span">{{$errors->first('price')}}</span>
                          @endif
                        </div>
                        <div class="col-sm-2 mt-4">
                           <input class="btn btn-primary" type="submit" value="Save">
                           <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="col-md-4">
                           <label for="">Font doc file</label>
                           <br>
                           <a href="{{Asset('fontFile/'.$data->doc)}}">{{$data->doc}}</a>

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
