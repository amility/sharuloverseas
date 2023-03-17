<li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('c~AiN:2)Y42,&*.dashboard') }}">
   <i class="fa fa-dashcube"></i>
   <span>Dashboard</span>
   </a>
</li>
@if(Auth::user()->hasPermissionTo('categories-view'))
<li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('categories.index') }}">
   <i class="fa fa-list"></i>
   <span>Categories</span>
   </a>
</li>
@endif
<li class="nav-item {{ Request::is('gunshow') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('gunshow.index') }}">
   <i class="fa fa-list"></i>
   <span>Gun Shows</span>
   </a>
</li>
@if(Auth::user()->hasPermissionTo('banner-images-view'))
<li class="nav-item {{ Request::is('bannerImages*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('bannerImages.index') }}">
   <i class="fa fa-image"></i>
   <span>Banner Images</span>
   </a>
</li>
@endif
@if(Auth::user()->hasPermissionTo('customers-view'))
<li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('customers.index') }}">
   <i class="fa fa-users"></i>
   <span>Customers</span>
   </a>
</li>
@endif
<!--
   <li class="nav-item {{ Request::is('customerAddresses*') ? 'active' : '' }}">
       <a class="nav-link" href="{{ route('customerAddresses.index') }}">
           <i class="fa fa-cursor"></i>
           <span>Customer Addresses</span>
       </a>
   </li> -->
@if(Auth::user()->hasPermissionTo('brands-view'))
<li class="nav-item {{ Request::is('brands*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('brands.index') }}">
   <i class="fa fa-tags"></i>
   <span>Brands</span>
   </a>
</li>
@endif
<li class="nav-item {{ Request::is('caliber') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('caliber.index') }}">
   <i class="fa fa-list"></i>
   <span>Caliber</span>
   </a>
</li>
<!-- tax management -->
<!-- <li class="nav-item {{ Request::is('tax*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('tax.index') }}">
       <i class="fa fa-calculator"></i>
       <span>Tax Management</span>
   </a>
   </li> -->
<!--@if(Auth::user()->hasPermissionTo('products-view'))-->
<!--<li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">-->
<!--   <a class="nav-link" href="{{ route('attribute') }}">-->
<!--   <i class="fa fa-product-hunt"></i>-->
<!--   <span>Manage Attribute</span>-->
<!--   </a>-->
<!--</li>-->
<!--@endif-->
<!--@if(Auth::user()->hasPermissionTo('products-view'))-->
<!--<li class="nav-item nav-dropdown">-->
<!--   <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa la la-group"></i>Manage Customise </a>-->
<!--   <ul class="nav-dropdown-items">-->
<!--      <li class="nav-item {{ Request::is('customize*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('customize.index') }}"> <span>Manage View</span></a></li>-->
<!--      <li class="nav-item {{ Request::is('customize_text*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('customize.text_index') }}"> <span>Manage Text</span></a></li>-->
<!--      <li class="nav-item {{ Request::is('customize_clip_art*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('customize.clipArt_index') }}"> <span>Manage Clip Art</span></a></li>-->
<!--   </ul>-->
<!--</li>-->
<!--@endif-->

@if(Auth::user()->hasPermissionTo('products-view'))
<li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('products.index') }}">
   <i class="fa fa-product-hunt"></i>
   <span>Products</span>
   </a>
</li>
@endif
<li class="nav-item nav-dropdown">
   <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa la la-group"></i>Orders Management</a>
   <ul class="nav-dropdown-items">
      @if(Auth::user()->hasPermissionTo('orders-view'))
      <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}"><a class="nav-link"
         href="{{ route('orders.index') }}"><i
         class="fa fa-shopping-bag"></i> <span>Orders</span></a></li>
      @endif
      @if(Auth::user()->hasPermissionTo('order-report-view'))
      <li class="nav-item {{ Request::is('reports*') ? 'active' : '' }}"><a class="nav-link"
         href="{{ route('reports.index') }}"><i
         class="fa fa-calendar"></i> <span>Report</span></a></li>
      @endif
   </ul>
</li>
@if(Auth::user()->hasPermissionTo('promo-view'))
<li class="nav-item {{ Request::is('promo*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('promo.index') }}">
   <i class="fa fa-tag"></i>
   <span>Promo Management</span>
   </a>
</li>
@endif
@if(Auth::user()->hasPermissionTo('shipping-view'))
<li class="nav-item {{ Request::is('shipping*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('shipping.index') }}">
   <i class="fa fa-ship"></i>
   <span>Manage Shipping </span>
   </a>
</li>
@endif
@if(Auth::user()->hasPermissionTo('pages-view'))
 <li class="nav-item {{ Request::is('aboutus*') ? 'active' : '' }}"><a class="nav-link"
         href="{{ route('aboutus.index') }}"><i
         class="fa la la-user"></i> <span>About Us</span></a></li>
         @endif
<!--@if(Auth::user()->hasPermissionTo('pages-view'))-->
<!--<li class="nav-item nav-dropdown">-->
<!--   <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-page4"></i>Pages</a>-->
<!--   <ul class="nav-dropdown-items">-->
<!--      <li class="nav-item {{ Request::is('aboutus*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('aboutus.index') }}"><i-->
<!--         class="fa la la-user"></i> <span>About Us</span></a></li>-->
<!--      <li class="nav-item {{ Request::is('terms*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('terms.index') }}"><i-->
<!--         class="fa la la-group"></i> <span>Terms & Comditions</span></a></li>-->
<!--      <li class="nav-item {{ Request::is('privacy*') ? 'active' : '' }}"><a class="nav-link"-->
<!--         href="{{ route('privacy.index') }}"><i-->
<!--         class="fa la la-key"></i> <span>Privacy & Policy</span></a></li>-->
<!--   </ul>-->
<!--</li>-->
<!--@endif-->
@if(Auth::user()->hasPermissionTo('subscriber-view'))
<!--<li class="nav-item {{ Request::is('subscriber*') ? 'active' : '' }}">-->
<!--   <a class="nav-link" href="{{ route('subscriber.index') }}">-->
<!--   <i class="fa fa-users"></i>-->
<!--   <span>Subscriber</span>-->
<!--   </a>-->
<!--</li>-->
@endif
<!-- <li class="nav-item {{ Request::is('productImages*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('productImages.index') }}">
       <i class="fa fa-cursor"></i>
       <span>Product Images</span>
   </a>
   </li>
   <li class="nav-item {{ Request::is('productPdfs*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('productPdfs.index') }}">
       <i class="fa fa-cursor"></i>
       <span>Product Pdfs</span>
   </a>
   </li> -->
<!-- <li class="nav-item {{ Request::is('addToCarts*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('addToCarts.index') }}">
       <i class="fa fa-cursor"></i>
       <span>Add To Carts</span>
   </a>
   </li> -->
<!-- <li class="nav-item {{ Request::is('wishlists*') ? 'active' : '' }}">
   <a class="nav-link" href="{{ route('wishlists.index') }}">
       <i class="fa fa-cursor"></i>
       <span>Wishlists</span>
    </a>
   </li> -->
<li class="nav-item {{ Request::is('contactUs*') ? 'active' : '' }}">
   <a class="nav-link" href="{{url('c~AiN:2)Y42,&*/contactUs')}}">
   <i class="fa fa-tag"></i>
   <span>Customer Enquiries</span>
   </a>    
</li>
@if(Auth::user()->hasPermissionTo('manage-users'))
<li class="nav-item nav-dropdown">
   <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa la la-group"></i>User Management</a>
   <ul class="nav-dropdown-items">
      <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('users.index') }}">
         <i class="fa fa-user"></i>
         <span>Users</span>
         </a>
      </li>
      <!--<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">-->
      <!--   <a class="nav-link" href="{{ route('roles.index') }}">-->
      <!--   <i class="fa fa-eye"></i>-->
      <!--   <span>Roles</span>-->
      <!--   </a>-->
      <!--</li>-->
   </ul>
</li>
@endif