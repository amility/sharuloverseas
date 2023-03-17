@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Manage View</li>
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
                     <span id="message"></span>
                     <form action="{{route('customize.store')}}" method="post">
                      @csrf
                        <div class="row">
                            <div class="form-group col-sm-4">
                              <label for="font_id">Choose a View :</label>
                              <select name="view_id" id="font_id" getparent="parent_id" class="form-control" data-dependent="sub_category_id" tabindex="-1" aria-hidden="true">
                                  <option value=''>Select View</option>
                                  <option value="1">Front</option>
                                  <option value="2">Back</option>
                                  <option value="3">Left</option>
                                  <option value="4">Right</option>
                              </select>
                              @if($errors->has('view_id'))
                           <span class="span">The view field is required.
</span>
                           @endif
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="name">View Price :</label>
                              <input class="form-control" name="price" type="text" id="name">
                              @if($errors->has('price'))
                           <span class="span">{{ $errors->first('price') }}</span>
                           @endif
                            </div>
                            <div class="col-sm-4 mt-4">
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
                                    <td width="100" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 100px;">Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php $i=1; @endphp
                                 @foreach($viewData as $data)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">
                                      @if($data->is_active == '1')
                                      <input type="checkbox" class="selectedId_view" view_id="{{$data->view_id}}" name="product[]" checked value="{{$data->is_active}}">
                                      @else
                                      <input type="checkbox" class="selectedId_view" id="vehicle1" name="product[]" view_id="{{$data->view_id}}" value="{{$data->is_active}}">
                                      @endif
                                    </td>
                                    <td>{{$i}}</td>
                                    <td>
                                       @if($data->view == '1')
                                       Front
                                       @elseif($data->view == '2')
                                       Back
                                       @elseif($data->view == '3')
                                       Left
                                       @elseif($data->view == '4')
                                       Right
                                       @endif
                                    </td>
                                    <td>{{$data->price}}</td>
                                    <td>
                                    <div class="btn-group">
                                           <a href="{{route('customize.edit',['view_id'=>$data->view_id])}}" class="btn btn-ghost-info">
                                             <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="{{route('customize.destroy',['id'=>$data->view_id])}}">
                                                <button type="submit" class="btn btn-ghost-danger" onclick="return confirm('Are you sure?')">
                                                   <i class="fa fa-trash"></i>
                                                   </button>
                                            </a>
                                          </div>
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
                url:"{{route('customizeView_edit')}}",
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