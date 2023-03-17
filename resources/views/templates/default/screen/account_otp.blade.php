@extends('templates.default.app')

@section('content')

<div class="block">
    <div class="container">
        <div class="row">
            
            <div class="col-md-10 d-flex flex-column mt-4 mt-md-0">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                        <h4 class="card-title">OTP</h4>
                        <!-- <form> -->
                        <form method="post" action="{{ url('/customer/check-otp', app('request')->input('id')) }}">
                        @csrf
                            <div class="form-group">
                                <label>Enter OTP</label>
                                <input type="text" class="form-control {{ $errors->has('otp')?'is-invalid':'' }}" name="otp" placeholder="Enter OTP">
                                @if ($errors->has('otp'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('otp') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection