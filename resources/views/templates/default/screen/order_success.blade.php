@extends('templates.default.app')
@php
use App\Models\Products;
use App\Models\ProductImages;
@endphp
@section('content')

<div class="black-box">
<div class="block order-success">
  <div class="container">
    <div class="order-success__body">
      <div class="order-success__header">
        <svg class="order-success__icon" width="100" height="100">
          <use xlink:href="{{ url('images/sprite.svg#check-100') }}"></use>
        </svg>
        <h1 class="order-success__title">Thank you</h1>
        <div class="order-success__subtitle">Your order has been received. Please take the screenshot for future use.</div>
        <div class="order-success__actions"><a href="{{url('/')}}" class="btn btn-xs btn-secondary">Go To Homepage</a></div>
      </div>
      <div class="order-success__meta">
        <ul class="order-success__meta-list">
          <li class="order-success__meta-item"><span class="order-success__meta-title">Order number:</span> <span class="order-success__meta-value">#{{$order['order_no']}}</span></li>
          <li class="order-success__meta-item"><span class="order-success__meta-title">Created at:</span> <span class="order-success__meta-value">
            @php $date = new DateTime($order['order_date']); @endphp
            {{$date->format('F d, Y g:i A')}}
          </span></li>
          <li class="order-success__meta-item"><span class="order-success__meta-title">Total:</span> <span class="order-success__meta-value">{{CurrencySymbol()}} {{number_format($order['total_price'], 2, '.', ',')}}</span></li>
          <li class="order-success__meta-item"><span class="order-success__meta-title">Payment method:</span> <span class="order-success__meta-value">{{$transaction['payment_method']}}</span></li>
        </ul>
      </div>
      <div class="card">
        <div class="order-list">
          <table>
            <thead class="order-list__header">
              <tr>
                <th class="order-list__column-label" colspan="2">Product</th>
                <th class="order-list__column-quantity">Qty</th>
                <th class="order-list__column-total">Total</th>
              </tr>
            </thead>
            <tbody class="order-list__products">
              @foreach($orderDetails as $orderData)
              @php
                  $productData = Products::where('id', $orderData['product_id'])->first();
                  $productImage = ProductImages::where('product_id', $orderData['product_id'])->first();
              @endphp
              <tr>
                <td class="order-list__column-image">
                  <div class="product-image"><a target="_blank" href="{{ URL::to('/product', $orderData['product_id']) }}" class="product-image__body"><img class="product-image__img" src="{{isset($productImage['image'])?$productImage['image']:asset('images/no-image.jpg')}}" alt=""></a></div>
                </td>
                <td class="order-list__column-product"><a target="_blank" href="{{ URL::to('/product', $orderData['product_id']) }}">{{$productData['prod_name']}}</a>
                  <!-- <div class="order-list__options">
                    <ul class="order-list__options-list">
                      <li class="order-list__options-item"><span class="order-list__options-label">Color:</span> <span class="order-list__options-value">Yellow</span></li>
                      <li class="order-list__options-item"><span class="order-list__options-label">Material:</span> <span class="order-list__options-value">Aluminium</span></li>
                    </ul>
                  </div> -->
                </td>
                <td class="order-list__column-quantity" data-title="Qty:">{{$orderData['quantity']}}</td>
                <td class="order-list__column-total">{{CurrencySymbol()}} {{$orderData['product_price']}}</td>
              </tr>
              @endforeach
            </tbody>
            <tbody class="order-list__subtotals">
              <tr>
                <th class="order-list__column-label" colspan="3">Subtotal</th>
                <td class="order-list__column-total">
                  @php $discount = 0; @endphp
                  @if($order['discount_price'])
                    @php $discount = $order['discount_price']; @endphp
                  @endif
                {{CurrencySymbol()}} {{number_format($order['total_price']-$order['shipping_price']+$discount, 2, '.', ',')}}</td>
              </tr>
              <tr>
                <th class="order-list__column-label" colspan="3">Shipping</th>
                <td class="order-list__column-total">{{CurrencySymbol()}} {{number_format($order['shipping_price'], 2, '.', ',')}}</td>
              </tr>
              @if($order['discount_price'])
              <tr>
                <th class="order-list__column-label" colspan="3">Discount(-)</th>
                <td class="order-list__column-total">{{CurrencySymbol()}} {{number_format($order['discount_price'], 2, '.', ',')}}</td>
              </tr>
              @endif
            </tbody>
            <tfoot class="order-list__footer">
              <tr>
                <th class="order-list__column-label" colspan="3">Total</th>
                <td class="order-list__column-total">{{CurrencySymbol()}} {{number_format($order['total_price'], 2, '.', ',')}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row mt-3 no-gutters mx-n2">
        @if($shippingDetail != null)
        <div class="col-sm-12 col-12 px-2">
          <div class="card address-card">
            <div class="address-card__body">
              <div class="address-card__badge address-card__badge--muted">Shipping Address</div>
              <div class="address-card__name">{{$shippingDetail['first_name'] ." ". $shippingDetail['last_name']}}</div>

              <div class="address-card__row">
              @if($shippingDetail['company_name'] != '') 
              <b>Company Name : </b> {{ $shippingDetail['company_name'] }}, <br>
              @endif
              @if($shippingDetail['appartment'] != '')
                <b>Apartment Name : </b>  {{ $shippingDetail['appartment'] }}, <br>
              @endif
                <b>Zip Code : </b> {{ $shippingDetail['block'] }}, <b>Address Line 1 : </b>{{ $shippingDetail['house_building'] }}, <b>Address Line 2 : </b> {{ $shippingDetail['street_address'] }} <br>
                <b>City & State : </b>{{ getCityName($shippingDetail['town_city']) .", ". getStateName($shippingDetail['state_country']) }}
              </div>
              <div class="address-card__row">
                  <div class="address-card__row-title">Phone Number</div>
                  <div class="address-card__row-content">{{ $shippingDetail['phone'] }}</div>
              </div>
              <div class="address-card__row">
                  <div class="address-card__row-title">Email Address</div>
                  <div class="address-card__row-content">{{ $shippingDetail['email_address'] }}</div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if($billingDetail != null)
        <div class="col-sm-12 col-12 px-2 mt-sm-0 mt-3">
          <div class="card address-card">
            <div class="address-card__body">
              <div class="address-card__badge address-card__badge--muted">Billing Address</div>
              <div class="address-card__name">{{$billingDetail['first_name'] ." ". $billingDetail['last_name']}}</div>

              <div class="address-card__row">
              @if($billingDetail['company_name'] != '')
                 <b>Company Name : </b> {{ $billingDetail['company_name'] }}, <br>
              @endif
              @if($billingDetail['appartment'] != '')
                 <b>Apartment Name : </b> {{ $billingDetail['appartment'] }}, <br>
              @endif
                <b>Zip Code : </b> {{ $billingDetail['block'] }}, <b>Address Line 1 : </b> {{ $billingDetail['house_building'] }}, <b>Address Line 2 : </b> {{ $billingDetail['street_address'] }} <br>
                         <b>City & State : </b>{{ getCityName($billingDetail['town_city']) .", ". getStateName($billingDetail['state_country']) }}
              </div>
              <div class="address-card__row">
                  <div class="address-card__row-title">Phone Number</div>
                  <div class="address-card__row-content">{{ $billingDetail['phone'] }}</div>
              </div>
              <div class="address-card__row">
                  <div class="address-card__row-title">Email Address</div>
                  <div class="address-card__row-content">{{ $billingDetail['email_address'] }}</div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>

@endsection
