<div class="form-group col-sm-6">
	<select class="form-control" id="selectid" name="shipping_method">
	<option value="">Please Select Option</option>
		<!--<option value="1">Date</option>-->
		<!--<option value="2">Price</option>-->
		<option value="3">Weight (LBS)</option>
	</select>
</div>

<div id="input"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>
</div>  
