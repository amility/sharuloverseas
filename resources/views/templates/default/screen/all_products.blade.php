@extends('templates.default.app')

@section('content')
@php
use App\Models\AddToCart;
use App\Models\Wishlist;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
$arrCategoryLists = Category::with('children')->whereNotIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
$arrCategoryLists1 = Category::with('children')->whereIN('name', ['Accessories','non ffl'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
//$arrCategoryLists1 = Category::with('children')->whereIN('name', ['Rifles','Shot guns','hand guns','other'])->where('deleted_at', '=', null)->take(10)->get()->toArray();
//$arrCategoryLists = Category::with('children')->whereNotIN('name', ['Rifles','Shotguns','hand guns','other'])->get()->toArray();
if(!empty(Auth::guard('customer')->user())){
    $customerData = Auth::guard('customer')->user()->toArray();
}else{
    $customerData['id'] = 0;
}
@endphp

<!--banner-->
<div id="box-with-images2">
  <h2 class="hedabout text-center mb-0">{{ app('request')->input('category') }}</h2>
</div>
<!--banner end -->

<div class="black-box all-products bg_image">
    <div class="page-header">
      <div class="page-header__container container">
        <div class="page-header__breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
               <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                </svg>
              </li>
              <li class="breadcrumb-item">/</li>
              @if(app('request')->input('category'))
              <li class="breadcrumb-item"><a href="{{url('product_category/').'/'.\Request::segment(2).'?category='.app('request')->input('category')}}">{{ app('request')->input('category') }}</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                </svg>
              </li>
              <li class="breadcrumb-item">/</li>
              @else
              <li class="breadcrumb-item">{{ app('request')->input('search') }}
                <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                </svg>
              </li>
              <li class="breadcrumb-item">/</li>
              @endif
              <li class="breadcrumb-item active" aria-current="page">{{ app('request')->input('subcategory') }}</li>
            </ol>
          </nav>
        </div>
       <!--  <div class="page-header__title">
          <h1>Screwdrivers</h1>
        </div> -->
      </div>
    </div>
    <div class="container">
      <div class="shop-layout shop-layout--sidebar--start">
        <div class="shop-layout__sidebar">
          <div class="block block-sidebar block-sidebar--offcanvas--mobile">
            <div class="block-sidebar__backdrop"></div>
            <div class="block-sidebar__body">
              <!-- <div class="block-sidebar__header">
                <div class="block-sidebar__title">Filters</div>
                <button class="block-sidebar__close" type="button">
                <svg width="20px" height="20px">
                  <use xlink:href="images/sprite.svg#cross-20"></use>
                </svg>
                </button>
              </div> -->
              <div class="block-sidebar__item">
                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                  <h4 class="widget-filters__title widget__title">Filters</h4>
                  <div class="widget-filters__list">
                    <!-- <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Categories
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-categories">
                              <ul class="filter-categories__list">
                                <li class="filter-categories__item filter-categories__item--parent">
                                  <svg class="filter-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use>
                                  </svg>
                                  <a href="#">Construction & Repair</a>
                                  <div class="filter-categories__counter">254</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--parent">
                                  <svg class="filter-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use>
                                  </svg>
                                  <a href="#">Instruments</a>
                                  <div class="filter-categories__counter">75</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--current"><a href="#">Power Tools</a>
                                  <div class="filter-categories__counter">21</div>
                                </li>
                                <li class="filter-categories__item filter-categories__item--child"><a href="#">Drills & Mixers</a>
                                  <div class="filter-categories__counter">15</div>
                                </li>                                
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Categories
                          <svg class="filter__arrow" width="12px" height="7px">
                            <use xlink:href="{{url('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                          </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-categories-alt">
                              <ul class="filter-categories-alt__list filter-categories-alt__list--level--1" data-collapse-opened-class="filter-categories-alt__item--open">
                              <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                             <a href="/product_category/59?category=RIFLES">FIREARMS</a>
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
                                @endif
                              </li>
                            @endif
                            @endforeach
                           </ul>
                            <div class="icon_arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                     </div>
                           </li>
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
                    
                     <!--<div class="icon_arrow">-->
                       <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/><!--</svg>-->
                     <!--</div>-->
                      @endif
                  </li>
                  @endif
            @endforeach
                           
                        
                              <!--@foreach($arrCategoryLists1 as $strKey => $strData)
                              @php $child_open = ''; @endphp
                                @if (empty($strData['parent_id']))
                                @if (!empty($strData['children']))
                              @foreach($strData['children'] as $strChildKey => $strChildLists)                                
                                @if(app('request')->input('subcategory') == $strChildLists['name'])
                                  @php  $child_open = 'filter-categories-alt__item--open'; @endphp
                                @endif                                
                              @endforeach
                              @endif
                                <li class="filter-categories-alt__item {{ $child_open }}" data-collapse-item>
                                  @if (!empty($strData['children']))
                                    <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                  @endif
                                  <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}" @if(app('request')->input('category') == $strData['name']) style="color: #007bff" @endif>{{ $strData['name'] }}</a>
                                  @if (!empty($strData['children']))
                                  <div class="filter-categories-alt__children" data-collapse-content>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                    @foreach($strData['children'] as $strChildKey => $strChildLists)
                                      <li class="filter-categories-alt__item" data-collapse-item>
                                        <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}" @if(app('request')->input('subcategory') == $strChildLists['name']) style="color: #007bff" @endif>{{$strChildLists['name'] }}</a>
                                      </li>
                                    @endforeach
                                    </ul>
                                  </div>
                                  @endif
                                </li>
                                @endif
                              @endforeach
                            









                              <ul class="filter-categories-alt__list filter-categories-alt__list--level--1" data-collapse-opened-class="filter-categories-alt__item--open">
                              
                              @foreach($arrCategoryLists as $strKey => $strData)
                              @php $child_open = ''; @endphp
                                @if (empty($strData['parent_id']))
                                @if (!empty($strData['children']))
                              @foreach($strData['children'] as $strChildKey => $strChildLists)                                
                                @if(app('request')->input('subcategory') == $strChildLists['name'])
                                  @php  $child_open = 'filter-categories-alt__item--open'; @endphp
                                @endif                                
                              @endforeach
                              @endif
                                <li class="filter-categories-alt__item {{ $child_open }}" data-collapse-item>
                                  @if (!empty($strData['children']))
                                    <button class="filter-categories-alt__expander" data-collapse-trigger></button>
                                  @endif
                                  <a href="{{url('product_category', $strData['id']).'?category='.$strData['name']}}" @if(app('request')->input('category') == $strData['name']) style="color: #007bff" @endif>{{ $strData['name'] }}</a>
                                  @if (!empty($strData['children']))
                                  <div class="filter-categories-alt__children" data-collapse-content>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                    @foreach($strData['children'] as $strChildKey => $strChildLists)
                                      <li class="filter-categories-alt__item" data-collapse-item>
                                        <a href="{{url('product_category', [$strData['id'], $strChildLists['id']]).'?category='.$strData['name'].'&&subcategory='.$strChildLists['name']}}" @if(app('request')->input('subcategory') == $strChildLists['name']) style="color: #007bff" @endif>{{$strChildLists['name'] }}</a>
                                      </li>
                                    @endforeach
                                    </ul>
                                  </div>
                                  @endif
                                </li>
                                @endif
                              @endforeach
                              </ul>-->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   @if(count($products)>0)
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger> Filter by price
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="{{url('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                        </svg>
                        </button>
                        @php
                          if(app('request')->input('max_price')){
                            $max_price_sel = app('request')->input('max_price');
                          }
                          if(app('request')->input('min_price')){
                            $min_price_sel = app('request')->input('min_price');
                          }                          
                        @endphp
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-price" data-min="{{$min_price}}" data-max="{{$max_price+100}}" data-from="{{ isset($min_price_sel) && $min_price_sel!=''?$min_price_sel: $min_price}}" data-to="{{isset($max_price_sel) && $max_price_sel!=''?$max_price_sel:$max_price+100}}">
                              <div class="filter-price__slider"></div>
                                <div class="widget-filters__actions d-flex">
                    @if(app('request')->input('category_id') && app('request')->input('search'))
                      <a href="{{Request::url()}}?category_id={{ app('request')->input('category_id') }}&search={{ app('request')->input('search') }}" class="btn btn-secondary btn-sm">Reset</a>
                    @else
                      <!--<a href="{{Request::url()}}?category={{ app('request')->input('category') }}" class="btn btn-secondary btn-sm">Reset</a>-->
                    @endif
                 
                  <div class="filter-price__title">Price: {{CurrencySymbol()}}
                              <span class="filter-price__min-value"></span> – {{CurrencySymbol()}}
                              <span class="filter-price__max-value"></span></div>
                  </div>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @if(count($brandLists)>0)
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Brand
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="{{url('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                @if (!empty($brandLists))
                                @php $brands = explode(",",app('request')->input('brands')); @endphp
                                @foreach($brandLists as $strChildKey => $brandData)
                                <label class="filter-list__item">
                                  <span class="filter-list__input input-check">
                                    <span class="input-check__body">
                                      <input class="input-check__input" name="brandfilter" type="checkbox" value="{{$brandData['id']}}" @if(in_array($brandData['id'],$brands)) checked @endif>
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                          <use xlink:href="{{url('images/sprite.svg#check-9x7')}}"></use>
                                        </svg>
                                    </span>
                                  </span>
                                  <span class="filter-list__title">{{$brandData['brand_name']}} </span>
                                  <!-- <span class="filter-list__counter">7</span> -->
                                </label>
                                @endforeach
                                @endif                            
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                      @if(count($caliberLists)>0)
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Caliber
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="{{url('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                @if (!empty($caliberLists))
                                @php $caliber = explode(",",app('request')->input('caliber')); @endphp
                                @foreach($caliberLists as $strChildKey => $caliberData)
                                <label class="filter-list__item">
                                  <span class="filter-list__input input-check">
                                    <span class="input-check__body">
                                      <input class="input-check__input" name="caliberfilter" type="checkbox" value="{{$caliberData['id']}}" @if(in_array($caliberData['id'],$caliber)) checked @endif>
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                          <use xlink:href="{{url('images/sprite.svg#check-9x7')}}"></use>
                                        </svg>
                                    </span>
                                  </span>
                                  <span class="filter-list__title">{{$caliberData['caliber_name']}} </span>
                                  <!-- <span class="filter-list__counter">7</span> -->
                                </label>
                                @endforeach
                                @endif                            
                              </div>

                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                   <!--  <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Brand
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Wakita </span><span class="filter-list__counter">7</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Zosch </span><span class="filter-list__counter">42</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio" checked="checked" disabled="disabled">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">WeVALT</span></label>
                                <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio" disabled="disabled">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Hammer</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Mitasia </span><span class="filter-list__counter">1</span></label>
                                <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_radio" type="radio">
                                  <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Metaggo </span><span class="filter-list__counter">25</span></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>Color
                        <svg class="filter__arrow" width="12px" height="7px">
                          <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-color">
                              <div class="filter-color__list">
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--white" style="color: #fff;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #d9d9d9;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #b3b3b3;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #808080;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #666;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #4d4d4d;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #262626;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #ff4040;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #ff8126;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #ffd440;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #becc1f;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #8fcc14;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cc5e;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cca0;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #47cccc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #40bfff;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" disabled="disabled">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #3d6dcc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox" checked="checked">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #7766cc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #b852cc;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                                <label class="filter-color__item">
                                <span class="filter-color__check input-check-color" style="color: #e53981;">
                                <label class="input-check-color__body">
                                  <input class="input-check-color__input" type="checkbox">
                                  <span class="input-check-color__box"></span>
                                  <svg class="input-check-color__icon" width="12px" height="9px">
                                    <use xlink:href="images/sprite.svg#check-12x9"></use>
                                  </svg>
                                  <span class="input-check-color__stick"></span></label>
                                </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="widget-filters__actions d-flex">
                    <button class="btn btn-primary btn-sm" id="btn_filter">Filter</button>
                    @if(app('request')->input('category_id') && app('request')->input('search'))
                      <a href="{{Request::url()}}?category_id={{ app('request')->input('category_id') }}&search={{ app('request')->input('search') }}" class="btn btn-secondary btn-sm">Reset</a>
                    @else
                      <a href="{{Request::url()}}?category={{ app('request')->input('category') }}" class="btn btn-secondary btn-sm">Reset</a>
                    @endif
                  </div>
                </div>
              </div>
              <!-- <div class="block-sidebar__item d-none d-lg-block">
                <div class="widget-products widget">
                  <h4 class="widget__title">Latest Products</h4>
                  <div class="widget-products__list">
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-1.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                        <div class="widget-products__prices">$749.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-2.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
                        <div class="widget-products__prices">$1,019.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-3.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
                        <div class="widget-products__prices">$850.00</div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-4.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
                        <div class="widget-products__prices"><span class="widget-products__new-price">$949.00</span> <span class="widget-products__old-price">$1189.00</span></div>
                      </div>
                    </div>
                    <div class="widget-products__item">
                      <div class="widget-products__image">
                        <div class="product-image"><a href="product.html" class="product-image__body"><img class="product-image__img" src="images/products/product-5.jpg" alt=""></a></div>
                      </div>
                      <div class="widget-products__info">
                        <div class="widget-products__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                        <div class="widget-products__prices">$1,700.00</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="shop-layout__content">
          <div class="block">
            <div class="products-view">
              <!-- <div class="products-view__options">
                <div class="view-options view-options--offcanvas--mobile">
                  <div class="view-options__filters-button">
                    <button type="button" class="filters-button">
                    <svg class="filters-button__icon" width="16px" height="16px">
                      <use xlink:href="images/sprite.svg#filters-16"></use>
                    </svg>
                    <span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span></button>
                  </div>
                  <div class="view-options__layout">
                    <div class="layout-switcher">
                      <div class="layout-switcher__list">
                        <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-grid-16x16"></use>
                        </svg>
                        </button>
                        <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-grid-with-details-16x16"></use>
                        </svg>
                        </button>
                        <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button">
                        <svg width="16px" height="16px">
                          <use xlink:href="images/sprite.svg#layout-list-16x16"></use>
                        </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="view-options__legend">Showing 6 of 98 products</div>
                  <div class="view-options__divider"></div>
                  <div class="view-options__control">
                    <label for="">Sort By</label>
                    <div>
                      <select class="form-control form-control-sm" name="" id="">
                        <option value="">Default</option>
                        <option value="">Name (A-Z)</option>
                      </select>
                    </div>
                  </div>
                  <div class="view-options__control">
                    <label for="">Show</label>
                    <div>
                      <select class="form-control form-control-sm" name="" id="">
                        <option value="">12</option>
                        <option value="">24</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> -->

              @if(count($products)>0)
              <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                <div class="products-list__body">
                  @foreach($products as $product)
                 
                  <div class="products-list__item">
                    <div class="product-card product-card--hidden-actions">
                      <!-- <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="{{url('images/sprite.svg#quickview-16')}}"></use>
                      </svg>
                      <span class="fake-svg-icon"></span></button> -->
                      <!-- <div class="product-card__badges-list">
                        <div class="product-card__badge product-card__badge--new">New</div>
                      </div> -->
                      <div class="product-card__image product-image"><a href="{{ URL::to('/product', $product->id) }}" class="product-image__body"><img class="product-image__img" src="{{count($product->images)>0?$product->images[0]->image:asset('images/no-image.jpg')}}" alt=""></a></div>
                      <div class="product-card__info">
                        <div class="product-card__name"><a href="{{ URL::to('/product', $product->id) }}">{{$product->prod_name}}</a></div>
                        <!-- <div class="product-card__rating">
                          <div class="product-card__rating-stars">
                            <div class="rating">
                              <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                  <g class="rating__fill">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal')}}"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal-stroke')}}"></use>
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
                                    <use xlink:href="{{url('images/sprite.svg#star-normal')}}"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal-stroke')}}"></use>
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
                                    <use xlink:href="{{url('images/sprite.svg#star-normal')}}"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal-stroke')}}"></use>
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
                                    <use xlink:href="{{url('images/sprite.svg#star-normal')}}"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal-stroke')}}"></use>
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
                                    <use xlink:href="{{url('images/sprite.svg#star-normal')}}"></use>
                                  </g>
                                  <g class="rating__stroke">
                                    <use xlink:href="{{url('images/sprite.svg#star-normal-stroke')}}"></use>
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
                          </div>
                          <div class="product-card__rating-legend">9 Reviews</div>
                        </div> -->
                        <ul class="product-card__features-list">
                          <li>Speed: 750 RPM</li>
                          <li>Power Source: Cordless-Electric</li>
                          <li>Battery Cell Type: Lithium</li>
                          <li>Voltage: 20 Volts</li>
                          <li>Battery Capacity: 2 Ah</li>
                        </ul>
                      </div>
                      <div class="product-card__actions">
                        <div class="product-card__availability">Availability: <span class="text-success">@if($product->total_stock != null) In Stock @else Out of stock @endif</span></div>
                        <div class="product-card__prices">
                              @if($product['prod_price']==$product['mrp_price'])
                                    
                                    <span>{{CurrencySymbol()}} {{$product['prod_price']}}</span>
                                
                                @else
                          <!-- {{CurrencySymbol()}}{{$product->prod_price}} -->
                          <span>{{CurrencySymbol()}}{{$product['prod_price']}}</span>
                           &nbsp;
                           &nbsp;
                           <strike>{{CurrencySymbol()}}{{$product['mrp_price']}}</strike>
                         @endif
                        </div>
                        <div class="product-card__buttons">
                          @php 
                              $cart_product = AddToCart::where(['product_id'=>$product->id, 'user_id' => $customerData['id']])->first();

                              $wishlist_product = Wishlist::where(['product_id'=>$product->id, 'user_id' => $customerData['id']])->first();
                          @endphp
                          @if($cart_product == null)
                          <button class="btn btn-primary product-card__addtocart" type="button" data-product_name="{{$product->prod_name}}" data-product_price="{{$product->prod_price}}" data-quantity="1" @if($product->total_stock==0) disabled @endif data-image="{{count($product->images)>0?$product->images[0]->image:asset('images/no-image.jpg')}}" onclick="addtocart(this,{{$product->id}})">Add To Cart</button>
                          @else
                              <a class="btn btn-primary product-card__addtocart" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                          @endif
                          @if($cart_product == null)
                          @else
                              <a class="btn btn-primary product-card__addtocart product-card__addtocart--list" href="{{ URL::to('customer/addToCarts') }}">Go to cart</a>
                          @endif
                        
                          <!-- <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="{{url('images/sprite.svg#compare-16')}}"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="products-view__pagination">
                <!-- <ul class="pagination justify-content-center">
                    {!! $products->appends(Request::all())->links() !!}
                </ul>
                </div> -->
               @if ($products->lastPage() > 1)
                <ul class="pagination justify-content-center">
                  <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link page-link--with-arrow" href="{{ $products->url(1) }}" aria-label="Previous">
                    <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                      <use xlink:href="{{url('images/sprite.svg#arrow-rounded-left-8x13')}}"></use>
                    </svg>
                    </a></li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                  <li class="page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                  @endfor
                  <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}"><a class="page-link page-link--with-arrow" href="{{ $products->url($products->currentPage()+1) }}" aria-label="Next">
                    <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                      <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-8x13')}}"></use>
                    </svg>
                    </a></li>
                </ul>
                @endif
              </div>
              @else
                <div class="block">
                    <div class="container">
                        <h1 class="text-dark">No Product Found</h1>
                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  @endsection
  @section('script')
  <script>
    $(function() {
    $('#btn_filter').on('click', function () {
        var min_price = $('.filter-price__min-value').text();
        var max_price = $('.filter-price__max-value').text();
        var brands = $("input[name='brandfilter']:checked").map(function() {
            return this.value;
        }).get();
         var caliber = $("input[name='caliberfilter']:checked").map(function() {
            return this.value;
        }).get();
        //console.log(min_price+", "+max_price+", "+brands);
        var url = "{{Request::url()}}?category_id={{app('request')->input('category_id')}}&&search={{app('request')->input('search')}}&&category={{app('request')->input('category')}}&&subcategory={{app('request')->input('subcategory')}}&min_price="+min_price+"&max_price="+max_price+"&brands="+brands+"&caliber="+caliber;
        if (url) {
            window.location = url;
        }
        return false;
    });
});
</script>
<script>
    (function() {

  var parent = document.querySelector(".range-slider");
  if(!parent) return;

  var
    rangeS = parent.querySelectorAll("input[type=range]"),
    numberS = parent.querySelectorAll("input[type=number]");

  rangeS.forEach(function(el) {
    el.oninput = function() {
      var slide1 = parseFloat(rangeS[0].value),
        	slide2 = parseFloat(rangeS[1].value);

      if (slide1 > slide2) {
				[slide1, slide2] = [slide2, slide1];
        // var tmp = slide2;
        // slide2 = slide1;
        // slide1 = tmp;
      }

      numberS[0].value = slide1;
      numberS[1].value = slide2;
    }
  });

  numberS.forEach(function(el) {
    el.oninput = function() {
			var number1 = parseFloat(numberS[0].value),
					number2 = parseFloat(numberS[1].value);
			
      if (number1 > number2) {
        var tmp = number1;
        numberS[0].value = number2;
        numberS[1].value = tmp;
      }

      rangeS[0].value = number1;
      rangeS[1].value = number2;

    }
  });

})();
</script>


@endsection