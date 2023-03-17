@extends('templates.default.app')
@php
use App\Models\Products;
use App\Models\ShippingModel;
@endphp
@section('content')

<div class="black-box1">
<div class="page-header">
  <div class="page-header__container container">
    <div class="page-header__breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-dark" href="{{url('/')}}">Home</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="{{ url('images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
            </svg>
          </li>
          <li class="breadcrumb-item">/</li>
          <!-- <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>
          </li> -->
          <li class="breadcrumb-item active text-dark" aria-current="page">Shopping Cart</li>
        </ol>
      </nav>
    </div>
    <div class="page-header__title">
      <h4>Shopping Cart</h4>
    </div>
  </div>
</div>

<div class="cart block">

  <div class="container">
    @include('flash::message')
    <form id="cart_form" class="" action="{{url('customer/update-cart')}}" method="post">
     @csrf     
    <table class="cart__table cart-table">
      <thead class="cart-table__head">
        <tr class="cart-table__row">
          <th class="cart-table__column cart-table__column--image">Image</th>
          <th class="cart-table__column cart-table__column--product">Product</th>
          <th class="cart-table__column cart-table__column--price">Price</th>
          <th class="cart-table__column cart-table__column--quantity">Quantity</th>
          <th class="cart-table__column cart-table__column--total">Total</th>
          <th class="cart-table__column cart-table__column--remove"></th>
        </tr>
      </thead>
      <tbody class="cart-table__body">
        @php $i=1; @endphp
         <!-- Shipping LBW Calculation  -->
        @php $tot = 0; @endphp
        <!-- Shipping LBW Calculation  -->
        @if(!empty(Session::get('usercartId')))
          @foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product)
          @php
            $productData = Products::where('id', $product['id'])->first();
            $attribute = json_decode($product['attributes'][0], true);              
          @endphp
        <tr class="cart-table__row" id="cart_remove-{{$i}}">
          <td class="cart-table__column cart-table__column--image">
            <div class="product-image"><a href="{{ URL::to('/product', $product['id']) }}" class="product-image__body"><img class="product-image__img" src="{{$attribute['image']?$attribute['image']:asset('images/no-image.jpg')}}" width="200px" height="200px" alt=""></a></div>
          </td>
          <td class="cart-table__column cart-table__column--product"><a href="{{ URL::to('/product', $product['id']) }}" class="cart-table__product-name">{{$attribute['product_name']}}</a>
           
          </td>
          <td class="cart-table__column cart-table__column--price" data-title="Price">{{CurrencySymbol()}} {{number_format($product['price'], 2, '.', ',')}}</td>
          <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
            <div class="input-number">
              <input class="form-control input-number__input clrblack" id="qty-{{$i}}" type="number" min="1" max="{{$productData->total_stock}}" value="{{$product['quantity']}}">
              <div class="input-number__add" onclick="cart_price(this,{{$i}})"></div>
              <div class="input-number__sub" onclick="cart_price(this,{{$i}})"></div>
            </div>
          </td>
          <td class="cart-table__column cart-table__column--total" data-title="Total" id="total_text-{{$i}}">{{CurrencySymbol()}} {{number_format($product['price']*$product['quantity'], 2, '.', ',')}}</td>
          <td class="cart-table__column cart-table__column--remove">
            <a class="btn btn-ghost-danger" onclick="remove_cart_product({{$product['id']}}, {{$i}})"><i class="fa fa-trash"></i></a>
            
          </td>
        </tr>
        <input type="hidden" name="cart[{{$i}}][id]" value="{{$product['id']}}">
        <input type="hidden" name="cart[{{$i}}][product_id]" value="{{$product['id']}}">
        <input type="hidden" name="cart[{{$i}}][price]" value="{{$product['price']}}" id="price-{{$i}}">
        <input type="hidden" name="cart[{{$i}}][quantity]" value="{{$product['quantity']}}" id="quantity-{{$i}}">
        
        @method('POST')
        @php $i++; @endphp
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
    </table>
    <div class="cart__actions">
    <div class="cart__buttons ml-auto">
 <a href="{{url('/')}}" ><button class="btn btn-primary ">Continue Shopping</button></a>
<a onclick="$('#cart_form').submit()" class="ml-2">
          <button class="btn btn-primary">Update Cart</button></a>
    </div>
    </div>
  </form>
  @if(!empty(Session::get('usercartId'))) 
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
  @endphp
    <div class="row pt-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-body px-0">
            <h4 class="card-title">Cart Totals</h4>
             <table class="cart__table cart-table">
      <thead class="cart-table__head">
                <tr>
                  <th>Subtotal</th>
                  <td>{{CurrencySymbol()}} {{number_format($total, 2, '.', ',')}}</td>
                </tr>
              </thead>
              <tbody class="cart__totals-body">
                <tr>
                  <th>Shipping</th>
                  <td>{{CurrencySymbol()}}
                    @if($seasionalShipping != null)
                      {{number_format($seasionalShipping['price'], 2, '.', ',')}}
                    @php  $grandTotal = $total+$seasionalShipping['price']; @endphp
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

              </tbody>
              <tfoot class="cart__totals-footer">
                <tr>
                  <th><h5>Total</h5></th>
                  <td><h5>{{CurrencySymbol()}} {{number_format($grandTotal, 2, '.', ',')}}</h5></td>
                </tr>
              </tfoot>
            </table>
            <a class=" mt-3 cart__checkout-button btn_chk" href="{{url('customer/guest-checkout')}}">
                <button class="btn mt-3 btn-primary">Proceed to checkout</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection