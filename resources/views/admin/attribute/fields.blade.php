<!-- Image Path Field -->


<div class="form-group col-sm-6">
    {!! Form::label('attribute', 'Enter Attribute Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


        @if(isset($abc))
        @foreach($abc as $da)
        @foreach($da as $dat)
        <div class="form-group col-sm-6 after-add-more">
            <div class="row">
                <div class="col-md-10">
                    {!! Form::label('attribute_value', 'Enter Attribute Value:') !!}
                    {!! Form::text('value[]', $dat->value, ['class' => 'form-control gd']) !!}
                </div>  
                <div class="col-md-2">
                    <label for="">&nbsp;</label>
                    <button class="attribute_remove remove">Remove</button>

                </div>
                </div>

</div>
        @endforeach
    @endforeach
   
        @else
        <div class="form-group col-sm-6 after-add-more">
            <div class="row">
        <div class="col-md-10">
            {!! Form::label('attribute_value', 'Enter Attribute Value:') !!}
            {!! Form::text('value[]', null, ['class' => 'form-control gd']) !!}
        </div>  
        <div class="col-md-2">
            <label for="">&nbsp;</label>
            <button class="attribute_remove remove">Remove</button>

        </div>
        </div>

</div>
        @endif     
   
<div class="form-group col-sm-12">
    {!! Form::button('Add More', ['class' => 'btn btn-success add-more']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bannerImages.index') }}" class="btn btn-secondary">Cancel</a>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        
    $("body").on("click",".add-more",function(){ 
        var html = $(".after-add-more").first().clone();
      
      
        $(".after-add-more").last().after(html);
        $(".gd").last().val('');

     
       
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});
</script>
@endpush