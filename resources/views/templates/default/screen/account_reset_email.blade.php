@extends('templates.default.app')

@section('content')

<div class="block mainBodyContent black-box">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-md-7 col-lg-6">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reset Your Password</h4>
                        <form method="POST" action="{{ url('/customer/password_forgot') }}">
                            @csrf
                            <div class="form-group">
                                <label>Enter Email to reset password</label>
                                <input type="email" class="form-control form-control-sm {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email address">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Send Password Reset Link</button>                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection