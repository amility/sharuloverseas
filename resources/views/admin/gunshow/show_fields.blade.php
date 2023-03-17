<div class="form-group">
    {!! Form::label('show_name', 'Show Name
:') !!}
    <p>{{ $gunshow->show_name}}</p>
</div>
<div class="form-group">
    {!! Form::label('date', 'Date
:') !!}
    {{ $gunshow->day}} {{ $gunshow->month}} {{ $gunshow->year}}
</div>

<div class="form-group">
    {!! Form::label('gunshow', 'Target Link
:') !!}
    <p>{{ $gunshow->target_link}}</p>
</div>





