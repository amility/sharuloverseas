@extends('templates.default.app')

@section('content')

<div class="black-box">
<div class="page-header">
  <div class="page-header__container container">
    <div class="page-header__breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>
          </li>
          <li class="breadcrumb-item">/</li>
          <!-- <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>
          </li> -->
          <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
        </ol>
      </nav>
    </div>
    <div class="page-header__title">
      <h4>Shopping Cart</h4>
    </div>
  </div>
</div>
<div class="block-empty__body">
  <div class="block-empty__message">Your shopping cart is empty!</div>
  <div class="block-empty__actions"><a class="" href="{{url('/')}}"><button class="btn btn-primary">Continue</button></a></div>
</div>
</div>

@endsection