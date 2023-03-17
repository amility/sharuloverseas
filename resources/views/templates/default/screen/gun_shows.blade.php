@extends('templates.default.app')

@section('content')

<!--banner-->
<div id="box-with-images2" class="col-md-12 bg-black" style=" text-align:center; background-image:url('newimages/gun-show-bg.jpg')">
  <h2 class="hedabout">Gun Shows</h2>
</div>
<!--banner end -->

<!-- section 1  -->
<section>
  <div class="container">
    <div class="row my-4 gy-4">
      @foreach($months as $show)
        
   
        <div class="col-12 col-lg-4 mb-3">
            <div class=" rounded p-4 mt-3 mt-lg-0 h-100" style="background:#001949;">
                 <h5 class="bg-primary-gs font-weight-bold py-1 rounded">{{$show['month']}}  {{$show['year']}}</h5>
                     @foreach($gunshow as $gs)


@if($show->month==$gs->month) 

                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="{{$gs->target_link}}" class="white">  {{$gs['show_name']}}     </a> </p>
                   @endif               
                    @endforeach
            </div>
                         
        </div>
      
         @endforeach 

        <!-- <div class="col-12 col-lg-4">
            <div class=" rounded p-4 mt-3 mt-lg-0" style="background:#001949;">
                   <h5 class="bg-primary-gs font-weight-bold py-1 rounded"> NOVEMBER -  2022 </h5>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>                   
            </div>              
        </div>

         <div class="col-12 col-lg-4">
            <div class=" rounded p-4 mt-3 mt-lg-0" style="background:#001949;">
                   <h5 class="bg-primary-gs font-weight-bold py-1 rounded">OCTOBER -  2022 </h5>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>
                    <p class="bg-warning-gs font-weight-bold py-1 rounded"> <a href="#" class="white"> 1st and and Allen </a> </p>                   
              </div>          
        </div>
           -->  
      
    </div>
    
  </div>
</section>
<!-- section 1 end -->


@endsection
