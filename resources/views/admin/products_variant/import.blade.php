@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('products.index') !!}">Products</a>
        </li>
        <li class="breadcrumb-item active">Import</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit fa-lg"></i>
                            <strong>Import Products</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-sm-6">
                                    {!! Form::label('excel_data', 'Upload Excel Sheet (Please use on XLSX, XLX formats only!)') !!}
                                    <br><br>
                                    {!! Form::file('excel_data_sheet', null , ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'submit-datasheet']) !!}
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
