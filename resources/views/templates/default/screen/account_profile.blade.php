@extends('templates.default.app')

@section('content')



<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')
            <?php $customer = Auth::guard('customer')->user()->toArray(); ?>
            
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
                        <h5>Edit Profile</h5>
                    </div>
                    <div class="card-divider"></div>
                    <form method="POST" action="{{ url('/customer/edit-profile') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-12 col-lg-7 col-xl-6">
                                <div class="form-group">
                                    <label for="profile-first-name">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="profile-first-name" placeholder="First Name" value="{{old('name', $customer['name'])}}">
                                </div>
                               <!--  <div class="form-group">
                                    <label for="profile-last-name">Last Name</label>
                                    <input type="text" class="form-control" id="profile-last-name" placeholder="Last Name">
                                </div> -->
                                <div class="form-group">
                                    <label for="profile-email">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="profile-email" placeholder="Email Address" value="{{old('email', $customer['email'])}}">
                                </div>
                                <div class="form-group">
                                    <label for="profile-phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="profile-phone" placeholder="Phone Number" value="{{old('phone', $customer['phone'])}}">
                                </div>
                                <div class="form-group mt-5 mb-0">
                                    <button class="btn btn-primary">Save</button>
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