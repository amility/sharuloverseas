@extends('templates.default.app')

@section('content')

<!--banner-->
<div id="box-with-images2">
  <h2 class="hedabout text-center">ABOUT US</h2>
</div>
<!--banner end -->

<!-- section 1  -->
<section>
  <div class="container">
    <div class="row mt-4">
      <div class="col-12 col-lg-6">
         <div class="left-card">
             <h2 class="abouth2">ABOUT US</h2>
             @foreach($about as $ab)
             <p class="aboutp">{!! $ab['about_us'] !!}</p>
            <!--<p class="aboutp">After years of listening to family members having a hard time finding quality piece of mind in a budget they could afford,
             we decided to start looking into the industry. Being an avid hunter for many years and successful
             professional, we found a trend in pricing and decided to help support your Second Amendment Rights.Our Mission is to strive to find you the best deals on the market
and provide the education needed to help ensure that your investment for hunting,
sporting, or defense will serve you and your family well, for many years to come.</p>-->
@endforeach
         </div>

      </div>
      <div class="col-12 col-lg-6">

        <img src="newimages/about-gun.jpg" alt="about-gun">
      </div>
      
    </div>
    
  </div>
</section>
<!-- section 1 end -->

<section class="bigweapon mt-5 mb-5">
    <div class="container">
    <div class="text-center">
        <img src="newimages/weapon1.png" alt="big-weapon" class="text-center">
    </div>
    </div>
</section>


@endsection