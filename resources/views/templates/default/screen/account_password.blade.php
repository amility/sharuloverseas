@extends('templates.default.app')

@section('content')



<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')
            <div class="col-12 col-lg-8 mt-lg-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-divider"></div>
                    <form method="POST" action="{{ route('shop-account.change-password') }}">
                    @csrf 
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-7 col-xl-6">
                                <div class="form-group">
                                    <label for="password-current">Current Password</label>
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="password-current" placeholder="Current Password" value="{{old('current_password')}}">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-new">New Password</label>
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="password-new" placeholder="New Password" value="{{old('new_password')}}">
                                    @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Re-enter New Password</label>
                                    <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" id="password-confirm" placeholder="Re-enter New Password" value="{{old('new_confirm_password')}}">
                                    @error('new_confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-5 mb-0">
                                    <button class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection