@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('shipping.index') !!}">Shipping</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Shipping</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($shipping, ['route' => ['shipping.update', $shipping->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                              @include('admin.shipping.edit_fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection