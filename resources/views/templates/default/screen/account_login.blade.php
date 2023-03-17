@extends('templates.default.app')

@section('content')

<div class="block mainBodyContent black-box">
    <div class="container ">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-lg-6 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-body">
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert" style="top: 7px;">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if ($message = Session::get('error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="top: 7px;">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <h4 class="title">Login</h4>
                <form method="POST" action="{{ url('/customer/login') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control form-control-sm {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email address">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-sm {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                    <a href="{{url('customer/register')}}" class="btn btn-info mt-4">Register</a>

                    <a style="float: right;" class="btn btn-link px-0" href="{{ url('customer/password_reset') }}">Forgot password?</a>

                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

</div>
<!-- <div class="block">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 d-flex flex-column mt-md-0 log_in1">
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert" style="top: 7px;">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if ($message = Session::get('error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="top: 7px;">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <div class="card flex-grow-1 mb-5 log_in">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form method="POST" action="{{ url('/customer/login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control form-control-sm {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email address">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-sm {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Login</button>
                            <a href="{{url('customer/register')}}" class="btn btn-info mt-4">Register</a>

                            <a style="float: right;" class="btn btn-link px-0" href="{{ url('customer/password_reset') }}">Forgot password?</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection