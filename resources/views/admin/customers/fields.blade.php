  <div class="form-group col-sm-6">
    {!! Form::label('name', 'Customer Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Name']) !!}
</div>
  <div class="form-group col-sm-6">
    {!! Form::label('email', 'Customer Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Email']) !!}
</div>
  <div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}



    
    <input type="password" name="password" class="form-control" placeholder="Enter Your new password">



</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
</div>
