@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Tax</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Tax
                             
                             <a class="pull-right" href="{{ route('tax.create') }}" style="margin-right: 10px;">
                                <button class="btn btn-sm btn-success" type="button">Create Tax</button>
                            </a>
                         </div>
                         <div class="card-body">
                             @include('admin.tax.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

