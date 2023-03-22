@foreach($order as $orders)
<div class="form-row">
	  <div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{{ $orders->customer_name}}</p>
</div>
 <div class="form-group col-sm-6">
    {!! Form::label('payment_method', 'Paymen method:') !!}
    <p>{{ $orders->payment_method}}</p>
</div>
</div>
<div class="form-row">
	<div class="form-group col-sm-6">
    {!! Form::label('order_type', 'Order Type:') !!}
    <p>{{ $orders->order_type}}</p>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('first_name', '	Bill To Name:') !!}
    <p>{{ $orders->first_name}}</p>
</div>
	 
</div>
<div class="form-row">
	<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Amount:') !!}
    <p><b>{{CurrencySymbol()}}</b> {{ $orders->total_price}}</p>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('order_date', '	Purchase Date:') !!}
    <p>{{ $orders->order_date}}</p>
</div>
	 
</div>

<div class="form-row">
	<div class="form-group col-sm-6">
    {!! Form::label('status', 'Order Status:') !!}
    <p>{{ $orders->status}}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('order_date', '	Products Name:') !!}
    
    <ol type="1">
    	@foreach($product as $pro)
    <li>{{ $pro->prod_name}} <b>{{ '('.$pro->name.')' }}</b></li>
    @endforeach
</ol>

</div>

   <div class="form-group col-sm-6">
         @if($shippingDetail != null)
         <table>
            <thead><tr>
                <th>Shipping Address</th>
            </tr></thead>
            <tbody>
                <tr>
                    <td>{{$shippingDetail['first_name'] ." ". $shippingDetail['last_name']}}</td>
                </tr>
                <tr><td>
                       @if($shippingDetail['company_name'] != '' || $shippingDetail['appartment'] != '')
                  {{ $shippingDetail['company_name'] ." ". $shippingDetail['appartment'] }}, <br>
              @endif
                  {{ $shippingDetail['street_address'] }} <br>
                  {{ getCityName($shippingDetail['town_city']) ." ". getStateName($shippingDetail['state_country']) .", ". getStateName($shippingDetail['country']) ." ". $shippingDetail['postcode_zip'] }}
                </td></tr>
                <tr><td>Phone Number : {{ $shippingDetail['phone'] }}</td></tr>
                
                <tr><td>Email Address : {{ $shippingDetail['email_address'] }}</td>
                </tr>
               
            </tbody>
             

         </table>
                @endif
    </div>
    <div class="form-group col-sm-6">
         @if($shippingDetail != null)

       <table>
           <thead>
               <tr>
                   <th>Billing Address</th>
               </tr>
           </thead>
           <tbody>
               <tr><td>{{$billingDetail['first_name'] ." ". $billingDetail['last_name']}}</td></tr>
               <tr><td> @if($billingDetail['company_name'] != '' || $billingDetail['appartment'] != '')
                  {{ $billingDetail['company_name'] ." ". $billingDetail['appartment'] }}, <br>
              @endif
                  {{ $billingDetail['street_address'] }} <br>
                  {{ getCityName($billingDetail['town_city']) ." ". getStateName($billingDetail['state_country']) .", ". getCityName($billingDetail['country']) ." ". $billingDetail['postcode_zip'] }}</td></tr>
                  <tr><td>Phone Number : {{ $billingDetail['phone'] }}</td></tr>
                 
                  <tr><td>Email Address : {{ $billingDetail['email_address'] }}</td></tr>
                  
           </tbody>
       </table>
        @endif
    </div>
          
	 
</div>
@endforeach







