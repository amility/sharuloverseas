@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! url('c~AiN:2)Y42,&*/gunshow') !!}">Gun Show</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Gun Show</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'gunshow.store', 'enctype' => 'multipart/form-data']) !!}

                                   @include('admin.gunshow.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
