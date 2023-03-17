@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Customers</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Customers
                             @if(Auth::user()->hasPermissionTo('customers-add'))
                                 <a class="pull-right" href="{{ route('customers.create') }}"><i
                                         class="fa fa-plus-square fa-lg"></i></a>
                             @endif
                         </div>
                         <div class="card-body">
                             @include('admin.customers.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

