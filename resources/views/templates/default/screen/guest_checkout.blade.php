@extends('templates.default.app')
@php
use App\Models\Products;
use App\Models\ShippingModel;
use Illuminate\Support\Facades\Crypt;

@endphp
@php $A = Session::get('reqDetails') @endphp

@section('content')
<div class="black-box">
<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ url('customer/addToCarts') }}">Cart</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
      <h4>Checkout</h4>
    </div>
       
    </div>
</div>

<form action="{{ url('/customer/guest-order') }}" class="custCheck" method="POST">
    @csrf
    <div class="checkout block">
        <div class="container">
            <div class="row">

                <!-- <div class="col-12 mb-3"> -->
                    <!-- @if(!empty(Session::get('usercartId')) && !empty(Cart::session(Session::get('usercartId'))->getContent()->toArray()))
                    <div class="alert alert-lg alert-primary">Returning customer? <a href="{{url('customer/login')}}">Click here to login</a></div>
                @endif -->
                <!-- </div> -->

                <div class="col-6 col-lg-6 col-xl-5 col-md-12 col-sm-12">
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title"><span class="makahajan_color">1. </span> Billing details</h5>
                            <div class="form-row">
                                <!-- <div class="form-row"> -->
                                <div class="form-group col-md-12">
                                    <label for="checkout-email">Email address <span class="red">*</span></label>
                                    <input type="email"
                                        class="form-control @error('billing_address.email_address') is-invalid @enderror"
                                        id="checkout-email" placeholder="Email address"
                                        name="billing_address[email_address]"
                                        value="{{old('billing_address.email_address')}}">
                                    @error('billing_address.email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-first-name"> Name <span class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.first_name') is-invalid @enderror"
                                        id="checkout-first-name" placeholder=" Name"
                                        name="billing_address[first_name]"
                                        value="{{old('billing_address.first_name')}}">
                                    @error('billing_address.first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12" style="display:none">
                                    <label for="checkout-last-name">Last Name <span class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.last_name') is-invalid @enderror"
                                        id="checkout-last-name" placeholder="Last Name"
                                        name="billing_address[last_name]" value="{{old('billing_address.last_name')}}">
                                    @error('billing_address.last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-phone">Phone <span class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.phone') is-invalid @enderror"
                                        id="checkout-phone" placeholder="Phone" name="billing_address[phone]"
                                        value="{{old('billing_address.phone')}}">
                                    @error('billing_address.phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- </div> -->

                                <!-- </div> -->
                                <!-- <div class="form-group col-md-12">
                            <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control @error('billing_address.company_name') is-invalid @enderror" id="checkout-company-name" placeholder="Company Name" name="billing_address[company_name]" value="{{old('billing_address.company_name')}}">
                            @error('billing_address.company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                                <div class="form-group col-md-12" style="display:none">
                                    <label for="checkout-country1">Country <span class="red">*</span></label>
                                    <select id="checkout-country1"
                                        class="form-control form-control-select2 @error('billing_address.country') is-invalid @enderror"
                                        name="billing_address[country]" onchange="get_state(this.value,'billing')">

                                        @foreach($country as $countries)
                                        <option value="{{$countries['id']}}"
                                            @if(old('billing_address.country')==$countries['id'] ||
                                            $countries['name']=='Kuwait' ) {{'selected'}} @endif>{{$countries['name']}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('billing_address.country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-bill-state">State <span class="red">*</span></label>
                                    <select id="checkout-bill-state"
                                        class="form-control form-control-select2 @error('billing_address.state_country') is-invalid @enderror"
                                        name="billing_address[state_country]" onchange="get_city(this.value,'billing')">
                                        <option value="">Select a state...</option>
                                   @foreach($kuwait_cities as $kuwait_city)
                                 <option value="{{$kuwait_city['name']}}" @if(old('billing_address.town_city')==$kuwait_city['name'] || $kuwait_city['name'] == 'Kuwait') {{'selected'}} @endif>{{$kuwait_city['name']}}</option>
                                 @endforeach
                                    </select>
                                    @error('billing_address.state_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-bill-city">City <span class="red">*</span></label>
                                    <select id="checkout-bill-city"
                                        class="form-control form-control-select2 @error('billing_address.town_city') is-invalid @enderror"
                                        name="billing_address[town_city]">
                                        <option value="">Select a city...</option>
                                        @foreach($kuwait_cities as $kuwait_city)
                                        <option value="{{$kuwait_city['name']}}"
                                            @if(old('billing_address.town_city')==$kuwait_city['name'] ||
                                            $kuwait_city['name']=='Kuwait' ) {{'selected'}} @endif>
                                            {{$kuwait_city['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('billing_address.town_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-street-address">Zip Code <span class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.block') is-invalid @enderror"
                                        id="checkout-street-address" placeholder="Zip Code" name="billing_address[block]"
                                        value="{{old('billing_address.block')}}">
                                    @error('billing_address.block')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-street-address">Address Line 1 <span class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.street_address') is-invalid @enderror"
                                        id="checkout-street-address" placeholder="Address Line 1"
                                        name="billing_address[street_address]"
                                        value="{{old('billing_address.street_address')}}">
                                    @error('billing_address.street_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="checkout-street-address">Address Line 2 <span
                                            class="red">*</span></label>
                                    <input type="text"
                                        class="form-control @error('billing_address.house_building') is-invalid @enderror"
                                        id="checkout-street-address" placeholder="Address Line 2"
                                        name="billing_address[house_building]"
                                        value="{{old('billing_address.house_building')}}">
                                    @error('billing_address.house_building')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12" style="display:none">
                                    <label for="checkout-address">Apartment</label>
                                    <input type="text"
                                        class="form-control @error('billing_address.appartment') is-invalid @enderror"
                                        id="checkout-address" name="billing_address[appartment]"
                                        value="{{old('billing_address.appartment')}}">
                                    @error('billing_address.appartment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 d-none">
                                    <label for="checkout-street-address">Jaddah & Extra Directions</label>
                                    <textarea class="form-control " id="checkout-extra-direction"
                                        name="billing_address[extra_direction]"
                                        value="{{old('billing_address.extra_direction')}}" rows="3"> </textarea>
                                    @error('billing_address.extra_direction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  <div class="form-group col-md-12">
                            <label for="checkout-postcode">Postcode / ZIP <span class="red">*</span></label>
                            <input type="text" class="form-control @error('billing_address.postcode_zip') is-invalid @enderror" id="checkout-postcode" name="billing_address[postcode_zip]" value="{{old('billing_address.postcode_zip')}}">
                            @error('billing_address.postcode_zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->

                                <div class="form-group col-md-12">
                                    <div class="form-check"><span class="form-check-input input-check"><span
                                                class="input-check__body">
                                                <input class="input-check__input" type="checkbox"
                                                    id="checkout-create-account" name="create_account"
                                                    value="create_account">
                                                <span class="input-check__box"></span>
                                                <svg class="input-check__icon" width="9px" height="7px">
                                                    <use xlink:href="{{url('images/sprite.svg#check-9x7')}}"></use>
                                                </svg>
                                            </span></span>
                                        <label class="form-check-label" for="checkout-create-account">Create an
                                            account?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <h5 class="card-title">Shipping Details</h5>
                            <div class="form-group">
                                <div class="form-check"><span class="form-check-input input-check"><span
                                            class="input-check__body">
                                            <input class="input-check__input" type="checkbox"
                                                id="checkout-different-address" name="shipping_address_check"
                                                @if(old('shipping_address_check')) checked @endif>
                                            <span class="input-check__box"></span>
                                            <svg class="input-check__icon" width="9px" height="7px">
                                                <use xlink:href="{{url('images/sprite.svg#check-9x7')}}"></use>
                                            </svg>
                                        </span></span>
                                    <label class="form-check-label" for="checkout-different-address">Ship to a different
                                        address?</label>
                                </div>
                            </div>
                            <div id="shipping_address" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="checkout-email">Email address <span class="red">*</span></label>
                                        <input type="email"
                                            class="form-control @error('shipping_address.email_address') is-invalid @enderror"
                                            id="checkout-email" placeholder="Email address"
                                            name="shipping_address[email_address]"
                                            value="{{old('shipping_address.email_address')}}">
                                        @error('shipping_address.email_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-phone">Phone <span class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.phone') is-invalid @enderror"
                                            id="checkout-phone" placeholder="Phone" name="shipping_address[phone]"
                                            value="{{old('shipping_address.phone')}}">
                                        @error('shipping_address.phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-first-name">First Name <span class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.first_name') is-invalid @enderror"
                                            id="checkout-first-name" placeholder="First Name"
                                            name="shipping_address[first_name]"
                                            value="{{old('shipping_address.first_name')}}">
                                        @error('shipping_address.first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-last-name">Last Name <span class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.last_name') is-invalid @enderror"
                                            id="checkout-last-name" placeholder="Last Name"
                                            name="shipping_address[last_name]"
                                            value="{{old('shipping_address.last_name')}}">
                                        @error('shipping_address.last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group">
                            <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control @error('shipping_address.company_name') is-invalid @enderror" id="checkout-company-name" placeholder="Company Name" name="shipping_address[company_name]" value="{{old('shipping_address.company_name')}}">
                            @error('shipping_address.company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                                    <div class="form-group col-md-12" style="display:none">
                                        <label for="checkout-country">Country <span class="red">*</span></label>
                                        <select id="checkout-country"
                                            class="form-control form-control-select2 @error('shipping_address.country') is-invalid @enderror"
                                            name="shipping_address[country]"
                                            onchange="get_state(this.value,'shipping')">
                                            <!-- <option value="">Select a country...</option> -->
                                            @foreach($country as $countries)
                                            <option value="{{$countries['id']}}"
                                                @if(old('shipping_address.country')==$countries['id'] ||
                                                $countries['name']=='Kuwait' ) {{'selected'}} @endif>
                                                {{$countries['name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('shipping_address.country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                            <label for="checkout-state">State <span class="red">*</span></label>
                            <select id="checkout-state" class="form-control form-control-select2 @error('shipping_address.state_country') is-invalid @enderror" name="shipping_address[state_country]" onchange="get_city(this.value,'shipping')">
                                <option value="">Select a state...</option>
                           
                            </select>
                            @error('shipping_address.state_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-city">Choose Area <span class="red">*</span></label>
                                        <select id="checkout-city"
                                            class="form-control form-control-select2 @error('shipping_address.town_city') is-invalid @enderror"
                                            name="shipping_address[town_city]">
                                            <option value="">Select a city...</option>
                                            @foreach($kuwait_cities as $kuwait_city)
                                            <option value="{{$kuwait_city['name']}}"
                                                @if(old('billing_address.town_city')==$kuwait_city['name'] ||
                                                $kuwait_city['name']=='Kuwait' ) {{'selected'}} @endif>
                                                {{$kuwait_city['name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('shipping_address.town_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-street-address">Zip Code <span class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.block') is-invalid @enderror"
                                            id="checkout-street-address" placeholder="Zip Code"
                                            name="shipping_address[block]" value="{{old('shipping_address.block')}}">
                                        @error('shipping_address.block')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-street-address">Address Line 1 <span
                                                class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.street_address') is-invalid @enderror"
                                            id="checkout-street-address" placeholder="Address Line 1"
                                            name="shipping_address[street_address]"
                                            value="{{old('shipping_address.street_address')}}">
                                        @error('shipping_address.street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="checkout-street-address">Address Line 2 <span
                                                class="red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.house_building') is-invalid @enderror"
                                            id="checkout-street-address" placeholder="Address Line 1"
                                            name="shipping_address[house_building]"
                                            value="{{old('shipping_address.house_building')}}">
                                        @error('shipping_address.house_building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12" style="display:none">
                                        <label for="checkout-address">Apartment</label>
                                        <input type="text"
                                            class="form-control @error('shipping_address.appartment') is-invalid @enderror"
                                            id="checkout-address" name="shipping_address[appartment]"
                                            value="{{old('shipping_address.appartment')}}">
                                        @error('shipping_address.appartment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 d-none">
                                        <label for="checkout-street-address">Jaddah & Extra Directions</label>
                                        <textarea class="form-control " id="checkout-extra-direction"
                                            name="shipping_address[extra_direction]"
                                            value="{{old('shipping_address.extra_direction')}}" rows="3"> </textarea>
                                        @error('shipping_address.extra_direction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group">
                            <label for="checkout-postcode">Postcode / ZIP <span class="red">*</span></label>
                            <input type="text" class="form-control @error('shipping_address.postcode_zip') is-invalid @enderror" id="checkout-postcode" name="shipping_address[postcode_zip]" value="{{old('shipping_address.postcode_zip')}}">
                            @error('shipping_address.postcode_zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                                    <!-- <div class="form-row">
                            
                        </div> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-comment">Order notes <span
                                        class="text-muted">(Optional)</span></label>
                                <textarea id="checkout-comment" name="order_notes" class="form-control"
                                    rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 col-md-12 col-sm-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h5 class="card-title"><span class="makahajan_color">2. </span> Payment Methods
                            
                        </h5>
                            <div class="payment-methods">
                                <ul class="payment-methods__list">
                                    <!-- <li class="payment-methods__item payment-methods__item--active">
                                    <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" type="radio" checked="checked">
                                                <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title">K Net</span></label>

                                </li>-->
                                <li class="payment-methods__item" style="list-style-type: none;">
                                        <label class="payment-methods__item-header"><span
                                                class="payment-methods__item-radio input-radio"><span
                                                    class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method"
                                                        type="radio"  checked="checked"  value="Cash" onClick="paymentMethod(this.value);">
                                                    <span class="input-radio__circle"></span> </span></span><span
                                                class="payment-methods__item-title cashon" >Cash on delivery</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Pay with cash upon
                                                delivery.</div>
                                        </div>
                                    </li>
                                <li class="payment-methods__item">
                                    <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" onClick="paymentMethod(this.value);"  value="online" type="radio" data-toggle="modal" data-target="#exampleModal">
                                                <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title" style="color:#fff;">Online Payment</span></label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">Pay with online.</div>
                                    </div>
                                    <div class="row payment-methods__item-container container">
                                  
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="username">Full name (on the card)</label>

                                             <input type="text"  class="form-control"  name="owner" value="{{ old('owner',!empty($A['owner'])?$A['owner']:'') }}" >
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                                   <label for="cardNumber">Card number</label>
                                                   <div class="input-group">
                                                      <input type="text" class="form-control" name="cardNumber" value="{{ old('cardNumber',!empty($A['cardNumber'])?$A['cardNumber']:'') }}" placeholder="Card Number">
                                                     
                                                   </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label><span class="hidden-xs">Expiration</span> </label>
                                             <div class="input-group">
                                                   <select class="form-control" name="expiration-month" value="{{old('expiration-month')}}">
                                                      <option value="">MM</option>
                                                      @foreach(range(1, 12) as $month)
                                                         <option value="{{$month}}">{{$month}}</option>
                                                      @endforeach
                                                   </select>
                                                   <select class="form-control" name="expiration-year" value="{{old('expiration-year')}}">
                                                      <option value="">YYYY</option>
                                                      @foreach(range(date('Y'), date('Y') + 15) as $year)
                                                         <option value="{{$year}}">{{$year}}</option>
                                                      @endforeach
                                                   </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                            <label data-toggle="tooltip" title=""
                                                data-original-title="3 digits code on back side of the card">CVV <i
                                                class="fa fa-question-circle"></i></label>
                                            <input type="number" class="form-control"  placeholder="CVV" name="cvv" value="{{ old('cvv',!empty($A['cvv'])?$A['cvv']:'') }}">
                                          </div>
                                       </div>
                                    </div>
                                </li> 
                                    
                                <li>
                                @if($errors->has('owner') || $errors->has('cvv') || $errors->has('cardNumber') || $errors->has('amount') || $errors->has('expiration-month') || $errors->has('expiration-year'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        @if($errors->has('owner'))
                                        The full name (on the card) field is required.
                                        @elseif($errors->has('cvv'))
                                        {{ $errors->first('cvv') }}
                                        @elseif($errors->has('cardNumber'))
                                        {{ $errors->first('cardNumber') }}
                                        @elseif($errors->has('amount'))
                                        {{ $errors->first('amount') }}
                                        @elseif($errors->has('expiration-month'))
                                        {{ $errors->first('expiration-month') }}
                                        @elseif($errors->has('expiration-year'))
                                        {{ $errors->first('expiration-year') }}
                                        @endif
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0 mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><span class="makahajan_color">3. </span> Preferred Delivery</h5>
                            <div class="form-group">
                                <label for="preferred-time">Preferred Time</label>
                                <select id="preferred-time" class="form-control form-control-select2"
                                    name="preferred_time">
                                    <option value="morning-9am-to-11:59am">Morning 9 AM to 11:59 AM</option>
                                    <option value="afternoon-12pm-to-2:59pm">Afternoon 12 PM to 2:59 PM</option>
                                    <option value="evening-3pm-to-6pm">Evening 3 PM to 6 PM</option>
                                </select>
                                @error('shipping_address.country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-check-label " for="checkout-terms">Once the order has been placed
                                    successfully you will be received a call from us to schedule the best time for
                                    delivery.</label>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-0 mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><span class="makahajan_color">4. </span> Apply Promo Code</h5>
                            <div class="form-group">
                                <label for="promo-code">Promo Code</label>
                                <div class="account-menu__form-forgot">
                                    <input id="promo-code" type="text" class="w-50 float-left"
                                        placeholder="Enter Promo Code" name="promo_code" value="{{old('promo_code')}}">
                                    <a href="javascript:;" class="btn btn-primary apply"
                                        id="apply_promo">Apply</a>
                                </div>
                                @error('promo_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-body p-0 mt-4">
                        <h5 class="card-title"><span class="makahajan_color">5. </span> Review Order</h5>

                        <table class="checkout__totals">
                            <thead class="checkout__totals-header">
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="checkout__totals-products">
                                <!-- Shipping LBW Calculation  -->
                           @php $tot = 0; @endphp
                        <!-- Shipping LBW Calculation  -->
                                <!-- @if(!empty(Session::get('usercartId')))
                    @foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product)
                @php
                    $productData = Products::where('id', $product['id'])->first();
                    $attribute = json_decode($product['attributes'][0], true);              
                @endphp -->
                                <tr>
                                    <td>{{$attribute['product_name']}} × {{$product['quantity']}}</td>
                                    <td>{{CurrencySymbol()}} {{number_format($product['price']*$product['quantity'], 2,
                                        '.', ',')}}</td>
                                </tr>
                                 <!--LBW Shipping Calculation -->
                                        @php 
                                            $p_weight_id = Products::where('id',$product['id'])->first('weight_id');
                                            if($p_weight_id['weight_id'] != null)
                                            {
                                                
                                                $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                                                $tot += $sp_weight_price['price']*$product['quantity'];
                                            }
                                                
                                           
                                        @endphp
                                <!--LBW Shipping Calculation -->
                                @endforeach
                                @endif
                            </tbody>
                            <!-- @if(!empty(Session::get('usercartId'))) 
@php $total = Cart::session(Session::get('usercartId'))->session(Session::get('usercartId'))->getSubTotal(); @endphp
@else 
@php $total = 0; @endphp 
@endif
@php
$seasionalShipping = ShippingModel::where('shipping_method','1')->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first();
$priceShipping = ShippingModel::where('shipping_method','2')->get()->toArray();
$price_shipping_charge = 0;
if(count($priceShipping)>0){
  $minAmount = [];
  $maxAmount = [];
  $sh_charge = [];
  foreach($priceShipping as $key => $value){
     array_push($minAmount, $value['min_value']);
     array_push($maxAmount, $value['max_value']);
     array_push($sh_charge, $value['price']);
  }
  for($i=0; $i < count($minAmount); $i++){
    if($i==0){
      if($total >= $minAmount[$i] && $total <= $maxAmount[$i]){
        $price_shipping_charge = $sh_charge[$i];  
      }
    }
    if($i>0){
      if($total > $maxAmount[$i-1] && $total <= $maxAmount[$i]){
        $price_shipping_charge = $sh_charge[$i];
      }
    }
  }
}else{
  $price_shipping_charge = 0;
}
@endphp -->
                            <tbody class="checkout__totals-subtotals">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{CurrencySymbol()}} {{number_format($total, 2, '.', ',')}}</td>
                                </tr>

                                <tr>
                                    <th>Shipping</th>
                                    <td>{{CurrencySymbol()}}
                                        @if($seasionalShipping != null)
                                        {{number_format($seasionalShipping['price'], 2, '.', ',')}}
                                        @php $grandTotal = $total+$seasionalShipping['price']; @endphp
                                        @else
                                            <!--LBW Shipping Calculation -->
                                            @if($price_shipping_charge>=0)
                                                @if($tot > 0)
                                                    {{number_format($tot, 2, '.', ',')}}
                                                    @php $grandTotal = $total+$price_shipping_charge+$tot; @endphp

                                                @else
                                                    {{number_format($price_shipping_charge, 2, '.', ',')}}
                                                    @php $grandTotal = $total+$price_shipping_charge; @endphp

                                                @endif  
                                            @endif
                                        <!--LBW Shipping Calculation -->
                                        @endif
                                    </td>
                                </tr>
                                <input type="hidden" class="grandTotals" name="passamountword" value="{{round($grandTotal)}}">
                                <tr id="discount">
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>

                            <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>You Pay</th>
                                    <td id="grand_total">{{CurrencySymbol()}} {{(number_format(round($grandTotal), 2, '.', ','))}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" class="grandTotals"  class="form-control"  name="amount" min="1" readOnly value="{{round($grandTotal)}}">

                        <div class="checkout__agree form-group">
                            <div class="form-check"><span class="form-check-input input-check"><span
                                        class="input-check__body">
                                        <input class="input-check__input @error('checkbox') is-invalid @enderror"
                                            type="checkbox" id="checkout-terms" name="checkbox" @if(old('checkbox'))
                                            checked @endif>

                                        <input type="hidden" name="terms_condition_id"
                                            value="{{$terms!=null?$terms->id:null}}">
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="{{url('images/sprite.svg#check-9x7')}}"></use>
                                        </svg>
                                    </span></span>
                                <label class="form-check-label @error('checkbox') is-invalid @enderror"
                                    for="checkout-terms">I have read and agree to the website <a target="_blank"
                                        href="{{url('/terms-conditions')}}">terms and conditions</a>*</label>
                                @error('checkbox')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-1" style="width:100%; margin-bottom:.8rem;">Place Order</button>
                        <a href="{{ url('customer/addToCarts') }}" class=""> <button class="btn btn-warning mt-1" style="width:100%; margin-bottom:.5rem;">Back
                                to Cart</button> </a>
                    </div>
                </div>

                <!-- Button trigger modal -->

<!-- Modal -->
       

</form>
</div>
</div>
</div>

</div>
@endsection
@section('script')
<script>
    $(function () {
        var country1 = $('#checkout-country1').val();
        if (country1) {
            $("#checkout-country1").trigger("change");
        }

        var country = $('#checkout-country').val();
        if (country) {
            $("#checkout-country").trigger("change");
        }

        if ($('#checkout-different-address').prop("checked") == true) {
            $('#shipping_address').show();
        } else {
            $('#shipping_address').hide();
        }
        $('#checkout-different-address').on('click', function () {
            if ($('#checkout-different-address').prop("checked") == true) {
                $('#shipping_address').show();
            } else {
                $('#shipping_address').hide();
            }
        });
    });
    function paymentMethod(item)
    {
        if(item == 'online')
        {
            $('.custCheck').attr("action",`{{ route('dopay.online') }}`);

        }
        else
        {
            $('.custCheck').attr("action",`{{ url('/customer/guest-order') }}`);

        }
    }
</script>
@endsection