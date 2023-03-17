@extends('templates.default.app')

@section('content')
@php
use App\Models\AddToCart;
use App\Models\Wishlist;
if(!empty(Auth::guard('customer')->user())){
    $customerData = Auth::guard('customer')->user()->toArray();
}else{
    $customerData['id'] = 0;
}
@endphp
<div class="page-header">
      <div class="page-header__container container">
        <div class="page-header__breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="{{ url('images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                </svg>
              </li>
             <!--  <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                </svg>
              </li> -->
              <li class="breadcrumb-item active" aria-current="page">Wish List</li>
            </ol>
          </nav>
        </div>
        <div class="page-header__title">
          <h1>Wish List</h1>
        </div>
      </div>
    </div>
    <div class="block">
      <div class="container">
        <table class="wishlist">
          <thead class="wishlist__head">
            <tr class="wishlist__row">
              <th class="wishlist__column wishlist__column--image">Image</th>
              <th class="wishlist__column wishlist__column--product">Product</th>
              <th class="wishlist__column wishlist__column--stock">Stock Status</th>
              <th class="wishlist__column wishlist__column--price">Price</th>
              <th class="wishlist__column wishlist__column--tocart"></th>
              <th class="wishlist__column wishlist__column--remove"></th>
            </tr>
          </thead>
          <tbody class="wishlist__body">
            @foreach($wishlists as $wishlist)
            @php
               $cart_product = AddToCart::where(['product_id'=>$wishlist['product_id'], 'user_id' => $customerData['id']])->first();
            @endphp
            <tr class="wishlist__row">
              <td class="wishlist__column wishlist__column--image"><div class="product-image"><a href="{{ URL::to('/product', $wishlist['product_id']) }}" class="product-image__body"><img class="product-image__img" src="{{$wishlist['product']['image']?$wishlist['product']['image']:asset('images/no-image.jpg')}}" alt=""></a></div></td>
              <td class="wishlist__column wishlist__column--product"><a href="{{ URL::to('/product', $wishlist['product_id']) }}" class="wishlist__product-name">{{$wishlist['product']['prod_name']}}</a>
                <div class="wishlist__product-rating">
                  <div class="rating">
                    <div class="rating__body">
                      <svg class="rating__star rating__star--active" width="13px" height="12px">
                        <g class="rating__fill">
                          <use xlink:href="images/sprite.svg#star-normal"></use>
                        </g>
                        <g class="rating__stroke">
                          <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                        </g>
                      </svg>
                      <div class="rating__star rating__star--only-edge rating__star--active">
                        <div class="rating__fill">
                          <div class="fake-svg-icon"></div>
                        </div>
                        <div class="rating__stroke">
                          <div class="fake-svg-icon"></div>
                        </div>
                      </div>
                      <svg class="rating__star rating__star--active" width="13px" height="12px">
                        <g class="rating__fill">
                          <use xlink:href="images/sprite.svg#star-normal"></use>
                        </g>
                        <g class="rating__stroke">
                          <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                        </g>
                      </svg>
                      <div class="rating__star rating__star--only-edge rating__star--active">
                        <div class="rating__fill">
                          <div class="fake-svg-icon"></div>
                        </div>
                        <div class="rating__stroke">
                          <div class="fake-svg-icon"></div>
                        </div>
                      </div>
                      <svg class="rating__star rating__star--active" width="13px" height="12px">
                        <g class="rating__fill">
                          <use xlink:href="images/sprite.svg#star-normal"></use>
                        </g>
                        <g class="rating__stroke">
                          <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                        </g>
                      </svg>
                      <div class="rating__star rating__star--only-edge rating__star--active">
                        <div class="rating__fill">
                          <div class="fake-svg-icon"></div>
                        </div>
                        <div class="rating__stroke">
                          <div class="fake-svg-icon"></div>
                        </div>
                      </div>
                      <svg class="rating__star rating__star--active" width="13px" height="12px">
                        <g class="rating__fill">
                          <use xlink:href="images/sprite.svg#star-normal"></use>
                        </g>
                        <g class="rating__stroke">
                          <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                        </g>
                      </svg>
                      <div class="rating__star rating__star--only-edge rating__star--active">
                        <div class="rating__fill">
                          <div class="fake-svg-icon"></div>
                        </div>
                        <div class="rating__stroke">
                          <div class="fake-svg-icon"></div>
                        </div>
                      </div>
                      <svg class="rating__star" width="13px" height="12px">
                        <g class="rating__fill">
                          <use xlink:href="images/sprite.svg#star-normal"></use>
                        </g>
                        <g class="rating__stroke">
                          <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                        </g>
                      </svg>
                      <div class="rating__star rating__star--only-edge">
                        <div class="rating__fill">
                          <div class="fake-svg-icon"></div>
                        </div>
                        <div class="rating__stroke">
                          <div class="fake-svg-icon"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="wishlist__product-rating-legend">9 Reviews</div> -->
                </div></td>
              <td class="wishlist__column wishlist__column--stock">
                  @if($wishlist['product']['total_stock']>5)
                  <div class="badge badge-success">
                    In Stock
                  </div>
                  @elseif($wishlist['product']['total_stock']==0)
                  <div class="badge badge-danger">
                    Out of stock
                  </div>
                  @else
                  <div class="badge badge-warning">
                    Hurry up! Only {{$wishlist['product']['total_stock']}} item left.
                  </div>
                  @endif
              </td>
              <td class="wishlist__column wishlist__column--price">{{CurrencySymbol()}} {{$wishlist['product']['prod_price']}}</td>
              <td class="wishlist__column wishlist__column--tocart">
              @if($cart_product == null)
                <button type="button" class="btn btn-primary btn-sm" data-product_name="{{$wishlist['product']['prod_name']}}" data-product_price="{{$wishlist['product']['prod_price']}}" data-quantity="1" data-image="{{$wishlist['product']['image']}}" onclick="addtocart(this,{{$wishlist['product']['id']}})" @if($wishlist['product']['total_stock']==0) disabled  @endif>Add To Cart</button>
              @else
                <a class="btn btn-success btn-sm" href="{{ URL::to('customer/addToCarts') }}" @if($wishlist['product']['total_stock']==0) disabled  @endif>Go to cart</a>
              @endif
              </td>
              <td class="wishlist__column wishlist__column--remove">
                <button type="button" class="btn btn-light btn-sm btn-svg-icon" data-name="remove_wish-{{$wishlist['id']}}" onclick="removeToWishlist(this,{{$wishlist['id']}})" data-toggle="tooltip" title="Remove from wishlist"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

@endsection