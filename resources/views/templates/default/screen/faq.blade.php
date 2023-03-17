@extends('templates.default.app')

@section('content')

<!--banner-->
<div id="box-with-images2">
  <h2 class="hedabout text-center">FAQ</h2>
</div>
<!--banner end -->

<div class="block faq">
  <div class="container">
    <div class="faq__section gun-showcase">
        <h2 class="abouth2">FAQ</h2>
        <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          How long until I get my order ?
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       tems should be shipped within 2 to 7 days of order date.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         What do I need to do from my end to receive a Firearm ?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      You will need to designate an FFL in your area to receive the firearm and have them send a copy of their FFL to jdrisher@aol.com.  You will also need to know your States Rules on Specific firearms.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          What kind of guarantees do your firearms and components have ?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
       We are a retailer, the warranties are provided through the manufacturer.  Most or the manufactures provide a lifetime, limited lifetime, or 1 year warranty on their products.  Please check with manufacture on specific details.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfour">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
          Do you have a refund policy ?
        </button>
      </h5>
    </div>
    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
      <div class="card-body">
       No, all sales are final.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfive">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
          If I am local can I come pick up my purchase ?
        </button>
      </h5>
    </div>
    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
      <div class="card-body">
       Yes, by appointment only.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingsix">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
          If you do not have a firearm I am looking for can you order it for me ?
        </button>
      </h5>
    </div>
    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
      <div class="card-body">
       Yes, keep in mind that some firearms may be out of stock or on backorder, in those events we will make every effort to obtain your firearm in a timely manner.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingseven">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
         Are you an authorized FFL for Palmetto State Armory Products ?
        </button>
      </h5>
    </div>
    <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
      <div class="card-body">
      Yes, at present we are 1 of 13 in the US.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingeight">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
        Do you carry most Firearm Brands ?
        </button>
      </h5>
    </div>
    <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#accordion">
      <div class="card-body">
      Yes, we have access to most Firearm Brands.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingnine">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
        What forms a payment do you accept ?
        </button>
      </h5>
    </div>
    <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#accordion">
      <div class="card-body">
      We Accept most all major credit cards as listed in checkout.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingten">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
        Do you have in inventory all items on this site ?
        </button>
      </h5>
    </div>
    <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#accordion">
      <div class="card-body">
      Yes, if for some reason an item that shows in stock that is not we will notify you of the issue and either get it ordered or refund your payment.
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>


@endsection