@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Categories</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Categories
                            <!-- <a class="pull-right" href="{{ URL::to('/admin/categories/create?type=subCat') }}">
                                <button class="btn btn-sm btn-primary" type="button">Create Sub-Category</button>
                            </a> -->

                             @if(Auth::user()->hasPermissionTo('categories-add'))
                                 <a class="pull-right" href="{{ route('categories.create') }}"
                                    style="margin-right: 10px;">
                                     <button class="btn btn-sm btn-success" type="button">Create Category</button>
                                 </a>
                             @endif
                         </div>
                         <div class="card-body">
                             @include('admin.categories.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

