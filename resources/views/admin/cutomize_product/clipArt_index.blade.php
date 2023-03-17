@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Manage Clip Art</li>
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
                  <span id="message"></span>

                    <form action="{{route('clipArt.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="name">Clip Art Name</label>
                           <input class="form-control" name="name" type="text" id="name">
                           @if($errors->has('name'))
                           <span class="span">{{ $errors->first('name') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Clip Art Price :</label>
                           <input class="form-control" name="price" type="text" id="name">
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
                           <input class="btn btn-primary" type="submit" value="Save">
                           <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                      </div>
                    </form>
                     <div class="table-responsive-sm">
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                           <div class="dataTables_length" id="myTable_length">
                              <label>
                                 Show 
                                 <select name="myTable_length" aria-controls="myTable" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                 </select>
                                 entries 
                              </label>
                           </div>
                           <div id="myTable_filter" class="dataTables_filter">
                              <label>Search: <input type="search" class="" placeholder="" aria-controls="myTable">
                              </label>
                           </div>
                           <table class="table dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info" style="width: 1224px;">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Check all: activate to sort column descending" style="width: 81px;">Check all <br>
                                       <input type="checkbox" id="selectall">
                                    </th>
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Sr.No.: activate to sort column ascending" style="width: 54px;">Sr.No.</td>
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 125px;">Name</td>
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 45px;">Price</td>
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 45px;">Image</td>
                                    <td width="100" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 100px;">Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach($clipAr as $data)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">
                                       @if($data->is_active == '1')
                                      <input type="checkbox" class="selectedId_view" view_id="{{$data->clip_id}}" name="product[]" checked value="{{$data->is_active}}">
                                      @else
                                      <input type="checkbox" class="selectedId_view" id="vehicle1" name="product[]" view_id="{{$data->clip_id}}" value="{{$data->is_active}}">
                                      @endif
                                    </td>
                                    <td>{{$i}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->price}}</td>
                                    <td><img src="{{Asset($data->image)}}" width="30px;" alt="Clip Art"></td>
                                    <td>
                                             <a href="{{route('clipArt.edit',['clip_id'=>$data->clip_id])}}" class="btn btn-ghost-info">
                                                <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="{{route('clipArt.delete',['clip_id'=>$data->clip_id])}}">
                                                <button type="submit" class="btn btn-ghost-danger" onclick="return confirm('Are you sure?')">
                                                   <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                    </td>
                                 </tr>
                                 @php $i++; @endphp

                                 @endforeach
                              </tbody>
                           </table>
                           <div class="dataTables_info" id="myTable_info" role="status" aria-live="polite">Showing 1 to 8 of 8 entries</div>
                           <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
                              <a class="paginate_button previous disabled" aria-controls="myTable" data-dt-idx="0" tabindex="-1" id="myTable_previous">Previous</a>
                              <span>
                              <a class="paginate_button current" aria-controls="myTable" data-dt-idx="1" tabindex="0">1</a>
                              </span>
                              <a class="paginate_button next disabled" aria-controls="myTable" data-dt-idx="2" tabindex="-1" id="myTable_next">Next</a>
                           </div>
                        </div>
                     </div>
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
      $('.selectedId_view').click(function(){
         var id = $(this).attr('view_id');
         var value = $(this).attr('value');
         $.ajax({
                url:"{{route('clipArt.activeInactive')}}",
                type:'post',
                dataType:'json',
                data:{
                    '_token':'{{csrf_token()}}',
                    view_id:id,
                    status_value:value,
                },
                success:function(data)
                {
                  $('#message').html(data.message);
                }
            });
           
      });
   });
</script>
@endpush