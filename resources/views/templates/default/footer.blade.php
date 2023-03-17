@php
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
//$arrCategoryLists = Category::with('children')->whereIN('name', ['Rifles','Shot guns','hand guns','accessories','non ffl','other'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
$arrCategoryLists1 = Category::with('children')->whereIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
//$arrCategoryLists = Category::with('children')->where('parent_id', '=', null)->where('deleted_at', '=', null)->take(3)->get()->toArray();
$nproducts = Products::with('images')->where('is_active', '1')->where('new_arrival', '1')->orderby('id','DESC')->take(2)->get()->toArray();
$fproducts = Products::with('images')->where('is_active', '1')->where('featured', '1')->orderby('id','DESC')->take(2)->get()->toArray();

$bproducts = Products::with('images')->where('is_active', '1')->where('best_seller', '1')->orderby('id','DESC')->take(2)->get()->toArray();


$arrExpoldeRoute = explode('@',Route::currentRouteAction());
$currentAction = end($arrExpoldeRoute);


@endphp
 
 
 <!-- site__footer -->
 <!-- Footer 1 -->
 <footer class="footer_wrap widget_area scheme_original">
  <div class="footer_wrap_inner widget_area_inner">
    <div class="content_wrap">
      <!-- Widgets -->
      <div class="columns_wrap">
        <aside class="column-1_3 widget woocommerce widget_products">
          <h5 class="widget_title">LATEST PRODUCTS</h5>
          <ul class="product_list_widget">

          @foreach($nproducts as $featureProduct)
            <li>
              <a href="{{ URL::to('/product', $featureProduct['id']) }}">
                <img src="{{$featureProduct['images']?$featureProduct['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" />
                <span class="product-title">{{substr($featureProduct['prod_name'],0,35)}}..</span>
              </a>
               @if($featureProduct['prod_price']==$featureProduct['mrp_price'])
                                    
                                        <span>{{CurrencySymbol()}} {{$featureProduct['prod_price']}}</span>
                                    
                                    @else
               <del>
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}} </span>
                    </del>
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}} </span>
                      </ins>
                      @endif
              </li>
              @endforeach


              </ul>
            </aside>
            <aside class="column-1_3 widget woocommerce widget_top_rated_products">
              <h5 class="widget_title">FEATURED Products</h5>
              <ul class="product_list_widget">
              @foreach($fproducts as $featureProductf)
                <li>
                  <a href="{{ URL::to('/product', $featureProductf['id']) }}">
                    <img src="{{$featureProductf['images']?$featureProductf['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" />
                    <span class="product-title">{{substr($featureProductf['prod_name'],0,35)}}..</span>
                  </a>
                  <div class="d-flex" style="gap:10px">
                    <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                    <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                    <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                    <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                    <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                  </div>
                   @if($featureProductf['prod_price']==$featureProductf['mrp_price'])
                                    
                                        <span>{{CurrencySymbol()}} {{$featureProductf['prod_price']}}</span>
                                    
                                    @else
                  <del>
                      
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProductf['mrp_price']}} </span>
                    </del>
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProductf['prod_price']}} </span>
                      </ins>
                      @endif
                    </li>
                    @endforeach

                    </ul>
                  </aside>
                  <aside class="column-1_3 widget woocommerce widget_recent_reviews">
                    <h5 class="widget_title">Best Seller Products</h5>
                    <ul class="product_list_widget">
                    @foreach($bproducts as $featureProductb)
                      <li>
                        <a href="{{ URL::to('/product', $featureProductb['id']) }}">
                          <img src="{{$featureProductb['images']?$featureProductb['images'][0]['image']:asset('images/no-image.jpg')}}" alt="" /> {{substr($featureProductb['prod_name'],0,35)}}.. </a>
                          <div class="d-flex" style="gap:10px">
                            <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                            <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                            <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                            <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                            <div class="fa fa-star" title="Rated 5.00 out of 5"></div>
                          </div>
                           @if($featureProductb['prod_price']==$featureProductb['mrp_price'])
                                    
                                        <span>{{CurrencySymbol()}} {{$featureProductb['prod_price']}}</span>
                                    
                                    @else
                         <del>
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProductb['mrp_price']}} </span>
                    </del>
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol"></span>{{CurrencySymbol()}}{{$featureProductb['prod_price']}} </span>
                      </ins>
                      @endif
                        </li>
                        @endforeach
                       
                        </ul>
                      </aside>
                    </div>
                    <!-- /Widgets -->
                  </div>
                </div>
              </footer>
              <!-- /Footer 1 -->
              
              <!-- Footer 2 -->
 <footer class="contacts_wrap scheme_original main-footer">
  <div class="contacts_wrap_inner">
    <div class="content_wrap">
      <!-- Widgets -->
      <div class="columns_wrap">
        <aside class="column-1_4 widget woocommerce widget_products formob" style="">
          <div class="logo">
            <a href="{{ URL::to('/') }}">
                <img src="{{url('images/logo_footer.png')}}" class="logo_footer" alt="">
            </a>
        </div>
        <div class="live-counter">
            <ul>
              <li class="counter_border">
                  <p class="conunter_data"><span>Total Visitors</span> <span class="num-counter"> {{ipcount()}} </span></p></li>
        </ul>
        </div>
            </aside>
          
            <aside class="column-1_4 widget woocommerce widget_top_rated_products formob">
              <h5 class="widget_title">CATEGORIES</h5>
              <ul>
                   <li><a href="/product_category/59?category=RIFLES">FIREARMS</a></li>
                    @foreach($arrCategoryLists1 as $strKey => $strData)
            @if (empty($strData['parent_id']))
                  <li> <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}">{{$strData['name']}}</a></li>
                    @endif
            @endforeach
              </ul>
            </aside>
            <aside class="column-1_4 widget woocommerce widget_recent_reviews formob">
                  <h5 class="widget_title">Usefull Links</h5>  
                  <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="{{url('about-us')}}">About us</a></li>
                  <li><a href="{{url('gun-shows')}}">Gun Shows</a></li>
                  <li><a href="{{url('contact-us')}}">Contact us</a></li>
              </ul>
            </aside>
           
            <aside class="column-1_4 widget woocommerce widget_recent_reviews formob">
                  <h5 class="widget_title">Contact Us</h5> 
                  <!-- Socials -->
                    <!--<div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_medium">-->
                    <!--  <div class="sc_socials_item">-->
                    <!--    <a href="#" target="_blank" class="social_icons fa fa-facebook">-->
                    <!--      <i class="fab fa-facebook" aria-hidden="true"></i>-->
                    <!--    </a>-->
                    <!--  </div>-->
                    <!--  <div class="sc_socials_item">-->
                    <!--    <a href="#" target="_blank" class="social_icons fa fa-whatsapp">-->
                    <!--      <i class="fab fa-whatsapp" aria-hidden="true"></i>-->
                    <!--    </a>-->
                    <!--  </div>-->
                    <!--  <div class="sc_socials_item">-->
                    <!--    <a href="#" target="_blank" class="social_icons fa fa-twitter">-->
                    <!--      <i class="fab fa-twitter" aria-hidden="true"></i>-->
                    <!--    </a>-->
                    <!--  </div>-->
                    <!--  <div class="sc_socials_item">-->
                    <!--    <a href="#" target="_blank" class="social_icons fa fa-linkedin">-->
                    <!--      <i class="fab fa-linkedin" aria-hidden="true"></i>-->
                    <!--    </a>-->
                    <!--  </div>-->
                    <!--</div>-->
                    <!-- /Socials -->
                     <address class="address_left">
                        <p style="padding-left: 18px; position: relative;"><a href="https://www.google.com/maps/place/10402+Fairway+Vista+Dr,+Rowlett,+TX+75089,+USA/@32.9518748,-96.5317298,17z/data=!4m6!3m5!1s0x864c0252e1903bf9:0x222732d1c2dce38a!8m2!3d32.9518704!4d-96.5275026!16s%2Fg%2F11crv7s1t3" target="_blank"><i class="fas fa-map-marker-alt top-6"></i> J & C Risher Firearms 10402 Fairway Vista Dr. Rowlett, Tx. 75089</a> (By Appointment Only)</p>
                      </address>
                      <address class="address_right">
                        <p style="padding-left: 18px; position: relative; color:#fff;"><i class="fas fa-phone top-6"></i> Phone: <a href="tel:469-919-4867">469-919-4867</a></p>
                        <p style="padding-left: 18px; position: relative; color:#fff;"><i class="fas fa-envelope top-6"></i> Email: <a href="mailto:jdrisher@aol.com">jdrisher@aol.com</a></p>
                      </address>
                    <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107170.36475827248!2d-96.68275103630248!3d32.92264574463669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c029ac508bb4d%3A0xba91030e44b729ef!2sRowlett%2C%20TX%2C%20USA!5e0!3m2!1sen!2sin!4v1674555966073!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            </aside>
        </div>
                    <!-- /Widgets -->
    </div>
    </div>
    <div class="box-quick">
        <div class="content_wrap">
            <div class="row align-items-center">
                <div class="col-12 col-lg-3">
                    <div class="inner-quick">
                <h2>Quick Links :</h2>
            </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="links-quick">
                        <ul>
                            <li><a href="{{url('shiping-policy')}}">Shipping Policy</a></li>
                            <li><a href="{{url('return-policy')}}">Returns & Refunds Policy</a></li>
                            <li><a href="{{url('online-buying')}}">Online Buying</a></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                             <li><a href="{{url('texas-laws')}}">Texas Gun Laws</a></li>
                             <li><a href="{{url('faq')}}">FAQ</a></li>
                        </ul>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
              <!-- /Footer 2 -->
             
              <!-- Copyright -->
              <div class="copyright_wrap copyright_style_text  scheme_original">
                <div class="copyright_wrap_inner">
                  <div class="content_wrap">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="copyright_text">
                          Copyright © 2023. All Rights Reserved </a>.
                    </div>
                        </div>
                        

                        <div class="col-12 col-md-6">
                            <div class="copyright_text text-lg-right pr-lg-5">
                       Designed & Developed By <a href="https://wamexs.com" traget="_blank">WEB & MARKETING EXPERTS LLC</a>.
                    </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Copyright -->

