<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lib/bootstrap.min.css')); ?>">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/all.min.css')); ?>">
    <!-- lineawesome font -->
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/line-awesome.min.css')); ?>">
    <!-- slick slider css -->
     <?php echo $__env->yieldPushContent('style-lib'); ?>

    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lib/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lib/datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lightcase.css')); ?>">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset(asset($activeTemplateTrue) . "/css/color.php?color1=$general->base_color&color2=$general->secondary_color")); ?>">


    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>


    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <!-- preloader start -->
    <div class="preloader">
        <div class="preloader__inner">
            <div class="logo-area">
                <img src="<?php echo e(asset($activeTemplateTrue . 'images/preloader-logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"
                    class="preloader-img">
                <h3 class="logo-name"><?php echo e(__($general->sitename)); ?></h3>
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

    <?php echo $__env->make($activeTemplate.'partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <div class="main-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make($activeTemplate.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- footer section end -->
    <!-- jQuery library -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/jquery-3.5.1.min.js')); ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/bootstrap.bundle.min.js')); ?>"></script>
    <!-- slick slider js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/slick.min.js')); ?>"></script>
    <!-- scroll animation -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/datepicker.js')); ?>"></script>
    <!-- lightcase js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/lightcase.min.js')); ?>"></script>
    <!-- parallax js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/jquery.paroller.min.js')); ?>"></script>
    <!-- Tweenmax Js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/TweenMax.min.js')); ?>"></script>
    <!-- main js -->
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/app.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        <?php if(request()->is('/')): ?>
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
        <?php endif; ?>

        $(function() {
            'use strict'
            $(document).on("change", ".langSel", function() {
                window.location.href = "<?php echo e(url('/')); ?>/change/" + $(this).val();
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


<?php /**PATH C:\xampp7.4\htdocs\radioallomas\core\resources\views/templates/basic/layouts/frontend.blade.php ENDPATH**/ ?>