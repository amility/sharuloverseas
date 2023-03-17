@extends('templates.default.app')

@section('content')

<div class="block">
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
                        <h4 class="card-title">Reset Password</h4>
                        <p class="text-muted">Enter email and new password</p>
                        <form method="POST" action="{{ url('/customer/password_confirm') }}">
                            @csrf
                            <input type="hidden" name="pass_token" value="{{$token}}">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control form-control-sm {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email', $email) }}" placeholder="Email address" readonly>
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
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control form-control-sm {{ $errors->has('password_confirmation')?'is-invalid':'' }}" placeholder="Confirm Password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Reset</button>                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection