@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Products</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Products
                            <a class="pull-right" href="{{ route('products.import_products') }}" style="margin-right: 10px;">
                                <button class="btn btn-sm btn-success" type="button">Import</button>
                            </a>
                            @if (Auth::user()->hasPermissionTo('products-add'))
                                <a class="pull-right" href="{{ route('products.create') }}" style="margin-right: 10px;">
                                    <button class="btn btn-sm btn-success" type="button">Create Product</button>
                                </a>
                            @endif

                            @if (Auth::user()->hasPermissionTo('products-update'))
                                <!-- <a class="pull-right" href="{{ route('products.importForm') }}"
                                               style="margin-right: 10px;">
                                                <button class="btn btn-sm btn-success" type="button"> Import Products</button>
                                            </a>-->
                                <!-- <a class="pull-right" href="javascript:void(0)" style="margin-right: 10px;">
                                                <form action="{{ route('download-sample-products-excel') }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-success" type="submit"> Download Sample Product
                                                        Excel
                                                        Sheet
                                                    </button>
                                                </form>
                                            </a>-->
                            @endif

                        </div>
                        <div class="card-body">
                            @if ($errors->has('status'))
                                <p style="color:red;">{{ $errors->first('status') }}</p>
                            @endif
                            @if ($errors->has('product'))
                                <p style="color:red;">{{ $errors->first('product') }}</p>
                            @endif
                            @if (Auth::user()->hasPermissionTo('products-update'))
                                <form action="{{ route('productStatusUpdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group col-sm-4">
                                        {!! Form::label('status', 'Change Status:') !!}
                                        <div class="input-group">
                                            <select class="form-control" name="status">
                                                <option value="">Please Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>

                                            </select>
                                            <!-- <input type="text" name="product" id="demo"> -->

                                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

                                        </div>
                                    </div>
                            @endif
                            @include('admin.products.table')

                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
