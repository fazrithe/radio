<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partials.seo')

    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/bootstrap.min.css') }}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/all.min.css') }}">
    <!-- lineawesome font -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/line-awesome.min.css') }}">
    <!-- slick slider css -->
     @stack('style-lib')

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lightcase.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">
    <link rel="stylesheet"
        href="{{ asset(asset($activeTemplateTrue) . "/css/color.php?color1=$general->base_color&color2=$general->secondary_color") }}">


    @stack('style')
</head>

<body>


    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <!-- preloader start -->
    <div class="preloader">
        <div class="preloader__inner">
            <div class="logo-area">
                <img src="{{ asset($activeTemplateTrue . 'images/preloader-logo.png') }}" alt="@lang('image')"
                    class="preloader-img">
                <h3 class="logo-name">{{ __($general->sitename) }}</h3>
                <div class="equalizer">
                    <span class="equalizer-item equalizer-1"></span>
                    <span class="equalizer-item equalizer-2"></span>
                    <span class="equalizer-item equalizer-3"></span>
                    <span class="equalizer-item equalizer-4"></span>
                    <span class="equalizer-item equalizer-5"></span>
                    <span class="equalizer-item equalizer-6"></span>
                    <span class="equalizer-item equalizer-7"></span>
                    <span class="equalizer-item equalizer-none"></span>
                </div>
            </div>
            <div class="loading-bar"></div>
        </div>
    </div>
    <!-- preloader end -->

    @include($activeTemplate.'partials.navbar')




    <div class="main-wrapper">
        @yield('content')
    </div>

    @include($activeTemplate.'partials.footer')



    <!-- footer section end -->
    <!-- jQuery library -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/jquery-3.5.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- slick slider js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/slick.min.js') }}"></script>
    <!-- scroll animation -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/wow.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/lib/datepicker.js') }}"></script>
    <!-- lightcase js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/lightcase.min.js') }}"></script>
    <!-- parallax js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/jquery.paroller.min.js') }}"></script>
    <!-- Tweenmax Js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/TweenMax.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset($activeTemplateTrue . 'js/app.js') }}"></script>

    @stack('script-lib')

    @stack('script')

    @include('partials.plugins')

    @include('admin.partials.notify')

    <script>

        @if(request()->is('/'))
            $(window).on("scroll", function() {
                elementEffectLeft();
            });

            function elementEffectLeft() {
                var heroSec = document.querySelector('.hero').clientHeight;

                var element = $(".main-wrapper");
                if ($(this).scrollTop() > heroSec) {
                    element.addClass("active");
                } else {
                    element.removeClass("active");
                }
            }
        @endif

        $(function() {
            'use strict'
            $(document).on("change", ".langSel", function() {
                window.location.href = "{{ url('/') }}/change/" + $(this).val();
            });
        })

    var audioPlayer = document.querySelector(".audio-player");
    var audioData = $(".audio-player").attr('data-audio');
     var audio = new Audio(audioData);
     var player = [];
    $(".controls .toggle-play").each(function(){
      $(this).on('click', function(){
        $('.event_audio').each(function(index){
            player[index] = new Audio($(this).data('audio'));
            if(!player[index].paused){
                player[index].pause()
            }
        })
        $(this).parent().parent().parent().toggleClass('active');
        const el = $(this).parent().parent().parent();
        if (audio.paused) {
          $(this).removeClass("play");
          $(this).addClass("pause");
          audio.play();
        }
         else {
          $(this).removeClass("pause");
          $(this).addClass("play");
          audio.pause();
        }
      });
    });
    </script>

</body>

</html>


