<div class="form-group col-sm-6">
	<select class="form-control" id="selectid" name="shipping_method">
		<option value="">Select</option>
		<option value="1">Date</option>
		<option value="2">Price</option>
	</select>
</div>

<div id="input"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>
</div>  
