@extends('templates.default.app')

@section('content')


<div class="page-header">
  <div class="page-header__container container">
    <div class="page-header__breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="{{ url('images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
            </svg>
          </li>
          <!-- <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
            <svg class="breadcrumb-arrow" width="6px" height="9px">
              <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>
          </li> -->
          <li class="breadcrumb-item active" aria-current="page">Offcanvas Cart</li>
        </ol>
      </nav>
    </div>
    <div class="page-header__title">
      <h1>Offcanvas Cart</h1>
    </div>
  </div>
</div>
<div class="block-empty__body">
  <div class="block-empty__message">Click on the button to open the offcanvas cart!</div>
  <div class="block-empty__actions"><a class="btn btn-primary btn-sm" href="#" data-open="offcanvas-cart">Open Cart</a></div>
</div>


@endsection