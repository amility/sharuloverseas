@extends('templates.default.app')

@section('content')



<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')
            @if($customerAddress)
            <div class="col-8 col-lg-8 mt-lg-0">
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
                        <h5>Edit Address</h5>
                    </div>
                    <div class="card-divider"></div>
                    <form method="POST" action="{{ url('/customer/account-userupdateaddress') }}">
                        @csrf
                    <div class="card-body">
                        <div class="row no-gutters">                        
                        <input type="hidden" name="id" value="{{$customerAddress->id}}">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-email">Email address <span class="red">*</span></label>
                                        <input type="email" name="email_address" class="form-control @error('email_address') is-invalid @enderror" id="checkout-email" placeholder="Email address" value="{{old('email_address', $customerAddress->email_address)}}">
                                        @error('email_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Phone <span class="red">*</span></label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="checkout-phone" placeholder="Phone" value="{{old('phone', $customerAddress->phone)}}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-first-name">First Name <span class="red">*</span></label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="checkout-first-name" placeholder="First Name" value="{{old('first_name', $customerAddress->first_name)}}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Last Name <span class="red">*</span></label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="checkout-last-name" placeholder="Last Name" value="{{old('last_name', $customerAddress->last_name)}}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                                    <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="checkout-company-name" placeholder="Company Name" value="{{old('company_name', $customerAddress->company_name)}}">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" style="display:none">
                                    <label for="checkout-address-country">Country <span class="red">*</span></label>
                                    <select id="checkout-address-country" class="form-control form-control-select2 @error('country') is-invalid @enderror" name="country" onchange="get_state(this.value,'address')">
                                         <!-- <option value="">Select a country...</option> -->
                                    @foreach($countries as $countries)
                                        <option value="{{$countries['id']}}" @if(old('country')==$countries['id']) {{'selected'}} @endif>{{$countries['name']}}</option>
                                    @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-address-state">State <span class="red">*</span></label>
                                    <select id="checkout-address-state" class="form-control form-control-select2 @error('state_country') is-invalid @enderror" name="state_country" onchange="get_city(this.value,'address')">
                                        <option value="">Select a state...</option>
                                   
                                    </select>
                                    @error('state_country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-address-city">City <span class="red">*</span></label>
                                    <select id="checkout-address-city" class="form-control form-control-select2 @error('town_city') is-invalid @enderror" name="town_city">
                                        <option value="">Select a city...</option>
                                    @foreach($kuwait_cities as $kuwait_city)
                                        <option value="{{$kuwait_city['name']}}" @if(old('billing_address.town_city')==$kuwait_city['name'] || $kuwait_city['name'] == 'Kuwait') {{'selected'}} @endif>{{$kuwait_city['name']}}</option>
                                    @endforeach
                                    </select>
                                    @error('town_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-street-address">Block <span class="red">*</span></label>
                                    <input type="text" name="block" class="form-control @error('block') is-invalid @enderror" id="checkout-street-address" placeholder="Block" value="{{old('block', $customerAddress->block)}}">
                                    @error('block')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-street-address">Street Address <span class="red">*</span></label>
                                    <input type="text" name="street_address" class="form-control @error('street_address') is-invalid @enderror" id="checkout-street-address" placeholder="Street Address" value="{{old('street_address', $customerAddress->street_address)}}">
                                    @error('street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-street-address">House & Building <span class="red">*</span></label>
                                    <input type="text" name="house_building" class="form-control @error('house_building') is-invalid @enderror" id="checkout-street-address" placeholder="House & Building" value="{{old('house_building', $customerAddress->house_building)}}">
                                    @error('house_building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-address">Apartment <span class="text-muted">(Optional)</span></label>
                                    <input type="text" name="appartment" class="form-control @error('appartment') is-invalid @enderror" id="checkout-address" value="{{old('appartment', $customerAddress->appartment)}}">
                                    @error('appartment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group d-none">
                                    <label for="checkout-street-address">Jaddah & Extra Directions</label>
                                    <textarea class="form-control " id="checkout-extra-direction" name="extra_direction" value="{{old('extra_direction')}}" rows="3"> {{old('extra_direction', $customerAddress->extra_direction)}}</textarea>
                                    @error('extra_direction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               <!--  <div class="form-group">
                                    <label for="checkout-postcode">Postcode / ZIP</label>
                                    <input type="text" name="postcode_zip" class="form-control @error('postcode_zip') is-invalid @enderror" id="checkout-postcode" value="{{old('postcode_zip', $customerAddress->postcode_zip)}}">
                                    @error('postcode_zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->
                                
                                <div class="form-group mt-3 mb-0">
                                    <button class="btn btn-warning">Save</button>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </form>
                </div>
            </div>
            @else
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Firstly add the address.</h5>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection