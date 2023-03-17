@extends('templates.default.app')
@php
use App\Models\Products;
use App\Models\ShippingModel;
use Illuminate\Support\Facades\Crypt;

@endphp
@php $A = Session::get('reqDetails') @endphp
@php
    $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
@endphp
@php $A = Session::get('reqDetails') @endphp
@section('content')

<div class="black-box">
    <div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.blade.php">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{ url('images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ url('customer/addToCarts') }}">Cart</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{ url('images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
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
<form action="{{ url('/customer/customer-order') }}" class="gustCheck" method="POST">
    @csrf
<div class="checkout block">
    <div class="container">
        <div class="row">
           <!--  <div class="col-12 mb-3">
                @if(!empty(Session::get('usercartId')) && !empty(Cart::session(Session::get('usercartId'))->getContent()->toArray()))
                    <div class="alert alert-lg alert-primary">Returning customer? <a href="#">Click here to login</a></div>
                @endif
            </div> -->
            <div class="col-12 col-lg-6 mb-4">
                 @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
               
                <div class="card mb-lg-0">
                   <!--  <div class="card-body">
                        <h3 class="card-title">Billing details</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="checkout-first-name">First Name</label>
                                <input type="text" class="form-control" id="checkout-first-name" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="checkout-last-name">Last Name</label>
                                <input type="text" class="form-control" id="checkout-last-name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="checkout-company-name" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <label for="checkout-country">Country</label>
                            <select id="checkout-country" class="form-control form-control-select2">
                                <option>Select a country...</option>
                                <option>United States</option>
                                <option>Russia</option>
                                <option>Italy</option>
                                <option>France</option>
                                <option>Ukraine</option>
                                <option>Germany</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checkout-street-address">Street Address</label>
                            <input type="text" class="form-control" id="checkout-street-address" placeholder="Street Address">
                        </div>
                        <div class="form-group">
                            <label for="checkout-address">Apartment, suite, unit etc. <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="checkout-address">
                        </div>
                        <div class="form-group">
                            <label for="checkout-city">Town / City</label>
                            <input type="text" class="form-control" id="checkout-city">
                        </div>
                        <div class="form-group">
                            <label for="checkout-state">State / County</label>
                            <input type="text" class="form-control" id="checkout-state">
                        </div>
                        <div class="form-group">
                            <label for="checkout-postcode">Postcode / ZIP</label>
                            <input type="text" class="form-control" id="checkout-postcode">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="checkout-email">Email address</label>
                                <input type="email" class="form-control" id="checkout-email" placeholder="Email address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="checkout-phone">Phone</label>
                                <input type="text" class="form-control" id="checkout-phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" id="checkout-create-account">
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="{{ url('images/sprite.svg#check-9x7') }}"></use>
                                        </svg>
                                    </span></span>
                                <label class="form-check-label" for="checkout-create-account">Create an account?</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="card-divider"></div>
                    <div class="card-body">
                        <h3 class="card-title"><span class="makahajan_color">1</span> Shipping Address</h3>
                        <div class="form-group">
                            <div class="payment-methods">
                            <ul class="payment-methods__list">
                                
                    @foreach($shippingAddresses as $shippingAddress) 
                        @if($shippingAddress['is_primary'])
                           @php $checked = 'checked'; @endphp
                        @endif             
                                <li class="payment-methods__item payment-methods__item--active">
                                    <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body">
                                                <input class="input-radio__input" name="shippingAddress_id" type="radio" checked="{{isset($checked)?$checked:''}}" value="{{$shippingAddress['id']}}">
                                                <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title"> {{$shippingAddress['first_name'] ." ". $shippingAddress['last_name']}}</span></label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">
                @if($shippingAddress['company_name'] != '' || $shippingAddress['appartment'] != '')
                      {{ $shippingAddress['company_name'] ." ". $shippingAddress['appartment'] }}, <br>
                  @endif
                        {{ $shippingAddress['block'] }}, {{ $shippingAddress['house_building'] }}, {{ $shippingAddress['street_address'] }} <br>
                      {{ getCityName($shippingAddress['town_city']) .", ". getStateName($shippingAddress['state_country']) }}<br>
                      {{ $shippingAddress['email_address'] }}, {{ $shippingAddress['phone'] }}
                                      </div>
                                    </div>
                                </li>
                    @endforeach
                    <li class="payment-methods__item payment-methods__item--active">
                        <div class="addresses-list" style="justify-content: center;">
                            <a href="{{url('customer/account-address'.'?redirect=checkout')}}" class="addresses-list__item addresses-list__item--new" style="border: none; padding: 1rem; max-width: fit-content;">
                        <div class="addresses-list__plus"></div>
                        <p style="color:#202020; font-size:16px;" class="mb-0">Add New</p>
                    </a></div>

                    </li>
                            </ul>
                        </div>
                            <!-- <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" id="checkout-different-address">
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="{{ url('images/sprite.svg#check-9x7') }}"></use>
                                        </svg>
                                    </span></span>
                                <label class="form-check-label" for="checkout-different-address">Ship to a different address?</label>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="checkout-comment">Order notes <span class="text-muted">(Optional)</span></label>
                            <textarea id="checkout-comment" name="order_notes" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-12 col-lg-5 col-xl-4 mb-4">
                <div class="">
                <div class="card mb-0">
                    <div class="card-body">
                        <h3 class="card-title"><span class="makahajan_color">2</span> Payment Methods</h3>
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
                                                        type="radio"  checked="checked"   value="Cash" onClick="paymentMethod(this.value);">
                                                    <span class="input-radio__circle"></span> </span></span><span
                                                class="payment-methods__item-title" style="color:#fff !important;">Cash on delivery</span></label>
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
                        <h3 class="card-title"><span class="makahajan_color">3</span> Preferred Delivery</h3>
                        <div class="form-group">
                            <label for="preferred-time">Preferred Time</label>
                            <select id="preferred-time" class="form-control form-control-select2" name="preferred_time">
                                <option value="morning-9am-to-11:59am">Morning 9 AM to 11:59 AM</option>
                                <option value="afternoon-12pm-to-2:59pm">Afternoon 12 PM to 2:59 PM</option>
                                <option value="evening-3pm-to-6pm">Evening 3 PM to 6 PM</option>
                            </select>
                            @error('shipping_address.country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="form-check-label pt-3" for="checkout-terms">Once the order has been placed successfully you will be received a call from us to schedule the best time for delivery.</label>
                        </div>
                         
                    </div>
                </div>
                <div class="card mb-0 mt-4">
                    <div class="card-body">
                        <h3 class="card-title"><span class="makahajan_color">4</span> Apply Promo Code</h3>
                        <div class="form-group">
                            <label for="promo-code">Promo Code</label>
                            <div class="account-menu__form-forgot">
                                <input id="promo-code" type="text" class="form-control" placeholder="Enter Promo Code" name="promo_code" value="{{old('promo_code')}}"> 
                                <a href="javascript:;" class="account-menu__form-forgot-link" id="apply_promo">Apply</a>
                            </div>
                            @error('promo_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="card mb-0">
                    <div class="card-body">
                        <h3 class="card-title">Review Order</h3>
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
                    @if(count($cartProducts)>0)
                    @php $sum = 0; @endphp
                        @foreach($cartProducts as $product)
                    @php
                        $productData = Products::where('id', $product['product_id'])->first();
                        $attribute = json_decode($product['attributes']);    
                         $sum+= $productData['prod_price']*$product['quantity'];          
                    @endphp
                            <tr>
                                <td>{{$productData['prod_name']}} × {{$product['quantity']}}</td>
                                <td>{{CurrencySymbol()}} {{number_format($productData['prod_price']*$product['quantity'], 2, '.', ',')}}</td>
                            </tr>
                             <!--LBW Shipping Calculation -->
                                        @php 
                                            $p_weight_id = Products::where('id',$product['product_id'])->first('weight_id');
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
  @php
  $total = $sum;
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
  @endphp
                            <tbody class="checkout__totals-subtotals" id="price_calculation">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{CurrencySymbol()}} {{number_format($total, 2, '.', ',')}}</td>
                                </tr>

                                <tr>
                                    <th>Shipping</th>
                                    <th>{{CurrencySymbol()}} @if($seasionalShipping != null)
                                          {{number_format($seasionalShipping['price'], 2, '.', ',')}}
                                        @php  $grandTotal = $total+$seasionalShipping['price']; @endphp
                                        @else
                                            @if($price_shipping_charge>=0)
                                                @if($tot > 0)
                                                    {{number_format($tot, 2, '.', ',')}}
                                                    @php $grandTotal = $total+$price_shipping_charge+$tot; @endphp

                                                @else
                                                    {{number_format($price_shipping_charge, 2, '.', ',')}}
                                                    @php $grandTotal = $total+$price_shipping_charge; @endphp

                                                @endif  
                                            @endif
                                        @endif
                                    </th>

                                </tr>
                                <input type="hidden" class="grandTotals" name="passamountword" value="{{round($grandTotal)}}">

                                <tr id="discount">
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                            <input type="hidden" class="grandTotals"  class="form-control"  name="amount" min="1" readOnly value="{{round($grandTotal)}}">

                            <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>You Pay</th>
                                    <td id="grand_total">{{CurrencySymbol()}} {{(number_format(round($grandTotal), 2, '.', ','))}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        
                        <div class="checkout__agree form-group">
                            <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body">
                                        <input class="input-check__input @error('checkbox') is-invalid @enderror" type="checkbox" id="checkout-terms" name="checkbox" @if(old('checkbox')) checked @endif>
                                        
                                        <input type="hidden" name="terms_condition_id" value="{{$terms!=null?$terms->id:'1'}}">
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="{{ url('images/sprite.svg#check-9x7') }}"></use>
                                        </svg>
                                    </span></span>
                                <label class="form-check-label @error('checkbox') is-invalid @enderror" for="checkout-terms"> &nbsp;&nbsp;I have read and agree to the website <a target="_blank" href="#">terms and conditions</a>*</label>
                                @error('checkbox')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                         <a href="{{ url('customer/addToCarts') }}" class="btn btn-info btn-xl btn-block">Back to Cart</a>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
 <!-- Modal -->
    
</form>
</div>

@endsection
@section('script')
<script>
     function paymentMethod(item)
    {
        if(item == 'online')
        {
            $('.gustCheck').attr("action",`{{ route('dopay.online') }}`);

        }
        else
        {
            $('.gustCheck').attr("action",`{{ url('/customer/customer-order') }}`);

        }
    }
</script>
@endsection