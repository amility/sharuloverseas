@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('aboutus.index') !!}">About Us</a>
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
                              <strong>Edit About Us</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($about, ['route' => ['aboutus.update', $about->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                              @include('admin.about_us.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection