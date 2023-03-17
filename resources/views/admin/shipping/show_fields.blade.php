<!-- Promo Name Field -->

<div class="form-group">
	{!! Form::label('shipping_method', 'Shipping Method:') !!}

 
	@if($shipping->shipping_method==1)
                    <p>Date</p>
                @elseif($shipping->shipping_method==3)
                    <p>LBS Weight</p>
                @else
                   <p>Price</p>
                @endif    
   
</div>
<div class="form-group">
	@if($shipping->shipping_method==1)
	     {!! Form::label('start_date', 'Start Date:') !!}
                    <p>{{$shipping->start_date}}</p>
                    {!! Form::label('end_date', 'End Date:') !!}
                     <p>{{$shipping->end_date}}</p>

                     @elseif($shipping->shipping_method==3)
                     {!! Form::label('min_weight', 'Min Weight:') !!}
                    <p>{{$shipping->min_weight}}</p>
                    {!! Form::label('max_weight', 'Max Weight:') !!}
                     <p>{{$shipping->max_weight}}</p>
                @else
                {!! Form::label('min_value', 'Min Value:') !!}
                    <p>{{$shipping->min_value}}</p>
                    {!! Form::label('max_value', 'Max Value:') !!}
                     <p>{{$shipping->max_value}}</p>
                @endif
</div>

<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $shipping->price }}</p>
</div>






