@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Orders List</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Orders

                        </div>


                        <div class="card-body">

                            @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif
                            @if ($errors->has('order')) <p style="color:red;">{{ $errors->first('order') }}</p> @endif
                            @if(Auth::user()->hasPermissionTo('orders-update'))
                                <form action="{{route('customerStatusUpdate')}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group col-sm-4">
                                        {!! Form::label('status', 'Status:') !!}
                                        <div class="input-group">
                                            <select class="form-control" name="status">
                                                <option value="">Please Select</option>
                                                <option value="confirmed">confirmed</option>

                                                <option value="dispatched">dispatched</option>
                                                <option value="delivered">delivered</option>
                                                <option value="rejected">rejected/refund</option>

                                                <option value="undelivered">undelivered</option>
                                                <option value="cancelled">cancelled</option>
                                            </select>

                                            {!! Form::submit('Save', ['class' => 'btn btn-primary' ]) !!}

                                        </div>
                                    </div>
                                    @endif

                                    @include('admin.orders.table')
                                </form>

                                <div class="pull-right mr-3">

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

