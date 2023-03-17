<div class="form-group col-sm-8">
    {!! Form::label('show_name', ' Show_Name:') !!}
   {!! Form::text('show_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-8">
<div class="row">

<div class="form-group col-sm-4">
    {!! Form::label('month', ' Month:') !!}
    {!! Form::selectMonth('month',  null, ['class' => 'form-control']) !!}
   
</div>
<div class="form-group col-sm-4">
    {!! Form::label('day', ' Day:') !!}
    {!! Form::selectRange('day', 1, 31,  null, ['class' => 'form-control']) !!}
   
</div>
<div class="form-group col-sm-4">
    {!! Form::label('year', ' Year:') !!}
    <!--selectRange('number', 10, 20)
    Form::selectMonth('month');-->
    {!! Form::selectRange('year', 2020, 2050,  null, ['class' => 'form-control']) !!}
   
</div>
</div></div>
<div class="form-group col-sm-8">
    {!! Form::label('target_link', ' Target_link:') !!}
   {!! Form::text('target_link', null, ['class' => 'form-control']) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('gunshow.index') }}" class="btn btn-secondary">Cancel</a>
</div>
@push('scripts')

<script type="text/javascript">
     ClassicEditor
        .create(document.querySelector('#gunshow'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
