
@php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
$arrCategoryLists = Category::with('children')->whereIN('name', ['Rifles','Shot guns','hand guns','other'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
$arrCategoryLists1 = Category::with('children')->whereIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
//$arrCategoryLists = Category::with('children')->where('parent_id', '=', null)->where('deleted_at', '=', null)->get()->toArray();
$arrCategoryListsp = Category::with('children')->where('parent_id', '=', null)->where('deleted_at', '=', null)->take(3)->get()->toArray();

$arrExpoldeRoute = explode('@',Route::currentRouteAction());
$currentAction = end($arrExpoldeRoute);


@endphp
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

    <body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">
        <div id="page_preloader"></div>
        <!-- Body wrap -->
        <div class="body_wrap">
            <!-- Page wrap -->
            <div class="page_wrap">
                <!-- Header -->
                <header class="top_panel_wrap top_panel_style_1 scheme_original">
                    
                </header>
                <!-- /Header -->
                <!-- Header Mobile -->
                
                <!-- /Header Mobile -->
                <!-- Page Content -->
                <div class="page_content_wrap page_paddings_no">
                    <!-- Content -->
                    <div class="content">
                        <article class="post_item post_item_single">
                            <section class="post_content">
                                <!-- Product Categories / Revolution Slider -->
                                <div class="bg_dark_style_1 hp1_custom_section_1">
                                    <div class="content_wrap">
                                        <div class="empty_space height_4_3em"></div>
                                        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4">
                                            <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
                                                <div class="widget_area">
                                                    <aside class="widget woocommerce widget_product_categories">
                                                        <h5 class="widget_title">Categories</h5>
                                                        <ul class="product-categories">
                                                            <li>
                                                                <a href="shop.html">Ammunition</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Firearms</a>
                                                                <ul  class='children' >
                            @foreach($arrCategoryLists as $strKey => $strData)
                        @if (empty($strData['parent_id']))
                        <li class="position-relative">
                            <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}">{{$strData['name']}}</a>
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
                                                           
                                                           <!-- <li class="cat-item">
                                                                <a href="shop.html">Handguns</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Knives</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Recent Products</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Rifles</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Shotguns</a>
                                                            </li>-->
                                                         @foreach($arrCategoryLists1 as $strKey => $strData)
            @if (empty($strData['parent_id']))
                    <li class="position-relative">
                    <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}">{{$strData['name']}}</a>
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
                 
              </ul>
           </aside>
                                                </div>
                                            </div><div class="column-3_4 sc_column_item sc_column_item_2span_3">
                                                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slider_wrap" data-source="gallery">
                                                    <!-- START REVOLUTION SLIDER -->
                                                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" data-version="5.4.3">
                                                        <ul>
                                                            <!-- SLIDE 1 -->
                                                            <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- MAIN IMAGE -->
                                                                <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='#000000' alt="" title="Home 1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                <!-- LAYERS -->
                                                                <!-- LAYER NR. 1 -->
                                                                <div class="tp-caption tp-resizeme" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                                    <img src="images/1-1.jpg" alt="" data-ww="870px" data-hh="407px" width="870" height="407" data-no-retina>
                                                                </div>
                                                                <!-- LAYER NR. 2 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="-205" data-y="70" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1000,"to":"o:1;","delay":600,"split":"chars","splitdelay":0.1,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">BERETTA </div>
                                                                <!-- LAYER NR. 3 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-1-layer-3" data-x="center" data-hoffset="-205" data-y="145" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','on','off']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:-50px;opacity:0;","speed":700,"to":"o:1;","delay":1300,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">MODEL 92FS INOX </div>
                                                                <!-- LAYER NR. 4 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-1-layer-4" data-x="center" data-hoffset="-205" data-y="190" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":700,"to":"o:1;","delay":1700,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">$370.00 </div>
                                                                <!-- LAYER NR. 5 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-1-layer-5" data-x="center" data-hoffset="-205" data-y="260" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','off','off']" data-type="text" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"shop.html","delay":""}]' data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":700,"to":"o:1;","delay":"2100","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgba(255,255,255,1);bw:2px 2px 2px 2px;color:#000;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[28,28,28,28]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[28,28,28,28]">shop now </div>
                                                            </li>
                                                            <!-- SLIDE 2 -->
                                                            <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- MAIN IMAGE -->
                                                                <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='#000000' alt="" title="Home 1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                <!-- LAYERS -->
                                                                <!-- LAYER NR. 6 -->
                                                                <div class="tp-caption tp-resizeme" id="slide-3-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"><img src="images/2-1.jpg" alt="" data-ww="870px" data-hh="407px" width="870" height="407" data-no-retina> </div>
                                                                <!-- LAYER NR. 7 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-3-layer-2" data-x="center" data-hoffset="190" data-y="70" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1000,"to":"o:1;","delay":600,"split":"chars","splitdelay":0.1,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">Steiner </div>
                                                                <!-- LAYER NR. 8 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-3-layer-3" data-x="center" data-hoffset="190" data-y="145" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','on','off']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:-50px;opacity:0;","speed":700,"to":"o:1;","delay":1300,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">AZ830 Binocular </div>
                                                                <!-- LAYER NR. 9 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-3-layer-4" data-x="center" data-hoffset="190" data-y="190" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":700,"to":"o:1;","delay":1700,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">$180.00 </div>
                                                                <!-- LAYER NR. 10 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-3-layer-5" data-x="center" data-hoffset="190" data-y="260" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','off','off']" data-type="text" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"shop.html","delay":""}]' data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":700,"to":"o:1;","delay":2100,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgba(255,255,255,1);bw:2px 2px 2px 2px;color:#000;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[28,28,28,28]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[28,28,28,28]">shop now </div>
                                                            </li>
                                                            <!-- SLIDE 3 -->
                                                            <li data-index="rs-4" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- MAIN IMAGE -->
                                                                <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='#000000' alt="" title="Home 1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                <!-- LAYERS -->
                                                                <!-- LAYER NR. 11 -->
                                                                <div class="tp-caption tp-resizeme" id="slide-4-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                                    <img src="images/3.jpg" alt="" data-ww="870px" data-hh="407px" width="870" height="407" data-no-retina>
                                                                </div>
                                                                <!-- LAYER NR. 12 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-4-layer-2" data-x="center" data-hoffset="-212" data-y="105" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1000,"to":"o:1;","delay":600,"split":"chars","splitdelay":0.1,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">get $25 off </div>
                                                                <!-- LAYER NR. 13 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-4-layer-6" data-x="center" data-hoffset="-212" data-y="70" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","speed":700,"to":"o:1;","delay":1300,"ease":"Power2.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">special offer </div>
                                                                <!-- LAYER NR. 14 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-4-layer-3" data-x="center" data-hoffset="-212" data-y="191" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','on','off']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:-50px;opacity:0;","speed":700,"to":"o:1;","delay":1700,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">when you spend $500
                                                                    <p> on Handguns </p>
                                                                </div>
                                                                <!-- LAYER NR. 15 -->
                                                                <div class="tp-caption black tp-resizeme" id="slide-4-layer-5" data-x="center" data-hoffset="-213" data-y="260" data-width="['auto']" data-height="['auto']" data-visibility="['on','on','off','off']" data-type="text" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"shop.html","delay":""}]' data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":700,"to":"o:1;","delay":2100,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgba(254,165,38,1);bw:2px 2px 2px 2px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[28,28,28,28]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[28,28,28,28]">shop now </div>
                                                            </li>
                                                        </ul>
                                                        <div class="tp-bannertimer tp-bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- END REVOLUTION SLIDER -->
                                            </div>
                                        </div>
                                        <div class="empty_space height_4_5em"></div>
                                    </div>
                                </div>
                                <!-- / Product Categories / Revolution Slider -->
                               
<div class="home-about">
    <div class="container">
    <div class="main-about">
        <div class="about-txt">
            <h5 class="text-center my-3"> About </h5>
            <h3 class="text-center">J & C Risher Firearms Mission</h3>
            <p class="text-light about">After years of listening to family members having a hard time finding quality piece of mind in a budget they could afford, we decided to start looking into the industry. Being an avid hunter for many years and successful professional, we found a trend in pricing and decided to help support your Second Amendment Rights. Our Mission is to strive to find you the best deals on the market and provide the education needed to help ensure that your investment for hunting, sporting, or defense will serve you and your family well, for many years to come. </p>
            <p class="text-center my-3"> <a href="{{url('gun-shows')}}" class="btn bg-warning text-dark font-weight-bold">Find Us On a Show</a> </p>
        </div>
    </div>
    <div class="my-flex">
        <div class="col-box">
            <img src="./images/abt (3).jpg" alt"" class="w-100">
        </div>
        <div class="col-box">
             <img src="./images/abt (1).jpg" alt"" class="w-100">
        </div>
        <div class="col-box">
             <img src="./images/abt (2).jpg" alt"" class="w-100">
        </div>
    </div>

</div>
</div>

<!-- Featured Products -->
<div class="custom_texture_bg1">
   <div class="content_wrap">
     <div class="empty_space height_3em"></div>
     <div class="sc_section scheme_light">
       <div class="sc_section_inner">
         <h2 class="sc_section_title sc_item_title">featured
           <span class="thin"> products</span>
        </h2>
        <div class="woocommerce columns-4">
           <ul class="products">
             <!-- Product Item -->
             @foreach($products as $featureProduct)
            @if($featureProduct['featured'] == 1)
             <li class="product">
               <div class="post_item_wrap">
                 <div class="post_featured">
                   <div class="post_thumb">
                   
                       <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                    </a>
                 </div>
              </div>
              <div class="post_content">
                <h2 class="woocommerce-loop-product__title"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></h2>
                <div class="d-flex" style="gap:10px">
                  <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
              </div>
              <span class="price">
               <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
             <ins>
              <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
             </span>
          </ins>
       </span>
      @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
       <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
    </div>
 </div>
</li>
@endif
@endforeach

<!-- /Product Item -->
<!-- /Product Item -->

</ul>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Featured Products -->
<!-- Featured Products -->
<div class="custom_texture_bg1">
   <div class="content_wrap">
     <div class="sc_section scheme_light">
       <div class="sc_section_inner">
         <h2 class="sc_section_title sc_item_title">Latest
           <span class="thin"> products</span>
        </h2>
        <div class="woocommerce columns-4">
           <ul class="products">
             <!-- Product Item -->
             @foreach($products as $featureProduct)
            @if($featureProduct['new_arrival'] == 1)
             <li class="product">
               <div class="post_item_wrap">
                 <div class="post_featured">
                   <div class="post_thumb">
                  
                      
                       <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                    </a>
                 </div>
              </div>
              <div class="post_content">
                <h2 class="woocommerce-loop-product__title"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></h2>
                <div class="d-flex" style="gap:10px">
                  <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
              </div>
              <span class="price">
               <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
             <ins>
              <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
             </span>
          </ins>
       </span>
       <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
       @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
    </div>
 </div>
</li>
@endif
@endforeach

<!-- /Product Item -->
<!-- /Product Item -->

</ul>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Featured Products -->

<!-- Featured Products -->
<div class="custom_texture_bg1">
   <div class="content_wrap">
     <div class="sc_section scheme_light">
       <div class="sc_section_inner">
         <h2 class="sc_section_title sc_item_title">Best Seller
           <span class="thin"> products</span>
        </h2>
        <div class="woocommerce columns-4">
           <ul class="products">
             <!-- Product Item -->
             @foreach($products as $featureProduct)
            @if($featureProduct['best_seller'] == 1)
             <li class="product">
               <div class="post_item_wrap">
                 <div class="post_featured">
                   <div class="post_thumb">
                    
                       <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                    </a>
                 </div>
              </div>
              <div class="post_content">
                <h2 class="woocommerce-loop-product__title"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></h2>
                <div class="d-flex" style="gap:10px">
                  <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
              </div>
              <span class="price">
               <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
             <ins>
              <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
             </span>
          </ins>
       </span>
       <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
       @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
    </div>
 </div>
</li>
@endif
@endforeach

<!-- /Product Item -->
<!-- /Product Item -->

</ul>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Featured Products -->
<!-- Featured Products -->
<div class="custom_texture_bg1">
   <div class="content_wrap">
     <div class="sc_section scheme_light">
       <div class="sc_section_inner">
         <h2 class="sc_section_title sc_item_title">NON FFL
           <span class="thin"> products</span>
        </h2>
        <div class="woocommerce columns-4">
           <ul class="products">
             <!-- Product Item -->
             @foreach($products as $featureProduct)
             @if($featureProduct['category_id'] == 74)
             <li class="product">
               <div class="post_item_wrap">
                 <div class="post_featured">
                   <div class="post_thumb">
                     
                      
                       <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                    </a>
                 </div>
              </div>
              <div class="post_content">
                <h2 class="woocommerce-loop-product__title"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></h2>
                <div class="d-flex" style="gap:10px">
                  <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
              </div>
              <span class="price">
               <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
             <ins>
              <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
             </span>
          </ins>
       </span>
       <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
       @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
    </div>
 </div>
</li>
@endif
@endforeach

<!-- /Product Item -->
<!-- /Product Item -->

</ul>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Featured Products -->
<!-- Featured Products -->
<div class="custom_texture_bg1">
   <div class="content_wrap">
     <div class="sc_section scheme_light">
       <div class="sc_section_inner">
         <h2 class="sc_section_title sc_item_title">Accessories
           <span class="thin"> products</span>
        </h2>
        <div class="woocommerce columns-4">
           <ul class="products">
             <!-- Product Item -->
             @foreach($products as $featureProduct)
            @if($featureProduct['category_id'] == 70)
             <li class="product">
               <div class="post_item_wrap">
                 <div class="post_featured">
                   <div class="post_thumb">
                     <a href="product-single.html">
                      
                       <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                    </a>
                 </div>
              </div>
              <div class="post_content">
                <h2 class="woocommerce-loop-product__title"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></h2>
                <div class="d-flex" style="gap:10px">
                  <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
              </div>
              <span class="price">
               <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
             <ins>
              <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
             </span>
          </ins>
       </span>
       <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
       @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
    </div>
 </div>
</li>
@endif
@endforeach

<!-- /Product Item -->
<!-- /Product Item -->

</ul>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Featured Products -->

<!-- Product Slider -->

@foreach($arrCategoryListsp as $strKey => $strData)
<div class="custom_texture_bg2 d-none" style="background-image:url(../images/bg-1.jpg) !important;">
   <div class="content_wrap">
       
     <h2 class="sc_section_title sc_item_title" >{{$strData['name']}}
           <span class="thin"> </span>
        </h2>
        
     <div class="sc_clients_wrap">
       <div class="sc_clients sc_clients_style_clients-1">
         <div class="sc_slider_swiper swiper-slider-container sc_slider_nopagination sc_slider_nocontrols" data-interval="5064" data-slides-per-view="4">
           <div class="slides swiper-wrapper">
               
                 @foreach($products as $featureProduct)
               @if($strData['id']==$featureProduct['category_id'])
             <div class="swiper-slide" data-style="width:100%;">
               <div class="woocommerce columns-4">
            <ul class="products">
                <!-- Product Item -->
                <li class="product" style="width:100%;">
                    <div class="post_item_wrap">
                        <div class="post_featured">
                            <div class="post_thumb">
                               
                                    <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" title="Product" />
                                </a>
                            </div>
                        </div>
                        <div class="post_content">
                            <h2 class="woocommerce-loop-product__title">{{$featureProduct['prod_name']}}</h2>
                            <span class="price">
                                <del>
                 <span class="woocommerce-Price-amount amount">
                   <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}
                </span>
             </del>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}
                                </span>
                            </span>
                            @php 
        $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
        $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first(); 
      @endphp
       @if($cart_product == null)
            <button class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" type="button" data-product_name="{{$featureProduct['prod_name']}}"
             data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1"
             data-image="{{$featureProduct['images']?$featureProduct['images'][0]['image']:null}}"
              onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
       @else
            <a class="btn btn-primary product-card__addtocart button product_type_simple add_to_cart_button" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
       @endif
                            <!-- <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a> -->
                        </div>
                    </div>
                </li
                
                
                <!-- /Product Item -->
            </ul>
</div>
          </div>
    @endif    
@endforeach 
          
     
     
         
         
        
</div>
<div class="sc_slider_controls_wrap" style="display:block;">
 <a class="sc_slider_prev" href="#"><i class="fas fa-long-arrow-left"></i></a>
 <a class="sc_slider_next" href="#"><i class="fas fa-long-arrow-right"></i></a>
</div>
<div class="sc_slider_pagination_wrap"></div>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
</div>
<!-- /Product Slider -->


@endforeach

<!-- Counters -->
<div class="content_wrap">
   <div class="empty_space height_3em"></div>
   <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4 counters_section">
    <div class="column-1_4 sc_column_item sc_column_item_1 odd first">
      <div class="sc_skills sc_skills_counter" data-type="counter" data-caption="Skills">
        <div class="sc_skills_item sc_skills_style_1 odd first">
          <div ><i class="fas fa-bullseye"></i></div>
          <div class="sc_skills_count">
            <div class="sc_skills_total" data-start="0" data-stop="253" data-step="3" data-max="253" data-speed="16" data-duration="1349" data-ed="">0</div>
         </div>
         <div class="sc_skills_info">
            <div class="sc_skills_label">Top brands</div>
         </div>
         <a class="sc_skills_read_more" href="#">
            <span class="fa fa-angle-right"></span>
         </a>
      </div>
   </div>
</div><div class="column-1_4 sc_column_item sc_column_item_2 even">
   <div class="sc_skills sc_skills_counter" data-type="counter" data-caption="Skills">
     <div class="sc_skills_item sc_skills_style_1 odd first">
       <div><i class="fas fa-user-tie"></i></div>
       <div class="sc_skills_count">
         <div class="sc_skills_total" data-start="0" data-stop="1200" data-step="12" data-max="1200" data-speed="22" data-duration="2200" data-ed="">0</div>
      </div>
      <div class="sc_skills_info">
         <div class="sc_skills_label">LOYAL USERS</div>
      </div>
      <a class="sc_skills_read_more" href="#">
         <span class="fa fa-angle-right"></span>
      </a>
   </div>
</div>
</div><div class="column-1_4 sc_column_item sc_column_item_3 odd">
   <div class="sc_skills sc_skills_counter" data-type="counter" data-caption="Skills">
     <div class="sc_skills_item sc_skills_style_1 odd first">
       <div><i class="fa-solid fa-gun"></i></div>
       <div class="sc_skills_count">
         <div class="sc_skills_total" data-start="0" data-stop="534" data-step="5" data-max="534" data-speed="33" data-duration="3524" data-ed="">0</div>
      </div>
      <div class="sc_skills_info">
         <div class="sc_skills_label">Top brands</div>
      </div>
      <a class="sc_skills_read_more" href="#">
         <span class="fa fa-angle-right"></span>
      </a>
   </div>
</div>
</div><div class="column-1_4 sc_column_item sc_column_item_4 even">
   <div class="sc_skills sc_skills_counter" data-type="counter" data-caption="Skills">
     <div class="sc_skills_item sc_skills_style_1 odd first">
       <div><i class="far fa-trophy-alt"></i></div>
       <div class="sc_skills_count">
         <div class="sc_skills_total" data-start="0" data-stop="688" data-step="7" data-max="688" data-speed="13" data-duration="1278" data-ed="">0</div>
      </div>
      <div class="sc_skills_info">
         <div class="sc_skills_label">AWARDS WON</div>
      </div>
      <a class="sc_skills_read_more" href="#">
         <span class="fa fa-angle-right"></span>
      </a>
   </div>
</div>
</div>
</div>
<div class="empty_space height_3em"></div>
</div>
<!-- /Counters -->
<!-- Guns & Ammo -->
<div class="custom_texture_bg3 ">
   <div class="content_wrap">
     <div class="empty_space height_3em"></div>
     <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns">
       <div class="column-1_2 sc_column_item sc_column_item_1 odd first"></div><div class="column-1_2 sc_column_item sc_column_item_2 even textalign_center">
         <div class="empty_space height_4em"></div>
         <h2 class="sc_title sc_title_regular sc_align_center textalign_center accent2">
           How<span class="thin"> to order</span>
        </h2>
        <div class="sc_item_descr accent1">
           <p class="margin_bottom_null textalign_center">Nothing ever was this easy! Pick a firearm</p>
           <p> and check out with your own address</p>
        </div>
        <div class="guns_ammo_info">
           <p class="margin_bottom_null textalign_center">The process of buying a gun has traditionally been fraught </p>
           <p>with restrictions and red tape. Thankfully, this isn't the case any more </p>
             <p>thanks to GunScore, a free online service that streamlines the process for everyone!</p>
            

             
        </div>
        <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}" class="sc_button sc_button_square sc_button_style_border sc_button_size_large aligncenter">Learn More</a>
        <div class="empty_space height_5_3em"></div>
     </div>
  </div>
</div>
<div class="empty_space height_3em"></div>
</div>
<!-- /Guns & Ammo -->
<!-- Popular News -->
<div class="empty_space height_6_6em d-none"></div>
<div class="content_wrap d-none">
   <div class="widget_area sc_recent_news_wrap">
     <aside class="widget widget_recent_news">
       <div class="sc_recent_news sc_recent_news_style_news-magazine sc_recent_news_with_accented">
         <div class="sc_recent_news_header sc_recent_news_header_split">
           <div class="sc_recent_news_header_captions">
             <h3 class="sc_recent_news_title">Popular
               <span class="thin"> News</span>
            </h3>
         </div><div class="sc_recent_news_header_categories">
          <a href="blog-classic.html" class="sc_recent_news_header_category_item">All News</a>
          <a href="certificate-single.html" class="sc_recent_news_header_category_item">Certificates</a>
          <a href="gallery-grid.html" class="sc_recent_news_header_category_item">Gallery</a>
          <span class="sc_recent_news_header_category_item sc_recent_news_header_category_item_more">More
            <span class="sc_recent_news_header_more_categories">
              <a href="blog-masonry-2-columns.html" class="sc_recent_news_header_category_item">Masonry (2 columns)</a>
              <a href="blog-masonry-3-columns.html" class="sc_recent_news_header_category_item">Masonry (3 columns)</a>
              <a href="blog-portfolio-2-columns.html" class="sc_recent_news_header_category_item">Portfolio (2 columns)</a>
              <a href="blog-masonry-3-columns.html" class="sc_recent_news_header_category_item">Portfolio (3 columns)</a>
              <a href="post-formats.html" class="sc_recent_news_header_category_item">Post Formats</a>
           </span>
        </span>
     </div>
  </div>
  <div class="columns_wrap">
     <div class="column-1_2">
       <!-- Post Item -->
       <article class="post_item post_accented_on">
         <div class="post_featured">
           <div class="post_thumb">
             <a class="hover_icon hover_icon_link fa fa-link" href="post-single.html">
               <img alt="" src="images/image-8-370x209.jpg">
            </a>
         </div>
      </div>
      <div class="post_header">
        <h5 class="post_title">
          <a href="post-single.html">Instructions &#038; Training</a>
       </h5>
       <div class="post_meta">
          <span class="post_meta_date">Posted
            <a href="#">February 3, 2017</a>
         </span>
         <span class="post_meta_author">By Jack Black</span>
      </div>
   </div>
   <div class="post_content">
     <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo...</p>
  </div>
  <div class="post_footer">
     <a class="sc_button sc_button_style_dark" href="post-single.html">Learn More</a>
  </div>

</article>
</div><div class="column-1_2">
 <!-- Post Item -->
 <article class="post_item post_accented_off">
   <div class="post_featured">
     <div class="post_thumb">
       <a class="hover_icon hover_icon_link fa fa-link" href="post-single.html">
         <img alt="Rental Firearms &#038; Fees" src="images/Depositphotos_22904186_original-370x209.jpg">
      </a>
   </div>
</div>
<div class="post_header">
  <h6 class="post_title">
    <a href="post-single.html">Rental Firearms &#038; Fees</a>
 </h6>
 <div class="post_meta">
    <span class="post_meta_date">Posted
      <a href="#">February 3, 2017</a>
   </span>
   <span class="post_meta_author">By Jack Black</span>
</div>
</div>
</article>
<!-- /Post Item -->
<!-- Post Item -->
<article class="post_item post_accented_off">
   <div class="post_featured">
     <div class="post_thumb" data-image="images/image-6.jpg" data-title="Gun Range">
       <a class="hover_icon hover_icon_link fa fa-link" href="post-single.html">
         <img alt="" src="images/image-6-370x209.jpg">
      </a>
   </div>
</div>
<div class="post_header">
  <h6 class="post_title">
    <a href="post-single.html">Gun Range</a>
 </h6>
 <div class="post_meta">
    <span class="post_meta_date">Posted
      <a href="#">February 3, 2017</a>
   </span>
   <span class="post_meta_author">By Jack Black</span>
</div>
</div>
</article>
<!-- /Post Item -->
<!-- Post Item -->
<article class="post_item post_accented_off">
   <div class="post_featured">
     <div class="post_thumb">
       <a class="hover_icon hover_icon_link fa fa-link" href="post-single.html">
         <img alt="" src="images/image-9-370x209.jpg">
      </a>
   </div>
</div>
<div class="post_header">
  <h6 class="post_title">
    <a href="post-single.html">Firearms Classes and Registration</a>
 </h6>
 <div class="post_meta">
    <span class="post_meta_date">Posted
      <a href="post-single.html">February 3, 2017</a>
   </span>
   <span class="post_meta_author">By Jack Black</span>
</div>
</div>
</article>
<!-- /Post Item -->
<!-- Post Item -->
<article class="post_item post_accented_off">
   <div class="post_featured">
     <div class="post_thumb">
       <a class="hover_icon hover_icon_link fa fa-link" href="post-single.html">
         <img alt="" src="images/event-1-370x209.jpg">
      </a>
   </div>
</div>
<div class="post_header">
  <h6 class="post_title">
    <a href="post-single.html">How To Buy And Register A Suppressor</a>
 </h6>
 <div class="post_meta">
    <span class="post_meta_date">Posted
      <a href="#">February 2, 2017</a>
   </span>
   <span class="post_meta_author">By Jack Black</span>
</div>
</div>
</article>
<!-- /Post Item -->
</div>
</div>
</div>
</aside>
</div>
</div>
<div class="empty_space height_7_8em d-none"></div>
<!-- /Popular News -->

<!-- Clients -->
<!--<div class="custom_texture_bg2">-->
<!--   <div class="content_wrap">-->
<!--     <div class="empty_space height_3em"></div>-->
<!--     <div class="sc_clients_wrap">-->
<!--       <div class="sc_clients sc_clients_style_clients-1">-->
<!--         <div class="sc_slider_swiper swiper-slider-container sc_slider_nopagination sc_slider_nocontrols" data-interval="5064" data-slides-per-view="7">-->
<!--           <div class="slides swiper-wrapper">-->
<!--             <div class="swiper-slide" data-style="width:100%;">-->
<!--               <div  class="sc_clients_item sc_clients_item_1 odd first">-->
<!--                 <div class="sc_client_image">-->
<!--                   <img alt="" src="images/7.png">-->
<!--                </div>-->
<!--             </div>-->
<!--          </div>-->
<!--          <div class="swiper-slide" data-style="width:100%;">-->
<!--            <div class="sc_clients_item sc_clients_item_2 even">-->
<!--              <div class="sc_client_image">-->
<!--                <img alt="" src="images/5.png">-->
<!--             </div>-->
<!--          </div>-->
<!--       </div>-->
<!--       <div class="swiper-slide" data-style="width:100%;">-->
<!--         <div class="sc_clients_item sc_clients_item_3 odd">-->
<!--           <div class="sc_client_image">-->
<!--             <img alt="" src="images/3.png">-->
<!--          </div>-->
<!--       </div>-->
<!--    </div>-->
<!--    <div class="swiper-slide" data-style="width:100%;">-->
<!--      <div class="sc_clients_item sc_clients_item_4 even">-->
<!--        <div class="sc_client_image">-->
<!--          <img alt="" src="images/1.png">-->
<!--       </div>-->
<!--    </div>-->
<!-- </div>-->
<!-- <div class="swiper-slide" data-style="width:100%;">-->
<!--   <div  class="sc_clients_item sc_clients_item_5 odd">-->
<!--     <div class="sc_client_image">-->
<!--       <img alt="" src="images/2.png">-->
<!--    </div>-->
<!-- </div>-->
<!--</div>-->
<!--<div class="swiper-slide" data-style="width:100%;">-->
<!--   <div class="sc_clients_item sc_clients_item_6 even">-->
<!--     <div class="sc_client_image">-->
<!--       <img alt="" src="images/6.png">-->
<!--    </div>-->
<!-- </div>-->
<!--</div>-->
<!--<div class="swiper-slide" data-style="width:100%;">-->
<!--   <div class="sc_clients_item sc_clients_item_7 odd">-->
<!--     <div class="sc_client_image">-->
<!--       <img alt="" src="images/4.png">-->
<!--    </div>-->
<!-- </div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="sc_slider_controls_wrap">-->
<!-- <a class="sc_slider_prev" href="#"></a>-->
<!-- <a class="sc_slider_next" href="#"></a>-->
<!--</div>-->
<!--<div class="sc_slider_pagination_wrap"></div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="empty_space height_3em"></div>-->
<!--</div>-->
<!--</div>-->
<!-- /Clients -->
</section>
</article>
</div>
<!-- /Content -->
</div>
<!-- /Page Content -->

                                
                              

    @endsection