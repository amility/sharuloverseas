@extends('templates.default.app')
@php
use Illuminate\Support\Facades\Crypt;
@endphp
@section('content')



<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')
            <div class="col-12 col-lg-8 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Order History</h5>
                    </div>
                    <div class="card-divider"></div>
                    @if(count($orders)>0)
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
                                    @php $parameter= Crypt::encrypt($order->id); @endphp
                                    <tr>                                    
                                        <td><a href="{{ url('customer/account-order-details', $parameter) }}">#{{$order->order_no}}</a></td>
                                        <td>
                                            @php $date = new DateTime($order->order_date); @endphp
                                            {{$date->format('F d, Y g:i A')}}
                                        </td>
                                        <td>{{ucfirst($order->status)}}</td>
                                        <td>{{CurrencySymbol()}} {{number_format($order['total_price'], 2, '.', ',')}} for {{count($order->items)}} item(s)</td>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-footer">
                        @if ($orders->lastPage() > 1)
                            <ul class="pagination justify-content-center">
                              <li class="page-item {{ ($orders->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link page-link--with-arrow" href="{{ $orders->url(1) }}" aria-label="Previous">
                                <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                                  <use xlink:href="{{url('images/sprite.svg#arrow-rounded-left-8x13')}}"></use>
                                </svg>
                                </a></li>
                                @for ($i = 1; $i <= $orders->lastPage(); $i++)
                              <li class="page-item {{ ($orders->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a></li>
                              @endfor
                              <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? ' disabled' : '' }}"><a class="page-link page-link--with-arrow" href="{{ $orders->url($orders->currentPage()+1) }}" aria-label="Next">
                                <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                  <use xlink:href="{{url('images/sprite.svg#arrow-rounded-right-8x13')}}"></use>
                                </svg>
                                </a></li>
                            </ul>
                        @endif
                    </div>
                    @else 
                    <div class="container">                            
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <p>Order not available.</p>
                        </div>                            
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection