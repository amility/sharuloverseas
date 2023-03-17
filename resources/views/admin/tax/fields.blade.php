<div class="form-group col-sm-6">
    {!! Form::label('tax_name', 'Tax Name:') !!}
    {!! Form::text('tax_name', null, ['class' => 'form-control', 'placeholder' => '18%']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('tax_rate', 'Tax Rate:') !!}
    {!! Form::text('tax_rate', null, ['class' => 'form-control', 'placeholder' => '18']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tax.index') }}" class="btn btn-secondary">Cancel</a>
</div>  

  
