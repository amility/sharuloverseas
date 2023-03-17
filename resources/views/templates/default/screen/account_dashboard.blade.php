@extends('templates.default.app')

@section('content')



<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')
            <?php $customer = Auth::guard('customer')->user()->toArray(); ?>
            
            <div class="col-12 col-lg-8 mt-lg-0">
                <div class="dashboard">
                    
                    @if($customerAddress)
                    <div class="dashboard__address card address-card address-card--featured">
                        <div class="address-card__badge">Default Address</div>
                        <div class="address-card__body">
                            <div class="address-card__name">{{ $customerAddress['first_name'] ." ". $customerAddress['last_name'] }}</div>
                            <div class="address-card__row">{{ $customerAddress['company_name'] ." ". $customerAddress['appartment'] }}, <br>
                               {{ $customerAddress['block'] }}, {{ $customerAddress['house_building'] }}, {{ $customerAddress['street_address'] }} <br>
                                {{ getCityName($customerAddress['town_city']) .", ". getStateName($customerAddress['state_country']) }}</div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Phone Number</div>
                                <div class="address-card__row-content">{{ $customerAddress['phone'] }}</div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Email Address</div>
                                <div class="address-card__row-content">{{ $customerAddress['email_address'] }}</div>
                            </div>
                            <div class="address-card__footer"><a class="btn btn-warning" href="{{url('customer/account-edit-address')}}">Edit Address</a></div>
                        </div>
                    </div>
                    @endif
                    <div class="dashboard__orders card">
                        <div class="card-header">
                            <h5>Last 5 Orders</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-table">                            
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        @php $parameter= Crypt::encrypt($order['id']); @endphp
                                        <tr>
                                            <td><a href="{{ url('customer/account-order-details', $parameter) }}"><button class="btn-primary btn">#{{$order['order_no']}}</button></a></td>
                                            <td>@php $date = new DateTime($order['order_date']); @endphp
                                            {{$date->format('F d, Y g:i A')}}</td>
                                            <td>{{ucfirst($order['status'])}}</td>
                                            <td>{{CurrencySymbol()}} {{number_format($order['total_price'], 2, '.', ',')}} for {{count($order['items'])}} item(s)</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard__profile card profile-card">
                        <div class="card-body profile-card__body">
                            <div class="profile-card__avatar"><img src="{{url('images/avatars/avatar-5.png')}}" alt=""></div>
                            <div class="profile-card__name">{{$customer['name']}}</div>
                            <div class="profile-card__email">{{$customer['email']}}</div>
                            <div class="profile-card__edit"><a href="{{url('customer/account-profile')}}" >
                                <button class="btn btn-primary">Edit Profile</button></a></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection