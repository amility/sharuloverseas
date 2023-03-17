@php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
$arrCategoryLists = Category::with('children')->whereNotIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->get()->toArray();
$arrCategoryLists1 = Category::with('children')->whereIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
//$arrCategoryLists = Category::with('children')->where('parent_id', '=', null)->where('deleted_at', '=', null)->take(3)->get()->toArray();
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

<!-- Header -->
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
<style>
.clrchng a:hover{
     color: #fea526!important;
}
</style>
<header class="top_panel_wrap top_panel_style_1 scheme_original">
    <div class="top_panel_wrap_inner top_panel_inner_style_1 top_panel_position_above">
        <!-- Top panel 1 -->
        <div class="top_panel_middle d-none d-lg-block">
            <div class="content_wrap">
                <div class="columns_wrap columns_fluid">
                    <!-- Logo -->
                    <div class="column-2_1 contact_logo">
                        <div class="logo">
                            <a href="{{ URL::to('/') }}">
                                <img src="{{url('images/logo_header.png')}}" class="logo_main" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /Logo -->

                    <!-- Contact Adress -->
                     <!-- Cart -->
                    <div class="column-1_7 contact_field contact_cart text-center">
                        <a href="{{url('/customer/addToCarts')}}" >
                           @if(!empty(Auth::guard('customer')->user()))    
                        <span class="cart_item">{{count($cart_product)}}</span>
                        @else

@if(!empty(Session::get('usercartId')))
<span class="cart_item">{{count(Cart::session(Session::get('usercartId'))->getContent())}}</span>
@endif

@endif
                            <span class="">
                                <i class="fa fa-shopping-cart "></i>
                            </span>
                            <span class="contact_label">Your cart</span>
                           <!-- <span class="contact_cart_totals">
                                <span class="cart_items">2 Items</span> - <span class="cart_summa">&#36;941.00</span>
                            </span>-->
                        </a>

                    </div>
                    <!-- /Cart -->
 <!-- User Profile -->
                    <div class="column-1_8 contact_field contact_phone text-center">
                     
                        @if(empty(Auth::guard('customer')->user()))
                        <a href="{{ URL::to('/customer/login') }}" class="">
                            <span class="">
                                <!--<i class="fa fa-user"></i>-->
                            </span>
                                                   <span class="contact_label">
                                                       <a class="abhi" style="font-weight:600;" href="{{url('/customer/login')}}">Login</a></span>

                            </a>
                        @endif
 @if(!empty(Auth::guard('customer')->user()))
 <a href="{{ URL::to('/customer') }}" class="">
    <span class="indicator__area">
        <!--<i class="fa fa-user" style="color:#00ff19;"></i>-->
    </span>
                            <span class="contact_label"><a class="abhi" href="{{url('/customer/login')}}">My Account</a></span>

    </a>@endif
       
                    </div>  
                    <!-- Contact Phone -->
                    <div class="column-1_8 contact_field contact_phone text-center">
                        <span class="">
                           <!--<i class="fa fa-phone "></i>-->
                        </span>
                        <span class="contact_label"> <a class="clrchng" href="tel:469-919-4867">469-919-4867</a></span>
                        <span class="contact_email"><a class="clrchng" href="mailto:jdrisher@aol.com" style="color:#b3b0b0;">jdrisher@aol.com</a></span>
                    </div>
                    <!-- /Contact Phone -->
                   
                    <!-- /User Profile -->
                    <div class="column-1_7 contact_field">
                         
                        <span class="contact_label mt-0"><a href="https://g.page/r/CbOr-cw8NOCVEAI/review"><img src="{{url('newimages/google-review.png')}}" width="100px" style="margin-top:-5px"></a></span>
                        <span class="contact_email mt-0"><a href="https://g.page/r/CbOr-cw8NOCVEAI/review" style="color:#b3b0b0;">Google Review</a></span>
                        
                    </div>
                    <!-- /Contact Adress -->
                  
                   
                </div>
            </div>
        </div>
        <!-- /Top panel 1 -->
        <!-- Top panel 2 -->
        <div class="top_panel_bottom">
            <div class="content_wrap clearfix">
                <!-- Menu -->
                <nav class="menu_main_nav_area">
                    <ul class="menu_main_nav">
                        <!-- Home -->
                        <li class="menu-item ">
                            <a href="{{url('/')}}">Home</a>

                        </li>
                         <li class="menu-item ">
                            <a href="/product_category/59?category=RIFLES">FIREARMS</a>
                             
                            <ul  class='children' >
                            @foreach($arrCategoryLists as $strKey => $strData)
                        @if (empty($strData['parent_id']))
                        <li class="position-relative">
                            <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{{$strData['name']}}</a>
                            @if(!empty($strData['children']))
                            <ul class='children'>
                                @foreach($strData['children'] as $strChildKey => $strChildLists)
                                @if($strChildLists['is_active'] == '1')
                                <li class="menu-item">
                                    <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}">{{$strChildLists['name'] }}</a>
                                </li>
                                
                                @endif
                                @endforeach

                            </ul>
                             <div class="icon_arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                     </div>
                            @endif
                        </li>
                        @endif
                        @endforeach
</ul>
                        </li>
                   @foreach($arrCategoryLists1 as $strKey => $strData)
            @if (empty($strData['parent_id']))
                    <li class="position-relative">
                    <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{{$strData['name']}}</a>
                    @if(!empty($strData['children']))
                       <ul class='children'>
                       @foreach($strData['children'] as $strChildKey => $strChildLists)
                  @if($strChildLists['is_active'] == '1')
                         <li>
                         <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{{$strChildLists['name'] }}</a>
                        </li>
                        @endif
                  @endforeach
                     </ul>
                    
                    
                      @endif
                  </li>
                  @endif
            @endforeach
                 
                        <!-- /Home -->
                        <!-- /Promotion -->
                        <li class="menu-item">
                            <a href="{{url('about-us')}}">About us</a>
                        </li>
                        <!-- Pages -->
                       
                        <!-- Search -->
                        <!-- /Pages -->
                        <!-- Products -->
                        <li class="menu-item">
                            <a href="{{url('gun-shows')}}">Gun Shows</a>
                        </li>
                     <!-- Products -->
                       <!-- <li class="menu-item">
                            <a href="{{url('accessories')}}">Accessories</a>
                        </li>-->
                        <!-- Products -->
                      <!--  <li class="menu-item">
                            <a href="{{url('non-ffl')}}">NON FFL</a>
                        </li>-->
                        <!-- Contact Us -->
                        <li class="menu-item">
                            <a href="{{url('contact-us')}}">Contact us</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- /Top panel 2 -->
    </div>
</header>
<!-- /Header -->

<!-- Header Mobile -->
<div class="header_mobile">
    <div class="content_wrap">
        <div class="menu_button icon-menu">
            <i class="fa-solid fa-bars"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="{{ URL::to('/') }}">
                <img src="{{url('images/logo_header.png')}}" class="logo_main" alt="">
            </a>
        </div>
        <!-- /Logo -->
             <div class="menu_main_cart top_panel_icon">
                     
                        @if(empty(Auth::guard('customer')->user()))
                        <a href="{{ URL::to('/customer/login') }}" class="">
                            <span class=""><i class="fa fa-user"></i></span>
                                                   <span class="contact_label"><a class="abhi" style="font-weight:600;" href="{{url('/customer/login')}}">Login</a></span>

                            </a>
                        @endif
 @if(!empty(Auth::guard('customer')->user()))
 <a href="{{ URL::to('/customer') }}" class="">
    <span class="indicator__area"><i class="fa fa-user" style="color:#00ff19;"></i></span>
                            <span class="contact_label"><a class="abhi" href="{{url('/customer/login')}}">My Account</a></span>

    </a>@endif
       
                    </div> 
        <!-- Cart -->
        <div class="menu_main_cart top_panel_icon">
          <a href="{{url('/customer/addToCarts')}}" >
                           @if(!empty(Auth::guard('customer')->user()))    
                        <span class="cart_item">{{count($cart_product)}}</span>
                        @else

@if(!empty(Session::get('usercartId')))
<span class="cart_item">{{count(Cart::session(Session::get('usercartId'))->getContent())}}</span>
@endif

@endif
                            <span class="">
                                <i class="fa fa-shopping-cart "></i>
                            </span>
          
          
        </div>
        <!-- /Cart -->
    </div>
    <!-- Side wrap -->
    <div class="side_wrap">
        <div class="close">Close</div>
        <!-- Top panel -->
        <div class="panel_top">
            <!-- Menu -->
            <nav class="menu_main_nav_area">
                <ul class="menu_main_nav">
                    <!-- Home -->
                    <li class="menu-item">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <!-- /Home -->
            <li class=" menu-item menu-item-has-children">
                            <a href="/product_category/59?category=RIFLES"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>FIREARMS</a>
                             <div class="icon_arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                     </div>
                            <ul  class='children sub-menu' >
                            @foreach($arrCategoryLists as $strKey => $strData)
                        @if (empty($strData['parent_id']))
                        <li class="position-relative menu-item menu-item-has-children">
                            <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{{$strData['name']}}</a>
                            @if(!empty($strData['children']))
                            <ul class='children'>
                                @foreach($strData['children'] as $strChildKey => $strChildLists)
                                @if($strChildLists['is_active'] == '1')
                                <li class="menu-item">
                                    <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}">{{$strChildLists['name'] }}</a>
                                </li>
                                
                                @endif
                                @endforeach

                            </ul>
                             <div class="icon_arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                     </div>
                            @endif
                        </li>
                        @endif
                        @endforeach
</ul>
                        </li>
                   @foreach($arrCategoryLists1 as $strKey => $strData)
            @if (empty($strData['parent_id']))
                    <li class="position-relative menu-item-has-children">
                    <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}"><span class="open_child_menu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>{{$strData['name']}}</a>
                    @if(!empty($strData['children']))
                       <ul class='children'>
                       @foreach($strData['children'] as $strChildKey => $strChildLists)
                  @if($strChildLists['is_active'] == '1')
                         <li>
                         <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}">{{$strChildLists['name'] }}</a>
                        </li>
                       
                        @endif
                  @endforeach
                  
                     </ul>
                      <div class="icon_arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                     </div>
                    
                      @endif
                  </li>
                  
                  @endif
            @endforeach
                    <!--<li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                            <a href="{{url('/')}}">Firearms</a>
                           
                             
                            <ul class="sub-menu" >
                            @foreach($arrCategoryLists as $strKey => $strData)
                        @if (empty($strData['parent_id']))
                        <li class="menu-item menu-item-has-children">
                            <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}">{{$strData['name']}}</a>
                            @if(!empty($strData['children']))
                            <ul class="sub-menu">
                                @foreach($strData['children'] as $strChildKey => $strChildLists)
                                @if($strChildLists['is_active'] == '1')
                                <li class="menu-item">
                                    <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}">{{$strChildLists['name'] }}</a>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                            @endif
                        </li>
                        @endif
                        @endforeach
                 </ul>
                        </li>
                        
                         @foreach($arrCategoryLists1 as $strKey => $strData)
                        @if (empty($strData['parent_id']))
                        <li class="menu-item menu-item-has-children">
                            <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}">{{$strData['name']}}</a>
                            @if(!empty($strData['children']))
                            <ul class="sub-menu">
                                @foreach($strData['children'] as $strChildKey => $strChildLists)
                                @if($strChildLists['is_active'] == '1')
                                <li class="menu-item">
                                    <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}">{{$strChildLists['name'] }}</a>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                            @endif
                        </li>
                        @endif
                        @endforeach-->

                        
                    <li class="menu-item">
                        <a href="{{url('about-us')}}">About us</a>
                    </li>

                    <li class="menu-item">
                    <a href="{{url('gun-shows')}}">Gun Shows</a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="{{url('contact-us')}}">Contact us</a>
                    </li>
                    <!-- /Contact Us -->
                </ul>
            </nav>
            <!-- /Menu -->
            <!-- Search -->
            <!--<div class="search_wrap search_style_regular search_state_fixed">-->
            <!--  <div class="search_form_wrap">-->
            <!--    <form role="search" method="get" class="search_form" action="#">-->
            <!--      <button type="submit" class="search_submit icon-iconmonstr-magnifier-2-icon" title="Start search"></button>-->
            <!--      <input type="text" class="search_field" placeholder="Search" value="" name="s" />-->
            <!--    </form>-->
            <!--  </div>-->
            <!--  <div class="search_results widget_area scheme_original">-->
            <!--    <a class="search_results_close icon-cancel"></a>-->
            <!--    <div class="search_results_content"></div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- /Search -->
            <!-- Login -->
            <!--<div class="login">-->
            <!--  <a href="#popup_login" class="popup_link popup_login_link icon-user" title="">Login</a>-->
            <!--  <div id="popup_login" class="popup_wrap popup_login bg_tint_light">-->
            <!--    <a href="#" class="popup_close"></a>-->
            <!--    <div class="form_wrap">-->
            <!--      <div class="form_left">-->
            <!--        <form action="#" method="post" name="login_form" class="popup_form login_form">-->
            <!--          <div class="popup_form_field login_field iconed_field icon-user">-->
            <!--            <input type="text" id="log" name="log" value="" placeholder="Login or Email">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field password_field iconed_field icon-lock">-->
            <!--            <input type="password" id="password" name="pwd" value="" placeholder="Password">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field remember_field">-->
            <!--            <a href="#" class="forgot_password">Forgot password?</a>-->
            <!--            <input type="checkbox" value="forever" id="rememberme" name="rememberme">-->
            <!--            <label for="rememberme">Remember me</label>-->
            <!--          </div>-->
            <!--          <div class="popup_form_field submit_field">-->
            <!--            <input type="submit" class="submit_button" value="Login">-->
            <!--          </div>-->
            <!--        </form>-->
            <!--      </div>-->
            <!--      <div class="form_right">-->
            <!--        <div class="login_socials_title">You can login using your social profile</div>-->
            <!--        <div class="login_socials_list">-->
            <!--          <div class="social-login-widget">-->
            <!--            <div class="social-login-connect-with">Connect with:</div>-->
            <!--            <div class="social-login-provider-list">-->
            <!--              <a href="#" title="Connect with Facebook">-->
            <!--                <img alt="Facebook" title="Connect with Facebook" src="images/facebook.png" />-->
            <!--              </a>-->
            <!--              <a href="#" title="Connect with Google">-->
            <!--                <img alt="Google" title="Connect with Google" src="images/google.png" />-->
            <!--              </a>-->
            <!--              <a href="#" title="Connect with Twitter">-->
            <!--                <img alt="Twitter" title="Connect with Twitter" src="images/twitter.png" />-->
            <!--              </a>-->
            <!--            </div>-->
            <!--            <div class="social-login-widget-clearing"></div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- /Login -->
            <!-- Register -->
            <!--<div class="login">-->
            <!--  <a href="#popup_registration" class="popup_link popup_register_link icon-pencil" title="">Register</a>-->
            <!--  <div id="popup_registration" class="popup_wrap popup_registration bg_tint_light">-->
            <!--    <a href="#" class="popup_close"></a>-->
            <!--    <div class="form_wrap">-->
            <!--      <form name="registration_form" method="post" class="popup_form registration_form">-->
            <!--        <div class="form_left">-->
            <!--          <div class="popup_form_field login_field iconed_field icon-user">-->
            <!--            <input type="text" id="registration_username" name="registration_username" value="" placeholder="User name (login)">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field email_field iconed_field icon-mail">-->
            <!--            <input type="text" id="registration_email" name="registration_email" value="" placeholder="E-mail">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field agree_field">-->
            <!--            <input type="checkbox" value="agree" id="registration_agree" name="registration_agree">-->
            <!--            <label for="registration_agree">I agree with</label>-->
            <!--            <a href="#">Terms &amp; Conditions</a>-->
            <!--          </div>-->
            <!--          <div class="popup_form_field submit_field">-->
            <!--            <input type="submit" class="submit_button" value="Sign Up">-->
            <!--          </div>-->
            <!--        </div>-->
            <!--        <div class="form_right">-->
            <!--          <div class="popup_form_field password_field iconed_field icon-lock">-->
            <!--            <input type="password" id="registration_pwd" name="registration_pwd" value="" placeholder="Password">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field password_field iconed_field icon-lock">-->
            <!--            <input type="password" id="registration_pwd2" name="registration_pwd2" value="" placeholder="Confirm Password">-->
            <!--          </div>-->
            <!--          <div class="popup_form_field description_field">Minimum 4 characters</div>-->
            <!--        </div>-->
            <!--      </form>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- /Register -->
        </div>
        <!-- /Top panel -->
        <!-- Middle panel -->
        <!--<div class="panel_middle">-->
        <!--  <div class="contact_field contact_address">-->
        <!--    <span class="contact_icon icon-home"></span>-->
        <!--    <span class="contact_label contact_address_1">Chicago, IL 60606</span>-->
        <!--    <span class="contact_address_2">123, New Lenox</span>-->
        <!--  </div>-->
        <!--  <div class="contact_field contact_phone">-->
        <!--    <span class="contact_icon icon-phone"></span>-->
        <!--    <span class="contact_label contact_phone">23-456-789</span>-->
        <!--    <span class="contact_email">admin@mail.com</span>-->
        <!--  </div>-->
        <!--  <div class="top_panel_top_open_hours icon-clock">-->
        <!--    <span>Open hours: </span>Mon - Sat 8.00 - 18.00-->
        <!--  </div>-->
        <!--</div>-->
        <!-- /Middle panel -->
        <!-- Bottom panel -->
        <!--<div class="panel_bottom">-->
        <!--  <div class="contact_socials">-->
        <!--    <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">-->
        <!--      <div class="sc_socials_item">-->
        <!--        <a href="#" target="_blank" class="social_icons social_facebook">-->
        <!--          <span class="icon-facebook"></span>-->
        <!--        </a>-->
        <!--      </div>-->
        <!--      <div class="sc_socials_item">-->
        <!--        <a href="#" target="_blank" class="social_icons social_gplus">-->
        <!--          <span class="icon-gplus"></span>-->
        <!--        </a>-->
        <!--      </div>-->
        <!--      <div class="sc_socials_item">-->
        <!--        <a href="#" target="_blank" class="social_icons social_twitter">-->
        <!--          <span class="icon-twitter"></span>-->
        <!--        </a>-->
        <!--      </div>-->
        <!--      <div class="sc_socials_item">-->
        <!--        <a href="#" target="_blank" class="social_icons social_linkedin">-->
        <!--          <span class="icon-linkedin"></span>-->
        <!--        </a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!-- /Bottom panel -->
    </div>
    <!-- /Side wrap -->
    <div class="mask"></div>
</div>
<!-- /Header Mobile -->
@section('script')
@endsection