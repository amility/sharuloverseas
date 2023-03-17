@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Edit Clip Art</li>
</ol>
<div class="container-fluid">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <!-- create view -->
               <div class="tab-content card">
               @include('flash::message')

                  <!--Panel 1-->
                  <div class="tab-pane fade in show active" id="pane20" role="tabpanel">
                    <form action="{{route('clipArt.update',['clip_id'=>$data->clip_id])}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="name">Clip Art Name</label>
                           <input class="form-control" name="name" type="text" id="name" value="{{$data->name}}">
                           @if($errors->has('name'))
                           <span class="span">{{ $errors->first('name') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Clip Art Price :</label>
                           <input class="form-control" name="price" type="text" id="name" value="{{$data->price}}">
                           @if($errors->has('price'))
                           <span class="span">{{ $errors->first('price') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-sm-3">
                           <label for="image_path">Add Clip Art Images :</label>
                           <input name="image" type="file" id="image_path">
                           @if($errors->has('image'))
                           <span class="span">{{ $errors->first('image') }}</span>
                           @endif
                        </div>
                        <div class="col-sm-3 mt-4">
                           <input class="btn btn-primary" type="submit" value="Edit">
                        </div>
                        <div class="col-md-4">
                            <img src="{{Asset($data->image)}}" alt="clip art" width="100%">
                        </div>
                      </div>
                      
                    </form>
                   
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection