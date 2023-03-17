@extends('admin.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Roles</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Roles
                            <a class="pull-right" href="{{ route('roles.create') }}">
                                <button class="btn btn-sm btn-success" type="button">Create Role</button>
                            </a>
                        </div>
                        <div class="card-body">
                            @include('admin.roles.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

