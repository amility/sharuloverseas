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
   .nav-tabs .nav-link {
    padding: 1.2rem 12px!important;
    er: 0;
    border-bottom: 2px solid transparent;
    color: #282d3b;
    font-weight: 700;
    font-size: 1.4rem;
    line-height: 1;
    font-family: Poppins, sans-serif;
    text-transform: uppercase;
    border-radius: 0px;
    /* background: red; */
}
ul.nav.nav-tabs {
    width: 50%;
    border-radius: 0;
    background: #06aaef!important;
}
.nav {
    background-color: #a0a0a0!important;
    color: rgb(255, 255, 255);
    border-radius: 5px;
}
   .next {
   background-color: #004aff;
   color: #fff;
   }
   .cancel {
   background-color: red;
   color: #fff;
   }
   .nav{
   background-color:#007bff;
   color: rgb(255, 255, 255);
   border-radius: 5px;
   }
   .nav-link, .nav-link:hover {
   color: #ffffff;
   font-weight: bold;
   text-transform: uppercase;
   }
   .card-link {
   /* color: Blue; */
   font-weight: bold;
   text-transform: uppercase;
   }
   label {
   color: #007bff;
   font-weight: bold;
   /* text-transform: uppercase; */
   }
   .card-header .accicon {
   float: right;
   font-size: 20px;
   width: 1.2em;
   }
   .card-header {
   cursor: move;
   border-bottom: none;
   }
   .card {
   border: 1px solid #ddd;
   }
   .card-header:not(.collapsed) .rotate-icon {
   transform: rotate(180deg);
   }
   .textName
,.textNameTwo
,.textNameThree
,.clipArtRemove
,.uploadRemove
,.colorRemove{
      display:none;
   }
   .clip_im{
   display:none;
   position: relative;
   top: -180px;
   right: -90px;
   }
   .clip_text{
   /* display:none; */
   position: relative;
   top: -150px;
   right: -154px;
   width: 160%;
   font-size: 21px;
   }
   .clip_im1{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .output{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .clip_im2{
   display: none; 
   position: relative;
   top: -160px;
   right: 14px;
   width: 200%;
   }
   .clip_im3{
   display: none; 
   position: relative;
   top: -150px;
   right: -160px;
   width: 200%;
   }
   .form-control {
    padding-left: 1.2rem;
    height: 32px;
    margin-bottom: 1rem;
    transition: all 0.3s;
    border: 1px solid #dfdfdf;
    border-radius: 0;
    background-color: #fff;
    color: #777;
    font-family: "Open Sans", sans-serif;
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
}
select.form-control:not([size]):not([multiple]) {
    height: 3rem;
}
.text_font{
    display:block;
}
.text_color{
    display:block;
}
.text_line_style>div>span{
   cursor:move;
}
   @media (max-width: 576px) {
   .responsive-content {
   font-size: 3vw;
   }
   }
</style>
<style>
         
     
      .rotate {
      animation: rotation 8s infinite linear;
      }

       

      @keyframes rotation {
      from {
         transform: rotate(0deg);
      }
      to {
         transform: rotate(359deg);
      }
      }
</style>

<div class="page-header">
   <div class="page-header__container container">
      <div class="page-header__breadcrumb">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{url('/')}}">Home</a>
                  <svg class="breadcrumb-arrow" width="6px" height="9px">
                     <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-6x9"></use>
                  </svg>
               </li>
               <li class="breadcrumb-item">
                  <a href="#">{{ $productDetails->brandData->brand_name }}</a>
                  <svg class="breadcrumb-arrow" width="6px" height="9px">
                     <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-6x9"></use>
                  </svg>
               </li>
               <li class="breadcrumb-item active" aria-current="page">{{ $productDetails->prod_slug ?? '-' }}</li>
               @if($productDetails['custom_product'] == 1)
               <li class="breadcrumb-item" style="position:absolute;right: 30px;">
                  <a href="{{url('product/'.$productDetails->id)}}">
                  Back
                  </a>
               </li>
               @endif
            </ol>
         </nav>
      </div>
   </div>
</div>
@if(!empty($productDetails))
<div class="block">
   <div class="container">
      @include('flash::message')
      <div class="row mt-4">
            <div class="col-md-8">
            <div class="">
               <ul class="nav nav-tabs" role="tablist">
                  @foreach($productDetails->imagess as $productImageLists)
                  @if($productImageLists->ViewTypeId == '1')
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#home">Front</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '2')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu1">Back</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '3')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu2">Left</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '4')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu3">Right</a>
                  </li>
                  @endif
                  @endforeach
               </ul>
            </div>
            <div class="">
               <div class="tab-content">
                  @foreach($productDetails->imagess as $productImageLists)
                  @if($productImageLists->ViewTypeId == 1)
                  <div id="home" class="container-fluid tab-pane active">
                     <br>
                     <div id="Front" class="tabcontent">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                    <div class="row">
                                    <!-- hello -->
                                    
                                    <!-- hello -->

                                    <!-- resize -->
                                  
                                    
                                    <!-- resize -->
                                        <div class="col-md-12">
                                            <img class=" w-100"
                                                src="{{Asset($productImageLists->image)}}"
                                                alt="Girl in a jacket">
                                                  <!-- rotate  -->
                                                <!-- <div class="phppot-container">
                                                   <div class="container">
                                                      <div class="image-demo-box">
                                                         <div id="slider">
                                                            <div id="scale-handle" class="ui-slider-handle"></div>
                                                         </div>
                                                         <img src='{{Asset($productImageLists->image)}}' class="imgRot" />
                                                      </div>
                                                   </div>
                                                </div> -->
                                                <!-- rotate  -->
                                            <div class="column " width="160px">
                                               
                                                <img class="w-25 float-left clip_im imgRot   "
                                                src=""
                                                alt="Snow" id="clipImage" style="position:relative;cursor:move;"> 
                                                <img id="output" class="output imgRot" style="width:80px;cursor:move;" />
                                            </div>

                                            <div class="column clip_text">
                                                <span class="title_one" style="position:relative; cursor:move;"></span>
                                                <br>
                                                <span class="title_two" style="position:relative;cursor:move;"></span>
                                                <br>
                                                <span class="title_three" style="position:relative;cursor:move;"></span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="">
                                                <H5>Add Features : -</H5>
                                                <span class="text_one"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textName'>Remove</button>
                                                <br>
                                                <span class="text_two"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameTwo'>Remove</button>
                                              
                                                <br>
                                                <span class="text_three"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameThree'>Remove</button>
                                              
                                                <br>
                                                <span class="color_one"></span>
                                                <span class="color_price"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm colorRemove'>Remove</button>
                                              
                                                <br>
                                                <span class="clip_art"></span>
                                                <span class="clip_art_price"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm clipArtRemove'>Remove</button>
                                              
                                                <br>
                                                <span class="upload_image"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm uploadRemove'>Remove</button>
                                              
                                                

                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="col-md-6">

                                 <div id="accordion">
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseOne" aria-expanded="true">
                                          <span><a class="card-link" data-toggle="collapse"
                                             href="#collapseOne">
                                          Text
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseOne" class="collapse show"
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="accordion-body">
                                                
                                                <div class="form-group">
                                                    
                                                   <div class="row text_line_style">
                                                      <div class="col-md-10">
                                                      <span>
                                                   Text Line One </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title" maxlength="25">
                                                   <p>25 character(s) left</p>
                                                      </div>
                                                     <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" class="text_size form-control" name="size" placeholder="20">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   
                                                      <div class="row">
                                                       <div class="col-md-10">
                                                          <span>
                                                            Text Line Two </span>
                                                            <input class="form-control" name="name"
                                                               type="text" id="text_title_two" maxlength="25">
                                                      </div>
                                                <!--      <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom1 form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left1 form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right1 form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" class="text_size1 form-control" placeholder="20" name="size">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="row">
                                                          <div class="col-md-10">
                                                       <span>
                                                   Text Line Three </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_three" maxlength="25">
                                                            
                                                     </div>
                                                       <!--   <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="text_bottom2 form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="text_left2 form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="text_right2 form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Size
                                                            <input type="text" placeholder="20" class="text_size2 form-control" name="size">
                                                         </div>
                                                      </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="">Choose Text Font / Color</label>
                                                    <select name="text_choose" id="" class="form-control" onchange="myFunctionText(this.value)">
                                                        <option value="">Select</option>
                                                        <option value="1">Font</option>
                                                        <option value="2">Color</option>
                                                    </select>
                                                   
                                                </div> -->
                                                <div class="form-group text_font">
                                                    <span>
                                                        Font
                                                   </span>
                                                   <select name="font_id" id="font_id"
                                                      getparent="parent_id"
                                                      class="form-control"
                                                      data-dependent="sub_category_id"
                                                      tabindex="-1" aria-hidden="true">
                                                      <option value="">Select Font
                                                      </option>
                                                      @foreach($text as $key=>$textData)
                                                      <option value="1">{{$textData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group text_color">
                                                    <span>Color</span>
                                                   <select name="font_id" class="form-control color_r" onchange="myFunctionColor(this.value)">
                                                      <option value="" price="">Select Color
                                                      </option>
                                                      @foreach($color as $key=>$colorData)
                                                      <option id="clr_pr{{$colorData->color_id}}" price="{{$colorData->price}}" name="{{$colorData->name}}"
                                                       value="{{$colorData->color_id}}">{{$colorData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseTwo" aria-expanded="true">
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseTwo">
                                          Clip Arts
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseTwo" class="collapse "
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-md-12">
                                                <div class="accordion-body">
                                                <h6>Please choose one design:</h6>
                                                @foreach($clipArt as $key=>$clipData)
                                                <div class="column">
                                                   <img class="w-25 float-left"
                                                      src="{{$clipData->image}}"
                                                      alt="Snow" id="clipName{{$clipData->clip_id}}" clip_name="{{$clipData->name}}" onclick="myFunction(this.src,{{$clipData->clip_id}},{{$clipData->price}},this.clip_name)"> 
                                                </div>
                                                @endforeach
                                             </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="clip_top form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="clip_bottom form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="clip_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="clip_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" class="clip_width form-control"  placeholder="120" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="clip_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                            
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseThree" aria-expanded="true">
                                         
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseThree">
                                          Upload images
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseThree" class="collapse"
                                          data-parent="#accordion">
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="card-body">
                                                   <div class="accordion-body">
                                                      <div class="form-group">
                                                         <label for="image_path"
                                                            class="textfont">Upload Your Own
                                                         designs :</label>
                                                         <input type="file" accept="image/*" class="uploadImg" onchange="loadFile(event)">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="upload_top form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="upload_bottom form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="upload_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="upload_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" class="upload_width form-control" placeholder="20" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                         </div>
                                       </div>
                                      
                                    </div>
                                  
                                 </div>
                                 <div class="ml-3 my-3 text-right">
                                    <button type="button" class="btn responsive-content cancel"
                                       onclick="closeForm()">Skip
                                    & Save With Front</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @if($productImageLists->ViewTypeId == 2)
                 @include('templates.default.screen.product_customise_details_back')
                  @endif
                  @if($productImageLists->ViewTypeId == 3)
                  @include('templates.default.screen.product_customise_details_left')

                  @endif
                  @if($productImageLists->ViewTypeId == 4)
                  @include('templates.default.screen.product_customise_details_right')

                  @endif
                  @endforeach
               </div>
            </div>
           
         </div>
         <div class="col-md-4">
            <div class="product__info">
               <div class="product__wishlist-compare">
                  <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                     <svg width="16px" height="16px">
                        <use xlink:href="{{ asset('images/sprite.svg') }}#wishlist-16"></use>
                     </svg>
                  </button>
                  <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                     <svg width="16px" height="16px">
                        <use xlink:href="{{ asset('images/sprite.svg') }}#compare-16"></use>
                     </svg>
                  </button>
               </div>
               <h3 class="product__name">{{ $productDetails->prod_name ?? '-' }}</h3>
               <div class="product__description">{!! $productDetails->prod_description ?? '-' !!}</div>
               <ul class="product__features">
                  <li>Speed: 750 RPM</li>
                  <li>Power Source: Cordless-Electric</li>
                  <li>Battery Cell Type: Lithium</li>
                  <li>Voltage: 20 Volts</li>
                  <li>Battery Capacity: 2 Ah</li>
               </ul>
               <ul class="product__meta">
                  <li class="product__meta-availability">Availability:
                     @if($productDetails->total_stock>5)
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
                  <li>Brand: <a href="#">{{ $productDetails->brandData->brand_name }}</a></li>
               </ul>
            </div>
            <div class="product__sidebar">
               <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
               <div class="product__prices">
                  <span class="c_pric d-none">{{$productDetails['prod_price']}}</span>
                  {{CurrencySymbol()}}<span class="c_price">{{$productDetails['prod_price']}}</span>
                  &nbsp;
                  <strike>{{CurrencySymbol()}}{{$productDetails['mrp_price']}}</strike>
                  &nbsp;
                  <span>
                  @php 
                  $sale = $productDetails['prod_price']*100;
                  $regular_price = $sale / $productDetails['mrp_price'];
                  echo (100 - round($regular_price));
                  @endphp
                  %OFF
                  </span>
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
                  <input type="hidden" name="image" value="{{count($productDetails->imagess)>0?asset($productDetails->imagess[0]->image):null}}">
                  <div class="form-group product__option">
                     <label class="product__option-label" for="product-quantity">Quantity</label>
                     <div class="product__actions">
                        <div class="product__actions-item">
                           <div class="input-number product__quantity">
                              <input name="quantity" id="product-quantity"
                                 class="input-number__input form-control form-control-lg"
                                 type="number" min="1" 
                                 value="{{$cart_product == null?'1':$cart_product['quantity']}}" max="{{$productDetails->total_stock}}">
                              <div class="input-number__add"></div>
                              <div class="input-number__sub"></div>
                           </div>
                        </div>
                        <div class="product__actions-item product__actions-item--addtocart">
                           <button type="submit" class="btn btn-primary btn-lg" data-product_name="" data-product_price="" data-quantity="1" data-image="" @if($productDetails->total_stock==0) disabled  @endif>{{$label}}</button>
                        </div>
                        <div class="product__actions-item product__actions-item--wishlist">
                           <a href="{{ URL::to('customer/addToCarts') }}"><button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Go to cart">
                           <i class="fa fa-shopping-cart"></i>
                           </button></a>
                           @if($wishlist_product == null)
                           <button class="btn btn-secondary btn-svg-icon btn-lg" type="button" data-name="add_featured_wish-{{$productDetails->id}}" onclick="addToWishlist(this,{{$productDetails->id}})" data-toggle="tooltip" title="Add to wishlist"> <i class="fa fa-heart"></i> </button>
                           @else
                           <button class="btn btn-secondary btn-svg-icon btn-lg" type="button" data-name="remove_featured_product-{{$wishlist_product['id']}}" onclick="removeToWishlist(this,{{$wishlist_product['id']}})" data-toggle="tooltip" title="Remove from wishlist"> <i class="far fa-heart"></i> </button>
                           @endif
                           <!--  <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                              <i class="fa fa-heart"></i>
                              </button> -->
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="product product--layout--standard" data-layout="standard">
         <div class="product__content">
            <!-- .product__gallery -->
         </div>
      </div>
      <!-- 
         Description Details
         -->
      <div class="product-tabs product-tabs--sticky">
         <div class="product-tabs__list">
            <div class="product-tabs__list-body">
               <div class="product-tabs__list-container container">
                  <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a>
                  <a href="#tab-specification" class="product-tabs__item">Specification</a>
                  <a href="#tab-reviews" class="product-tabs__item">Datasheet</a>
                  <a href="#tab-video" class="product-tabs__item">Video</a>
               </div>
            </div>
         </div>
         <div class="product-tabs__content">
            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
               <div class="typography">
                  {!! $productDetails->prod_details ?? 'Description not available' !!}
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-specification">
               <div class="spec">
                  {!! $productDetails->prod_specification ?? 'Specification not available' !!}
               </div>
               <div class="spec">
                  <h6>Technical Bullets:</h6>
                  @foreach($technical_bullet as $technical)
                  <ul>
                     <?php if(!empty($technical['technical_bullets1'])){?>
                     <li><?php echo $technical['technical_bullets1']; ?> </li>
                     <?php } ?>  
                     <?php if(!empty($technical['technical_bullets2'])){?>
                     <li><?php echo $technical['technical_bullets2']; ?> </li>
                     <?php } ?> 
                     <?php if(!empty($technical['technical_bullets3'])){?>
                     <li><?php echo $technical['technical_bullets3']; ?> </li>
                     <?php } ?>               
                     <?php if(!empty($technical['technical_bullets4'])){?>
                     <li><?php echo $technical['technical_bullets4']; ?> </li>
                     <?php } ?>
                     <?php if(!empty($technical['technical_bullets5'])){?>
                     <li><?php echo $technical['technical_bullets5']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets6'])){?>
                     <li><?php echo $technical['technical_bullets6']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets7'])){?>
                     <li><?php echo $technical['technical_bullets7']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets8'])){?>
                     <li><?php echo $technical['technical_bullets8']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets9'])){?>
                     <li><?php echo $technical['technical_bullets9']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets10'])){?>
                     <li><?php echo $technical['technical_bullets10']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets11'])){?>
                     <li><?php echo $technical['technical_bullets11']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets12'])){?>
                     <li><?php echo $technical['technical_bullets12']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets13'])){?>
                     <li><?php echo $technical['technical_bullets13']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets14'])){?>
                     <li><?php echo $technical['technical_bullets14']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets15'])){?>
                     <li><?php echo $technical['technical_bullets15']; ?> </li>
                     <?php } ?>                       
                  </ul>
                  @endforeach
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-reviews">
               <div class="reviews-view">
                  <div class="reviews-view__list">
                     @if($productDetails->prod_pdf)
                     <a href="{{ $productDetails->prod_pdf }}" download="{{ $productDetails->prod_pdf }}" target="_blank"><i class="fa fa-file-pdf" style="font-size:48px;color:red"></i><button class="btn btn-link">Download Pdf</button></a>
                     @else
                     PDF not available
                     @endif
                  </div>
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-video" style="text-align: center;">
               <div class="reviews-view">
                  <div class="reviews-view__list">
                     @if($productDetails->prod_video_url)
                     <iframe width="600" height="345" src="{{$productDetails->prod_video_url}}">
                     </iframe>
                     @else
                     Video not available
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if(count($related_product)>0)
<div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
   <div class="container">
      <div class="block-header">
         <h3 class="block-header__title">Related Products</h3>
         <div class="block-header__divider"></div>
         <div class="block-header__arrows-list">
            <button class="block-header__arrow block-header__arrow--left" type="button">
               <svg width="7px" height="11px">
                  <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-left-7x11"></use>
               </svg>
            </button>
            <button class="block-header__arrow block-header__arrow--right" type="button">
               <svg width="7px" height="11px">
                  <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-7x11"></use>
               </svg>
            </button>
         </div>
      </div>
      <div class="block-products-carousel__slider">
         <div class="block-products-carousel__preloader"></div>
         <div class="owl-carousel">
            @foreach($related_product as $featureProduct)
            <div class="block-products-carousel__column">
               <div class="block-products-carousel__cell">
                  <div class="product-card product-card--hidden-actions">
                     <!-- <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                        </button> -->
                     <div class="product-card__badges-list"> </div>
                     <div class="product-card__image product-image"><a href="{{ URL::to('/product', $featureProduct['id']) }}" class="product-image__body"><img class="product-image__img" src="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:asset('images/no-image.jpg')}}" alt=""></a></div>
                     <div class="product-card__info">
                        <div class="product-card__name"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></div>
                        <div class="product-card__rating"> </div>
                        <ul class="product-card__features-list">
                           <li>Speed: 750 RPM</li>
                           <li>Power Source: Cordless-Electric</li>
                           <li>Battery Cell Type: Lithium</li>
                           <li>Voltage: 20 Volts</li>
                           <li>Battery Capacity: 2 Ah</li>
                        </ul>
                     </div>
                     <div class="product-card__actions">
                        <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                        <div class="product-card__prices">
                           <!-- {{CurrencySymbol()}}{{$featureProduct['prod_price']}} -->
                           <span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}</span>
                           &nbsp;
                           &nbsp;
                           <strike>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}</strike>
                           &nbsp;
                           &nbsp;
                           <span>
                           @php 
                           $sale = $featureProduct['prod_price']*100;
                           $regular_price = $sale / $featureProduct['mrp_price'];
                           echo (100 - round($regular_price));
                           @endphp
                           %OFF
                           </span>
                        </div>
                        <div class="product-card__buttons">
                           @php 
                           $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
                           $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
                           @endphp
                           @if($cart_product == null)
                           <button class="btn btn-primary product-card__addtocart" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
                           @else
                           <a class="btn btn-primary product-card__addtocart" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                           @endif
                           @if($cart_product == null)
                           <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
                           @else
                           <a class="btn btn-primary product-card__addtocart product-card__addtocart--list" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                           @endif
                           @if($wishlist_product == null)
                           <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" data-name="add_featured_wish-{{$featureProduct['id']}}" onclick="addToWishlist(this,{{$featureProduct['id']}})" data-toggle="tooltip" title="Add to wishlist"> <i class="fa fa-heart"></i> </button>
                           @else
                           <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" data-name="remove_featured_product-{{$wishlist_product['id']}}" onclick="removeToWishlist(this,{{$wishlist_product['id']}})" data-toggle="tooltip" title="Remove from wishlist"> <i class="far fa-heart"></i> </button>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endif
@else
<div class="block">
   <div class="container">
      <h1>No Product Found</h1>
   </div>
</div>
@endif
@endsection
@push('scripts')
<script>
   function myFunction(id,name,price,names) {
       $('.clip_im').show();
       $('#clipImage').attr("src",id);
      //  $('#clipImage').attr("src",clip_name);
      var clpName = $('#clipName'+name).attr("clip_name");
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
       $('.clip_art').html("Clip Art Name : - " + clpName);
       $('.clip_art_price').html(" , Clip Art Price : - " + price);
       $('.clipArtRemove').show();
       $('div#slider').show();
       $( ".resizable-div" ).show();

      }
      $('.clipArtRemove').click(function(){
         $('.clip_art,.clip_art_price').empty();
         $('#clipImage,.clip_im').hide();
         $('.clipArtRemove').hide();
      })


   function myFunction1(id,name,price) {
       $('.clip_im1').show();
       $('#clipImage1').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction2(id,name,price) {
       $('.clip_im2').show();
       $('#clipImage2').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction3(id,name,price) {
       $('.clip_im3').show();
       $('#clipImage3').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
//    color hide and show
   function myFunctionText(text) {
    if(text == '1')
    {
        $('.text_font').show();
        $('.text_color').hide();

    }
    else if(text == '2')
    {
        $('.text_color').show();
        $('.text_font').hide();

    }
      
   }
//    text
   $('#text_title').keyup("on",function(){
       var text = $(this).val();
       $('.title_one').text(text);
       $('.title_one').show();
       $('.text_one').html("Text First : - " + text );
       $('.textName').show();
       $('.text_one').show();
   })
   $('.textName').click(function(){
      $('.text_one,.title_one').hide();
      $('#text_title').val('');
      $('.textName').hide();

   })

   $('#text_title_two').keyup("on",function(){
       var text = $(this).val();
       $('.title_two').text(text);
       $('.title_two').show();
       $('.text_two').show();

       $('.text_two').html("Text Second : - " + text);
       $('.textNameTwo').show();

   })
   $('.textNameTwo').click(function(){
      $('.text_two,.title_two').hide();
      $('#text_title_two').val('');
      $('.textNameTwo').hide();

   })

   $('#text_title_three').keyup("on",function(){
       var text = $(this).val();
       $('.title_three').show();
       $('.text_three').show();
       $('.title_three').text(text);
       $('.text_three').html("Text Third : - " + text);
       $('.textNameThree').show();

   })
   $('.textNameThree').click(function(){
      $('.text_three,.title_three').hide();
      $('#text_title_three').val('');
      $('.textNameThree').hide();

   })
   function myFunctionColor(id)
   {
     var color = $('#clr_pr'+id).attr('name')
     var price = $('#clr_pr'+id).attr('price')
   //   var colr = "color:"+color;
     $('.title_one').css("color",color);
     $('.title_two').css("color",color);
     $('.title_three').css("color",color);
     $('.color_one').html("Color Name : - " + color);
     $('.color_price').html(", Color Price : - " + price);
     $('.colorRemove').show();
     $('.color_one').show();
     $('.color_price').show();
   }
   $('.colorRemove').click(function(){
      $('.title_one').css("color","inherit");
     $('.title_two').css("color","inherit");
     $('.title_three').css("color","inherit"); 
          $('.color_r').val('');
      $('.colorRemove,.color_one,.color_price').hide();

   })

   // text line one
   $('.text_size').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
      //  $('.title_one').attr("style",size);
       $('.title_one').css("font-size", size);

   })
   $('.text_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
      
       $('.title_one').css("right", right);

   })
   $('.text_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_one').css("left", left);

   })
   $('.text_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_one').css("top", top);

   })
   $('.text_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_one').css("bottom", bottom);

   })

   //
   $('.text_size1').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_two').css("font-size", size);

   })
   $('.text_right1').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_two').css("right", right);

   })
   $('.text_left1').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_two').css("left", left);

   })
   $('.text_top1').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_two').css("top", top);

   })
   $('.text_bottom1').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_two').css("bottom", bottom);

   })

   //
   $('.text_size2').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_three').css("font-size", size);

   })
   $('.text_right2').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_three').css("right", right);

   })
   $('.text_left2').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_three').css("left", left);

   })
   $('.text_top2').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_three').css("top", top);

   })
   $('.text_bottom2').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_three').css("bottom", bottom);

   })
   //
   $('.clip_width').keyup("on",function(){
       var width = $(this).val();

       var width = width+"px";
       $('#clipImage').css("cssText", "width: "+width+" !important;");
      $('#clipImage').css("display","block");
   })
   $('.clip_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('#clipImage').css("right",right);

   })
   $('.clip_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('#clipImage').css("left", left);

   })
   $('.clip_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('#clipImage').css("top", top);

   })
   $('.clip_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('#clipImage').css("bottom", bottom);

   })
   //upload
   $('.upload_width').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('.output').css("cssText", "width: "+width+" !important;");
      $('.output').css("display","block");
   })
   $('.upload_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.output').css("right",right);

   })
   $('.upload_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.output').css("left", left);

   })
   $('.upload_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.output').css("top", top);

   })
   $('.upload_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.output').css("bottom", bottom);

   })
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $('.output').show();
      $('.upload_image').html("Upload Image Price : -" + 100);
      $('.uploadRemove').show();
      $( ".resizable-div" ).show();

    }
  };
  $('.uploadRemove').click(function(){
         $('.upload_image').empty();
         $('.output').hide();
         $('.uploadImg').val('');

         $('.uploadRemove').hide();
      })
</script>
<script>
   function moveDIV(action) {
	switch(action) {
		case "up":
			$('#movable').animate({'marginTop' : "-=15px"});
		break;
		case "left":
			$('#movable').animate({'marginLeft' : "-=15px"});
		break;
		case "right":
			$('#movable').animate({'marginLeft' : "+=15px"});
		break;
		case "down":
			$('#movable').animate({'marginTop' : "+=15px"});
		break;
	}
}

$(".title_one").draggable();
$(".title_two").draggable();
$(".title_three").draggable();
$(".output").draggable();
$("#clipImage").draggable();

</script>

<script>
   
      $('.clip_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotate(rotationAngle);

      
   })
      function rotate(rotationAngle) {
	   $('.imgRot').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
</script>


@endpush






































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
   .nav-tabs .nav-link {
    padding: 1.2rem 12px!important;
    er: 0;
    border-bottom: 2px solid transparent;
    color: #282d3b;
    font-weight: 700;
    font-size: 1.4rem;
    line-height: 1;
    font-family: Poppins, sans-serif;
    text-transform: uppercase;
    border-radius: 0px;
    /* background: red; */
}
ul.nav.nav-tabs {
    width: 50%;
    border-radius: 0;
    background: #06aaef!important;
}
.nav {
    background-color: #a0a0a0!important;
    color: rgb(255, 255, 255);
    border-radius: 5px;
}
   .next {
   background-color: #004aff;
   color: #fff;
   }
   .cancel {
   background-color: red;
   color: #fff;
   }
   .nav{
   background-color:#007bff;
   color: rgb(255, 255, 255);
   border-radius: 5px;
   }
   .nav-link, .nav-link:hover {
   color: #ffffff;
   font-weight: bold;
   text-transform: uppercase;
   }
   .card-link {
   /* color: Blue; */
   font-weight: bold;
   text-transform: uppercase;
   }
   label {
   color: #007bff;
   font-weight: bold;
   /* text-transform: uppercase; */
   }
   .card-header .accicon {
   float: right;
   font-size: 20px;
   width: 1.2em;
   }
   .card-header {
   cursor: move;
   border-bottom: none;
   }
   .card {
   border: 1px solid #ddd;
   }
   /* .card-header:not(.collapsed) .rotate-icon {
   transform: rotate(180deg);
   } */
   .textName
,.textNameTwo
,.textNameThree
,.clipArtRemove
,.uploadRemove
,.colorRemove{
      display:none;
   }
   .clip_im{
      display:none;
      position: absolute;
    top: 10px;
    right: 0;
    text-align: center;
    margin: 0 auto;
   }
   /* .img_position{
      top: 10px;
    right: 0;
    text-align: center;
    margin: 0 auto;
      position:absolute;
   } */
   .clip_text{
   position: absolute;
    top: 50px;
    /* right: 0; */
    font-size: 21px;
    /* margin: 0 auto; */
    left: 0;
    text-align: center;
    z-index: 1000000000;
   }
   .clip_im1{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .output{
   display: none; 
   position: absolute;
    top: 0px;
    /* right: -22px; */
    /* width: 250%; */
    /* right: 0; */
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_im2{
   display: none; 
   position: relative;
   top: -160px;
   right: 14px;
   width: 200%;
   }
   .clip_im3{
   display: none; 
   position: relative;
   top: -150px;
   right: -160px;
   width: 200%;
   }
   .form-control {
    padding-left: 1.2rem;
    height: 32px;
    margin-bottom: 1rem;
    transition: all 0.3s;
    border: 1px solid #dfdfdf;
    border-radius: 0;
    background-color: #fff;
    color: #777;
    font-family: "Open Sans", sans-serif;
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
}
select.form-control:not([size]):not([multiple]) {
    height: 3rem;
}
.text_font{
    display:block;
}
.text_color{
    display:block;
}
.text_line_style>div>span{
   cursor:move;
}
   @media (max-width: 576px) {
   .responsive-content {
   font-size: 3vw;
   }
   }
</style>


<div class="page-header">
   <div class="page-header__container container">
      <div class="page-header__breadcrumb">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{url('/')}}">Home</a>
                  <svg class="breadcrumb-arrow" width="6px" height="9px">
                     <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-6x9"></use>
                  </svg>
               </li>
               <li class="breadcrumb-item">
                  <a href="#">{{ $productDetails->brandData->brand_name }}</a>
                  <svg class="breadcrumb-arrow" width="6px" height="9px">
                     <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-6x9"></use>
                  </svg>
               </li>
               <li class="breadcrumb-item active" aria-current="page">{{ $productDetails->prod_slug ?? '-' }}</li>
               @if($productDetails['custom_product'] == 1)
               <li class="breadcrumb-item" style="position:absolute;right: 30px;">
                  <a href="{{url('product/'.$productDetails->id)}}">
                  Back
                  </a>
               </li>
               @endif
            </ol>
         </nav>
      </div>
   </div>
</div>
@if(!empty($productDetails))
<div class="block">
   <div class="container">
      @include('flash::message')
      <div class="row mt-4">
            <div class="col-md-8">
            <div class="">
               <ul class="nav nav-tabs" role="tablist">
                  @foreach($productDetails->imagess as $productImageLists)
                  @if($productImageLists->ViewTypeId == '1')
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#home">Front</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '2')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu1">Back</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '3')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu2">Left</a>
                  </li>
                  @endif
                  @if($productImageLists->ViewTypeId == '4')
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#menu3">Right</a>
                  </li>
                  @endif
                  @endforeach
               </ul>
            </div>
            <div class="">
               <div class="tab-content">
                  @foreach($productDetails->imagess as $productImageLists)
                  @if($productImageLists->ViewTypeId == 1)
                  <div id="home" class="container-fluid tab-pane active">
                     <br>
                     <div id="Front" class="tabcontent">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                    <div class="row">
                                   
                                        <div class="col-md-12">
                                           <div class="">
                                                <img class=" w-100"
                                                 src="{{Asset($productImageLists->image)}}"
                                                 alt="Girl in a jacket">
                                                <div class="column clip_text ">
                                                   <p class="title_one" style="position:relative; cursor:move;"></p>
                                                   
                                                   <p class="title_two" style="position:relative;cursor:move;"></p>
                                                  
                                                   <p class="title_three" style="position:relative;cursor:move;"></p>
                                                </div>
                                                 <div class="column clip_im" width="160px"> 
                                                      <img class="w-25 float-left  imgRot   "
                                                      src="" alt="Snow" id="clipImage" style="position:relative;cursor:move;"> 
                                                   </div>
                                                <div class="column output" width="160px"> 
                                                      <img id="output" class="" style="width:80px;cursor:move;" />
                                                </div>
                                               
                                           </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="">
                                                <H5>Add Features : -</H5>
                                                <span class="text_one"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textName'>Remove</button>
                                                <br>
                                                <span class="text_two"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameTwo'>Remove</button>
                                              
                                                <br>
                                                <span class="text_three"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameThree'>Remove</button>
                                              
                                                <br>
                                                <span class="color_one"></span>
                                                <span class="color_price"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm colorRemove'>Remove</button>
                                              
                                                <br>
                                                <span class="clip_art"></span>
                                                <span class="clip_art_price"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm clipArtRemove'>Remove</button>
                                              
                                                <br>
                                                <span class="upload_image"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm uploadRemove'>Remove</button>
                                              
                                                

                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="col-md-6">

                                 <div id="accordion">
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseOne" aria-expanded="true">
                                          <span><a class="card-link" data-toggle="collapse"
                                             href="#collapseOne">
                                          Text
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseOne" class="collapse show"
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="accordion-body">
                                                
                                                <div class="form-group">
                                                    
                                                   <div class="row text_line_style">
                                                      <div class="col-md-7">
                                                      <span>
                                                   Text Line One </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title" maxlength="25">
                                                   <p>25 character(s) left</p>
                                                      </div>
                                                     <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" class="text_size form-control" name="size" placeholder="20">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textOne_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   
                                                      <div class="row">
                                                       <div class="col-md-7">
                                                          <span>
                                                            Text Line Two </span>
                                                            <input class="form-control" name="name"
                                                               type="text" id="text_title_two" maxlength="25">
                                                      </div>
                                                <!--      <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom1 form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left1 form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right1 form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" class="text_size1 form-control" placeholder="20" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textTwo_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="row">
                                                          <div class="col-md-7">
                                                       <span>
                                                   Text Line Three </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_three" maxlength="25">
                                                            
                                                     </div>
                                                       <!--   <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="text_bottom2 form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="text_left2 form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="text_right2 form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Size
                                                            <input type="text" placeholder="20" class="text_size2 form-control" name="size">
                                                         </div>
                                                         <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textThree_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                      </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="">Choose Text Font / Color</label>
                                                    <select name="text_choose" id="" class="form-control" onchange="myFunctionText(this.value)">
                                                        <option value="">Select</option>
                                                        <option value="1">Font</option>
                                                        <option value="2">Color</option>
                                                    </select>
                                                   
                                                </div> -->
                                                <div class="form-group text_font">
                                                    <span>
                                                        Font
                                                   </span>
                                                   <select name="font_id" id="font_id"
                                                      getparent="parent_id"
                                                      class="form-control"
                                                      data-dependent="sub_category_id"
                                                      tabindex="-1" aria-hidden="true">
                                                      <option value="">Select Font
                                                      </option>
                                                      @foreach($text as $key=>$textData)
                                                      <option value="1">{{$textData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group text_color">
                                                    <span>Color</span>
                                                   <select name="font_id" class="form-control color_r" onchange="myFunctionColor(this.value)">
                                                      <option value="" price="">Select Color
                                                      </option>
                                                      @foreach($color as $key=>$colorData)
                                                      <option id="clr_pr{{$colorData->color_id}}" price="{{$colorData->price}}" name="{{$colorData->name}}"
                                                       value="{{$colorData->color_id}}">{{$colorData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseTwo" aria-expanded="true">
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseTwo">
                                          Clip Arts
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseTwo" class="collapse "
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-md-12">
                                                <div class="accordion-body">
                                                <h6>Please choose one design:</h6>
                                                @foreach($clipArt as $key=>$clipData)
                                                <div class="column">
                                                   <img class="w-25 float-left"
                                                      src="{{$clipData->image}}"
                                                      alt="Snow" id="clipName{{$clipData->clip_id}}" clip_name="{{$clipData->name}}" onclick="myFunction(this.src,{{$clipData->clip_id}},{{$clipData->price}},this.clip_name)"> 
                                                </div>
                                                @endforeach
                                             </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="clip_top form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="clip_bottom form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="clip_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="clip_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" class="clip_width form-control"  placeholder="120" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="clip_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                            
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseThree" aria-expanded="true">
                                         
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseThree">
                                          Upload images
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseThree" class="collapse"
                                          data-parent="#accordion">
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="card-body">
                                                   <div class="accordion-body">
                                                      <div class="form-group">
                                                         <label for="image_path"
                                                            class="textfont">Upload Your Own
                                                         designs :</label>
                                                         <input type="file" accept="image/*" class="uploadImg" onchange="loadFile(event)">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="upload_top form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="upload_bottom form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="upload_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="upload_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" class="upload_width form-control" placeholder="20" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="upload_rotate form-control"  placeholder="120" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                         </div>
                                       </div>
                                      
                                    </div>
                                  
                                 </div>
                                 <div class="ml-3 my-3 text-right">
                                    <button type="button" class="btn responsive-content cancel"
                                       onclick="closeForm()">Skip
                                    & Save With Front</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @if($productImageLists->ViewTypeId == 2)
                 @include('templates.default.screen.product_customise_details_back')
                  @endif
                  @if($productImageLists->ViewTypeId == 3)
                  @include('templates.default.screen.product_customise_details_left')

                  @endif
                  @if($productImageLists->ViewTypeId == 4)
                  @include('templates.default.screen.product_customise_details_right')

                  @endif
                  @endforeach
               </div>
            </div>
           
         </div>
         <div class="col-md-4">
            <div class="product__info">
               <div class="product__wishlist-compare">
                  <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                     <svg width="16px" height="16px">
                        <use xlink:href="{{ asset('images/sprite.svg') }}#wishlist-16"></use>
                     </svg>
                  </button>
                  <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                     <svg width="16px" height="16px">
                        <use xlink:href="{{ asset('images/sprite.svg') }}#compare-16"></use>
                     </svg>
                  </button>
               </div>
               <h3 class="product__name">{{ $productDetails->prod_name ?? '-' }}</h3>
               <div class="product__description">{!! $productDetails->prod_description ?? '-' !!}</div>
               <ul class="product__features">
                  <li>Speed: 750 RPM</li>
                  <li>Power Source: Cordless-Electric</li>
                  <li>Battery Cell Type: Lithium</li>
                  <li>Voltage: 20 Volts</li>
                  <li>Battery Capacity: 2 Ah</li>
               </ul>
               <ul class="product__meta">
                  <li class="product__meta-availability">Availability:
                     @if($productDetails->total_stock>5)
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
                  <li>Brand: <a href="#">{{ $productDetails->brandData->brand_name }}</a></li>
               </ul>
            </div>
            <div class="product__sidebar">
               <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
               <div class="product__prices">
                  <span class="c_pric d-none">{{$productDetails['prod_price']}}</span>
                  {{CurrencySymbol()}}<span class="c_price">{{$productDetails['prod_price']}}</span>
                  &nbsp;
                  <strike>{{CurrencySymbol()}}{{$productDetails['mrp_price']}}</strike>
                  &nbsp;
                  <span>
                  @php 
                  $sale = $productDetails['prod_price']*100;
                  $regular_price = $sale / $productDetails['mrp_price'];
                  echo (100 - round($regular_price));
                  @endphp
                  %OFF
                  </span>
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
                  <input type="hidden" name="image" value="{{count($productDetails->imagess)>0?asset($productDetails->imagess[0]->image):null}}">
                  <div class="form-group product__option">
                     <label class="product__option-label" for="product-quantity">Quantity</label>
                     <div class="product__actions">
                        <div class="product__actions-item">
                           <div class="input-number product__quantity">
                              <input name="quantity" id="product-quantity"
                                 class="input-number__input form-control form-control-lg"
                                 type="number" min="1" 
                                 value="{{$cart_product == null?'1':$cart_product['quantity']}}" max="{{$productDetails->total_stock}}">
                              <div class="input-number__add"></div>
                              <div class="input-number__sub"></div>
                           </div>
                        </div>
                        <div class="product__actions-item product__actions-item--addtocart">
                           <button type="submit" class="btn btn-primary btn-lg" data-product_name="" data-product_price="" data-quantity="1" data-image="" @if($productDetails->total_stock==0) disabled  @endif>{{$label}}</button>
                        </div>
                        <div class="product__actions-item product__actions-item--wishlist">
                           <a href="{{ URL::to('customer/addToCarts') }}"><button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Go to cart">
                           <i class="fa fa-shopping-cart"></i>
                           </button></a>
                           @if($wishlist_product == null)
                           <button class="btn btn-secondary btn-svg-icon btn-lg" type="button" data-name="add_featured_wish-{{$productDetails->id}}" onclick="addToWishlist(this,{{$productDetails->id}})" data-toggle="tooltip" title="Add to wishlist"> <i class="fa fa-heart"></i> </button>
                           @else
                           <button class="btn btn-secondary btn-svg-icon btn-lg" type="button" data-name="remove_featured_product-{{$wishlist_product['id']}}" onclick="removeToWishlist(this,{{$wishlist_product['id']}})" data-toggle="tooltip" title="Remove from wishlist"> <i class="far fa-heart"></i> </button>
                           @endif
                           <!--  <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                              <i class="fa fa-heart"></i>
                              </button> -->
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="product product--layout--standard" data-layout="standard">
         <div class="product__content">
            <!-- .product__gallery -->
         </div>
      </div>
      <!-- 
         Description Details
         -->
      <div class="product-tabs product-tabs--sticky">
         <div class="product-tabs__list">
            <div class="product-tabs__list-body">
               <div class="product-tabs__list-container container">
                  <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a>
                  <a href="#tab-specification" class="product-tabs__item">Specification</a>
                  <a href="#tab-reviews" class="product-tabs__item">Datasheet</a>
                  <a href="#tab-video" class="product-tabs__item">Video</a>
               </div>
            </div>
         </div>
         <div class="product-tabs__content">
            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
               <div class="typography">
                  {!! $productDetails->prod_details ?? 'Description not available' !!}
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-specification">
               <div class="spec">
                  {!! $productDetails->prod_specification ?? 'Specification not available' !!}
               </div>
               <div class="spec">
                  <h6>Technical Bullets:</h6>
                  @foreach($technical_bullet as $technical)
                  <ul>
                     <?php if(!empty($technical['technical_bullets1'])){?>
                     <li><?php echo $technical['technical_bullets1']; ?> </li>
                     <?php } ?>  
                     <?php if(!empty($technical['technical_bullets2'])){?>
                     <li><?php echo $technical['technical_bullets2']; ?> </li>
                     <?php } ?> 
                     <?php if(!empty($technical['technical_bullets3'])){?>
                     <li><?php echo $technical['technical_bullets3']; ?> </li>
                     <?php } ?>               
                     <?php if(!empty($technical['technical_bullets4'])){?>
                     <li><?php echo $technical['technical_bullets4']; ?> </li>
                     <?php } ?>
                     <?php if(!empty($technical['technical_bullets5'])){?>
                     <li><?php echo $technical['technical_bullets5']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets6'])){?>
                     <li><?php echo $technical['technical_bullets6']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets7'])){?>
                     <li><?php echo $technical['technical_bullets7']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets8'])){?>
                     <li><?php echo $technical['technical_bullets8']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets9'])){?>
                     <li><?php echo $technical['technical_bullets9']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets10'])){?>
                     <li><?php echo $technical['technical_bullets10']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets11'])){?>
                     <li><?php echo $technical['technical_bullets11']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets12'])){?>
                     <li><?php echo $technical['technical_bullets12']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets13'])){?>
                     <li><?php echo $technical['technical_bullets13']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets14'])){?>
                     <li><?php echo $technical['technical_bullets14']; ?> </li>
                     <?php } ?>   
                     <?php if(!empty($technical['technical_bullets15'])){?>
                     <li><?php echo $technical['technical_bullets15']; ?> </li>
                     <?php } ?>                       
                  </ul>
                  @endforeach
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-reviews">
               <div class="reviews-view">
                  <div class="reviews-view__list">
                     @if($productDetails->prod_pdf)
                     <a href="{{ $productDetails->prod_pdf }}" download="{{ $productDetails->prod_pdf }}" target="_blank"><i class="fa fa-file-pdf" style="font-size:48px;color:red"></i><button class="btn btn-link">Download Pdf</button></a>
                     @else
                     PDF not available
                     @endif
                  </div>
               </div>
            </div>
            <div class="product-tabs__pane" id="tab-video" style="text-align: center;">
               <div class="reviews-view">
                  <div class="reviews-view__list">
                     @if($productDetails->prod_video_url)
                     <iframe width="600" height="345" src="{{$productDetails->prod_video_url}}">
                     </iframe>
                     @else
                     Video not available
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if(count($related_product)>0)
<div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
   <div class="container">
      <div class="block-header">
         <h3 class="block-header__title">Related Products</h3>
         <div class="block-header__divider"></div>
         <div class="block-header__arrows-list">
            <button class="block-header__arrow block-header__arrow--left" type="button">
               <svg width="7px" height="11px">
                  <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-left-7x11"></use>
               </svg>
            </button>
            <button class="block-header__arrow block-header__arrow--right" type="button">
               <svg width="7px" height="11px">
                  <use xlink:href="{{ asset('images/sprite.svg') }}#arrow-rounded-right-7x11"></use>
               </svg>
            </button>
         </div>
      </div>
      <div class="block-products-carousel__slider">
         <div class="block-products-carousel__preloader"></div>
         <div class="owl-carousel">
            @foreach($related_product as $featureProduct)
            <div class="block-products-carousel__column">
               <div class="block-products-carousel__cell">
                  <div class="product-card product-card--hidden-actions">
                     <!-- <button class="product-card__quickview" type="button">
                        <svg width="16px" height="16px">
                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                        </svg>
                        <span class="fake-svg-icon"></span>
                        </button> -->
                     <div class="product-card__badges-list"> </div>
                     <div class="product-card__image product-image"><a href="{{ URL::to('/product', $featureProduct['id']) }}" class="product-image__body"><img class="product-image__img" src="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:asset('images/no-image.jpg')}}" alt=""></a></div>
                     <div class="product-card__info">
                        <div class="product-card__name"><a href="{{ URL::to('/product', $featureProduct['id']) }}">{{$featureProduct['prod_name']}}</a></div>
                        <div class="product-card__rating"> </div>
                        <ul class="product-card__features-list">
                           <li>Speed: 750 RPM</li>
                           <li>Power Source: Cordless-Electric</li>
                           <li>Battery Cell Type: Lithium</li>
                           <li>Voltage: 20 Volts</li>
                           <li>Battery Capacity: 2 Ah</li>
                        </ul>
                     </div>
                     <div class="product-card__actions">
                        <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                        <div class="product-card__prices">
                           <!-- {{CurrencySymbol()}}{{$featureProduct['prod_price']}} -->
                           <span>{{CurrencySymbol()}}{{$featureProduct['prod_price']}}</span>
                           &nbsp;
                           &nbsp;
                           <strike>{{CurrencySymbol()}}{{$featureProduct['mrp_price']}}</strike>
                           &nbsp;
                           &nbsp;
                           <span>
                           @php 
                           $sale = $featureProduct['prod_price']*100;
                           $regular_price = $sale / $featureProduct['mrp_price'];
                           echo (100 - round($regular_price));
                           @endphp
                           %OFF
                           </span>
                        </div>
                        <div class="product-card__buttons">
                           @php 
                           $cart_product = AddToCart::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
                           $wishlist_product = Wishlist::where(['product_id'=>$featureProduct['id'], 'user_id' => $customerData['id']])->first();
                           @endphp
                           @if($cart_product == null)
                           <button class="btn btn-primary product-card__addtocart" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
                           @else
                           <a class="btn btn-primary product-card__addtocart" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                           @endif
                           @if($cart_product == null)
                           <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button" data-product_name="{{$featureProduct['prod_name']}}" data-product_price="{{$featureProduct['prod_price']}}" data-quantity="1" data-image="{{$featureProduct['imagess']?$featureProduct['imagess'][0]['image']:null}}" onclick="addtocart(this,{{$featureProduct['id']}})">Add To Cart</button>
                           @else
                           <a class="btn btn-primary product-card__addtocart product-card__addtocart--list" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                           @endif
                           @if($wishlist_product == null)
                           <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" data-name="add_featured_wish-{{$featureProduct['id']}}" onclick="addToWishlist(this,{{$featureProduct['id']}})" data-toggle="tooltip" title="Add to wishlist"> <i class="fa fa-heart"></i> </button>
                           @else
                           <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" data-name="remove_featured_product-{{$wishlist_product['id']}}" onclick="removeToWishlist(this,{{$wishlist_product['id']}})" data-toggle="tooltip" title="Remove from wishlist"> <i class="far fa-heart"></i> </button>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endif
@else
<div class="block">
   <div class="container">
      <h1>No Product Found</h1>
   </div>
</div>
@endif
@endsection
@push('scripts')
<script>
   function myFunction(id,name,price,names) {
       $('.clip_im').show();
       $('#clipImage').attr("src",id);
      //  $('#clipImage').attr("src",clip_name);
      var clpName = $('#clipName'+name).attr("clip_name");
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
       $('.clip_art').html("Clip Art Name : - " + clpName);
       $('.clip_art_price').html(" , Clip Art Price : - " + price);
       $('.clipArtRemove').show();
       $('div#slider').show();
       $( ".resizable-div" ).show();

      }
      $('.clipArtRemove').click(function(){
         $('.clip_art,.clip_art_price').empty();
         $('#clipImage,.clip_im').hide();
         $('.clipArtRemove').hide();
      })


   function myFunction1(id,name,price) {
       $('.clip_im1').show();
       $('#clipImage1').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction2(id,name,price) {
       $('.clip_im2').show();
       $('#clipImage2').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction3(id,name,price) {
       $('.clip_im3').show();
       $('#clipImage3').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
//    color hide and show
   function myFunctionText(text) {
    if(text == '1')
    {
        $('.text_font').show();
        $('.text_color').hide();

    }
    else if(text == '2')
    {
        $('.text_color').show();
        $('.text_font').hide();

    }
      
   }
//    text
   $('#text_title').keyup("on",function(){
       var text = $(this).val();
       $('.title_one').text(text);
       $('.title_one').show();
       $('.text_one').html("Text First : - " + text );
       $('.textName').show();
       $('.text_one').show();
   })
   $('.textName').click(function(){
      $('.text_one,.title_one').hide();
      $('#text_title').val('');
      $('.textName').hide();

   })

   $('#text_title_two').keyup("on",function(){
       var text = $(this).val();
       $('.title_two').text(text);
       $('.title_two').show();
       $('.text_two').show();

       $('.text_two').html("Text Second : - " + text);
       $('.textNameTwo').show();

   })
   $('.textNameTwo').click(function(){
      $('.text_two,.title_two').hide();
      $('#text_title_two').val('');
      $('.textNameTwo').hide();

   })

   $('#text_title_three').keyup("on",function(){
       var text = $(this).val();
       $('.title_three').show();
       $('.text_three').show();
       $('.title_three').text(text);
       $('.text_three').html("Text Third : - " + text);
       $('.textNameThree').show();

   })
   $('.textNameThree').click(function(){
      $('.text_three,.title_three').hide();
      $('#text_title_three').val('');
      $('.textNameThree').hide();

   })
   function myFunctionColor(id)
   {
     var color = $('#clr_pr'+id).attr('name')
     var price = $('#clr_pr'+id).attr('price')
   //   var colr = "color:"+color;
     $('.title_one').css("color",color);
     $('.title_two').css("color",color);
     $('.title_three').css("color",color);
     $('.color_one').html("Color Name : - " + color);
     $('.color_price').html(", Color Price : - " + price);
     $('.colorRemove').show();
     $('.color_one').show();
     $('.color_price').show();
   }
   $('.colorRemove').click(function(){
      $('.title_one').css("color","inherit");
     $('.title_two').css("color","inherit");
     $('.title_three').css("color","inherit"); 
          $('.color_r').val('');
      $('.colorRemove,.color_one,.color_price').hide();

   })

   // text line one
   $('.text_size').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
      //  $('.title_one').attr("style",size);
       $('.title_one').css("font-size", size);

   })
   $('.text_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
      
       $('.title_one').css("right", right);

   })
   $('.text_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_one').css("left", left);

   })
   $('.text_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_one').css("top", top);

   })
   $('.text_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_one').css("bottom", bottom);

   })

   //
   $('.text_size1').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_two').css("font-size", size);

   })
   $('.text_right1').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_two').css("right", right);

   })
   $('.text_left1').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_two').css("left", left);

   })
   $('.text_top1').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_two').css("top", top);

   })
   $('.text_bottom1').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_two').css("bottom", bottom);

   })

   //
   $('.text_size2').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_three').css("font-size", size);

   })
   $('.text_right2').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_three').css("right", right);

   })
   $('.text_left2').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_three').css("left", left);

   })
   $('.text_top2').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_three').css("top", top);

   })
   $('.text_bottom2').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_three').css("bottom", bottom);

   })
   //
   $('.clip_width').keyup("on",function(){
       var width = $(this).val();

       var width = width+"px";
       $('#clipImage').css("cssText", "width: "+width+" !important;");
      $('#clipImage').css("display","block");
   })
   $('.clip_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('#clipImage').css("right",right);

   })
   $('.clip_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('#clipImage').css("left", left);

   })
   $('.clip_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('#clipImage').css("top", top);

   })
   $('.clip_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('#clipImage').css("bottom", bottom);

   })
   //upload
   $('.upload_width').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('.output').css("cssText", "width: "+width+" !important;");
      $('.output').css("display","block");
   })
   $('.upload_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.output').css("right",right);

   })
   $('.upload_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.output').css("left", left);

   })
   $('.upload_top').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.output').css("top", top);

   })
   $('.upload_bottom').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.output').css("bottom", bottom);

   })
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $('.output').show();
      $('.upload_image').html("Upload Image Price : -" + 100);
      $('.uploadRemove').show();
      $( ".resizable-div" ).show();

    }
  };
  $('.uploadRemove').click(function(){
         $('.upload_image').empty();
         $('.output').hide();
         $('.uploadImg').val('');

         $('.uploadRemove').hide();
      })
</script>
<script>
   function moveDIV(action) {
	switch(action) {
		case "up":
			$('#movable').animate({'marginTop' : "-=15px"});
		break;
		case "left":
			$('#movable').animate({'marginLeft' : "-=15px"});
		break;
		case "right":
			$('#movable').animate({'marginLeft' : "+=15px"});
		break;
		case "down":
			$('#movable').animate({'marginTop' : "+=15px"});
		break;
	}
}

$(".title_one").draggable();
$(".title_two").draggable();
$(".title_three").draggable();
$(".output").draggable();
$("#clipImage").draggable();

</script>

<script>
    $('.textOne_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateOne(rotationAngle);
   })
      function rotateOne(rotationAngle) {
	   $('.title_one').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textTwo_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateTwo(rotationAngle);
   })
      function rotateTwo(rotationAngle) {
	   $('.title_two').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textThree_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateThree(rotationAngle);
   })
      function rotateThree(rotationAngle) {
	   $('.title_three').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   
      $('.clip_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotate(rotationAngle);

      
   })
      function rotate(rotationAngle) {
	   $('.imgRot').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.upload_rotate').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateIpload(rotationAngle);

      
   })
      function rotateIpload(rotationAngle) {
	   $('.output').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
</script>


@endpush