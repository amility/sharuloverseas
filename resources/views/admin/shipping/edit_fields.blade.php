<div class="form-group col-sm-6">
	<?php $array = array('1'=>'Date','2'=>'Price','3'=>'LBS Weight');?>
	<select class="form-control" id="selectid" name="shipping_method" disabled="">
		
	<?php foreach($array as $key=>$data): 
			if($key==$shipping->shipping_method){ $select="selected='selected'"; }else{ $select='';}
		?>		
		<option value="{{$key}}" {{$select}}>{{$data}}</option>
		
	<?php endforeach; ?>
	</select>
</div>
 	<input type="hidden" name="shipping_method" value="{{$shipping->shipping_method}}">

@if($shipping->shipping_method==1)
 	<div class="form-group col-sm-6">
 		<label></label>
 		<input type="date" name="start_date" class="form-control" value="{{$shipping->start_date}}">

 	</div>

 	<div class="form-group col-sm-6">
 		<input type="date" name="end_date" class="form-control" value="{{$shipping->end_date}}">

 	</div>
 	<div class="form-group col-sm-6">
 		<input type="text" name="price" class="form-control" value="{{$shipping->price}}">

 	</div>
	 @elseif($shipping->shipping_method==3)
 	<div class="form-group col-sm-6">
 	
 		<input type="text" name="min_weight" class="form-control" value="{{$shipping->min_weight}}">

 	</div>

 	<div class="form-group col-sm-6">
 		<input type="text" name="max_weight" class="form-control" value="{{$shipping->max_weight}}">

 	</div>
 	<div class="form-group col-sm-6">
 		<input type="text" name="price" class="form-control" value="{{$shipping->price}}">

 	</div>
@else
<div class="form-group col-sm-6">
 		<input type="text" name="min_value" class="form-control" value="{{$shipping->min_value}}">

 	</div>
 	<div class="form-group col-sm-6">
 		<input type="text" name="max_value" class="form-control" value="{{$shipping->max_value}}">

 	</div>
 	<div class="form-group col-sm-6">
 		<input type="text" name="price" class="form-control" value="{{$shipping->price}}">

 	</div>

@endif


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>
</div>  
