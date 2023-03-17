@extends('admin.app')
@section('content')
<ol class="breadcrumb">
   <li class="breadcrumb-item">Manage Text</li>
</ol>
<div class="container-fluid">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <!-- Nav tabs -->
               <ol class="breadcrumb">
                  <div class="tabs-wrapper">
                     <ul class="nav classic-tabs tabs-cyan" role="tablist">
                        <li class="nav-item" style="margin-right: 10px;">
                           <a class="nav-link waves-light active btn1" id="myDIV"  data-toggle="tab" href="#pane20" role="tab">Manage Text Font</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link waves-light btn1" id="myDIV" data-toggle="tab" href="#pane21" role="tab">Manage Text Color</a>
                        </li>
                     </ul>
                  </div>
               </ol>
               <div class="tab-content card">
                  <!--Panel 1-->
                  @include('flash::message')

                  <div class="tab-pane fade in show active" id="pane20" role="tabpanel">
                  <div id="message3"></div>

                    <form action="{{route('text.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="font_id">Font Family</label>
                          <input type="text" class="form-control" name="name" placeholder="Font Family">
                          @if($errors->has('name'))
                          <span class="span">{{$errors->first('name')}}</span>
                          @endif
                        </div>
                        <!-- <div class="form-group col-sm-3">
                           <label for="font_id">Font Link</label>
                          <input type="text" class="form-control" name="link" id="link" placeholder="Font Link">
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
                           <input class="form-control" name="price" type="text" id="price" placeholder="Price">
                           @if($errors->has('price'))
                          <span class="span">{{$errors->first('price')}}</span>
                          @endif
                        </div>
                        <div class="col-sm-2 mt-4">
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
                                    <!-- <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 125px;">Link</td> -->
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 45px;">Price</td>
                                    <td width="100" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 100px;">Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach($text as $data)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                       @if($data->is_active == '1')
                                      <input type="checkbox" class="selectedId_view2" view_id="{{$data->text_id}}" name="product[]" checked value="{{$data->is_active}}">
                                      @else
                                      <input type="checkbox" class="selectedId_view2" id="vehicle1" name="product[]" view_id="{{$data->text_id}}" value="{{$data->is_active}}">
                                      @endif
                                    </td>
                                    <td>{{$i}}</td>
                                    <td>{{$data->name}}</td>
                                    <!-- <td>{{$data->link}}</td> -->
                                    <td>{{$data->price}}</td>
                                    <td>
                                             <a href="{{route('text.edit',['text_id'=>$data->text_id])}}" class="btn btn-ghost-info">
                                                <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="{{route('text.delete',['text_id'=>$data->text_id])}}">
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
                  <div class="tab-pane fade in show" id="pane21" role="tabpanel">
                    <div id="message1"></div>
                    <div id="message"></div>
                    <form id="color_save" >
                      @csrf
                      <div class="row">
                        <div class="form-group col-sm-3">
                           <label for="name">Color Name</label>
                           <input class="form-control" name="name" type="text" id="name" placeholder="Color name">
                           <div class="" id="name_error"></div>

                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Color Code</label>
                           <input class="form-control" name="code" type="text" id="name" placeholder="Code name">
                           <div class="" id="code_error"></div>

                        </div>
                        <div class="form-group col-sm-3">
                           <label for="name">Color Price</label>
                           <input class="form-control" name="price" type="text" id="name" placeholder="Price">
                           <div class="" id="price_error"></div>

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
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 125px;">Code</td>
                                    <td class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 45px;">Price</td>
                                    <td width="100" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 100px;">Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach($color as $colors)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                    @if($colors->is_active == '1')
                                      <input type="checkbox" class="selectedId_view" view_id="{{$colors->color_id}}" name="product[]" checked value="{{$colors->is_active}}">
                                      @else
                                      <input type="checkbox" class="selectedId_view" id="vehicle1" name="product[]" view_id="{{$colors->color_id}}" value="{{$colors->is_active}}">
                                      @endif
                                  </td>
                                    <td>{{$i}}</td>
                                    <td>{{$colors->name}}</td>
                                    <td>{{$colors->code}}</td>
                                    <td>{{$colors->price}}</td>
                                    <td>
                                         <a href="{{route('color.edit',['color_id'=>$colors->color_id])}}" class="btn btn-ghost-info">
                                                <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="{{route('color.delete',['color_id'=>$colors->color_id])}}">
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
               url:"{{route('color.store')}}",
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
                     document.getElementById("color_save").reset();
                  // inserting product_id into hidden input field
                     $('#message1').html(data.message1);
                     $("#code_error").hide();
                     $("#name_error").hide();
                     $("#price_error").hide();
                  }
               }
            })
         });


        $('.selectedId_view').click(function(){
         var id = $(this).attr('view_id');
         var value = $(this).attr('value');
         $.ajax({
                url:"{{route('color.activeInactive')}}",
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


      $('.selectedId_view2').click(function(){
         var id = $(this).attr('view_id');
         var value = $(this).attr('value');
         $.ajax({
                url:"{{route('text.activeInactive')}}",
                type:'post',
                dataType:'json',
                data:{
                    '_token':'{{csrf_token()}}',
                    view_id:id,
                    status_value:value,
                },
                success:function(data)
                {
                  $('#message3').html(data.message);
                }
            });
           
      });
   });
</script>
@endpush