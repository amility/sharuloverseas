@php
use App\Models\Category;
$arrCategoryLists = Category::getParentCategoryLists();

$arrExpoldeRoute = explode('@',Route::currentRouteAction());
$currentAction = end($arrExpoldeRoute);
@endphp

@if(!empty($catType) && !empty($id))
    <div class="form-group col-sm-6">
        
        {!! Form::label('parent_id', 'Category Lists:') !!} 
        {!! Form::select('parent_id',  $arrCategoryLists , $id, ['class' => 'form-control']) !!}        
    </div>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','readonly']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', ['1'=>'Active', '0'=>'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#name').keyup(function(e) {
            var txtVal = $(this).val();
            txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
            $('#slug').val(txtVal);
        });     
    </script>
@endpush