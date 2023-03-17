@extends('templates.default.app')

@section('content')
<!--banner-->
<div id="box-with-images2" class="col-md-12">
  <h2 class="hedabout text-center">Contact Us</h2>
</div>
<!--banner end -->

   <!-- <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>-->
<div>
    <div class="container">
        <div class=" mb-0">
            <div class="card-body contact-us">
                <div class="contact-us__container">
                    <div class="row">
                        <div class="col-lg-6">
                             <h4 class="contact-us__header card-title">Get in Touch</h4>

<div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                                <ul class="list list-icons list-icons-style-2 mt-2">
                                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong>Address:</strong><a href="https://www.google.com/maps/place/10402+Fairway+Vista+Dr,+Rowlett,+TX+75089,+USA/@32.9518748,-96.5317298,17z/data=!4m6!3m5!1s0x864c0252e1903bf9:0x222732d1c2dce38a!8m2!3d32.9518704!4d-96.5275026!16s%2Fg%2F11crv7s1t3" target="_blank">J & C Risher Firearms<br>10402 Fairway Vista Dr. Rowlett, Tx. 75089</a> 
                                      <p> (By Appointment Only)</p></li>
                                    <li><i class="fas fa-phone top-6"></i> <strong>Phone:</strong><a href="tel:469-919-4867">469-919-4867</a></li>
                                    <li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a href="mailto:jdrisher@aol.com">jdrisher@aol.com</a></li>
                                </ul>
                            </div>

                            <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="950" style="animation-delay: 950ms;">
                                <h4 class="pt-5">Business <strong>Hours</strong></h4>
                                <ul class="list list-icons list-dark mt-2">
                                    <li><i class="far fa-clock top-6"></i> Monday - Friday - 10 AM - 4 PM</li>
                                    <li><i class="far fa-clock top-6"></i> Saturday - Sunday - Closed</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h4 class="contact-us__header card-title">Leave us a Message</h4>
                            @if(session()->has('msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msg') }}
                                </div>
                             @endif
                            <form method="post" action="{{route('contact-us')}}">
                                @csrf
                                <div class="form-row contact">
                                    <div class="form-group col-md-6">
                                        <label for="form-name">Your Name</label>
                                        <input type="text" id="form-name" class="form-control" placeholder="Your Name" name="name" value="{{old('name','')}}">
                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-email">Email</label>
                                        <input type="email" id="form-email" class="form-control" placeholder="Email Address" name="email" value="{{old('email','')}}">
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group contact">
                                    <label for="form-subject">Mobile No.</label>
                                    <input type="number" id="form-subject" class="form-control" placeholder="Mobile No." name="phone" value="{{old('phone','')}}">
                                    @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group contact">
                                    <label for="form-message">Message</label>
                                    <textarea id="form-message" class="form-control" rows="4" name="msg"></textarea>
                                    @if($errors->has('msg'))
                                            <div class="error">The message field is required.</div>
                                        @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--map-->
<!--<div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6044.821122014753!2d-73.98135523022461!3d40.75299390000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25902bd3379d7%3A0xe31337b00f907ffd!2sNYC%20Office%20Suites!5e0!3m2!1sen!2sus!4v1667208077980!5m2!1sen!2sus" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>-->
<!--map end -->


@endsection