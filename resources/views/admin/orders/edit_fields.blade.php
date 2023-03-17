  @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Order Status:') !!}
    <select class="form-control" name="status">
            <option value="">Please Select</option>
      <option value="confirmed" <?php if($orders->status=='confirmed'){
        echo ' selected="selected"'; }?>>confirmed</option>
      <option value="dispatched" <?php if($orders->status=='dispatched')
        echo ' selected="selected"' ?>>dispatched</option>
      <option value="delivered" <?php if($orders->status=='delivered'){
        echo ' selected="selected"';
      } ?>>delivered</option>
      <option value="rejected" <?php if($orders->status=='rejected'){
        echo ' selected="selected"';
      } ?>>rejected/refund</option>
      <option value="undelivered" <?php if($orders->status=='undelivered'){
        echo ' selected="selected"';
      } ?>>undelivered</option>
      <option value="cancelled" <?php if($orders->status=='cancelled'){
        echo ' selected="selected"';
      } ?>>cancelled</option>
    </select>
</div>
<input type="hidden" name="id" value="{{$orders->customer_id}}">


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
</div>









