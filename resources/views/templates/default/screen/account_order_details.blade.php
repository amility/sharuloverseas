@extends('templates.default.app')
@php
use App\Models\Products;
use App\Models\ProductImages;
@endphp
@section('content')

@include('templates.default.screen.account_breadcumb')

<div class="block">
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')

            <div class="col-8 col-lg-8 mt-lg-0">
                <div class="card">
                    <div class="order-header">
                        <div class="order-header__actions"><a href="{{ url('customer/account-orders') }}" class="btn btn-xs btn-secondary">Back to list</a></div>
                        <h5 class="order-header__title">Order #{{$order['order_no']}}</h5>
                        <div class="order-header__subtitle">Was placed on
                            <mark class="order-header__date"> 
                            @php $date = new DateTime($order['order_date']); @endphp
                            {{$date->format('F d, Y g:i A')}}</mark>
                            and is currently
                            <mark class="order-header__status">On {{ucfirst($order['status'])}}</mark>
                            .</div>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-table">
                        <div class="table-responsive-sm">
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
                </div>
                 <div class="row mt-3 no-gutters mx-n2">
                    @if($shippingDetail != null)
                    <div class="col-sm-6 col-12 px-2">
                      <div class="card address-card">
                        <div class="address-card__body">
                          <div class="address-card__badge address-card__badge--muted">Shipping Address</div>
                          <div class="address-card__name">{{$shippingDetail['first_name'] ." ". $shippingDetail['last_name']}}</div>

                          <div class="address-card__row">
                          @if($shippingDetail['company_name'] != '' )
                             <b>Company Name : </b> {{ $shippingDetail['company_name'] }}, <br>
                          @endif
                          @if( $shippingDetail['appartment'] != '')
                             <b>Apartment Name : </b> {{ $shippingDetail['appartment'] }}, <br>
                          @endif
                            <b>Block : </b> {{ $shippingDetail['block'] }}, <b>House & Building : </b> {{ $shippingDetail['house_building'] }}, <b>Street : </b> {{ $shippingDetail['street_address'] }} <br>
                             <b>Area & Country : </b> {{ $shippingDetail['town_city'] .", ". getCountryName($shippingDetail['country']) ." ". $shippingDetail['postcode_zip'] }}
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
                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                      <div class="card address-card">
                        <div class="address-card__body">
                          <div class="address-card__badge address-card__badge--muted">Billing Address</div>
                          <div class="address-card__name">{{$billingDetail['first_name'] ." ". $billingDetail['last_name']}}</div>

                          <div class="address-card__row">
                          @if($billingDetail['company_name'] != '' )
                             <b>Company Name : </b> {{ $billingDetail['company_name'] }}, <br>
                          @endif
                          @if( $billingDetail['appartment'] != '')
                            <b>Apartment Name : </b>  {{ $billingDetail['appartment'] }}, <br>
                          @endif
                            <b>Block : </b> {{ $billingDetail['block'] }}, <b>House & Building : </b> {{ $billingDetail['house_building'] }}, <b>Street : </b> {{ $billingDetail['street_address'] }} <br>
                             <b>Area & Country : </b> {{ $billingDetail['town_city'] .", ". getCountryName($billingDetail['country']) ." ". $billingDetail['postcode_zip'] }}
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