<div class="col-12 col-lg-3 d-flex">
    <div class="account-nav flex-grow-1">
        <h5 class="account-nav__title">Navigation</h5>
        <ul>
            <li class="account-nav__item {{ Request::is('account-dashboard') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-dashboard') }}">Dashboard</a>
            </li>
            <li class="account-nav__item {{ Request::is('account-profile') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-profile') }}">Edit Profile</a>
            </li>
            <li class="account-nav__item {{ Request::is('account-orders') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-orders') }}">Order History</a>
            </li>
          <!--   <li class="account-nav__item {{ Request::is('account-order-details') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-order-details') }}">Order Details</a>
            </li> -->
            <li class="account-nav__item {{ Request::is('account-addresses') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-addresses') }}">Addresses</a>
            </li>
           <!--  <li class="account-nav__item {{ Request::is('account-edit-address') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-edit-address') }}">Edit Address</a>
            </li> -->
            <li class="account-nav__item {{ Request::is('account-password') ? 'account-nav__item--active' : '' }}">
                <a href="{{ URL::to('customer/account-password') }}">Password</a>
            </li>
            <li class="account-nav__item {{ Request::is('logout') ? 'account-nav__item--active' : '' }}">
                <a href="{{ url('/customer/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>