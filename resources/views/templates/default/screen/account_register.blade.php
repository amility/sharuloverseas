@extends('templates.default.app')

@section('content')

<div class="block mainBodyContent black-box">
    <div class="container">
        <div class="row" style="justify-content: center;">

            <div class="col-12 col-lg-6 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="title">Register</h4>
                        <!-- <form> -->
                        <form method="post" action="{{ url('/customer/register') }}">
                        @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <!-- <input type="email" class="form-control" placeholder="Enter email"> -->
                                <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" value="{{ old('name') }}"
                                   placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <!-- <input type="email" class="form-control" placeholder="Enter email"> -->
                                <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':''}}" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                                <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Confirm password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Register</button>
                            <a href="{{url('customer/login')}}" class="btn btn-info mt-4">Back to login</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection