<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Gun</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- new links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce-layout.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce-smallscreen.css') }}" type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('js/vendor/revslider/css/settings.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/tpl-revslider.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
     <link rel="stylesheet" href="{{ asset('css-old/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/shortcodes.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/plugin.woocommerce.css') }}" type="text/css" media="all" />
    
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('js/vendor/magnific/magnific-popup.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('js/vendor/swiper/swiper.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all"/>
    <!-- <link rel="stylesheet" href="{{ asset('css/fontello.css') }}" type="text/css" media="all" /> -->
    <link rel="icon" href="images/cropped-fav-big-32x32.jpg" sizes="32x32" />
    <link rel="icon" href="images/cropped-fav-big-192x192.jpg" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="images/cropped-fav-big-180x180.jpg" />
     @yield('style')
</head>

<body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide" onload="myFunctionash()">
    <!-- Body wrap -->
    <div class="body_wrap">
      <!-- Page wrap -->
      <div class="page_wrap">
    <div class="site">
        @include('templates.default.header')
        <div class="site__body">
            @yield('content')
        </div>
        @include('templates.default.footer')
    </div>

    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
   
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<!-- <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script> -->
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

<!-- <script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script> -->
<a href="#" class="scroll_to_top fas fa-chevron-up" title="Scroll to top"></a>
<script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/nouislider/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/photoswipe/photoswipe.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/number.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/header.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/svg4everybody/svg4everybody.min.js') }}"></script>
<link href="https://codeseven.github.io/toastr/build/toastr.min.css" rel="stylesheet" type="text/css" />
<script src="https://www.jqueryscript.net/demo/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>


    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-migrate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/_main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/trx_utils.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/_packed.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/essential-grid/js/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/essential-grid/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/revslider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/revslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/revslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/revslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/tpl-revslider-general.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/tpl-revslider-1.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/photostack/modernizr.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/superfish.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/utils.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/core.init.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/init.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/shortcodes.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/messages.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/swiper/swiper.min.js') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"776b65967bba1c55","token":"dab7be3e6ab04952b40d6c8e93f6cc2a","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
 <script>
function myFunctionash() {
  setTimeout(function() {
 $('#Mymodel').modal('show');
  }, 5000);
}
</script>
   <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
</script>
<script>var APP_URL = {!! json_encode(url('/')) !!}</script>
<script type="text/javascript">
    svg4everybody();
</script>


<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader1");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("stickyk");
  } else {
    header.classList.remove("stickyk");
  }
}
</script>
<script>
 $('#gettouch').on("submit",function(e){ 
    e.preventDefault();
        $name  = $('.sname').val();
        $email = $('.semail').val();
        $phone = $('.sphone').val();
        $gs    = $('#capdsS').val();
        $ggs   = $('#caps1sS').val();
        var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  //Javascript reGex for Email Validation.

        if($name=='')
        {
            $('.sname_error').html("Name Field is Required");
        }
        if($email=='')
        {
            $('.semail_error').html("Email Field is Required");
        }       
        if($phone=='')
        {
            $('.sphone_error').html("Phone Field is Required");
        }
        if(isNaN($phone) )
       {
        $('.sphone_error').html("Enter Numeric value");
       }
      
        if($gs=='')
        {
            $('.captcha_error').html("Captcha Field is Required!");
        }
        else if($gs != $ggs)
        {
            $('.captcha_error').html("Captcha Not Matched!");
        }
        //
        if($name=='')
        {
            $('.sname_error').html("Name Field is Required");
        } 
       else  if($email=='' || !regEmail.test($email))
        {
            $('.semail_error').html("Email Field is Required");
        }   
        else if($phone=='')
        {
            $('.sphone_error').html("Phone Field is Required");
        }
       else if(isNaN($phone) )
       {
        $('.sphone_error').html("Enter Numeric value");
       }
      
       else if($gs=='')
        {
            $('.captcha_error').html("Captcha Field is Required!");
        }
        else if($gs != $ggs)
        {
            $('.captcha_error').html("Captcha Not Matched!");
        }
        else
        {
            $('.captcha_error').html("Captcha  Matched!");
            var formData=new FormData(this);
            $.ajax({
                url:"{{url('contact-us1')}}",
                type:"POST",
                data:formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(data) {
                if(data.success)
                    {
                    swal({
                            title: "Thank you, we will get back to you soon!!!",
                            text:  "",
                            icon: "success",
                            button: "Ok",
                            });
                            $('#gettouch').trigger("reset");
                            $('#Mymodel').modal('hide');
                    }
                }
            });
        }
    });    
    
    
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@stack('scripts')
 @yield('script')
</html>