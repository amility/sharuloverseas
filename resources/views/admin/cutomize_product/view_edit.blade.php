@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">View Edit</li>
</ol>
<div class="container-fluid">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <!-- create view -->
               <div class="tab-content card">
                  <!--Panel 1-->
                  <div class="tab-pane fade in show active" id="pane20" role="tabpanel">
                     <form action="{{route('customize.edit_save',['id'=>$data->view_id])}}" method="post">
                      @csrf
                        <div class="row">
                            <div class="form-group col-sm-4">
                              <label for="font_id">Choose a View :</label>
                              <select name="view_id" id="font_id" getparent="parent_id" class="form-control" data-dependent="sub_category_id" tabindex="-1" aria-hidden="true" disabled>
                                  <option value="">Select View</option>
                                  <option value="1" {{$data->view == '1'?'selected':''}}>Front</option>
                                  <option value="2" {{$data->view == '2'?'selected':''}}>Back</option>
                                  <option value="3" {{$data->view == '3'?'selected':''}}>Left</option>
                                  <option value="4" {{$data->view == '4'?'selected':''}}>Right</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="name">View Price :</label>
                              <input class="form-control" name="price" type="text" id="name" value ="{{$data->price}}">
                            </div>
                            <div class="col-sm-4 mt-4">
                              <input class="btn btn-primary" type="submit" value="Edit">
                              <a href="http://localhost/makzan/public/admin/categories" class="btn btn-secondary">Cancel</a>
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