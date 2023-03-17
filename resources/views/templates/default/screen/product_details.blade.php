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
<style>
    .panelreplace{
        
    }
    .scheme_original .body_wrap {
    color: #808080;
}
</style>
<!-- new Code start -->
<div class="single-product woocommerce woocommerce-page body_transparent article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide bg_image shop-d-page">
    <!-- Breadcrumbs -->
    <div class="top_panel_title top_panel_style_1  title_present navi_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{url('/')}}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="#">{{ $productDetails->brandData->brand_name }}</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $productDetails->prod_slug ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumbs -->
    <!-- Page Content -->
    @if(!empty($productDetails))
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single post_item_product">
                    <div class="product">
                        <!-- Product Image -->
                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                            <figure class="woocommerce-product-gallery__wrapper">
                                <div data-thumb="{{count($productDetails->images)>0?asset($productDetails->images[0]->image):asset('images/no-image.jpg')}}" class="woocommerce-product-gallery__image">
                                    @if(count($productDetails->images)==0)
                                    <div class="product-image product-image--location--gallery">
                                        <a href="{{count($productDetails->images)>0?asset($productDetails->images[0]->image):asset('images/no-image.jpg')}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                            <img class="product-image__img" src="{{count($productDetails->images)>0?asset($productDetails->images[0]->image):asset('images/no-image.jpg')}}" alt=""></a>
                                    </div>
                                    @else
                                    @foreach($productDetails->images as $productImageLists)
                                    <div class="product-image product-image--location--gallery">
                                        <a href="{{ asset($productImageLists->image) }}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                            <img class="product-image__img" src="{{ asset($productImageLists->image) }}" alt="">
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </figure>
                        </div>
                        <!-- /Product Image -->
                        <!-- Product Summary -->
                        <div class="summary entry-summary">
                            <h1 class="product_title">{{ $productDetails->prod_name ?? '-' }}</h1>
                            <p class="price" >
                                 @if($productDetails['prod_price']==$productDetails['mrp_price'])
                                    
                                        <span>{{CurrencySymbol()}} {{$productDetails['prod_price']}}</span>
                                    
                                    @else
                                <span class="woocommerce-Price-amount amount">
                                    <span>{{CurrencySymbol()}}{{$productDetails['prod_price']}}</span>
                                    &nbsp;
                                    <strike>{{CurrencySymbol()}}{{$productDetails['mrp_price']}}</strike>
                                    &nbsp;
                                    @endif
                                    <span>
                                        @php
                                        $sale = $productDetails['prod_price']*100;
                                        $regular_price = $sale / $productDetails['mrp_price'];

                                        @endphp

                                    </span>
                            </p>
                            <div class="woocommerce-product-details__short-description text-dark">
                                {!! $productDetails->prod_specification ?? '-' !!}
                            </div>
                            @php
                            $cart_product = AddToCart::where(['product_id'=>$productDetails->id, 'user_id' => $customerData['id']])->first();

                            $wishlist_product = Wishlist::where(['product_id'=>$productDetails->id, 'user_id' => $customerData['id']])->first();
                            @endphp
                            @if($cart_product == null)
                            @php $label = 'Add to cart'; @endphp
                            <form class="product__options" action="{{route('addToCarts.store')}}" method="post">
                                @else
                                @php $label = 'Update to cart'; @endphp
                                <form class="product__options" action="{{route('addToCarts.update',$cart_product['id'])}}" method="post">
                                    @method('PUT')
                                    @endif
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$productDetails->id}}">
                                    <input type="hidden" name="product_name" value="{{$productDetails->prod_name}}">
                                    <input type="hidden" name="product_price" value="{{$productDetails->prod_price}}">
                                    <input type="hidden" name="image" value="{{count($productDetails->images)>0?asset($productDetails->images[0]->image):null}}">
                                    <div class="form-group product__option">
                                    <ul class="product__meta">
                  <li class="product__meta-availability">Availability:
                     @if($productDetails->total_stock>2)
                     <span class="text-success">
                     In Stock
                     </span>
                     @elseif($productDetails->total_stock==0)
                     <span class="text-danger">
                     Out of stock
                     </span>
                     @else
                     <span class="text-warning">
                     Hurry up! Only {{$productDetails->total_stock}} item left.
                     </span>
                     @endif
                 
                    
                  </li>
                  <!-- <li>Brand: <a href="#"></a></li> -->
               </ul>
                                        <label class="product__option-label text-danger" for="product-quantity">Quantity</label>
                                        <div class="product__actions">
                                            <div class="product__actions-item">
                                                <div class="input-number product__quantity">
                                                    <input name="quantity" id="product-quantity" class="input-number__input my-2" type="number" min="1" value="{{$cart_product == null?'1':$cart_product['quantity']}}" max="{{$productDetails->total_stock}}">
                                                    <div class="input-number__add"></div>
                                                    <div class="input-number__sub"></div>
                                                </div>
                                            </div>
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <button type="submit" class="btn btn-primary btn-lg" data-product_name="" data-product_price="" data-quantity="1" data-image="" @if($productDetails->total_stock==0) disabled @endif>{{$label}}</button>
                                            </div>


                                        </div>
                                    </div>
                                </form>

                                <div class="product_meta">

                                </div>
                        </div>
                        <!-- /Product Summary -->
                        <!-- Tabs -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs" role="tablist">
                                <li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                                    <a href="#tab-description">Description</a>
                                </li>
                               <!-- <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                    <a href="#tab-reviews">Reviews (0)</a>
                                </li>-->
                            </ul>
                            <!-- Tab: Description -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panelreplace wc-tab" id="tab-description">
                             <p> {!! $productDetails->prod_details !!}</p>
                            </div>
                            <!-- /Tab: Description -->
                            <!-- Tab: Reviews -->
                           <!-- <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panelreplace wc-tab" id="tab-reviews">
                                <div id="reviews" class="woocommerce-Reviews">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">Reviews</h2>
                                        <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                    </div>
                                   <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <span id="reply-title" class="comment-reply-title">Be the first to review &ldquo;Glock Double 9mm 3.4&#8243; 6+1 FS Integral&rdquo; </span>
                                               <div class="social-login-widget">
                                                    <div class="social-login-connect-with">Connect with:</div>
                                                    <div class="social-login-provider-list">
                                                        <a href="#" title="Connect with Facebook">
                                                            <img alt="Facebook" title="Connect with Facebook" src="images/facebook.png" />
                                                        </a>
                                                        <a href="#" title="Connect with Google">
                                                            <img alt="Google" title="Connect with Google" src="images/google.png" />
                                                        </a>
                                                        <a href="#" title="Connect with Twitter">
                                                            <img alt="Twitter" title="Connect with Twitter" src="images/twitter.png" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="comment-notes">
                                                    <span id="email-notes">Your email address will not be published.</span>
                                                    Required fields are marked <span class="required">*</span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <label for="rating">Your rating</label>
                                                    <select name="rating" id="rating" required>
                                                        <option value="">Rate&hellip;</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very poor</option>
                                                    </select>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Your review
                                                        <span class="required">*</span>
                                                    </label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                </p>
                                                <p class="comment-form-author">
                                                    <label for="author">Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input id="author" name="author" type="text" value="" size="30" aria-required="true" required />
                                                </p>
                                                <p class="comment-form-email">
                                                    <label for="email">Email
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input id="email" name="email" type="email" value="" size="30" aria-required="true" required />
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                            </div>-->
                            <!-- /Tab: Reviews -->
                        </div>
                        <!-- /Tabs -->
                        <!-- Related Products -->

                        <section class="related products">
                            <h2>Related products</h2>
                            @if(count($related_product)>0)
                            <ul class="products">
                                <!-- Product Item -->
                                @foreach($related_product as $featureProduct)
                                <li class="product column-1_4 ">
                                    <div class="post_item_wrap">
                                        <div class="post_featured">
                                            <div class="post_thumb">
                                                <a href="{{ URL::to('/product', $featureProduct['id']) }}">
                                                    <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post_content">
                                            <h2 class="woocommerce-loop-product__title">
                                                <a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a>
                                            </h2>
                                            <div class="star-rating" title="Rated 4.00 out of 5">



                                                </span>
                                            </div>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <!--<span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}</span>-->
                                                    <!--&nbsp;-->
                                                    <!--&nbsp;-->
                                                    <!--<strike>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}</strike>-->
                                                    <!--&nbsp;-->
                                                    <!--&nbsp;-->
                                                    <!--<span>-->
                                                    <!--</span>-->
                                                    @if($featureProduct['prod_price']==$featureProduct['mrp_price'])
                                                    <span>{{CurrencySymbol()}} {{$featureProduct['prod_price']}}</span> 
                                                    @else
                                                    <span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}</span>
                                                    &nbsp;<strike>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}</strike>
                                                    &nbsp;<span>
                                                        @endif
                                                </span>
                                                @php
                                                $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();

                                                $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
                                                @endphp

                                                @if($cart_product == null)
                                                <!--<button class=" button add_to_cart_button btn btn-primary product-card__addtocart" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>-->
                                                @else
                                                <a class=" button add_to_cart_button  product-card__addtocart" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                                                @endif
                                                @if($cart_product == null)
                                                <button class="button add_to_cart_button  product-card__addtocart product-card__addtocart--list" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
                                                @else
                                                <a class=" button add_to_cart_button btn btn-primary product-card__addtocart product-card__addtocart--list" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                                                @endif


                                        </div>
                                    </div>
                                </li>
                                @endforeach

                                <!-- Product Item -->

                                <!-- /Product Item -->
                            </ul>
                            @endif
                        </section>

                        <!-- /Related Products -->
                    </div>
                </article>
            </div>
            <!-- /Content -->
        </div>
    </div>

    @else
    <div class="block">
        <div class="container">
            <h1 class="text-dark">No Product Found</h1>
        </div>
    </div>
    @endif
    <!-- /Page Content -->
</div>
<!-- new Code End -->
<script src="https://kingler-html.themerex.net/js/jquery/jquery-migrate.min.js"></script>
<script src="https://kingler-html.themerex.net/js/_main.js"></script>
<script src="https://kingler-html.themerex.net/js/trx_utils.min.js"></script>
<script src="https://kingler-html.themerex.net/js/_packed.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/photostack/modernizr.min.js"></script>
<script src="https://kingler-html.themerex.net/js/utils.js"></script>
<script src="https://kingler-html.themerex.net/js/core.init.js"></script>
<script src="https://kingler-html.themerex.net/js/init.js"></script>
<script src="https://kingler-html.themerex.net/js/shortcodes.js"></script>
<script src="https://kingler-html.themerex.net/js/jquery/jquery.js"></script>
<script src="https://kingler-html.themerex.net/js/messages.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/magnific/jquery.magnific-popup.min.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/woocommerce/js/zoom/jquery.zoom.min.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/woocommerce/js/tpl-woocommerce.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/flexslider/jquery.flexslider.min.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/photoswipe/js/photoswipe.min.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/photoswipe/js/photoswipe-ui-default.min.js"></script>
<script src="https://kingler-html.themerex.net/js/vendor/woocommerce/js/single-product.min.js"></script>

@endsection