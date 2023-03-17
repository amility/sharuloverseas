@php
use App\Models\Category;
$arrCategoryLists = Category::getParentCategoryLists();

$arrExpoldeRoute = explode('@',Route::currentRouteAction());
$currentAction = end($arrExpoldeRoute);
@endphp


    <div class="form-group col-sm-6">
        
        {!! Form::label('parent_id', 'Category Lists:') !!} 
        
           @foreach($arrCategoryLists as $key=>$cat)
            <?php if($key==$subcategory['parent_id']){ 
                ?>
                <p>{{$cat}}</p>
                <?php
            } ?>
               
           @endforeach
             
    </div>


    <div class="form-group col-sm-6">
        
        {!! Form::label('parent_id', 'Category Lists:') !!} 
        <p>{{ $subcategory['name'] }}</p>
         
    </div>
    <div class="form-group col-sm-6">
        
        {!! Form::label('product', 'Product Name:') !!} 

        @foreach($product as $products)

        <li>{{$products['prod_name']}}</li>
        @endforeach
         
    </div>





