@php
use App\Models\Category;
use Illuminate\Support\Facades\Route;

$arrCategoryLists = Category::with('children')->where('is_active','1')->get()->toArray();

//$route = Route::current();
//$name = Route::currentRouteName();
//$action = Route::currentRouteAction();
//dd(Route::current());
$arrExpoldeRoute = explode('@',Route::currentRouteAction());
$currentAction = end($arrExpoldeRoute);

use App\Models\AddToCart;
use App\Models\Wishlist;
if(!empty(Auth::guard('customer')->user())){
    $customerData = Auth::guard('customer')->user()->toArray();
}
@endphp
<header class="site__header d-lg-none">
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
        <div class="mobile-header__panel">
            <div class="container">
                <div class="mobile-header__body">
                    <button class="mobile-header__menu-button">
                        <i class="fa fa-list"></i>
                    </button>
                    <a class="mobile-header__logo" href="{{ URL::to('/') }}">
                        <img src="{{ asset('newimages/logo.png') }}" alt="" />
                    </a>
                    <div class="search search--location--mobile-header mobile-header__search">
                        <div class="search__body">
                            <form class="search__form" action="#">
                                <input class="search__input" name="search" placeholder="Search  products or Brands" aria-label="Site search" type="text" autocomplete="off" id="myInput_mobile" value="@if(app('request')->input('search')){{ app('request')->input('search') }}@endif">
                                <button class="search__button search__button--type--submit" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <button class="search__button search__button--type--close" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="search__border"></div>
                            </form>
                            <!-- <div class="search__suggestions suggestions suggestions--location--mobile-header"></div> -->
                        </div>
                    </div>
                    <div class="mobile-header__indicators">
                        <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                            <button class="indicator__button"><span class="indicator__area">
                                    <i class="fa fa-search makahajan_color"></i>
                                </span></button>
                        </div>
                        @if(!empty(Auth::guard('customer')->user()))
                            @php
                            $wishlist_product = Wishlist::where(['user_id' => $customerData['id']])->get()->toArray();
                            @endphp
                        <div class="indicator indicator--mobile d-sm-flex d-none">
                            <a href="{{ URL::to('customer/wishlists') }}" class="indicator__button"><span class="indicator__area">
                                    <i class="fa fa-heart"></i>
                                    <span class="indicator__value">{{count($wishlist_product)}}</span></span>
                            </a>
                        </div>
                        @endif
                            @if(!empty(Auth::guard('customer')->user()))
                            @php
                                $cart_product = AddToCart::where(['user_id' => $customerData['id']])->get()->toArray();
                                $total_price = AddToCart::where(['user_id' => $customerData['id']])->sum('total');
                                if($cart_product){
                                    $trigged_class = ' indicator--trigger--click';
                                }
                            @endphp
                            @else
                                @if(!empty(Session::get('usercartId')) && !empty(Cart::session(Session::get('usercartId'))->getContent()->toArray()))
                               @php $trigged_class = ' indicator--trigger--click'; @endphp
                                @endif
                            @endif
                        <div class="indicator indicator--mobile">
                            <a href="{{ URL::to('customer/addToCarts') }}" class="indicator__button">
                                <span class="indicator__area">
                                    <i class="fa fa-cart-plus makahajan_color"></i>
                                    @if(!empty(Auth::guard('customer')->user()))
                                        <span class="indicator__value">{{count($cart_product)}}</span>
                                    @else
                                        @if(!empty(Session::get('usercartId')))
                                            <span class="indicator__value">{{count(Cart::session(Session::get('usercartId'))->getContent())}}</span>
                                        @endif
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<header class="site__header d-lg-block d-none" id="myHeader1">
    <div class="site-header" style="background-color: #000;">

        <div class="site-header__middle container">
            <div class="site-header__logo"><a href="{{ URL::to('/') }}">
                    <img src="{{ asset('newimages/logo.png') }}" alt="cap" /> </a>
            </div>
            <div class="navbarb">
  <a href="#home">Home</a>
  <div class="dropdownb">
    <button class="dropbtnb"><a href="#">Caps</a></button>
    <div class="dropdown-contentb">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <div class="dropdownb">
    <button class="dropbtnb"><a href="#">Apparel</a></button>
    <div class="dropdown-contentb">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <div class="dropdownb">
    <button class="dropbtnb"><a href="#">Customizable Products</a></button>
    <div class="dropdown-contentb">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <div class="dropdownb">
    <button class="dropbtnb"><a href="#">New Collections</a></button>
    <div class="dropdown-contentb">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <div class="dropdownb">
    <button class="dropbtnb"><a href="#">Brands</a></button>
    <div class="dropdown-contentb">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <a href="#news">FAQ</a>
  <a href="#news">About</a>
  <a href="#news">Contact Us</a>
</div>
        </div>

    </div>
</header>

 <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    <!-- <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="index.blade.php" class="mobile-links__item-link">Home</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index.blade.php" class="mobile-links__item-link">Home
                                            1</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index-2.html" class="mobile-links__item-link">Home
                                            2</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index-3.html" class="mobile-links__item-link">Home 1
                                            Finder</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index-4.html" class="mobile-links__item-link">Home 2
                                            Finder</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="offcanvas-cart.html" class="mobile-links__item-link">Offcanvas Cart</a></div>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                @foreach($arrCategoryLists as $strKey => $strData)
                                    @if (empty($strData['parent_id']))
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{url('product_category', $strData['id'])}}" class="mobile-links__item-link">{{ $strData['name'] }}
                                                   </a>
                                        @if (!empty($strData['children']))
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    @if (!empty($strData['children']))
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                             @foreach($strData['children'] as $strChildKey => $strChildLists)
                                             @if($strChildLists['is_active'] == '1')
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="{{url('product_category', [$strData['id'], $strChildLists['id']])}}" class="mobile-links__item-link">{{$strChildLists['name'] }}</a>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                   <!--  <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="shop-list.html" class="mobile-links__item-link">Shop
                                            List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product-alt.html" class="mobile-links__item-link">Product Alt</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product-sidebar.html" class="mobile-links__item-link">Product Sidebar</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="cart.html" class="mobile-links__item-link">Cart</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="cart-empty.html" class="mobile-links__item-link">Cart
                                            Empty</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="checkout.html" class="mobile-links__item-link">Checkout</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="order-success.html" class="mobile-links__item-link">Order Success</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="wishlist.html" class="mobile-links__item-link">Wishlist</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="compare.html" class="mobile-links__item-link">Compare</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="track-order.html" class="mobile-links__item-link">Track
                                            Order</a></div>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Account</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                @if(empty(Auth::guard('customer')->user()))
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('/customer/login') }}" class="mobile-links__item-link">Login</a></div>
                                </li>
                                 @else
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-dashboard') }}" class="mobile-links__item-link">Dashboard</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-profile') }}" class="mobile-links__item-link">Edit Profile</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-orders') }}" class="mobile-links__item-link">Order History</a></div>
                                </li>
                               <!--  <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="account-order-details.html" class="mobile-links__item-link">Order Details</a></div>
                                </li> -->
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-addresses') }}" class="mobile-links__item-link">Address Book</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-edit-address') }}" class="mobile-links__item-link">Edit Address</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="{{ URL::to('customer/account-password') }}" class="mobile-links__item-link">Change Password</a></div>
                                </li>
                               @endif
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog
                                            Classic</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-grid.html" class="mobile-links__item-link">Blog
                                            Grid</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-list.html" class="mobile-links__item-link">Blog
                                            List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="post.html" class="mobile-links__item-link">Post
                                            Page</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="post-without-sidebar.html" class="mobile-links__item-link">Post Without Sidebar</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pages</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="about-us.html" class="mobile-links__item-link">About
                                            Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="contact-us.html" class="mobile-links__item-link">Contact Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us Alt</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="404.html" class="mobile-links__item-link">404</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And Conditions</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="faq.html" class="mobile-links__item-link">FAQ</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="components.html" class="mobile-links__item-link">Components</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="typography.html" class="mobile-links__item-link">Typography</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€ Euro</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£ Pound Sterling</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">KD US Dollar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽ Russian Ruble</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">English</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">German</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Russian</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Italian</a></div>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->
@section('script')
@endsection
