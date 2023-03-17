@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('bannerImages.index') !!}">Banner Images</a>
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
                              <strong>Edit Banner Images</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($bannerImages, ['route' => ['bannerImages.update', $bannerImages->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                              @include('admin.banner_images.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection