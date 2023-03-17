@extends('admin.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('categories.index') }}">Category</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('categories.index') }}" class="btn btn-light">Back</a>
                                  <a class="pull-right" href="{{ URL::to('/c~AiN:2)Y42,&*/categories/create?type=subCat&id='.$id) }}">
                                <button class="btn btn-sm btn-primary" type="button">Create Sub-Category</button>
                            </a>
                             </div>
                             <div class="card-body">
                                 @include('admin.categories.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
