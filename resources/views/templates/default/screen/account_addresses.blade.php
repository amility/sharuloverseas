@extends('templates.default.app')
@section('content')
@section('style')
<style>
    .pointer{
        cursor: pointer;
    }
    .green{
        background: #45d245;
    }
</style>
@endsection


<div class="block black-box">
    @include('templates.default.screen.account_breadcumb')
    <div class="container">
        <div class="row">
            @include('templates.default.screen.account_navigation')

            <div class="col-12 col-lg-8 mt-lg-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="addresses-list"><a href="{{url('customer/account-address')}}" class="addresses-list__item addresses-list__item--new">
                        <div class="addresses-list__plus"></div>
                        <div class="btn btn-warning" style="font-size:20px; color:#fff;">Add New</div>
                    </a>
                    <div class="addresses-list__divider"></div>
                    @foreach($addresses as $address)
                    <div class="addresses-list__item card address-card">
                        @if($address['is_primary'] == 1)
                            <div class="address-card__badge">Default</div>
                        @else
                            <div class="address-card__badge green"><a class="pointer" onclick="makeDefaultAddress(this, {{$address['id']}})" data-customer_id="{{$address['customer_id']}}">Make Default Address</a></div>
                        @endif
                        <div class="address-card__body">
                            <div class="address-card__name">{{$address['first_name'] ." ". $address['last_name']}}</div>
                            
                            <div class="address-card__row">
                            @if($address['company_name'] != '' || $address['appartment'] != '')
                                {{ $address['company_name'] ." ". $address['appartment'] }}, <br>
                            @endif
                                {{ $address['block'] }}, {{ $address['house_building'] }}, {{ $address['street_address'] }} <br>
                                {{ getCityName($address['town_city']) .", ". getStateName($address['state_country']) ." ". $address['postcode_zip'] }}
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Phone Number</div>
                                <div class="address-card__row-content">{{ $address['phone'] }}</div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Email Address</div>
                                <div class="address-card__row-content">{{ $address['email_address'] }}</div>
                            </div>
                            <div class="address-card__footer "><a class="btn btn-warning" href="{{url('customer/account-edit-address', $address['id'])}}">Edit</a>&nbsp;&nbsp; 
                            @if($address['is_primary'] != 1)
                                <a href="{{url('customer/account-remove-address', $address['id'])}}" onclick="return confirm('{{'are you sure?' }}');" style="display: inline-block;">Remove</a>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="addresses-list__divider"></div>
                    @endforeach
                    <div class="addresses-list__divider"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function makeDefaultAddress(invoker, id){
       var customer_id = $(invoker).data('customer_id');
        $.ajax({
                url: '{{ url('customer/account-makeDefaultAddress') }}',
                type: 'POST',
                data: {
                    'id': id,
                    'customer_id': customer_id,
                    '_token': "{{csrf_token()}}"
                },
                success: function (response) {
                   if(response=='yes'){
                    location.reload();
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });
    }
</script>
@endsection